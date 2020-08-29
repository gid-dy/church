<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function children(){
        return $this->belongsTo('App\Children', 'children_id', 'id');

    }
}
