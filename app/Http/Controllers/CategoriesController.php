<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use Illuminate\Support\Facades\DB;
use App\CategoryProperty;
use App\Http\Middleware\AdminPermission;
use App\Http\Middleware\CheckPermissions;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminPermission::class)->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);
        $this->middleware(CheckPermissions::class)->only([
            'adminCategories'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $title = 'Categories';
        return view('main', ['categories' => $categories, 'title' => $title]);

    }
    public function adminCategories()
    {
        $categories = Categories::all();
        $title = 'Admin Categories';
        return view('admin.categories', ['categories' => $categories, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryCreateForm', [
            'title' => 'Create category'
        ]);
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
            'title' => 'required',
            'name' => 'required',
            'propertyName.*' => 'required',
            'propertyTitle.*' => 'required'
        ]);
        $title = htmlspecialchars($request->post('title'));
        $name = htmlspecialchars($request->post('name'));
        $category = new Categories([
            'title' => $title,
            'name' => $name
        ]);
        $category->save();
        for ($i = 0; $i < count($request->post('propertyName')); $i++) {
            $propName = htmlspecialchars($request->post('propertyName')[$i]);
            $propTitle = htmlspecialchars($request->post('propertyTitle')[$i]);
            $categoryProp = new CategoryProperty([
                'name' => $propName,
                'title' => $propTitle,
                'category_id' => $category->id
            ]);
            $categoryProp->save();
        }
        return redirect(route('admin.categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $name)
    {
        $category = Categories::whereName($name)->firstOrFail();
        $products = Products::whereCategory($category->id)->where('deleted_at', null);
        if ($request->has('sort')) {
            if ($request->get('sort') === 'alpha') {
                $products = $products->orderBy('title', 'asc')->get();
            } elseif ($request->get('sort') === 'price') {
                $products = $products->orderBy('price', 'desc')->get();
            } elseif ($request->get('sort') === 'created_at') {
                $products = $products->orderBy('created_at', 'desc')->get();
            } elseif ($request->get('sort') === 'popularity') {
                $products = $products->byPopularity()->get();
            } else {
                dd('invalid sort');
            }
        } else {
            $products = $products->get();
        }
        return view('category.category', ['category' => $category, 'products' => $products, 'title' => $category->title]);
    }
    public function adminShow($categoryId)
    {
        $category = Categories::find($categoryId);
        return view('admin.categoryShow', ['category' => $category, 'title' => $category->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        $categoryProperties = CategoryProperty::whereCategory($id)->get();

        return view('admin.categoryEditForm', [
            'title' => 'Edit category',
            'category' => $category,
            'properties' => $categoryProperties
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'propertyName.*' => 'required',
            'propertyTitle.*' => 'required'
        ]);
        $category = Categories::find($categoryId);
        $category->title = htmlspecialchars($request->post('title'));
        $category->name = htmlspecialchars($request->post('name'));
        $category->save();

        $category->propertiesRemove();
        for ($i = 0; $i < count($request->post('propertyName')); $i++) {
            $propName = htmlspecialchars($request->post('propertyName')[$i]);
            $propTitle = htmlspecialchars($request->post('propertyTitle')[$i]);
            $categoryProp = new CategoryProperty([
                'name' => $propName,
                'title' => $propTitle,
                'category_id' => $category->id
            ]);
            $categoryProp->save();
        }
        return redirect(route('admin.categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
        $props = CategoryProperty::whereCategory($categoryId)->delete();
        Categories::find($categoryId)->delete();
        return redirect(route('admin.categories'));
    }
    public function getProperties()
    {
        $categoryId = htmlspecialchars(request()->post('categoryId'));
        $properties = CategoryProperty::whereCategory($categoryId)->get()->toArray();
        return response()->json($properties);
    }

}
