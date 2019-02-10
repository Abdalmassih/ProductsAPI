<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{

    public $timestamps = true;

    public function products()
    {
        return $this->belongToMany('App\Product', 'product_display');
    }
}
