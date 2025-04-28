<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'accepted_terms' => $request->accepted_terms,
        ]);

        Auth::login($user);

        return redirect('/dashboard'); 

    }

    public function login(LoginRequest $request) {
        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            return redirect('/dashboard');
        }
    
        return back()->withErrors([
            'email' => 'Nieprawidłowy adres e-mail lub hasło.',
        ]);
    }
    
    public function logout(Request $request) {
        
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

}
