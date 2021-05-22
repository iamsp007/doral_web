<?php
use Illuminate\Support\Facades\Route;

Route::get('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@showPartnerRegistrationForm')->name('partner.register');
Route::post('/partner/register','\App\Http\Controllers\Auth\ReferralRegisterController@partnerRegister')->name('partner.register');
Route::post('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@login')->name('partner.login');
Route::get('/partner/login','\App\Http\Controllers\Auth\PartnerLoginController@showLoginForm')->name('partner.login');
Route::post('/partner/logout','\App\Http\Controllers\Auth\PartnerLoginController@logout')->name('partner.logout');

Route::group(['prefix'=>'/partner','middleware'=>['auth:partner']],function (){
    Route::get('/','\App\Http\Controllers\Partner\DashboardController@index')->name('partner.dashboard');

    Route::get('/calendar','\App\Http\Controllers\Clinician\PatientController@calendarAppoimentListData')->name('clinician.calendar');
    Route::get('/employee/resend/{id}', '\App\Http\Controllers\Employee\EmployeeController@resendEmail');
    Route::post('/employee/status', '\App\Http\Controllers\Employee\EmployeeController@updateStatus');
    Route::post('/employee/getList','\App\Http\Controllers\Employee\EmployeeController@getList')->name('employee.getList');
    Route::resource('employee','\App\Http\Controllers\Employee\EmployeeController');

    Route::get('/designation/status/{id}', '\App\Http\Controllers\Designation\DesignationController@updateStatus');
    Route::post('/designation/getList','\App\Http\Controllers\Designation\DesignationController@getList')->name('designation.getList');
    Route::resource('designation','\App\Http\Controllers\Designation\DesignationController');
});
