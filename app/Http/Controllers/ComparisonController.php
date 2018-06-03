<?php

namespace App\Http\Controllers;

use App\Comparison;
use Illuminate\Http\Request;
use App\Products;

class ComparisonController extends Controller
{
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
    public function create($productId)
    {
        $user = auth()->user();
        $product = Products::find($productId);
        $existed = Comparison::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->get();
        if (!count($existed)) {
            $compare = new Comparison([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            $compare->saveOrFail();
        }
        return redirect()->back();
    }
    /**
     * Undocumented function
     *
     * @param [type] $productId
     * @return void
     */
    public function delete($productId)
    {
        $user = auth()->user();
        $compare = Comparison::where('user_id', $user->id)
            ->where('product_id', $productId)->first();
        $compare->delete();
        return redirect()->back();
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
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function edit(Comparison $comparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comparison $comparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comparison $comparison)
    {
        //
    }
}
