<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }
    public function login() {}
    public function registerPage(Request $request)
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $newUser = User::create(
            [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password')),
            ]
        );

        // return dd($newUser->password);
        // return dd($newUser->email);
        

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
