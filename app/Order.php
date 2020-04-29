<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'address'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function addItems(array $items)
    {
        foreach ($items as $item) {
            $this->orderItems()->updateOrCreate([
                'name'        => $item['name']
            ], [
                'name'        => $item['name'],
                'description' => $item['description'],
                'qty'         => $item['qty'],
                'price'       => $item['price']
            ]);
        }
    }

    public function getTotal()
    {
        $subTotal = 0;

        foreach ($this->orderItems as $item) {
            $subTotal += $item->price * $item->qty;
        }

        return $subTotal;
    }
}

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     public function orderItems()
//     {
//         return $this->hasMany('App\OrderItem');
//     }

//     public function addItems(array $orderItems)
//     {
//         // TODO iteriere durch alle items
//         $orderItems = [];
//         foreach ($orderItems as $orderItem) {
//             $this->orderItems()->updateOrCreate([
//                 'name' => $orderItem['name'],
//                 'description' => $orderItem['description'],
//                 'qty' => $orderItem['qty'],
//                 'price' => $orderItem['price']
//             ]);
//         }

//         // TODO füge jedes OrderItem mit der
//         // updateOrCreate-Methode zur Order hinzu
//         return view('frontend/checkout/payment', [
//             'orderItems' => $orderItems
//         ]);
//     }
// }
