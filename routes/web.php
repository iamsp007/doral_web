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

// Clincian Route


\Illuminate\Support\Facades\Auth::routes();
//Route::get('/', function () {
//    return view('pages.login');
//});


//Route::get('/resetpassword', function () {
//    return view('pages.resetpassword');
//});

// Login / Register
Route::get('/page/not/found',function($closure){
    // second parameter is optional.
    abort(404,'Page not found');
    abort(403);
});

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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');*/

<<<<<<< HEAD
Route::get('calender', 'App\Http\Controllers\AppointmentController@index');
//
//Auth::routes();
//
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();*/
=======
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> 8ba097f2826593b3ea81ea94d1c242f6888a0ee2



// Admin Panel




/*Route::get('/referral/employee-pre-physical', function () {
    return view('pages.referral.employee-pre-physical');
});*/

//Route::get('/caregiver/1', function () {
//    return view('pages.caregiver');
//});
Route::get('/caregiver/1', 'App\Http\Controllers\Admin\HomeController@caregiverResponse');
Route::get('/caregiver/2', 'App\Http\Controllers\Admin\HomeController@clinicianResponse');
Route::get('/caregiver/3', 'App\Http\Controllers\Admin\HomeController@caregiverforGluco');
Route::get('/caregiver/4', 'App\Http\Controllers\Admin\HomeController@caregiverforGlucoHigh');
Route::post('/caregiverResponseSubmit', 'App\Http\Controllers\Admin\HomeController@caregiverResponseSubmit');

