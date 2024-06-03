<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserAuthController;


Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserAuthController::class, 'login'])->name('login_post');
Route::get('/forgot-password', [UserAuthController::class, 'showForgotPasswordForm'])->name('forgot_password');
Route::post('/forgot-password', [UserAuthController::class, 'sendGeneratedEmail'])->name('send_reset_link');

Route::group(['middleware' => ['auth']], function () {
    // logout 
    Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Redirect root URL to students resource
    Route::redirect('/', '/students');

    // Students resource
    Route::resource('students', StudentController::class);


    // user
    Route::resource('users', UserController::class);
    // update profile
    Route::get('/update-profile', [UserController::class, 'editProfile'])->name('userProfile.update');
    Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // change password
    Route::get('/change-password', [UserAuthController::class, 'changePasswordForm'])->name('changePassword.form');
    Route::post('/change-password', [UserAuthController::class, 'changePassword'])->name('change.password');
});
