<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/supervisor','middleware'=>['auth:web','role:supervisor']],function (){
    Route::get('/','\App\Http\Controllers\Supervisor\SuperVisorController@index')->name('supervisor.dashboard');

    Route::get('/patients','\App\Http\Controllers\Supervisor\SuperVisorController@viewNewPatients')->name('supervisor.patients');
    Route::get('/patient-list','\App\Http\Controllers\Supervisor\SuperVisorController@getPatients')->name('supervisor.patients.ajax');
    Route::post('/add-case-management','\App\Http\Controllers\Supervisor\SuperVisorController@add_case_management');
    Route::get('/assigned-patients','\App\Http\Controllers\Supervisor\SuperVisorController@viewAssigedPatients')->name('supervisor.assigned_patients.ajax');
    Route::get('/assigned-patient-list','\App\Http\Controllers\Supervisor\SuperVisorController@getAssignedPatients')->name('supervisor.assignedpatients.ajax');
    Route::post('/update-case-management','\App\Http\Controllers\Supervisor\SuperVisorController@update_case_management');
    Route::post('/case_management','\App\Http\Controllers\Supervisor\SuperVisorController@case_management');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
    Route::get('/calendar','\App\Http\Controllers\Clinician\PatientController@calendarAppoimentListData')->name('clinician.calendar');

});
