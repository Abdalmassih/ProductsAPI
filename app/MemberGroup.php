<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberGroup extends Model
{

    public $timestamps = true;

    public function members()
    {
        return $this->belongsToMany('App\Member', 'memberships');
    }

    public function priceGroups()
    {
        return $this->belongsToMany('App\ProductStore', 'price_groups');
    }

}
