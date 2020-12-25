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

Route::get('calender', 'App\Http\Controllers\AppointmentController@index');
Route::get('calender/create', 'App\Http\Controllers\AppointmentController@create')->name('appointment.create');
//
//Auth::routes();
//
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();*/

Route::group(['middleware'=>'auth'],function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\HomeController@getPatientDetail')->name('patient.detail');
});
