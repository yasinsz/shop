<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $query = request()->input('q');
        $products = \App\Product::where('name', 'LIKE', "%$query%")
            ->orwhere('description', 'LIKE', "%$query%")
            ->paginate(8);
        return view('frontend/search', [
            'query' => $query,
            'products' => $products
        ]);
    }
}
