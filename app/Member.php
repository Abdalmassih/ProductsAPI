<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public $timestamps = true;

    public function groups()
    {
        return $this->belongsToMany('App\MemberGroup', 'memberships');
    }

}
