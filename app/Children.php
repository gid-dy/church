<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    public function child(){
        return $this->hasMany('App\Adult', 'children_id');
    }

    // public function children(){
    //     return $this->belongsTo('App\Service', 'service_id','id');
    // }


}
