<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $table = 'assemblies';

    public function orderItems(){
        return $this->hasMany('App\OrderItem');

    }


}
