<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\StatisticController;

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

Route::redirect('/', '/worldwide');

Route::controller(StatisticController::class)->middleware(['auth', 'verified'])->group(function () {
	Route::get('/worldwide', 'worldwidePage')->name('landings.worldwide');
	Route::get('/country', 'countryPage')->name('landings.country');
});

Route::middleware('guest')->group(function () {
	Route::view('/register', 'auth.register-page')->name('auth.register_page');
	Route::view('/register/success-registration/', 'success.registration')->name('successes.registration');
	Route::view('/login', 'auth.login-page')->name('auth.login_page');
	Route::view('/reset-password', 'password.reset')->name('passwords.reset_page');
	Route::view('/success-recover', 'success.password-recover')->name('successes.password_recover');
	Route::view('/new-password/{user}/{token}', 'password.update-page')->middleware(['checkVerifiedEmail.route', 'verifyToken'])->name('passwords.update_page');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
	Route::post('/register', 'register')->name('auth.register');
	Route::post('/login', 'login')->middleware('checkVerifiedEmail.input')->name('auth.login');
	Route::post('/logout', 'logout')->withoutMiddleware('guest')->middleware('auth')->name('auth.logout');
});

Route::controller(ResetPasswordController::class)->middleware(['guest', 'checkVerifiedEmail.route'])->group(function () {
	Route::post('/reset-password', 'resetPassword')->name('passwords.reset');
	Route::patch('/new-password/{user}/{token}', 'updatePassword')->middleware('verifyToken')->name('passwords.update');
});

Route::controller(VerifyEmailController::class)->middleware(['guest', 'verifyToken'])->group(function () {
	Route::get('/confirmation-email/{user}/{token}', 'confirmation')->name('emails.confirmation');
});
