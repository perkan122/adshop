<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorModel extends Model
{
    protected $table = 'door_models';

    public function basicConfigurations(){
        return $this->hasMany('App\BasicConfiguration');
    }

    public function doorTypes(){
        return $this->hasMany('App\Doortype');
    }
}
