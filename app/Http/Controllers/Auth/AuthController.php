<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login/login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest
     * $request
     */
    public function login(LoginFormRequest $request) {
        $credentials = $request -> only('email', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('records')->with('login_success', 'ログイン成功しました！
            ');
        }

        return back()->withErrors([
            'login_error' => 'ログインまたはパスワードが間違っています。
            ',
        ]);
    }
}
