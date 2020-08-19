<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function saveCreate(Request $request)
    {
        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'role' => $request->role,
            'avatar' => $request->avatar,
            'password' => $request->password
        ];

        dd($newUser);
    }
}
