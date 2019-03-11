<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorlockType extends Model
{
    protected $table = 'doorlock_types';

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
