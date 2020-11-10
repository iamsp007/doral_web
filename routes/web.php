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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});

// Login / Register
Route::post('companyregister', 'App\Http\Controllers\CompanyController@store');
Route::post('companylogin', 'App\Http\Controllers\CompanyController@login');
Route::post('companyresetpassword', 'App\Http\Controllers\CompanyController@resetpassword');

// Email Template Route
Route::get('emaillist', 'App\Http\Controllers\EmailTemplateController@index');

//Route::get('/register', function () {
//    return view('pages.register');
//});

Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Panel

// Referral Panel
Route::get('/referral/dashboard', function () {
    return view('pages.referral.dashboard');
});
Route::get('/referral/vbc', function () {
    return view('pages.referral.vbc');
});
Route::get('/referral/vbc-upload-bulk-data', function () {
    return view('pages.referral.vbc-upload-bulk-data');
});
Route::get('/referral/md-order', function () {
    return view('pages.referral.md-order');
});

Route::get('/referral/employee-pre-physical', function () {
    return view('pages.referral.employee-pre-physical');
});


# Referral-Patient api
Route::post('/referral/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
