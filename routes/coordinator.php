<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/co-ordinator','middleware'=>['auth:web','role:co-ordinator']],function (){
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
    Route::get('/','\App\Http\Controllers\Coordinator\CoordinatorController@index')->name('coordinator.dashboard');
    Route::get('/patient-list-show','\App\Http\Controllers\Coordinator\CoordinatorController@patientListShow')->name('coordinator.patientListShow');
    Route::get('/getPatientList','\App\Http\Controllers\Clinician\PatientController@getPatientList')->name('coordinator.patientList.ajax');
    Route::get('/get-patient-list','\App\Http\Controllers\Coordinator\CoordinatorController@getPatientList')->name('coordinator.patientList');
    Route::get('/new-patient-list-show','\App\Http\Controllers\Coordinator\CoordinatorController@newPatientListShow')->name('coordinator.newPatientListShow');
    Route::get('/get-new-patient-list','\App\Http\Controllers\Coordinator\CoordinatorController@getNewPatientList')->name('coordinator.getNewPatientList');
    Route::post('/get-clinician-time-slots','\App\Http\Controllers\Coordinator\AppointmentController@getClinicianTimeSlots')->name('coordinator.calender.timeslot');

    Route::group(['prefix'=>'/appointment'],function (){
    	Route::get('/create','\App\Http\Controllers\Coordinator\AppointmentController@create')->name('coordinator.appointment.create');
        Route::post('/store', 'App\Http\Controllers\Coordinator\AppointmentController@store')->name('coordinator.appointment.store');
	    Route::get('/{pid}','\App\Http\Controllers\Coordinator\AppointmentController@index')->name('coordinator.appointment');
   });
});
