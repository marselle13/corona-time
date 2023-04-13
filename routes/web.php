<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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

Route::view('/login', 'auth.login-page')->name('auth.login_page');
Route::view('/login/reset-password', 'auth.reset-password')->name('auth.reset_password');
Route::view('/login/recover-password', 'auth.recover-password')->name('auth.recover_password');
Route::view('/login/new-password', 'auth.new-password')->name('auth.new_password');
Route::view('/login/success-update', 'auth.success-update')->name('auth.success_update');
Route::view('/register', 'auth.register-page')->name('auth.register_page');
Route::view('register/success-registration', 'auth.success-registration')->name('auth.success_registration');
Route::view('register/confirmation-email', 'auth.confirmation-email')->name('auth.confirmation_email');
Route::view('/register/success-confirmation', 'auth.success-confirmation')->name('auth.success_confirmation');
