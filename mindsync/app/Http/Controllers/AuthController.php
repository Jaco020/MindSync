<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegistrationForm(){
        return view('auth.register');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function register(RegisterUserRequest $request) {

        #Tutaj niby jest błąd w IntelliSense, ale działa!
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'accepted_terms' => $request->accepted_terms,
        ]);

        Auth::login($user);

        return redirect('/dashboard'); 

    }

}
