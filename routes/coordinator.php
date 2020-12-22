<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/co-ordinator','middleware'=>['auth','role:co-ordinator']],function (){
    Route::get('/','\App\Http\Controllers\Coordinator\CoordinatorController@index')->name('coordinator.dashboard');
    Route::get('/patient-list-show','\App\Http\Controllers\Coordinator\CoordinatorController@patientListShow')->name('coordinator.patientListShow');
    Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('coordinator.patientList.ajax');
    Route::get('/get-patient-list','\App\Http\Controllers\Coordinator\CoordinatorController@getPatientList')->name('coordinator.patientList');
    Route::get('/new-patient-list-show','\App\Http\Controllers\Coordinator\CoordinatorController@newPatientListShow')->name('coordinator.newPatientListShow');
    Route::get('/get-new-patient-list','\App\Http\Controllers\Coordinator\CoordinatorController@getNewPatientList')->name('coordinator.getNewPatientList');
});
