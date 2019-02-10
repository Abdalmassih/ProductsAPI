<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityInfo extends Model
{

    protected $guarded = ['id', 'product_id'];

    protected $table = 'quantity_info';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
