<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/supervisor','middleware'=>['auth','role:supervisor']],function (){
    Route::get('/','\App\Http\Controllers\Supervisor\SuperVisorController@index')->name('supervisor.dashboard');
    Route::get('/patient-list','\App\Http\Controllers\Supervisor\SuperVisorController@index')->name('supervisor.patientList');
});
