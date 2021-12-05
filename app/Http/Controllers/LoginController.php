<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt($request->validate(['email'=> 'required|email',
            'password'=> 'required']))){
            return redirect('/')->with('success','Logged in!');
        }

        throw ValidationException::withMessages([
            'email' => "E-mail/Passwrod couldn't be verified."
        ]);

    }
}
