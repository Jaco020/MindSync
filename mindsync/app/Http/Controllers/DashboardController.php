<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('account/dashboard');
    }
    public function showEmotionsJournal()
    {
        return view('account/emotionsJournal');
    }
    public function showEmotionsRaport()
    {
        return view('account/emotionsReport');
    }
    public function showMindExercises()
    {
        return view('account/mindExercises');
    }
    public function showChatbot()
    {
        return view('account/chatbot');
    }
    public function showSettings()
    {
        return view('account/settings');
    }


}
