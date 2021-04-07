<?php

use App\Http\Controllers\PatientLabReportController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/referral','middleware' => ['auth:referral', 'role:referral']], function () {
    Route::get('email_verified/{user_id}', 'App\Http\Controllers\ReferralController@emailVerified')->name('referral.emailVerified');

    // Route::get('/dashboard', function () {
    //     return view('pages.referral.dashboard');
    // })->name('referral.dashboard');

    Route::get('dashboard', 'App\Http\Controllers\CaregiverController@dashboard')->name('referral.dashboard');
    Route::post('dashboardAjaxPatient', 'App\Http\Controllers\CaregiverController@dashboardAjaxPatient')->name('referral.dashboardAjaxPatient');

//        Route::get('add-patient', 'App\Http\Controllers\PatientReferralController@addPatient')->name('referral.add-patient');
    Route::get('filter-cities', 'App\Http\Controllers\PatientReferralController@getCities')->name('referral.filter-cities');
    Route::post('store-patient', 'App\Http\Controllers\PatientReferralController@storePatient')->name('referral.store-patient');
    Route::get('patient-detail/{patient_id}', '\App\Http\Controllers\PatientController@index')->name('referral.patient-detail');
    // Route::get('referral/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@index')->name('referral.patient.detail');
    // Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patients.detail');
    Route::get('service/{status?}', 'App\Http\Controllers\CaregiverController@index')->name('referral.new-patient-list');
    Route::post('/edit-phone', 'App\Http\Controllers\CaregiverController@updatePhoneNumber')->name('referral.updatePhone');
    // Route::get('/vbc', 'App\Http\Controllers\PatientReferralController@vbc')->name('referral.vbc');
    Route::get('/vbc-get-data', 'App\Http\Controllers\PatientReferralController@vbcGetData')->name('referral.vbc-get-data');
    Route::get('/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@vbcUploadBulk')->name('referral.vbc-upload-bulk-data');
    // Route::get('/md-order', 'App\Http\Controllers\PatientReferralController@index')->name('referral.md-order');
    Route::get('/md-order-get-data', 'App\Http\Controllers\PatientReferralController@mdOrder')->name('referral.md-order-get-data');
    Route::get('/md-order-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@mdOrderUploadBulk')->name('referral.md-order-upload-bulk-data');
    // Route::get('/occupational-health', 'App\Http\Controllers\PatientReferralController@occupationalHealth')->name('referral.occupational-health');
    Route::get('/occupational-health-get-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthGetData')->name('referral.occupational-health-get-data');
    Route::get('/occupational-health-get-fail-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthGetFaileData')->name('referral.occupational-health-get-fail-data');
    Route::get('/view-occupational-health-get-fail-data', 'App\Http\Controllers\PatientReferralController@viewoccupationalHealthGetFaileData')->name('referral.view-occupational-health-get-fail-data');
    Route::get('/view-failed-data/{id}', 'App\Http\Controllers\PatientReferralController@viewoccupationalHealthFailData')->name('referral.view-failed-data');
    Route::get('/occupational-health-view-fail-data/{id}', 'App\Http\Controllers\PatientReferralController@viewoccupationalHealthGetFaileData')->name('referral.occupational-health-view-fail-data');

    Route::get('/vbc-get-fail-data', 'App\Http\Controllers\PatientReferralController@vbcGetFaileData')->name('referral.vbc-get-fail-data');
    Route::get('/md-order-get-fail-data', 'App\Http\Controllers\PatientReferralController@mdorderGetFaileData')->name('referral.md-order-get-fail-data');






    Route::get('/occupational-health-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthUploadBulk')->name('referral.occupational-health-upload-bulk-data');
    Route::get('/occupational-health-failed-data', 'App\Http\Controllers\PatientReferralController@occupationalHealthFailData')->name('referral.occupational-health-failed-data');
    Route::get('/vbc-failed-data', 'App\Http\Controllers\PatientReferralController@vbcFailData')->name('referral.vbc-failed-data');
    Route::get('/md-order-failed-data', 'App\Http\Controllers\PatientReferralController@mdorderFailData')->name('referral.md-order-failed-data');
    Route::get('/covid-19', 'App\Http\Controllers\PatientReferralController@covid19UploadBulk')->name('referral.covid-19');


    # Referral-Patient api
    Route::post('/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store')->name('referral.vbc-upload-bulk-data-store');
    Route::post('/md-order-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store')->name('referral.md-order-upload-bulk-data-store');
    Route::post('/occupational-health-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@storeOccupational')->name('referral.occupational-health-upload-bulk-data-store');
    Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');
    Route::get('profile', 'App\Http\Controllers\CompanyController@profile');
    Route::post('/referral-profile-update', 'App\Http\Controllers\CompanyController@updateProfile')->name('referral.updateProfile');
    Route::post('/service-payment-insert-update', 'App\Http\Controllers\CompanyController@insertUpdateServicePayment')->name('referral.insertUpdateServicePayment');

    Route::post('/lab-report/store', 'App\Http\Controllers\PatientLabReportController@store')->name('lab-report.store');
    Route::post('/lab-report-note/store', 'App\Http\Controllers\PatientLabReportController@addNote')->name('lab-report-note.store');
    Route::delete('lab-report/destroy', 'App\Http\Controllers\PatientLabReportController@destroy')->name('lab-report.destroy');
    Route::get('/employee-physical-examination-report-pdf/{id}','App\Http\Controllers\PatientReferralController@getEmployeePhysicalExaminationReport')->name('referral.get-employee-physical-examination-report');

    Route::post('/insurance/store', 'App\Http\Controllers\InsuranceController@store')->name('insurance.store');
    Route::post('/edit-insurance', 'App\Http\Controllers\InsuranceController@updateInsurance')->name('insurance.updateInsurance');
});
