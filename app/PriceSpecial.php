<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSpecial extends Model
{

    protected $guarded = ['id', 'product_id'];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
