<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function OrderItems()
    {
        return $this->hasMany('App\OrderItems');
    }
}
