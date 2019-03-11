<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PervajzWallWidth extends Model
{
    protected $table = 'pervajz_wall_widths';

    public function configurations(){
        return $this->hasMany('App\Configuration');
    }

    public function configuration2s(){
        return $this->hasMany('App\Configuration2');
    }

    public function doorType(){
        return $this->belongsTo('App\DoorType');
    }
}
