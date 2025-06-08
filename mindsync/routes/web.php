<?php

use App\Http\Controllers\AdminController;
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
        // Sprawdź czy użytkownik to admin
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        }
        return redirect('/dashboard');
    }
    return view('home');
})->name('index');

// Trasy dla wszystkich użytkowników
Route::get('/info/dashboard', function () {
        return view('static.dashboardInfo');
})->name('dashboard');

Route::get('/info/journal', function () {
    return view('static.journalInfo');
})->name('journal');

Route::get('/info/exercises', function () {
    return view('static.exercisesInfo');
})->name('exccercises');

Route::get('/info/chat', function () {
    return view('static.chatInfo');
})->name('chat');

Route::get('/info/faq', function () {
    return view('static.faqInfo');
})->name('faq');

Route::get('/info/contact', function () {
    return view('static.contact');
})->name('contact');

Route::get('/info/policy', function () {
    return view('static.policy');
})->name('info.policy');

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
});

// Trasy dla administratorów
Route::middleware(['auth', 'admin'])->group(function () {
    // Główna trasa admin - przekierowanie do listy użytkowników
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Zarządzanie użytkownikami
    Route::get('/admin/users/list', [AdminController::class, 'showUsersList'])->name('admin.users.list');
    Route::get('/admin/users/addnew', [AdminController::class, 'showUsersForm'])->name('admin.users.addnew');
    Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'showUsersEditForm'])->name('admin.users.edit');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Zarządzanie ćwiczeniami
    Route::get('/admin/exercises/list', [AdminController::class, 'showExercisesList'])->name('admin.exercises.list');
    Route::get('/admin/exercises/addnew', [AdminController::class, 'showExercisesForm'])->name('admin.exercises.addnew');
    Route::post('/admin/exercises/store', [AdminController::class, 'storeExercise'])->name('admin.exercises.store');
    Route::get('/admin/exercises/edit/{id}', [AdminController::class, 'showExercisesEditForm'])->name('admin.exercises.edit');
    Route::put('/admin/exercises/update/{id}', [AdminController::class, 'updateExercise'])->name('admin.exercises.update');
    Route::delete('/admin/exercises/delete/{id}', [AdminController::class, 'deleteExercise'])->name('admin.exercises.delete');
});