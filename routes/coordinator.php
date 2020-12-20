<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/co-ordinator','middleware'=>['auth','role:co-ordinator']],function (){
    Route::get('/','\App\Http\Controllers\Coordinator\CoordinatorController@index')->name('coordinator.dashboard');
    Route::get('/patient-list-show','\App\Http\Controllers\Coordinator\CoordinatorController@patientListShow')->name('coordinator.patientListShow');
    Route::get('/get-patient-list','\App\Http\Controllers\Coordinator\CoordinatorController@getPatientList')->name('coordinator.patientList');
});
