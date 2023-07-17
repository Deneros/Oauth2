<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register/{role?}', [RegisterController::class, 'index'])->name('register');
Route::post('/register/save', [RegisterController::class, 'register'])->name('register.save');
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);



Route::middleware(['auth'])->group(function () {
    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::post('/create-meeting', [MeetingController::class, 'store'])->name('meetings.store');
    Route::post('/meetings/{id}/mark-completed', [MeetingController::class, 'markCompleted'])->name('meetings.markCompleted');
    Route::post('/meetings/{meeting}/attach-document', [MeetingController::class, 'attachDocument'])->name('meetings.attachDocument');
    Route::get('meetings/{id}/download', [MeetingController::class, 'downloadDocument'])->name('meetings.downloadDocument');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');


    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');

    Route::get('/backstage', [UserController::class, 'index'])->name('backstage.user');
    Route::get('/users-edit/{user}', [UserController::class, 'editRole'])->name('users.edit_role');
    Route::put('/users-update/{user}', [UserController::class, 'update'])->name('users.update_role');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});
