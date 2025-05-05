<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function showDashboard()
    {
        $user = auth()->user();
        $journalEntriesCount = $user->journalEntries()->count();
        $avgMood = $user->journalEntries()->avg('mood_rating');
        $moodPercentage = $avgMood*10;

        if ($avgMood !== null) {
            $avgMood = round($avgMood, 2);
        } else {
            $avgMood = "Brak danych";
        }

    
        return view('account/dashboard', [
            'streak' => "Brak danych",
            'journalEntriesCount' => $journalEntriesCount,
            'avgMood' => $moodPercentage."%",
        ]);
    }

    public function showEmotionsJournal()
    {
        return view('account/emotionsJournal', [
            'journalEntries' => auth()->user()->journalEntries()->orderBy('created_at', 'desc')->get()
            ],
        );
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
