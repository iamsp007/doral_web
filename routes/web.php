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
Route::get('/', function () {
    return redirect()->route('home');
});


// Email Template Route
Route::get('emaillist', 'App\Http\Controllers\EmailTemplateController@index');


Route::group(['middleware'=>'auth'],function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\HomeController@getPatientDetail')->name('patient.detail');
});

//Route::get('appointment', 'App\Http\Controllers\AppointmentController@index');
Route::get('appointment/create', 'App\Http\Controllers\AppointmentController@create')->name('appointment.create');
Route::get('appointment/{pId}', 'App\Http\Controllers\AppointmentController@index')->name('appointment.show-appointment');
Route::post('appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('appointment.store');


//
//Auth::routes();
//
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('check')->name('home');



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

Route::group(['middleware'=>['auth','role:admin|supervisor|referral|clinician|co-ordinator']],function (){
    Route::get('appointment', 'App\Http\Controllers\AppointmentController@index');
    Route::get('appointment/create', 'App\Http\Controllers\AppointmentController@create')->name('appointment.create');
    Route::post('appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('appointment.store');
});
