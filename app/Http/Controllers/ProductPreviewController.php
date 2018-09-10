<?php

namespace App\Http\Controllers;

use App\ProductPreview;
use Illuminate\Http\Request;
use App\Products;
use App\Http\Middleware\CheckPermissions;

class ProductPreviewController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware(CheckPermissions::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $productPreview
     * @return \Illuminate\Http\Response
     */
    public function show($productPreview)
    {
        $product = Products::find($productPreview);
        return view('product.preview', ['product' => $product, 'title' => $product->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPreview  $productPreview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPreview $productPreview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPreview  $productPreview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPreview $productPreview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPreview  $productPreview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPreview $productPreview)
    {
        $productId = $request->productId;
        ProductPreview::find($productId)->delete();
        redirect(route('admin.products'));
    }
}
