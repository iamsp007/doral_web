<?php
use Illuminate\Support\Facades\Route;

Route::get('/provider/login','\App\Http\Controllers\Auth\ReferralLoginController@showLoginForm')->name('referral.showLoginForm');
Route::post('/provider/login','\App\Http\Controllers\Auth\ReferralLoginController@login')->name('referral.login');
Route::get('/register','\App\Http\Controllers\Auth\ReferralRegisterController@showRegistrationForm')->name('referral.showRegistrationForm');
Route::post('/register','\App\Http\Controllers\Auth\ReferralRegisterController@register')->name('referral.register');

Route::group(['prefix'=>'/referral'],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::group(['middleware'=>['auth','check']],function (){
        Route::get('/dashboard', function () {
            return view('pages.referral.dashboard');
        })->name('referral.dashboard');

        Route::get('/vbc', 'App\Http\Controllers\PatientReferralController@vbc')->name('referral.vbc');;
        Route::get('/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@vbcUploadBulk')->name('referral.md-order');
        Route::get('/md-order', 'App\Http\Controllers\PatientReferralController@mdOrder')->name('referral.employee-pre-physical');
        Route::get('/md-order-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@mdOrderUploadBulk');
        Route::get('/employee-pre-physical', 'App\Http\Controllers\PatientReferralController@employeePrePhysical');
        Route::get('/employee-pre-physical-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@employeePrePhysicalUploadBulk');

        # Referral-Patient api
        Route::post('/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
        Route::post('/md-order-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
        Route::post('/employee-pre-physical-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
        Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');
    });
});
