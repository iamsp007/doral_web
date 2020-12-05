<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/clinician','middleware'=>'check'],function (){

    Route::group(['middleware'=>['auth']],function (){
        Route::get('/','\App\Http\Controllers\Clincian\DashboardController@index')->name('clinician.dashboard');
        Route::get('/patient-list','\App\Http\Controllers\Clincian\PatientController@index')->name('clinician.patientList');
        Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\Clincian\PatientController@getPatientDetail')->name('clinician.patient.detail');
        Route::get('/new-patient-list','\App\Http\Controllers\Clincian\PatientController@newPatientRquest')->name('clinician.new.patientList');
        Route::post('/changePatientStatus','\App\Http\Controllers\Clincian\PatientController@changePatientStatus')->name('clinician.changePatientStatus');
        Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('clinician.patientList.ajax');
        Route::get('/getNewPatientList','\App\Http\Controllers\Clincian\PatientController@getNewPatientList')->name('clinician.new.patientList.ajax');
//        Route::get('/roadl','\App\Http\Controllers\Clincian\RoadLController@index')->name('clinician.roadl');
        Route::get('/start-roadl','\App\Http\Controllers\Clincian\RoadLController@startRoadLRequest')->name('clinician.start.roadl');
        Route::post('/patient-request-list','\App\Http\Controllers\Clincian\RoadLController@getPatientRequestList')->name('clinician.roadl.patientRequestList');
    });
});
