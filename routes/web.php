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
\Illuminate\Support\Facades\Auth::routes(['verify' => true]);


//Route::get('/', function () {
//    return view('pages.login');
//});

//Route::get('/register', function () {
//    return view('pages.register');
//});
//
//Route::get('/resetpassword', function () {
//    return view('pages.resetpassword');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('calender', 'App\Http\Controllers\AppointmentController@index');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
