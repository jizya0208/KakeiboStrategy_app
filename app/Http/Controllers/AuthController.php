<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login/login_form');
    }

    public function login() {
        return view('login/login_form');
    }
}
