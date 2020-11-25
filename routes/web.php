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



Route::get('/', function () {
    return view('pages.login');
});


Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});

// Login / Register
Route::post('companyregister', 'App\Http\Controllers\CompanyController@store');
Route::post('companylogin', 'App\Http\Controllers\CompanyController@login');
Route::post('companyresetpassword', 'App\Http\Controllers\CompanyController@resetpassword');

// Email Template Route
Route::get('emaillist', 'App\Http\Controllers\EmailTemplateController@index');

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Panel
Route::get('/admin/', function () {
    return view('pages.admin.login');
});

Route::get('/admin/roles', function () {
    return view('pages.admin.roles');
});

Route::get('/admin/employee', function () {
    return view('pages.admin.employee');
});

Route::get('admin/employee-add', 'App\Http\Controllers\EmployeeController@index');

/*Route::get('/admin/referral-profile', function () {
    return view('pages.admin.referral-profile');
});*/

Route::get('/admin/referral-approval', 'App\Http\Controllers\CompanyController@index');
Route::post('/admin/referral-status', 'App\Http\Controllers\CompanyController@updateStatus');
Route::get('/admin/referral-profile/{id}', 'App\Http\Controllers\CompanyController@profile');
Route::post('/admin/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index');

Route::get('/admin/logout', 'App\Http\Controllers\Admin\HomeController@logout');


// Referral Panel
Route::get('/referral/dashboard', function () {
    return view('pages.referral.dashboard');
});

Route::get('/referral/vbc', 'App\Http\Controllers\PatientReferralController@index1');
Route::get('/referral/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@index');

Route::get('/referral/md-order', function () {
    return view('pages.referral.md-order');
});

Route::get('/referral/employee-pre-physical', function () {
    return view('pages.referral.employee-pre-physical');
});


# Referral-Patient api
Route::post('/referral/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');