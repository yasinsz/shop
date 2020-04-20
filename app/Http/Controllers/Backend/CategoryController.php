<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/categories/index', [
            'categories' => Category::paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/categories/create', [
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData();
        $category = Category::create($request->except(['products']));
        $category->products()->sync($request->input('products'));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend/categories/edit', ['category' => $category, 'products' => Product::all(), 'selectedProducts' => $category->products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->validateData());

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'products' => 'exists:products,id',
            // 'price' => 'required|numeric|between:0,9999.99',
            // 'description' => 'required|min:3',
            // 'msrp' => 'numeric|between:0,9999.99',
            // 'stock' => 'integer'
        ]);
    }
}







// namespace App\Http\Controllers\Backend;

// use App\Http\Controllers\Controller;
// use App\Category;
// use Illuminate\Http\Request;

// class CategoryController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         return view('backend/categories/index', [
//             'categories' => Category::all()
//         ]);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('backend/categories/create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         Category::create($this->validateData());

//         return redirect()->route('admin.categories.index');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Category  $category
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Category $category)
//     {
//         return redirect()->route('admin.categories.edit', $category);
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Category  $category
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Category $category)
//     {
//         return view('backend/categories/edit', ['category' => $category]);
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Category  $category
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Category $category)
//     {
//         $category->update($this->validateData());

//         return redirect()->route('admin.categories.index');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Category  $category
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Category $category)
//     {
//         $category->delete();

//         return redirect()->route('admin.categories.index');
//     }

//     private function validateData()
//     {
//         return request()->validate([
//             'name' => 'required|min:3',
//             'price' => 'required|numeric|between:0,9999.99',
//             'description' => 'required|min:3',
//             'msrp' => 'numeric|between:0,9999.99',
//             'stock' => 'integer'
//         ]);
//     }
// }
