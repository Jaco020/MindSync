<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmotionsJournalFormRequest;
use App\Models\JournalEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmotionsJournalController extends Controller
{
    public function showEmotionsJournal()
    {
        $user = Auth::user();
        $emotionsJournalEntries = JournalEntry::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('account/emotionsJournal', [
            'emotionsJournalEntries' => $emotionsJournalEntries
        ]);
    }

    public function showEmotionsJournalFormAdd()
    {
        return view('account/emotionsJournalForm');
    }

    public function showEmotionsJournalFormEdit($id)
    {
        $emotionsJournalEntry = JournalEntry::findOrFail($id);

        if ($emotionsJournalEntry->user_id !== Auth::id()) {
            abort(403, 'Nie masz uprawnień do edycji tego wpisu.');
        }

        return view('account/emotionsJournalForm', compact('emotionsJournalEntry'));
    }

    public function deleteEmotionJournalEntry($id) {
        
        $emotionsJournalEntry = JournalEntry::findOrFail($id);

        if ($emotionsJournalEntry->user_id !== Auth::id()) {
            abort(403, 'Nie masz uprawnień do usunięcia tego wpisu.');
        }
        
        $emotionsJournalEntry->delete();

        return redirect()->route('emotions.journal')->with('success', 'Wpis został usunięty.');
    }

    
    public function addEmotionJournalEntry(EmotionsJournalFormRequest $request)
    {   
        JournalEntry::create([
            'user_id' => Auth::id(),
            'content' => $request->input('journalText'),
            'date' => $request->input('dateIn'),
            'mood_rating' => $request->input('moodIn'),
            'mood_type' => null,
        ]);

        return redirect()->route('emotions.journal')->with('success', 'Wpis został dodany.');
    }

    public function updateEmotionJournalEntry(EmotionsJournalFormRequest $request, $id)
    {
        $emotionsJournalEntry = JournalEntry::findOrFail($id);
    
        if ($emotionsJournalEntry->user_id !== Auth::id()) {
            abort(403);
        }
    
        $emotionsJournalEntry->update([
            'content' => $request->input('journalText'),
            'date' => $request->input('dateIn'),
            'mood_rating' => $request->input('moodIn'),
            'mood_type' => null,
        ]);
    
        return redirect()->route('emotions.journal')->with('success', 'Wpis został zaktualizowany.');
    }
    
}
