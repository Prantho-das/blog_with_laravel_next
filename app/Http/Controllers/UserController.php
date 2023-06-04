<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('email','!=','admin@gmail.com')->paginate(15);

        return view('users.index', compact('users'));
    }
}
