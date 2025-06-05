<?php

namespace App\Http\Controllers;

use App\Http\Requests\MindfulnessFormRequest;
use Illuminate\Http\Request;
use App\Models\MindfulnessExercise;
use App\Models\UserProgress;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class MindfulnessController extends Controller
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

    public function showJournal(Request $request){

        $user = Auth::user();
        $userProgress = UserProgress::with('exercise')
            ->where('user_id', $user->id);

        if ($request->filled('date')) {
            $userProgress->where('completed_date', $request->input('date'));
        }

        $userProgress = $userProgress->orderBy('completed_date', 'desc')->get();

        return view('account.mindfullnessJournal', [
            'mindfulnessJournalEntries' => $userProgress,
        ]);
    }

    public function showExerciseDetails($id){
        
        $exercise = MindfulnessExercise::findOrFail($id);
        
        return view('account.mindfullnessForm', [
            'exercise' => $exercise,
        ]);
    }

    public function addToJournal(MindfulnessFormRequest $request, $id){
        
        try {
            $exercise = MindfulnessExercise::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('mindfulness.exercises')->with('error', 'Ćwiczenie nie istnieje!');
        }
        
        $user = Auth::user();
        $data = $request->validated();

        $userProgress = new UserProgress([
            'user_id'      => $user->id,
            'exercise_id'  => $exercise->id,
            'completed_date' => $data['exerciseDate'],
            'rating'         => $data['moodSelect'],
            'notes'          => $data['notes']
        ]);

        $userProgress->save();

        return redirect()->route('mindfulness.journal')->with('success', 'Ćwiczenie zostało wykonane!');
    }



}
