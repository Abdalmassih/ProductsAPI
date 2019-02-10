<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceSpecial extends Model
{

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
