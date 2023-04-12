<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/login', 'auth.login')->name('auth.login');
Route::view('/register', 'auth.register')->name('auth.register');
Route::view('/reset-password', 'auth.reset-password')->name('auth.reset_password');
Route::view('/new-password', 'auth.new-password')->name('auth.new_password');
Route::view('/success-update', 'auth.success-update')->name('auth.success_update');
Route::view('/success-confirmation', 'auth.success-confirmation')->name('auth.success_confirmation');
Route::view('/confirmation-email', 'auth.confirmation-email')->name('auth.confirmation_email');
Route::view('/recover-password', 'auth.recover-password')->name('auth.recover_password');
