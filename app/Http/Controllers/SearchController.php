<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\SearchFields;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $string = $request->name;
        $products = SearchFields::findProducts($string);
        return json_encode($products);
    }
}
