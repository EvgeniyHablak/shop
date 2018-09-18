<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Middleware\CheckPermissions;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(CheckPermissions::class)->except('dashboard');
    }
    public function dashboard()
    {
        $favoriteProducts = Products::join('favorites', 'favorites.product_id', '=', 'product.id')
            ->select('product.*')
            ->where('favorites.user_id', auth()->user()->id)
            ->get();
        return view('user.userPage')->with(['favoriteProducts' => $favoriteProducts, 'title' => 'My account']);
    }
    public function edit(Request $request, $userId)
    {
        $user = User::find($userId);
        return view('admin.userEditForm')->with(['title' => 'Edit user', 'user' => $user]);
    }
    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        if ($request->password !== null) {
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect(route('admin.users'));
    }
    public function show(Request $request, $userId)
    {
        $user = User::find($userId);
        $favorites = $user->getFavoriteProducts();
        return view('admin.usersFavorites', ['favorites' => $favorites, 'title' => 'Favorites', 'user' => $user]);
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users, 'title' => 'Users']);
    }
}
