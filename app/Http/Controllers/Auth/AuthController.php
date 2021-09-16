<?php

// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login/login_form');
    }

    public function login() {
        return view('login/login_form');
    }
}
