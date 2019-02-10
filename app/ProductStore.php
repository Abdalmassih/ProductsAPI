<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{

    protected $table = 'product_store';
    public $timestamps = true;

    public function priceGroups()
    {
        return $this->belongsToMany('App\MemberGroup', 'price_groups');
    }

}
