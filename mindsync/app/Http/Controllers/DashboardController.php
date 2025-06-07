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
        $avgMoodRaw = $user->journalEntries()->avg('mood_rating');
        $recommendedExercise = MindfulnessExercise::inRandomOrder()->first();
        $lastEmotionEntry = $user->journalEntries()
            ->orderBy('date', 'desc')
            ->first();

        if ($avgMoodRaw !== null) {
            $avgMood = round($avgMoodRaw, 1);
            $avgMoodIndex = (int) round($avgMoodRaw);
        } else {
            $avgMood = "Brak danych";
            $avgMoodIndex = null;
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
            'journalEntriesCount' => $journalEntriesCount,
            'avgMood' => $avgMood,
            'avgMoodIndex' => $avgMoodIndex,
            'moodData' => $moodDataGrouped,
            'recommendedExercise' => $recommendedExercise,
            'lastEmotionEntry' => $lastEmotionEntry,
        ]);
    }
}
