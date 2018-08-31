<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Favorites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\User;
use App\Http\Middleware\CheckPermissions;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Favorites';
        if (Auth::guest()) {
            if (Cookie::has('favorite')) {
                $cookie = Cookie::get('favorite');
                $productsId = unserialize($cookie);
                $favoritesProducts = Products::findByIds($productsId);
            } else {
                $favoritesProducts = [];
            }
        } else {
            if (Cookie::has('favorite')) {
                $cookie = Cookie::get('favorite');
                $productsId = unserialize($cookie);
                $favoritesProducts = Products::findByIds($productsId);
                foreach ($favoritesProducts as $product) {
                    $favorite = new Favorites([
                        'product_id' => $product->id,
                        'user_id' => auth()->user()->id
                    ]);
                    $favorite->saveOrFail();
                }
                Cookie::forget('favorite');
                setcookie('favorite', '', 0);
            }
            $favoritesProducts = auth()->user()->getFavoriteProducts();
        }

        return view('favorite.favorites', ['favorites' => $favoritesProducts, 'title' => $title]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $product = Products::find($productId);
        if (Auth::guest()) {
            if (Cookie::has('favorite')) {
                $cookie = Cookie::get('favorite');
                $productsId = unserialize($cookie);
                array_push($productsId, $productId);
            } else {
                $productsId = [$productId];
            }
            $cookie = cookie('favorite', serialize($productsId), 6000);
            return redirect()->back()->withCookie($cookie);
        } else {
            $user = auth()->user();
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
        }
        return redirect()->back();
    }

    public function delete($productId)
    {
        if (Auth::guest()) {
            $cookie = Cookie::get('favorite');
            $cookieArray = unserialize($cookie);
            $key = array_search($productId, $cookieArray);
            if ($key !== false) {
                unset($cookieArray[$key]);
            }
            $cookie = cookie('favorite', serialize($cookieArray), 6000);
            return redirect()->back()->withCookie($cookie);
        } else {
            $user = auth()->user();
            $favorite = Favorites::where('user_id', $user->id)
                ->where('product_id', $productId)->first();
            $favorite->delete();
            return redirect()->back();
        }
    }
    public function adminDestroy(Request $request, $userId, $productId)
    {
        $this->middleware(CheckPermissions::class);
        $user = User::find($userId);
        $favorite = Favorites::where('user_id', $user->id)
            ->where('product_id', $productId)->delete();
        return redirect(route('users.show', ['user' => $user->id]));
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
