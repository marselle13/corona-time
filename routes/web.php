<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerifyEmailController;

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

Route::view('/', 'landing')->middleware(['auth', 'verified'])->name('landing.worldwide');

Route::middleware('guest')->group(function () {
	Route::view('/login', 'auth.login-page')->name('auth.login_page');
	Route::view('/login/reset-password', 'auth.reset-password')->name('auth.reset_page');
	Route::view('/login/success-recover/{id}', 'auth.success-recover')->middleware('verify.change')->name('auth.success_recover');
	Route::view('/login/success-update', 'auth.success-update')->name('auth.success_update');
	Route::view('register', 'auth.register-page')->name('auth.register_page');
	Route::view('register/success-registration/{id}', 'auth.success-registration')->middleware('verify.registration')->name('auth.success_registration');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
	Route::post('register', 'register')->name('auth.register');
	Route::post('/login', 'login')->name('auth.login');
	Route::post('/logout', 'logout')->withoutMiddleware('guest')->middleware('auth')->name('auth.logout');
});

Route::controller(ResetPasswordController::class)->middleware('guest')->group(function () {
	Route::post('/login/reset-password', 'reset')->name('auth.reset_password');
	Route::get('/login/new-password/{token}', 'newPassword')->name('auth.new_password');
	Route::patch('/login/new-password/{token}', 'updatePassword')->name('auth.update_password');
});

Route::controller(VerifyEmailController::class)->middleware('guest')->group(function () {
	Route::get('register/confirmation-email/{token}', 'confirmation')->name('auth.success_confirmation');
});
