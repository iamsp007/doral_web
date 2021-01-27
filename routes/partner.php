<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/partner','middleware'=>['auth:partner']],function (){
    Route::group(['middleware'=>'role:admin'],function (){
        Route::get('/','\App\Http\Controllers\Partner\DashboardController@index');
    });
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
});
