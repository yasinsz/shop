<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    protected $fillable = ['name', 'price', 'description', 'address'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
