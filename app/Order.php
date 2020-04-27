<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function addItems(array $items)
    {
        // TODO iteriere durch alle items




        // TODO füge jedes OrderItem mit der
        // updateOrCreate-Methode zur Order hinzu



    }
}
