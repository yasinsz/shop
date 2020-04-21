<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('frontend/cart');
    }

    public function addToCart(Request $request)
    {
        // validate input
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer'
        ]);

        // get cart from session
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        // add product to cart
        $id = (int) $data['id'];
        $qty = (int) $data['qty'];
        if (isset($cart[$id])) {
            $cart[$id] += $qty;
        } else {
            $cart[$id] = $qty;
        }

        // put cart into session
        session()->put('cart', $cart);

        // redirect to cart view
        return redirect('/cart');
    }

    public function updateCart()
    {
    }

    public function removeFromCart()
    {
    }
}




// public function addToCart(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|min:3',
    //         'qty' => 'required|numeric|between:0,9999.99',
    //     ]);


    //     $session = session()->get('qty', 'id');



    //     session()->put([
    //         'qty' => $request->input('id'),
    //         'id' => $request->input('id'),
    //     ]);

    //     // $session = session()->get('cart');

    //     return redirect()->route('frontend/cart');
    // }

    // public function updateCart()
    // {
    // }


    // public function removeFromCart()
    // {
    // }
