<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');
});
