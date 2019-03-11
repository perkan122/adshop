<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicConfiguration extends Model
{
    protected $table = 'basic_configurations';

    public function configurations(){
        return $this->hasMany('App\Configuration');
    }

    public function configuration2s(){
        return $this->hasMany('App\Configuration2');
    }

    public function doorModel(){
        return $this->belongsTo('App\DoorModel');
    }

    public function doorType(){
        return $this->belongsTo('App\DoorType');
    }

    public function dimension(){
        return $this->belongsTo('App\Dimension');
    }
}
