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
| routes are loaded by the RouteServiceProvider and a of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/language', [LanguageController::class, 'setLanguage'])->name('language.set');

Route::view('/login', 'auth.login-page')->name('auth.login_page');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::view('/login/reset-password', 'auth.reset-password')->name('auth.reset_page');
Route::post('/login/reset-password', [AuthController::class, 'reset'])->name('auth.reset_password');
Route::view('/login/success-recover', 'auth.success-recover')->name('auth.success_recover');

Route::view('/login/recover-password', 'auth.recover-password')->name('auth.recover_password');
Route::view('/login/new-password', 'auth.new-password')->name('auth.new_password');
Route::view('/login/success-update', 'auth.success-update')->name('auth.success_update');
Route::view('/', 'landing')->middleware(['auth', 'verified'])->name('landing.worldwide');

Route::view('register', 'auth.register-page')->name('auth.register_page');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::view('register/success-registration/{id}', 'auth.success-registration')->middleware('verify')->name('auth.success_registration');
Route::get('register/confirmation-email/{token}', [AuthController::class, 'confirmation'])->name('auth.success_confirmation');
