<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckPermissions;
use App\Categories;
use App\CategoryProperty;
use App\ProductProperty;
use App\SearchFields;

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
        foreach ($request->inSearch as $name => $value) {
            $searchFields = new SearchFields();
            $searchFields->product_id = $product->id;
            $searchFields->field = $name;
            if ($request->$name !== null) {
                $value = $request->$name;
            } else {
                $value = ProductProperty::first()->where('name', $name)->where('product_id', $product->id)->first()->value;
            }
            $searchFields->value = $value;
            $searchFields->save();
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
    public function edit(string $productId)
    {
        $product = Products::find($productId);
        return view('admin.productEditForm', ['product' => $product, 'title' => $product->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $product = Products::find($productId);
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = $request->post('description');
        $product->title = $request->post('title');
        $product->save();

        if ($request->has('existedProperties')) {
            foreach ($request->post('existedProperties') as $name => $value) {
                // dd($request->post('existedProperties'));
                $property = ProductProperty::where('name', $name)->where('product_id', $product->id)->first();
                $property->value = $value;
                $property->save();
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

        if ($request->has('inSearch')) {
            $fields = SearchFields::where('product_id', $product->id)->delete();
            foreach ($request->inSearch as $name => $value) {
                $searchFields = new SearchFields();
                $searchFields->product_id = $product->id;
                $searchFields->field = $name;
                if ($request->$name !== null) {
                    $value = $request->$name;
                } else {
                    $value = ProductProperty::first()->where('name', $name)->where('product_id', $product->id)->first()->value;
                }
                $searchFields->value = $value;
                $searchFields->save();
            }
        }
        return redirect(route('admin.products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $product = Products::find($productId);
        $product->deleted_at = date('Y-m-d H:i:s');
        $product->save();
        return redirect(route('admin.products'));
    }
}
