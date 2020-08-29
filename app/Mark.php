<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function children(){
        return $this->belongsTo('App\Children', 'children_id', 'id');

    }

    // public function childs(){
    //     return $this->belongsTo('App\Children', 'children_id',);
    // }
}
