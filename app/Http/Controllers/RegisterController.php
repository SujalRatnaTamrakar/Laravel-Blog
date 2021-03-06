<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $request->validate(
            ['name' => 'required|max:255',
                'username'=> 'required|max:255',
                'email'=> 'required|email|max:255',
                'password'=> 'required|confirmed']);

        User::create(
            [
                'name' => $request->name,
                'username' => $request->username,
                'email'=> $request->email,
                'password'=> Hash::make($request->password)
            ]
        );

        auth()->attempt($request->only('email','password'));
        session()->flash('success','Account created succesfully!');
        return redirect('/')->with('success','Registered successfully!');
    }
}
