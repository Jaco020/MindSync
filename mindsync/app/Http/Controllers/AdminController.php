<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MindfulnessExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.users.list');
    }
    
    // ====================== Zarządzanie użytkownikami ======================
    
    public function showUsersList()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.usersList', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'role' => 'required|in:user,admin',
            'bio' => 'nullable|string|max:1000',
            'notifications_enabled' => 'boolean',
            'accepted_terms' => 'required|boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['notifications_enabled'] = $request->has('notifications_enabled');
        $validated['accepted_terms'] = $request->has('accepted_terms');

        User::create($validated);

        return redirect()->route('admin.users.list')->with('success', 'Użytkownik został pomyślnie dodany.');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'role' => 'required|in:user,admin',
            'bio' => 'nullable|string|max:1000',
            'notifications_enabled' => 'boolean',
            'accepted_terms' => 'boolean',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $validated['notifications_enabled'] = $request->has('notifications_enabled');
        $validated['accepted_terms'] = $request->has('accepted_terms');

        $user->update($validated);

        return redirect()->route('admin.users.list')->with('success', 'Użytkownik został pomyślnie zaktualizowany.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.list')->with('error', 'Nie możesz usunąć własnego konta.');
        }

        $user->delete();

        return redirect()->route('admin.users.list')->with('success', 'Użytkownik został pomyślnie usunięty.');
    }

    public function showUsersForm()
    {
        return view('admin.usersForm');
    }

    public function showUsersEditForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usersForm', compact('user'));
    }


    // ====================== Zarządzanie ćwiczeniami mindfulness ======================

    public function showExercisesList()
    {
        $exercises = MindfulnessExercise::orderBy('created_at', 'desc')->get();
        return view('admin.exercisesList', compact('exercises'));
    }

    public function showExercisesForm()
    {
        return view('admin.exercisesForm');
    }

    public function showExercisesEditForm($id)
    {
        $exercise = MindfulnessExercise::findOrFail($id);
        return view('admin.exercisesForm', compact('exercise'));
    }

    public function storeExercise(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'instructions' => 'required|string',
            'duration_minutes' => 'required|integer|min:1|max:120',
            'difficulty' => 'required|in:Łatwy,Średni,Trudny',
        ]);

        MindfulnessExercise::create($validated);

        return redirect()->route('admin.exercises.list')->with('success', 'Ćwiczenie zostało pomyślnie dodane.');
    }

    public function updateExercise(Request $request, $id)
    {
        $exercise = MindfulnessExercise::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'instructions' => 'required|string',
            'duration_minutes' => 'required|integer|min:1|max:120',
            'difficulty' => 'required|in:Łatwy,Średni,Trudny',
        ]);

        $exercise->update($validated);

        return redirect()->route('admin.exercises.list')->with('success', 'Ćwiczenie zostało pomyślnie zaktualizowane.');
    }

    public function deleteExercise($id)
    {
        $exercise = MindfulnessExercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('admin.exercises.list')->with('success', 'Ćwiczenie zostało pomyślnie usunięte.');
    }
}