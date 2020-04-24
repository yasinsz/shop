<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
        $isEmpty = false;
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $isEmpty = true;
        }

        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $key => $item) {

            $cartItems[$key] = array(
                'id' => $key,
                'qty' => $cart[$key],
                'name' => Product::find($key)->name,
                'price' => Product::find($key)->price * $cart[$key]
            );
            $totalPrice += $cartItems[$key]['price'];
        };

        return view(
            'frontend/cart',
            [
                'cartItems' => $cartItems,
                'total' => $totalPrice,
                'isEmpty' => $isEmpty
            ]
        );
    }


    // public function show()
    // {
    //     return view('frontend/cart');
    // }

    public function addToCart(Request $request)
    {
        // validate input
        $data = $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer|'
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

    public function updateCart(Request $request)
    {
        $data = $request->validate([
            'qty' => 'required|integer'
        ]);
        $qty = (int) $data['qty'];
        $cart = session()->get('cart');
        if ($qty === 0)
            unset($cart[$request->id]);
        else
            $cart[$request->id] = $qty;
        if (empty($cart))
            session()->remove('cart');
        else
            session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function removeFromCart()
    {
    }
}
