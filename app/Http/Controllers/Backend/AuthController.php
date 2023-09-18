<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function index() {
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request){

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();

//            return redirect()->intended('dashboard');
            return redirect()->route('dashboard.index')->with('success', 'Logged in successfully');
        }

        return redirect()->route('auth.admin')->with('error', 'Email or password is incorrect.');
    }

    public function register() {
        return view('backend.auth.register');
    }
}
