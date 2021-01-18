<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/supervisor','middleware'=>['auth','role:supervisor']],function (){
    Route::get('/','\App\Http\Controllers\Supervisor\SuperVisorController@index')->name('supervisor.dashboard');
    Route::get('/patients','\App\Http\Controllers\Supervisor\SuperVisorController@viewPatients')->name('supervisor.patients');
    Route::get('/patient-list','\App\Http\Controllers\Supervisor\SuperVisorController@getPatients')->name('supervisor.patients.ajax');
    Route::post('/case_management','\App\Http\Controllers\Supervisor\SuperVisorController@case_management');

});
