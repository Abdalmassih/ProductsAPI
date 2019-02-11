<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $itemsCount = (int) $request->itemsCount ?? null;
        //if no pagination items passed, return all products
        $products = $itemsCount ? DB::table('products')->paginate($itemsCount) : DB::table('products')->get();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|unique:products|max:255',
            'sku' => 'string|required|max:255',
            'tax_type' => 'required|max:255',
            'url' => 'string|required|max:255',
            'meta_title' => 'string|nullable|max:255',
            'brief' => 'string|nullable',
            'description' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'active' => 'boolean|required',
            'unlimited_quantity' => 'boolean|required',
            'current_price' => 'integer|required',
            'old_price' => 'integer|required',
            'quantity' => 'integer|required',

            //children validation
            //price specials
            'price_specials.price' => 'numeric',
            'price_specials.from_date' => 'date|before_or_equal:to_date',
            'price_specials.to_date' => 'date|after_or_equal:from_date',

            //price_info
            'price_info.cost' => 'integer|nullable',
            'price_info.msrp' => 'integer|nullable',
            'price_info.display_type' => 'in:1,2,3|required',

            //other product children validation should simply follow the same pattern...
        ]);

        if ($validator->fails()) {
            $all_errors = $validator->errors();
            return response()->json(['messages' => $all_errors], 400);
        }
        $product = new Product();

        DB::transaction(function () use ($request, $product) {

            $product->name = $request->name;
            $product->set_id = $request->set_id;
            $product->sku = $request->sku;
            $product->active = $request->active;
            $product->current_price = $request->current_price;
            $product->old_price = $request->old_price;
            $product->quantity = $request->quantity;
            $product->unlimited_quantity = $request->unlimited_quantity;
            $product->tax_type = $request->tax_type;
            $product->brief = $request->brief;
            $product->description = $request->description;
            $product->url = $request->url;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;

            $product->save();

            $product->priceInfo()->create(
                [
                    'cost' => $request->price_info['cost'],
                    'msrp' => $request->price_info['msrp'],
                    'display_type' => $request->price_info['display_type'],
                ]
            );

            $product->quantityInfo()->create(
                [
                    'min_qty_allowed' => $request->quantity_info['min_qty_allowed'],
                    'max_qty_allowed' => $request->quantity_info['max_qty_allowed'],
                    'out_of_stock_threshold' => $request->quantity_info['out_of_stock_threshold'],
                    'stock_status' => $request->quantity_info['stock_status'],
                    'notify_for_quantity' => $request->quantity_info['notify_for_quantity'],
                    'quantity_to_notify' => $request->quantity_info['quantity_to_notify'],
                    'sell_in_box' => $request->quantity_info['sell_in_box'],
                    'items_per_box' => $request->quantity_info['items_per_box'],
                    'allow_requesting_when_product_out_of_stock' => $request->quantity_info['allow_requesting_when_product_out_of_stock'],
                ]
            );

            foreach ($request->price_specials as $ps) {
                $priceSpecial = new \App\PriceSpecial();
                $priceSpecial->price = $ps['price'];
                $priceSpecial->from_date = $ps['from_date'];
                $priceSpecial->to_date = $ps['to_date'];
                $priceSpecial->product()->associate($product->id);
                $priceSpecial->save();
            }

            foreach ($request->categories as $category) {
                $product->categories()->attach($category);
            }
        });

        return response()->json(Product::with(['priceInfo', 'priceSpecials', 'categories'])->find($product->id), 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        $product = new Product();
        try {
            $product = Product::with([
                'set',
                'priceInfo',
                'quantityInfo',
                'priceSpecials',
                'priceGroups',
                'categories',
                'stores',
                'brands',
                'suppliers',
                'tags',
                'files',
                'relatedProducts',
                'similarProducts',
            ])->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json("Product Not Found", 404);
        }
        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function edit($id)
    // {

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        $product = Product::with('priceInfo', 'priceSpecials', 'categories')->findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => ['string', 'required', 'unique:products,name,null,id', 'max:255'],
            'sku' => 'string|required|max:255',
            'tax_type' => 'required|max:255',
            'url' => 'string|required|max:255',
            'meta_title' => 'string|nullable|max:255',
            'brief' => 'string|nullable',
            'description' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'active' => 'boolean|required',
            'unlimited_quantity' => 'boolean|required',
            'current_price' => 'integer|required',
            'old_price' => 'integer|required',
            'quantity' => 'integer|required',

            //children validation
            //price specials
            'price_specials.price' => 'numeric',
            'price_specials.from_date' => 'date|before_or_equal:to_date',
            'price_specials.to_date' => 'date|after_or_equal:from_date',

            //other product children validation should simply follow the same pattern...
        ]);
        if ($validator->fails()) {
            $all_errors = $validator->errors();
            return response()->json(['messages' => $all_errors], 400);
        }

        DB::Transaction(function () use ($product, $request) {

            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->active = $request->active;
            $product->current_price = $request->current_price;
            $product->old_price = $request->old_price;
            $product->quantity = $request->quantity;
            $product->unlimited_quantity = $request->unlimited_quantity;
            $product->tax_type = $request->tax_type;
            $product->brief = $request->brief;
            $product->description = $request->description;
            $product->url = $request->url;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;

            $product->save();

            $product->categories()->sync($request->categories, false);

            $addedPriceSpecials = $request->price_specials['add'];
            $updatedPriceSpecials = $request->price_specials['update'];
            $deletedPriceSpecialsIds = $request->price_specials['del'];

            foreach ($addedPriceSpecials as $ps) {
                $product->priceSpecials()->save(new \App\PriceSpecial($ps));
            }

            foreach ($updatedPriceSpecials as $ps) {
                $product->priceSpecials()->update((new \App\PriceSpecial($ps))->toArray());
            }

            foreach ($deletedPriceSpecialsIds as $psId) {
                \App\PriceSpecial::where('id', $psId)->delete();
            }

        });
        return response()->json(true, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = new Product();
        try {
            $product = Product::with(['stores'])->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json("Product Not Found", 404);
        }
        // if (!empty($product->stores)) {
        //     return response()->json("Product is related to store", 422);
        // }

        DB::Transaction(function () use ($product) {
            $product->delete();
        });
        return response()->json(true, 200);
    }
}
