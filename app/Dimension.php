<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{

    public function doorType(){
        return $this->belongsTo('App\DoorType');
    }

    public function basicConfigurations(){
        return $this->hasMany('App\BasicConfiguration');
    }
}
