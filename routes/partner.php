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
    Route::get('/edit-employee/{id}','\App\Http\Controllers\Partner\PartnerController@editEmployee')->name('partner.editEmployee');
    Route::post('/update-employee/{id}','\App\Http\Controllers\Partner\PartnerController@updateEmployee')->name('partner.updateEmployee');
    Route::get('/view-employee/{id}','\App\Http\Controllers\Partner\PartnerController@viewEmployee')->name('partner.viewEmployee');
    Route::get('/delete-employee/{id}','\App\Http\Controllers\Partner\PartnerController@deleteEmployee')->name('partner.deleteEmployee');
});
