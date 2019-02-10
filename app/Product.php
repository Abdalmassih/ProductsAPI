<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = ['id'];

    public $timestamps = true;

    public function set()
    {
        return $this->belongsTo('App\Set');
    }

    public function priceInfo()
    {
        return $this->hasOne('App\PriceInfo');
    }

    public function quantityInfo()
    {
        return $this->hasOne('App\QuantityInfo');
    }

    public function priceSpecials()
    {
        return $this->hasMany('App\PriceSpecial');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_category');
    }

    public function stores()
    {
        return $this->belongsToMany('App\Store');
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function displays()
    {
        return $this->belongToMany('App\Display', 'product_display');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany('App\Product', 'related_products', 'first_product_id', 'second_product_id');
    }

    public function similarProducts()
    {
        return $this->belongsToMany('App\Product', 'similar_products', 'first_product_id', 'second_product_id');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Brand', 'product_brand');
    }

    public function priceGroups()
    {
        return $this->hasManyThrough('App\PriceGroup', 'App\ProductStore');
    }

}
