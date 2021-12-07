<?php

use App\Http\Controllers\CareTeamController;
use App\Http\Controllers\UserDeviceController;
use Illuminate\Support\Facades\Route;

    Route::get('/download-application',function (){
        return view('home');
    });

    Route::get('/download-partner-application',function (){
        return view('apk');
    });

    \Illuminate\Support\Facades\Auth::routes();
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::post('/provider/login','\App\Http\Controllers\Auth\ReferralLoginController@login')->name('referral.login');
    Route::get('/register','\App\Http\Controllers\Auth\ReferralRegisterController@showRegistrationForm')->name('referral.showRegistrationForm');
    Route::post('/register','\App\Http\Controllers\Auth\ReferralRegisterController@register')->name('referral.register');

    Route::get('company_email_verified/{user_id}', 'App\Http\Controllers\Email\EmailVerifyController@companyEmailVerified')->name('companyEmailVerified');
    Route::get('partner_email_verified/{user_id}', 'App\Http\Controllers\Email\EmailVerifyController@partnerEmailVerified')->name('partnerEmailVerified');

    /**
     *  Public covid-19 form
     */
    Route::get('/covid-19/{id}/detail','\App\Http\Controllers\Clinician\PatientController@covid19Info');

    Route::group(['middleware'=>'auth:partner,referral,web'],function (){
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('check');
        Route::post('/add-insurance','\App\Http\Controllers\PatientController@addInsurance')->name('patient.addInsurance');
        // Add New Patient Form
        Route::get('add-new-patient',[\App\Http\Controllers\Clinician\PatientController::class,'addNewPatient'])->name('add.new.patient');

        Route::get('/patient-details/{patient_id}','\App\Http\Controllers\GetPatientDetailsController@show')->name('patient.details');

        Route::post('/lab-report/store', 'App\Http\Controllers\PatientLabReportController@store')->name('lab-report.store');

        Route::post('/lab-report-upload','\App\Http\Controllers\GetPatientDetailsController@labReportUpload')->name('patient.lab.report.upload');

        Route::get('notification-history','App\Http\Controllers\NotificationHistoryController@index')->name('notification-history');
        Route::post('/notification-history','App\Http\Controllers\NotificationHistoryController@getNotification')->name('notification.getList');
        Route::post('/notification/status', '\App\Http\Controllers\NotificationHistoryController@updateStatus')->name('notification.status');
        Route::post('send-mail','App\Http\Controllers\NotificationHistoryController@sendemail')->name('send-email');
        
    });

    Route::post('/demographyData-update','\App\Http\Controllers\PatientController@demographyDataUpdate')->name('patient.demographyData-update');

    Route::post('/caregiverResponseSubmit', 'App\Http\Controllers\Admin\HomeController@caregiverResponseSubmit');

    Route::get('/patient-medicine-list/{patient_id}','\App\Http\Controllers\PatientController@patientMedicineList')->name('patient.medician.list');

    Route::get('appointment', 'App\Http\Controllers\AppointmentController@index');
    Route::get('appointment/create', 'App\Http\Controllers\AppointmentController@create')->name('appointment.create');
    Route::post('appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('appointment.store');

    Route::post('/lab-report-referral','\App\Http\Controllers\GetPatientDetailsController@getLabReportReferral')->name('patient.lab.report.referral');
   
    Route::post('/view-lab-report','\App\Http\Controllers\GetPatientDetailsController@viewLabReport')->name('patient.lab.report.view');
    Route::post('/lab-report-data','\App\Http\Controllers\GetPatientDetailsController@labReportData')->name('patient.lab.report.data');
    Route::delete('/remove-lab-report','\App\Http\Controllers\GetPatientDetailsController@removeLabReport')->name('patient.lab.report.remove');
    Route::post('/lab-report-file-show','\App\Http\Controllers\GetPatientDetailsController@labReportFileShow')->name('patient.lab.report.show');
    Route::post('/add-medicine','\App\Http\Controllers\PatientController@addMedicine')->name('add.medicine');

    Route::get('/employee-physical-examination-report/{id}','App\Http\Controllers\EmployeePhysicalExaminationReportController@getEmployeePhysicalExaminationReport')->name('get-employee-physical-examination-report');
    Route::post('/employee-physical-examination-report/{id}','App\Http\Controllers\EmployeePhysicalExaminationReportController@postEmployeePhysicalExaminationReport')->name('post-employee-physical-examination-report');
    Route::get('/pdf-employee-physical-examination-report/{id}','App\Http\Controllers\EmployeePhysicalExaminationReportController@pdfEmployeePhysicalExaminationReport')->name('pdf-employee-physical-examination-report');

    Route::get('/roadl-vendor-list','App\Http\Controllers\Clinician\RoadLController@getVendorList')->name('roadl.vendor.list');
    Route::get('/clinician-role-list','App\Http\Controllers\Clinician\RoadLController@getClinicianList')->name('clinician.role.list');
    Route::get('/sub-test-list','App\Http\Controllers\Clinician\RoadLController@getSubTestNameList')->name('clinician.sub-test-list');
    Route::post('/save-token','\App\Http\Controllers\HomeController@saveToken')->name('save-token');
    Route::get('/all-patient-list','\App\Http\Controllers\HomeController@allPatientList')->name('all.patient.list');

    Route::post('/start','\App\Http\Controllers\Clinician\RoomController@startArchive');
    Route::post('/zoom-generate_signature','\App\Http\Controllers\Clinician\RoomController@zoomGenerateSignature');

    Route::get('/search-patients', 'App\Http\Controllers\GetPatientDetailsController@searchPatients');
    // Route::post('/search-patient-details', 'App\Http\Controllers\GetPatientDetailsController@searchPatientDetails');
    // Route::post('/get-demographic-details', 'App\Http\Controllers\GetPatientDetailsController@getDemographicDetails');
    Route::get('/get-patient-detail','\App\Http\Controllers\GetPatientDetailsController@index')->name('clinician.getPatientdetail');
    Route::get('/getPatientDetail','\App\Http\Controllers\GetPatientDetailsController@getPatientDetail')->name('clinician.patientDetail.ajax');

    Route::post('/caregiver-update/{patient_id}','\App\Http\Controllers\GetPatientDetailsController@checkCurrentVisitorDetails')->name('patient.caregiver.update');

    Route::get('/search-caregivers', 'App\Http\Controllers\CaregiverController@searchCaregivers');

    Route::group(['middleware'=>['auth:web,partner,referral']],function (){
        Route::get('/patients/{status?}','App\Http\Controllers\CaregiverController@index')->name('clinician.new-patient-list');
        Route::post('/patient-request-list','App\Http\Controllers\CaregiverController@getPatientRequestDetail')->name('clinician.patient-request-list');
    });

    Route::get('/patients/resend/{id}', '\App\Http\Controllers\patient\PatientController@resendEmail')->name('resend.mail');
    Route::group(['middleware'=>['auth:web,referral']],function (){
        Route::post('/get-caregiver-list','App\Http\Controllers\CaregiverController@getCaregiverDetail')->name('clinician.caregiver.ajax');
    });
    Route::post('/ccm/getAll','App\Http\Controllers\UserDeviceController@getAll')->name('clinician.ccm.ajax');
    Route::get('/ccm/{id}','App\Http\Controllers\UserDeviceController@edit');
    Route::get('/ccm/getnote/{id}', [UserDeviceController::class, 'show']);
    Route::resource('ccm', UserDeviceController::class)->only(['index', 'update']);

    Route::post('/changePatientStatus','App\Http\Controllers\CaregiverController@updatePatientStatus')->name('caregiver.changePatientStatus');
    // Route::post('/download-lab-report','App\Http\Controllers\CaregiverController@downloadLabReport')->name('caregiver.downloadLabReport');
    Route::get('download-lab-report/{user_id}', 'App\Http\Controllers\CaregiverController@downloadLabReport')->name('caregiver.downloadLabReport');
    // Route::get('add-patient', 'App\Http\Controllers\PatientReferralController@addPatient')->name('referral.add-patient');
    Route::post('/get-due-detail','App\Http\Controllers\CaregiverController@getDueDetail')->name('clinician.due-detail.ajax');
    
    Route::get('/get-due-detail','App\Http\Controllers\CaregiverController@duePatientView')->name('clinician.due-detail');
    Route::post('/get-patient-due-detail','App\Http\Controllers\CaregiverController@getDuePatients')->name('clinician.due-patient-detail.ajax');
    Route::get('/get-patient-due-detail/{id}', 'App\Http\Controllers\CaregiverController@getDuePatientDetail');
    Route::post('get-user-data','App\Http\Controllers\CaregiverController@getUserData')->name('clinician.get-user-data');
    Route::get('get-city-data/{id?}','App\Http\Controllers\CaregiverController@getCityData')->name('get-city-data');
    Route::post('get-city/{id?}','App\Http\Controllers\CaregiverController@getCity')->name('get-city');
    Route::post('get-city-data','App\Http\Controllers\CaregiverController@getSelectCityData')->name('get-city-data');
    Route::get('get-state-data/{id?}','App\Http\Controllers\CaregiverController@getStateData')->name('get-state-data');

    Route::post('get-state-data','App\Http\Controllers\CaregiverController@getSelectStateData')->name('get-state-data');

    // Route::get('/search-caregivers','App\Http\Controllers\Admin\HHAExchangeController@searchCaregivers')->name('search-caregivers');
    Route::resource('hha-exchange','App\Http\Controllers\Admin\HHAExchangeController');

    // Convert Address to Lat-Long
    Route::get('lat-long','App\Http\Controllers\HomeController@convertLatLongFromAddress');

    Route::post('get-document', 'App\Http\Controllers\Clinician\ClinicianController@getDocument')->name('clinician.getDocument');
    Route::get('download-document/{user_id}', 'App\Http\Controllers\Clinician\ClinicianController@downloadDocument')->name('clinician.downloadDocument');

  
    Route::get('{role}/patient/create', 'App\Http\Controllers\patient\PatientController@create')->name('patient.create');
    Route::resource('patient', 'App\Http\Controllers\patient\PatientController');

    
    Route::get('import-patient-from-hha','App\Http\Controllers\Admin\PatientImportController@importPatient');
    Route::get('import-caregiver-from-hha','App\Http\Controllers\Admin\PatientImportController@importCaregiver');
    Route::get('import-visitor-from-hha','App\Http\Controllers\Admin\PatientImportController@importVisitor');
    Route::get('confirmVisits','App\Http\Controllers\Admin\PatientImportController@confirmVisits');
    

    Route::post('/insurance/store', 'App\Http\Controllers\InsuranceController@store')->name('insurance.store');

    Route::get('/call-view', 'App\Http\Controllers\VoiceController@index')->name('call-view');
    Route::post('/call', 'App\Http\Controllers\VoiceController@initiateCall')->name('initiate_call');


   // Route::get('/index', 'App\Http\Controllers\call\CallController@index');
    Route::get('/call-view-new', 'App\Http\Controllers\call\CallController@index');
    Route::post('/voice','App\Http\Controllers\call\CallController@voice');
    Route::post('/token','App\Http\Controllers\call\CallController@token');
    Route::get('visitor','App\Http\Controllers\VisitorController@index');

    Route::get('visitor','App\Http\Controllers\VisitorController@index');

    Route::resource('care-team', CareTeamController::class);
