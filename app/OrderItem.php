<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function disassembly(){
    return $this->belongsTo('App\Disassembly');

    }

    public function assembly(){
        return $this->belongsTo('App\Assembly');

    }

    public function configuration(){
        return $this->belongsTo('App\Configuration');
    }
}
