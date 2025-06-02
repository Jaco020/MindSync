<?php

namespace App\Http\Controllers;

use App\Models\JournalEntry;
use Illuminate\Support\Facades\Auth;
use App\Policies\JournalEntryPolicy;

class EmotionsJournalController extends Controller
{
    public function showEmotionsJournal()
    {
        $user = Auth::user();
        $journalEntries = JournalEntry::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('account/emotionsJournal', [
            'journalEntries' => $journalEntries
        ]);
    }

    public function showEmotionsJournalForm()
    {
        return view('account/emotionsJournalForm');
    }

    public function showEmotionsJournalEdit($id)
    {
        $journalEntry = JournalEntry::findOrFail($id);

        if ($journalEntry->user_id !== Auth::id()) {
            abort(403, 'Nie masz uprawnień do edycji tego wpisu.');
        }

        return view('account/emotionsJournalForm', [
            'journalEntry' => $journalEntry
        ]);
    }

    public function deleteEmotionJournalEntry($id) {
        
        $journalEntry = JournalEntry::findOrFail($id);

        if ($journalEntry->user_id !== Auth::id()) {
            abort(403, 'Nie masz uprawnień do usunięcia tego wpisu.');
        }
        
        $journalEntry->delete();

        return redirect()->route('emotions.journal')->with('success', 'Wpis został usunięty.');
    }
}
