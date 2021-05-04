<?php
use Illuminate\Support\Facades\Route;

Route::get('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@showPartnerRegistrationForm')->name('partner.register');
Route::post('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@partnerRegister')->name('partner.register');
Route::post('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@login')->name('partner.login');
Route::get('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@showLoginForm')->name('partner.login');
Route::post('/partner/logout','\App\Http\Controllers\Auth\PartnerLoginController@logout')->name('partner.logout');

Route::group(['prefix'=>'/partner','middleware'=>['auth:partner']],function (){
    Route::get('/','\App\Http\Controllers\Partner\DashboardController@index')->name('partner.dashboard');
    Route::get('/add-employee','\App\Http\Controllers\Partner\PartnerController@addEmployee')->name('add.employee');
    Route::post('/save-employee','\App\Http\Controllers\Partner\PartnerController@saveEmployee')->name('partner.saveEmployee');
    Route::get('/employees','\App\Http\Controllers\Partner\PartnerController@employees')->name('employees.list');
    Route::get('/employees-ajax','\App\Http\Controllers\Partner\PartnerController@employeesByAjax')->name('partner.employees.ajax');
    Route::get('/edit-employee/{id}','\App\Http\Controllers\Partner\PartnerController@editEmployee')->name('partner.editEmployee');
    Route::post('/update-employee/{id}','\App\Http\Controllers\Partner\PartnerController@updateEmployee')->name('partner.updateEmployee');
    Route::get('/view-employee/{id}','\App\Http\Controllers\Partner\PartnerController@viewEmployee')->name('partner.viewEmployee');
    Route::get('/delete-employee/{id}','\App\Http\Controllers\Partner\PartnerController@deleteEmployee')->name('partner.deleteEmployee');
    Route::get('/calendar','\App\Http\Controllers\Clinician\PatientController@calendarAppoimentListData')->name('clinician.calendar');
    Route::get('/remindar-calendar/{date}','\App\Http\Controllers\Clinician\PatientController@calendarRemindarListData')->name('clinician.remindar.calendar');

});
