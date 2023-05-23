<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $redirectTo = '/post';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function auth(LoginRequest $request)
    {

        if (Auth::attempt($request->validated(), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectTo);
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended($this->redirectTo);
    }
}
