<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmotionsJournalController;
use App\Http\Controllers\MindfulnessController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('home');
})->name('index');

// Trasy dla użytkowników niezalogowanych
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Trasy dla użytkowników zalogowanych
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/emotions/journal', [EmotionsJournalController::class, 'showEmotionsJournal'])->name('emotions.journal');
    Route::get('/emotions/journal/addnew', [EmotionsJournalController::class, 'showEmotionsJournalFormAdd'])->name('emotions.journal.form.add');
    Route::get('/emotions/journal/edit/{id}', [EmotionsJournalController::class, 'showEmotionsJournalFormEdit'])->name('emotions.journal.form.edit');
    Route::post('/emotions/journal/delete/{id}', [EmotionsJournalController::class, 'deleteEmotionJournalEntry'])->name('emotions.journal.delete');
    Route::post('/emotions/journal/add', [EmotionsJournalController::class, 'addEmotionJournalEntry'])->name('emotions.journal.add');
    Route::post('/emotions/journal/edit/{id}', [EmotionsJournalController::class, 'updateEmotionJournalEntry'])->name('emotions.journal.update');

    Route::get('/mindfulness/exercises', [MindfulnessController::class, 'showExercises'])->name('mindfulness.exercises');
    Route::get('/mindfulness/journal', [MindfulnessController::class, 'showJournal'])->name('mindfulness.journal');
    Route::get('mindfulness/details/{id}', [MindfulnessController::class, 'showExerciseDetails'])->name('mindfulness.exercise.details');
    Route::post('/mindfulness/details/{id}/addToJournal', [MindfulnessController::class, 'addToJournal'])->name('mindfulness.journal.addnew');

    Route::get('/chatbot', [ChatbotController::class, 'showChatbot'])->name('chatbot.show');
    Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage'])->name('chatbot.sendMessage');
    
    Route::get('/userSettings', [UserSettingsController::class, 'showUserSettings'])->name('user.settings');
    Route::post('/userSettings/deleteUser', [UserSettingsController::class, 'deleteUser'])->name('user.delete');
    Route::post('/userSettings/updatePassword', [UserSettingsController::class, 'updatePassword'])->name('user.updatePassword');
    Route::post('/userSettings/updateUserDetails', [UserSettingsController::class, 'updateUserDetails'])->name('user.updateUserDetails');



    Route::get('/users/list', function () {
        return view('admin/usersList');
    })->name('admin.users.list');
    Route::get('/users/addnew', function () {
        return view('admin/usersForm');
    })->name('admin.users.addnew');

    Route::get('/emotions/list', function () {
        return view('admin/emotionsList');
    })->name('admin.emotions.list');
    Route::get('/emotions/addnew', function () {
        return view('admin/emotionsForm');
    })->name('admin.emotions.addnew');

    Route::get('/exercises/list', function () {
        return view('admin/exercisesList');
    })->name('admin.exercises.list');
    Route::get('/exercises/addnew', function () {
        return view('admin/exercisesForm');
    })->name('admin.exercises.addnew');

});
