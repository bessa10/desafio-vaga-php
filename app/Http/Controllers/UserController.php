<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10); // 10 por página

        return view('users.index', compact('users'));
    }
}