<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/language', [LanguageController::class, 'setLanguage'])->name('language.set');

Route::view('/login', 'auth.login-page')->name('auth.login_page')->middleware('guest');
Route::view('/login/reset-password', 'auth.reset-password')->name('auth.reset_password');
Route::view('/login/recover-password', 'auth.recover-password')->name('auth.recover_password');
Route::view('/login/new-password', 'auth.new-password')->name('auth.new_password');
Route::view('/login/success-update', 'auth.success-update')->name('auth.success_update');
Route::view('/', 'landing')->middleware(['auth', 'verified']);
Route::view('register', 'auth.register-page')->name('auth.register_page')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::view('register/success-registration/', 'auth.success-registration')->middleware('auth')->name('auth.success_registration');
Route::get('register/confirmation-email/{id}/{hash}', [AuthController::class, 'confirmation'])->middleware(['auth', 'signed'])->name('verification.verify');
