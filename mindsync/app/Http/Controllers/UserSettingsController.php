<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function showUserSettings()
    {
        $user = Auth::user();
        return view('account.settings', compact('user'));
    }

    public function deleteUser() 
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('index')->with('status', 'Konto zostało usunięte.');
    }

    
}
