<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorType extends Model
{
    protected $table = 'door_types';

    public function doorModel(){
        return $this->belongsTo('App\DoorModel');
    }

    public function basicConfigurations(){
        return $this->hasMany('App\BasicConfiguration');
    }

    public function dimensions(){
        return $this->hasMany('App\Dimension');
    }

    public function doorLeafFillings(){
        return $this->hasMany('App\DoorLeafFilling');
    }

    public function finalTreatments(){
        return $this->hasMany('App\FinalTreatment');
    }

    public function kaneluras(){
        return $this->hasMany('App\Kanelura');
    }

    public function pervajzWallWidths(){
        return $this->hasMany('App\PervajzWallWidth');
    }

    public function hinges(){
        return $this->hasMany('App\Hinge');
    }

    public function doorsteps(){
        return $this->hasMany('App\Doorstep');
    }

    public function doorlockKinds(){
        return $this->hasMany('App\DoorlockKind');
    }

    public function doorlockTypes(){
        return $this->hasMany('App\DoorlockType');
    }

    public function doorHandles(){
        return $this->hasMany('App\DoorHandle');
    }

    public function openingWays(){
        return $this->hasMany('App\OpeningWay');
    }

    public function tracks(){
        return $this->hasMany('App\Track');
    }

    public function ventilationGrids(){
        return $this->hasMany('App\VentilationGrid');
    }

    public function stoppers(){
        return $this->hasMany('App\Stopper');
    }
}
