<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/referral','middleware'=>['auth','check']],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::get('/dashboard', function () {
        return view('pages.referral.dashboard');
    });

    Route::get('/vbc', 'App\Http\Controllers\PatientReferralController@vbc');
    Route::get('/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@vbcUploadBulk');
    Route::get('/md-order', 'App\Http\Controllers\PatientReferralController@mdOrder');
    Route::get('/md-order-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@mdOrderUploadBulk');
    Route::get('/employee-pre-physical', 'App\Http\Controllers\PatientReferralController@employeePrePhysical');
    Route::get('/employee-pre-physical-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@employeePrePhysicalUploadBulk');

    # Referral-Patient api
    Route::post('/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
    Route::post('/md-order-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
    Route::post('/employee-pre-physical-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
    Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');
});
