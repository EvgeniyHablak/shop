<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $title = 'Test';
        return view('main', ['categories' => $categories, 'title' => $title]);
    }
}
