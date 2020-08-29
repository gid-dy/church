<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    public function Organisation(){
        return $this->hasMany('App\Adult', 'Organisation_id','id');
    }
}
