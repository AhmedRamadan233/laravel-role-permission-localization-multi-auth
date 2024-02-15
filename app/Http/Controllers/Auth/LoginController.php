<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');

    }


    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $loginType = filter_var($validated['email_or_phone'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginType => $validated['email_or_phone'],
            'password' => $validated['password'],
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', true);
        }

        return back()->withInput()->withErrors(['email_or_phone' => 'Invalid credentials']);
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}