<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $dataUser = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // check role
        $user = User::where('email', $request->email)->get();

        if (Auth::attempt($dataUser) && $user->role == 2) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
