<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\UpdateUserDetailsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function updatePassword(PasswordChangeRequest $request)
    {

        $user = Auth::user();
    
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Hasło zostało zmienione!');

    }

    public function updateUserDetails(UpdateUserDetailsRequest $request)
    {
        $user = Auth::user();
        
        $user->update($request->validated());

        return redirect()->back()->with('success', 'Dane zostały zaktualizowane!');
    }
}
