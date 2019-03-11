<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disassembly extends Model
{
    protected $table='disassemblies';

    public function orderItems(){
        return $this->hasMany('App\OrderItem');

    }


}
