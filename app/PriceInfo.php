<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceInfo extends Model
{

    protected $guarded = ['id', 'product_id'];

    protected $table = 'price_info';

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
