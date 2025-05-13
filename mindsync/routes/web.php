<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('home');
});

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

    Route::get('/emotions/journal', [DashboardController::class, 'showEmotionsJournal'])->name('emotions.journal');
    Route::get('/emotions/journal/addnew', [DashboardController::class, 'showEmotionsJournalAddNew'])->name('emotions.journal.addnew');
    Route::get('/emotions/journal/edit/{id}', [DashboardController::class, 'showEmotionsJournalEdit'])->name('emotions.journal.edit');
    
    Route::get('/emotions/report', [DashboardController::class, 'showEmotionsRaport'])->name('emotions.report');

    Route::get('/mindExercises', [DashboardController::class, 'showMindExercises'])->name('mindExercises');
    Route::get('/mindExercises/list', function () {
        return view('account/mindExercisesList');
    })->name('mindExercises.list');
    
    Route::get('/chatbot', [DashboardController::class, 'showChatbot'])->name('chatbot');
    Route::get('/settings', [DashboardController::class, 'showSettings'])->name('settings');

});
