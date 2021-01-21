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

\Illuminate\Support\Facades\Auth::routes();
Route::get('/', function () {
    return redirect()->route('home');
});
Route::post('/provider/login','\App\Http\Controllers\Auth\ReferralLoginController@login')->name('referral.login');
Route::get('/register','\App\Http\Controllers\Auth\ReferralRegisterController@showRegistrationForm')->name('referral.showRegistrationForm');
Route::post('/register','\App\Http\Controllers\Auth\ReferralRegisterController@register')->name('referral.register');

Route::get('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@showPartnerRegistrationForm')->name('partner.register');
Route::post('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@partnerRegister')->name('partner.register');
Route::post('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@login')->name('partner.login');
Route::get('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@showLoginForm')->name('partner.login');


Route::group(['middleware'=>'auth'],function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('check');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\HomeController@getPatientDetail')->name('patient.detail');
});


//
//Auth::routes();
//

//Auth::routes();*/

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('check')->name('home');



// Admin Panel

Route::get('/caregiver/1', 'App\Http\Controllers\Admin\HomeController@caregiverResponse');
Route::get('/caregiver/2', 'App\Http\Controllers\Admin\HomeController@clinicianResponse');
Route::get('/caregiver/3', 'App\Http\Controllers\Admin\HomeController@caregiverforGluco');
Route::get('/caregiver/4', 'App\Http\Controllers\Admin\HomeController@caregiverforGlucoHigh');
Route::post('/caregiverResponseSubmit', 'App\Http\Controllers\Admin\HomeController@caregiverResponseSubmit');

Route::group(['middleware'=>['auth','role:admin|supervisor|referral|clinician|co-ordinator']],function (){
    Route::get('appointment', 'App\Http\Controllers\AppointmentController@index');
    Route::get('appointment/create', 'App\Http\Controllers\AppointmentController@create')->name('appointment.create');
    Route::post('appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('appointment.store');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@index')->name('patient.detail');
});
Route::post('/save-token','\App\Http\Controllers\HomeController@saveToken')->name('save-token');

Route::group(['middleware'=>['auth:referral']],function (){
    Route::get('/referral/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@index')->name('patient.detail');
});

Route::post('/start','\App\Http\Controllers\Clincian\RoomController@startArchive');
Route::post('/zoom-generate_signature','\App\Http\Controllers\Clincian\RoomController@zoomGenerateSignature');
