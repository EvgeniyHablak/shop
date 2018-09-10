<?php

namespace App\Http\Controllers;

use App\Comparison;
use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\CategoryProperty;
use App\Categories;
use App\ProductProperty;
use Illuminate\Support\Facades\DB;


class ComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category comparison';
        if (Auth::guest()) {
            if (Cookie::has('comparison')) {
                $cookie = Cookie::get('comparison');
                $productsId = unserialize($cookie);
                $categories = Categories::getByProductsId($productsId);
            } else {
                $categories = [];
            }
        } else {
            $products = Auth::user()->getProductsInComparison();
            $productsId = [];
            foreach ($products as $product) {
                $productsId[] = $product->id;
            }
            $categories = Categories::getByProductsId($productsId);
        }
        return view('comparison.category', ['comparisonCategories' => $categories, 'title' => $title]);

    }
    public function category($categoryName)
    {
        $title = 'Comparison';
        $category = Categories::whereName($categoryName)->first();
        $categoryProperties = [];
        if (Auth::guest()) {
            if (Cookie::has('comparison')) {
                $cookie = Cookie::get('comparison');
                $productsId = unserialize($cookie);
                $products = Products::whereIn('id', $productsId)->where('category_id', $category->id)->get();
                $categoryProperties = CategoryProperty::where('category_id', $products[0]->category_id)->get();
            }
        } else {
            $products = Products::join('comparison', 'product.id', '=', 'comparison.product_id')
                ->select('product.*')
                ->where('comparison.user_id', '=', Auth::user()->id)
                ->where('category_id', '=', $category->id)
                ->get();
            $categoryProperties = CategoryProperty::where('category_id', $products[0]->category_id)->get();
        }
        return view('comparison.comparisonTable', ['products' => $products, 'title' => $title, 'categoryProperties' => $categoryProperties, 'category' => $category]);

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
            $inComparing = count(unserialize(Cookie::get('comparison')));
            if ($inComparing >= 5) {
                return redirect()->back()->with(['alertMessage' => 'Too much products in comparing']);
            }
            if (Cookie::has('comparison')) {
                $cookie = Cookie::get('comparison');
                $productsId = unserialize($cookie);
                array_push($productsId, $productId);
            } else {
                $productsId = [$productId];
            }
            $cookie = cookie('comparison', serialize($productsId), 6000);
            return redirect()->back()->withCookie($cookie);
        } else {
            $user = auth()->user();
            $inComparing = Comparison::whereUser($user->id)->count();
            if ($inComparing >= 5) {
                return redirect()->back()->with(['alertMessage' => 'Too much products in comparing']);
            }
            $exists = Comparison::whereUser($user->id)
                ->where('product_id', $productId)
                ->exists();
            if (!$exists) {
                $compare = new Comparison([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ]);
                $compare->saveOrFail();
            }
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
        if (Auth::guest()) {
            $cookie = Cookie::get('comparison');
            $cookieArray = unserialize($cookie);
            $key = array_search($productId, $cookieArray);
            if ($key !== false) {
                unset($cookieArray[$key]);
            }
            $cookie = cookie('comparison', serialize($cookieArray), 6000);
            return redirect()->back()->withCookie($cookie);
        } else {
            $user = auth()->user();
            $compare = Comparison::where('user_id', $user->id)
                ->where('product_id', $productId)->first();
            $compare->delete();
            return redirect()->back();
        }
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
