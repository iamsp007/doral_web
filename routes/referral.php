<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/referral'],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::group(['middleware'=>['auth:referral','role:referral']],function (){
        Route::get('/dashboard', function () {
            return view('pages.referral.dashboard');
        })->name('referral.dashboard');

        Route::get('/vbc', 'App\Http\Controllers\PatientReferralController@vbc')->name('referral.vbc');
        Route::get('/vbc-get-data', 'App\Http\Controllers\PatientReferralController@vbcGetData')->name('referral.vbc-get-data');
        Route::get('/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@vbcUploadBulk')->name('referral.vbc-upload-bulk-data');
        Route::get('/md-order', 'App\Http\Controllers\PatientReferralController@index')->name('referral.md-order');
        Route::get('/md-order-get-data', 'App\Http\Controllers\PatientReferralController@mdOrder')->name('referral.md-order-get-data');
        Route::get('/md-order-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@mdOrderUploadBulk')->name('referral.md-order-upload-bulk-data');
        Route::get('/occupational-health', 'App\Http\Controllers\PatientReferralController@occupationalHealth')->name('referral.occupational-health');
        Route::get('/occupational-health-get-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthGetData')->name('referral.occupational-health-get-data');
        Route::get('/occupational-health-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthUploadBulk')->name('referral.occupational-health-upload-bulk-data');

        # Referral-Patient api
        Route::post('/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store')->name('referral.vbc-upload-bulk-data-store');
        Route::post('/md-order-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store')->name('referral.md-order-upload-bulk-data-store');
        Route::post('/occupational-health-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@storeOccupational')->name('referral.occupational-health-upload-bulk-data-store');
        Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\Clincian\PatientController@getPatientDetail')->name('referral.patient.detail');
        Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');
    });
});
