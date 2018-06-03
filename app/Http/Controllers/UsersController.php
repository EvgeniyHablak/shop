<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Middleware\CheckPermissions;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermissions::class);
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users, 'title' => 'Users']);
    }
}
