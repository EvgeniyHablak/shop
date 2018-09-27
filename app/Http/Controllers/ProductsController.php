<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckPermissions;
use App\Categories;
use App\CategoryProperty;
use App\ProductProperty;
use App\SearchFields;
use App\ProductPreview;
use Illuminate\Filesystem\Filesystem;
use App\Media;
use App\ProductMedia;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissions::class)->except('show');
    }
    /**
     * Show all products to admin
     *
     * @return void
     */
    public function index()
    {
        $products = Products::active()->get();
        $deletedProducts = Products::whereDeleted()->get();
        return view('admin.products', ['products' => $products, 'title' => 'Products', 'deletedProducts' => $deletedProducts]);
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
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'properties.*.name' => 'required',
            'properties.*.title' => 'required',
            'properties.*.value' => 'required'
        ]);
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
        foreach ($request->input('properties') as $propertyParam) {
            $productProperty = new ProductProperty([
                'product_id' => $product->id,
                'name' => $propertyParam['name'],
                'title' => $propertyParam['title'],
                'value' => $propertyParam['value']
            ]);
            $productProperty->save();
        }
        foreach ($request->inSearch as $name) {
            $searchFields = new SearchFields();
            $searchFields->product_id = $product->id;
            $searchFields->field = $name;
            if ($request->$name !== null) {
                $value = $request->$name;
            } else {
                $value = ProductProperty::where('name', $name)->where('product_id', $product->id)->first()->value;
            }
            $searchFields->value = $value;
            $searchFields->save();
        }
        return response()->json([
            'success' => true,
            'redirectUrl' => route('admin.products')
        ]);
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
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'properties.*.name' => 'required',
            'properties.*.value' => 'required'
        ]);
        $product = Products::find($productId);
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = $request->post('description');
        $product->title = $request->post('title');
        $product->save();

        foreach ($request->input('properties') as $propertyParam) {
            $property = ProductProperty::where('name', $propertyParam['name'])->where('product_id', $product->id);
            if ($property->exists()) {
                $property = $property->first();
                $property->value = $propertyParam['value'];
                $property->save();
            } else {
                $productProperty = new ProductProperty([
                    'product_id' => $product->id,
                    'name' => $propertyParam['name'],
                    'title' => $propertyParam['title'],
                    'value' => $propertyParam['value']
                ]);
                $productProperty->save();
            }
        }
        if ($request->has('inSearch')) {
            $fields = SearchFields::where('product_id', $product->id)->delete();
            foreach ($request->inSearch as $name) {
                $searchFields = new SearchFields();
                $searchFields->product_id = $product->id;
                $searchFields->field = $name;
                if ($request->$name !== null) {
                    $value = $request->$name;
                } else {
                    $value = ProductProperty::where('name', $name)->where('product_id', $product->id)->first()->value;
                }
                $searchFields->value = $value;
                $searchFields->save();
            }
        }
        return response()->json([
            'success' => true,
            'redirectUrl' => route('admin.products')
        ]);
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
    /**
     * Complete destroying product
     *
     * @param int $productId
     * @return void
     */
    public function destroyComplete($productId)
    {
        $product = Products::find($productId);
        $product->delete();
        return redirect(route('admin.products'));
    }
    /**
     * Set param `deleted_at` to null. Activate product
     *
     * @param [type] $productId
     * @return void
     */
    public function activate($productId)
    {
        $product = Products::find($productId);
        $product->deleted_at = null;
        $product->save();
        return redirect(route('admin.products'));
    }
    public function uploadImage(Request $request, $productId)
    {
        $uploadImage = $request->productImage;
        $fullPath = '/img' . '/' . $uploadImage->getClientOriginalName();
        $uploadImage->move('img', $uploadImage->getClientOriginalName());

        $media = new Media([
            'path' => $fullPath,
        ]);
        $media->save();
        $productMedia = new ProductMedia([
            'product_id' => $productId,
            'media_id' => $media->id,
            'type' => 'simple'
        ]);
        $productMedia->save();

        return response()->json([
            'success' => true,
            'url' => $fullPath,
            'deleteUrl' => route('media.delete', ['mediaId' => $media->id]),
            'setMainUrl' => route('media.setMain', ['mediaId' => $media->id])
        ]);
    }
}
