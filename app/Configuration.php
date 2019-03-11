<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }

    public function basicConfiguration(){
        return $this->belongsTo('App\BasicConfiguration');
    }

    public function doorLeafFilling(){
        return $this->belongsTo('App\DoorLeafFilling');
    }

    public function finalTreatment(){
        return $this->belongsTo('App\FinalTreatment');
    }

    public function kanelura(){
        return $this->belongsTo('App\Kanelura');
    }

    public function pervajzWallWidth(){
        return $this->belongsTo('App\PervajzWallWidth');
    }

    public function hinge(){
        return $this->belongsTo('App\Hinge');
    }

    public function doorstep(){
        return $this->belongsTo('App\Doorstep');
    }

    public function doorlockKind(){
        return $this->belongsTo('App\DoorlockKind');
    }

    public function doorlockType(){
        return $this->belongsTo('App\DoorlockType');
    }

    public function doorHandle(){
        return $this->belongsTo('App\DoorHandle');
    }

    public function openingWay(){
        return $this->belongsTo('App\OpeningWay');
    }

    public function track(){
        return $this->belongsTo('App\Track');
    }

    public function ventilationGrid(){
        return $this->belongsTo('App\VentilationGrid');
    }

    public function stopper(){
        return $this->belongsTo('App\Stopper');
    }
}
