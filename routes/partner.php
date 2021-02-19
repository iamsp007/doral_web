<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/partner','middleware'=>['auth:partner']],function (){
    Route::group(['middleware'=>'role:admin'],function (){
        Route::get('/','\App\Http\Controllers\Partner\DashboardController@index');
    });
    Route::get('/add-employee','\App\Http\Controllers\Partner\PartnerController@addEmployee')->name('add.employee');
    Route::post('/save-employee','\App\Http\Controllers\Partner\PartnerController@saveEmployee')->name('partner.saveEmployee');
    Route::get('/employees','\App\Http\Controllers\Partner\PartnerController@employees')->name('employees.list');
    Route::get('/employees-ajax','\App\Http\Controllers\Partner\PartnerController@employeesByAjax')->name('partner.employees.ajax');
    
});
