<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AuthOtpCOntroller;
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
    return view('welcome');
});

Route::controller(UserAuthController::class)->group(function(){

Route::get('/login','login')->middleware('alreadyLoggedIn');
Route::get('/register','register')->middleware('alreadyLoggedIn');
Route::post('/register-user','registerUser')->name('register.user');
Route::post('/login-user' ,'loginUser')->name('login.user');
Route::get('/dashboard' ,'dashboard')->middleware('isLoggedIn');
Route::get('/logout','logout');

});

Route::controller(AuthOtpCOntroller::class)->group(function(){
Route::get('/otp/login','login')->name('otp.login');
Route::post('/otp/generate','generate')->name('otp.generate');
});