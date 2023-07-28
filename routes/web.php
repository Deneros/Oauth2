<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\CandidateController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register/{role?}', [RegisterController::class, 'index'])->name('register');
Route::post('/register/save', [RegisterController::class, 'register'])->name('register.save');
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);



Route::middleware(['auth'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
    Route::get('/reports/generate-excel', [ReportController::class,'generateExcel'])->name('reports.generate-excel');


    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/personalization/home', [HomeController::class, 'showPersonalizationForm'])->name('personalization.home');
    Route::post('/personalization/home', [HomeController::class, 'updatePersonalization'])->name('personalization.home.update');

    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::post('/create-meeting', [MeetingController::class, 'store'])->name('meetings.store');
    Route::post('/meetings/{meeting}/mark-completed', [MeetingController::class, 'markCompleted'])->name('meetings.markCompleted');
    Route::post('/meetings/{meeting}/attach-document', [MeetingController::class, 'attachDocument'])->name('meetings.attachDocument');
    Route::get('meetings/{id}/download', [MeetingController::class, 'downloadDocument'])->name('meetings.downloadDocument');
    Route::get('/meetings/{meeting}/edit', [MeetingController::class, 'edit'])->name('meetings.edit');
    Route::put('/meetings/{meeting}', [MeetingController::class, 'update'])->name('meetings.update');

    Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');


    Route::get('/leaders', [LeaderController::class, 'index'])->name('leaders.index');
    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');

    Route::get('/backstage', [UserController::class, 'index'])->name('backstage.user');
    Route::get('/users-edit/{user}', [UserController::class, 'editRole'])->name('users.edit_role');
    Route::put('/users-update/{user}', [UserController::class, 'update'])->name('users.update_role');

    Route::post('/register/save-candidate', [CandidateController::class, 'store'])->name('register_candidate');
    Route::post('/register/save-leader', [LeaderController::class, 'store'])->name('register_leader');

    Route::delete('/leader/{leader}/candidate/{candidate}', [LeaderController::class, 'removeCandidate'])->name('leader.remove_candidate');
    Route::get('/leaders/references', [LeaderController::class, 'showLeadersCandidates'])->name('backstage.references');
    Route::post('/leaders/references/save', [LeaderController::class, 'saveLeadersCandidates'])->name('backstage.references.save');
});
