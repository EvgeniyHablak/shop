<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckPermissions;
use App\Categories;
use App\CategoryProperty;
use App\ProductProperty;

class ProductsController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $this->middleware(CheckPermissions::class);
        $products = Products::all();
        return view('admin.products', ['products' => $products, 'title' => 'Products']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        return view('admin.productCreateForm', ['title' => 'Create product', 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryId = $request->input('category');
        $categoryProperties = CategoryProperty::whereCategory($categoryId)->get();

        $product = new Products([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description')
        ]);
        $product->save();

        foreach ($categoryProperties as $value) {
            if ($request->has($value->name)) {
                $productProperty = new ProductProperty([
                    'product_id' => $product->id,
                    'name' => $value->name,
                    'title' => $value->title,
                    'value' => $request->input($value->name)
                ]);
                $productProperty->save();
            }
        }
        if ($request->has('propertyName')) {
            for ($i = 0; $i < count($request->post('propertyName')); $i++) {
                $name = $request->post('propertyName')[$i];
                $title = $request->post('propertyTitle')[$i];
                $value = $request->post('propertyValue')[$i];

                $productProperty = new ProductProperty([
                    'product_id' => $product->id,
                    'name' => $name,
                    'title' => $title,
                    'value' => $value
                ]);
                $productProperty->save();
            }
        }
        return redirect(route('admin.products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product = Products::find($productId);
        return view('product.show', ['product' => $product, 'title' => $product->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
    public function addToFavorite($productId)
    {
        dd('favorite');
    }
    public function addToCompare($productId)
    {
        dd('compare');
    }
    public function delete($productId)
    {
        $product = Products::find($productId);
        $product->delete();
        return redirect(route('admin.products'));
    }
}
