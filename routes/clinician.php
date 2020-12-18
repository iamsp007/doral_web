<?php
use Illuminate\Support\Facades\Route;

Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\Clincian\PatientController@getPatientDetail')->name('clinician.patient.detail');
Route::group(['prefix'=>'/clinician','middleware'=>['role:clinician','check']],function (){

    Route::group(['middleware'=>['auth']],function (){
        Route::get('/','\App\Http\Controllers\Clincian\DashboardController@index')->name('clinician.dashboard');
        Route::get('/patient-list','\App\Http\Controllers\Clincian\PatientController@index')->name('clinician.patientList');
        Route::get('/new-patient-list','\App\Http\Controllers\Clincian\PatientController@newPatientRquest')->name('clinician.new.patientList');
        Route::get('/get-near-by-clinician-list/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@getNearByClinicianList')->name('clinician.getNearByClinicianList');
        Route::post('/changePatientStatus','\App\Http\Controllers\Clincian\PatientController@changePatientStatus')->name('clinician.changePatientStatus');
        Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('clinician.patientList.ajax');
        Route::get('/getNewPatientList','\App\Http\Controllers\Clincian\PatientController@getNewPatientList')->name('clinician.new.patientList.ajax');
        Route::get('/roadl','\App\Http\Controllers\Clincian\RoadLController@index')->name('clinician.roadl');
        Route::get('/start-roadl/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@startRoadLRequest')->name('clinician.start.roadl');
        Route::get('/running-roadl/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@runningRoadLRequest')->name('clinician.start.running');
        Route::post('/patient-request-list','\App\Http\Controllers\Clincian\RoadLController@getPatientRequestList')->name('clinician.roadl.patientRequestList');
        Route::post('/patient-roladl-proccess','\App\Http\Controllers\Clincian\RoadLController@getRoadLProccess')->name('clinician.roadl.process');
    });
});
