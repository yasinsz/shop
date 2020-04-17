<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('frontend/products/show', [
            'product' => $product
        ]);
    }
}
