<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OdersProduct;

class Order extends Model
{
    public function orders(){
        return $this->hasMany('App\OrdersProduct','order_id');
    }
}
