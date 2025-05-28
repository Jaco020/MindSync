<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MindfulnessExercise;

class MindfullnessController extends Controller
{
    
   public function showExercises(Request $request){
        
        $exercises = MindfulnessExercise::query();

        if ($request->filled('difficulty')) {
            $exercises->where('difficulty', $request->input('difficulty'));
        }

        if ($request->filled('duration')) {
            $duration = (int)$request->input('duration');
            if ($duration < 10) {
                $exercises->where('duration_minutes', '<=', $duration);
            } else {
                $exercises->where('duration_minutes', '>=', $duration);
            }
        }

        $exercises = $exercises->get();

        return view('account.mindfullnessList', [
            'exercises' => $exercises,
        ]);
    }

    public function showJournal(){
        return view('account.mindfullnessJournal');
    }



}
