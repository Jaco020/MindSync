<?php

namespace App\Http\Controllers;

use App\Models\MindfulnessExercise;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function showDashboard()
    {
        $user = Auth::user();
        $journalEntriesCount = $user->journalEntries()->count();
        $avgMood = round($user->journalEntries()->avg('mood_rating'), 1);
        $recommendedExercise = MindfulnessExercise::inRandomOrder()->first();
        $lastEmotionEntry = $user->journalEntries()
            ->orderBy('date', 'desc')
            ->first();

        if ($avgMood !== null) {
            $avgMood = round($avgMood, 2);
        } else {
            $avgMood = "Brak danych";
        }

        if ($lastEmotionEntry)
        {
        $lastEmotionEntry->formatted_date = Carbon::parse($lastEmotionEntry->date)->format('d.m.Y');
        }

        $moodDataGrouped = $user->journalEntries()
            ->where('date', '>=', now()->subDays(30)->toDateString())
            ->selectRaw('date, AVG(mood_rating) as avg_mood')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->map(function ($entry) {
                return [
                    'date' => $entry->date,
                    'mood' => round($entry->avg_mood, 1)
                ];
            });

    
        return view('account/dashboard', [
            'streak' => "Brak danych",
            'journalEntriesCount' => $journalEntriesCount,
            'avgMood' => $avgMood,
            'moodData' => $moodDataGrouped,
            'recommendedExercise' => $recommendedExercise,
            'lastEmotionEntry' => $lastEmotionEntry,
        ]);
    }

    public function showEmotionsJournal()
    {
        return view('account/emotionsJournal', [
            'journalEntries' => Auth::user()->journalEntries()->orderBy('created_at', 'desc')->get()
            ],
        );
    }
    public function showEmotionsJournalAddNew()
    {
        return view('account/emotionsJournalForm');
    }
    // Templatka - edytowanie wpisu - do poprawy
    public function showEmotionsJournalEdit($id)
    {
        $entry = Auth::user()->journalEntries()->findOrFail($id);
        return view('account/emotionsJournalForm', [
            'entry' => $entry
        ]);
    }
    public function showEmotionsRaport()
    {
        return view('account/emotionsReport');
    }

    public function showSettings()
    {
        return view('account/settings');
    }


}
