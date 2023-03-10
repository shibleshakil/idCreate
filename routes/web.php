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

Route::get('language/{lang}', 'App\Http\Controllers\LanguageController@language')->name('language')->middleware('lang');

Route::group(['middleware' => ['lang']], function () {

    Route::get('language/{lang}', 'App\Http\Controllers\LanguageController@language')->name('language');
    Route::get('/', function () {
        \Session::flush();
        return view('index');
    })->name('home');
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
    Route::get('user-forgot-password', [App\Http\Controllers\Auth\ForgotController::class, 'forgotPasswordShow'])->name('forgotPasswordShow');
    Route::post('user-forgot-password', [App\Http\Controllers\Auth\ForgotController::class, 'forgotPassword'])->name('forgotPassword');
    Route::match(['get', 'post'], 'user-forgot-otp-varify', [App\Http\Controllers\Auth\ForgotController::class, 'forgotOtpVarify'])->name('forgotOtpVarify');
    Route::match(['get', 'post'], 'forgotChangePassword', [App\Http\Controllers\Auth\ForgotController::class, 'forgotChangePassword'])->name('forgotChangePassword');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::get('/id', [App\Http\Controllers\HomeController::class, 'id'])->name('id');
        Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
        Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePasswordForm'])->name('changePasswordForm');
        Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changePassword');
        Route::get('/change-id-number', [App\Http\Controllers\HomeController::class, 'changeIDForm'])->name('changeIDForm');
        Route::post('/change-id-number', [App\Http\Controllers\HomeController::class, 'changeID'])->name('changeID');
        Route::post('/change-profile-picture', [App\Http\Controllers\HomeController::class, 'changeImage'])->name('changeImage');
        
        //owner
        Route::get('/owner/settings', [App\Http\Controllers\UserSetting::class, 'ownerSettings'])->name('ownerSettings');

        //buyer
        Route::get('/buyer/settings', [App\Http\Controllers\UserSetting::class, 'buyerSettings'])->name('buyerSettings');
        Route::get('/buyer/change-password', [App\Http\Controllers\UserSetting::class, 'buyerChangePasswordForm'])->name('buyerChangePasswordForm');
        Route::post('/buyer/change-password', [App\Http\Controllers\UserSetting::class, 'buyerChangePassword'])->name('buyerChangePassword');
        Route::get('/buyer/change-id-number', [App\Http\Controllers\UserSetting::class, 'buyerChangeIDForm'])->name('buyerChangeIDForm');
        Route::post('/buyer/change-id-number', [App\Http\Controllers\UserSetting::class, 'buyerChangeID'])->name('buyerChangeID');

        // associate Id
        Route::get('add-associate-id', [App\Http\Controllers\AssociateIdController::class, 'addAssociatedIdForm'])->name('addAssociatedIdForm');
        Route::delete('associate-id-delete/{targetId}', [App\Http\Controllers\AssociateIdController::class, 'associateIdDelete'])->name('associateIdDelete');
        Route::put('associate-id-login/{id}/{targetId}', [App\Http\Controllers\AssociateIdController::class, 'associateLogin'])->name('associateLogin');
        Route::match(['get', 'post'], 'send-otp', [App\Http\Controllers\AssociateIdController::class, 'sendOtp'])->name('sendOtp');
        Route::match(['get', 'post'], 'varify-otp', [App\Http\Controllers\AssociateIdController::class, 'varifyOtp'])->name('varifyOtp');
    });
});