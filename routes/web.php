<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('landing')->middleware('guest');

Route::get('/welcome', function () {
    return view('auth.registration_welcome');
})->name('welcome');

Route::get('/en', function () {
    return view('index2');
})->name('landingEn')->middleware('guest');



Auth::routes();
Route::get('owner-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'ownerRegistrationForm'])->name('ownerRegistrationForm');
Route::post('owner-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'ownerRegistration'])->name('ownerRegistration');
Route::get('staff-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'staffRegistrationForm'])->name('staffRegistrationForm');
Route::post('staff-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'staffRegistration'])->name('staffRegistration');
Route::get('worker-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'workerRegistrationForm'])->name('workerRegistrationForm');
Route::post('worker-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'workerRegistration'])->name('workerRegistration');
Route::get('buyer-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'buyerRegistrationForm'])->name('buyerRegistrationForm');
Route::post('buyer-registration-form', [App\Http\Controllers\Auth\RegisterController::class, 'buyerRegistration'])->name('buyerRegistration');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
