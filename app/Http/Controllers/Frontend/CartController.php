<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view(
            'frontend/cart'
        );
    }

    public function addToCart()
    {
    }

    public function updateCart()
    {
    }


    public function removeFromCart()
    {
    }
}
