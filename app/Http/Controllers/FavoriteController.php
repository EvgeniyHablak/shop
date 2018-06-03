<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Favorites;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // showing favorites of user
        // $favorities = Favorites::whereUser()->all();

        // return view('favorities', ['favorities']);
        dd('index');
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
        $existed = Favorites::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->get();
        if (!count($existed)) {
            $favorite = new Favorites([
                'product_id' => $productId,
                'user_id' => $user->id
            ]);
            $favorite->saveOrFail();
        }
        return redirect()->back();
    }

    public function delete($productId)
    {
        $user = auth()->user();
        $favorite = Favorites::where('user_id', $user->id)
            ->where('product_id', $productId)->first();
        $favorite->delete();
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
        //  adding product to favorite 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
