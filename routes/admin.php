<?php
use Illuminate\Support\Facades\Route;

// Admin Route
Route::group(['prefix'=>'/admin','middleware'=>['auth:web','role:admin']],function (){
    Route::get('/roles', function () {
        return view('pages.admin.roles');
    })->name('admin.roles');

    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
    Route::post('/add-insurance','\App\Http\Controllers\PatientController@addInsurance')->name('patient.addInsurance');
    Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('admin.employee');
    Route::get('/employee-add', 'App\Http\Controllers\EmployeeController@employeeAdd')->name('admin.employee-add');
    Route::post('/employee-store', 'App\Http\Controllers\EmployeeController@employeeStore')->name('admin.employee-store');
    Route::post('/employee-work', 'App\Http\Controllers\EmployeeController@employeeWork')->name('admin.employee-work');
    Route::get('/employee-view/{id}', 'App\Http\Controllers\EmployeeController@profile')->name('admin.employee-view');
    Route::get('/employee-remove/{id}', 'App\Http\Controllers\EmployeeController@removeEmployee')->name('admin.employee-remove');

    /** Referral Section Route Start */
    Route::get('/referral/{status}', 'App\Http\Controllers\CompanyController@index')->name('admin.referral.approval');
    Route::post('/referral-approval-list', 'App\Http\Controllers\CompanyController@getReferralApprovalList')->name('admin.referral.approval.list');
    Route::post('/referral-status', 'App\Http\Controllers\CompanyController@updateStatus')->name('admin.updateStatus');
    Route::get('/referral-profile/{id}', 'App\Http\Controllers\CompanyController@profile');
    Route::post('/referral-profile-update', 'App\Http\Controllers\CompanyController@updateProfile')->name('admin.updateProfile');
    Route::post('/referral-data-get', 'App\Http\Controllers\CompanyController@getReferralData')->name('admin.referral.data');
    Route::post('/service-payment-insert-update', 'App\Http\Controllers\CompanyController@insertUpdateServicePayment')->name('admin.insertUpdateServicePayment');
    /** Referral Section Route Start */

    Route::post('/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.dashboard');
    Route::get('/', function (){
        return redirect()->route('admin.dashboard');
    })->name('admin.home');

    /** Clinician Section Route Start */
    Route::get('clinician/{status}','App\Http\Controllers\Clinician\ClinicianController@index')->name('admin.clinician');
    Route::post('clinician-list','App\Http\Controllers\Clinician\ClinicianController@getList')->name('admin.clinician-list');
    Route::post('clinician-data-get','App\Http\Controllers\Clinician\ClinicianController@getClinicianData')->name('admin.clinician-data-get');
    Route::get('clinician-detail/{id}','App\Http\Controllers\Clinician\ClinicianController@getClinicianDetail')->name('admin.clinician-detail');
    Route::get('/clinician-approval/{id}/detail','\App\Http\Controllers\Clinician\ClinicianController@clinicianInfo')->name('clinician.info');
    /** Clinician Section Route end */
  
    Route::post('send-address-notification', 'App\Http\Controllers\NotificationController@store')->name('notification.send');
    
    Route::get('/calendar','\App\Http\Controllers\Clinician\PatientController@calendarAppoimentListData')->name('clinician.calendar');
    Route::get('/partner/profile/{id}', 'App\Http\Controllers\Partner\PartnerController@profile')->name('partner.profile');
    Route::post('/partner/status', '\App\Http\Controllers\Partner\PartnerController@updateStatus')->name('partner.status');
    Route::post('get-user-data','App\Http\Controllers\Partner\PartnerController@getUserData')->name('partner.get-user-data');
    Route::post('/partner/getList','\App\Http\Controllers\Partner\PartnerController@getList')->name('partner.getList');
    Route::get('/partner/{slug}', 'App\Http\Controllers\Partner\PartnerController@index');
   
    Route::get('/partner/resend/{id}', '\App\Http\Controllers\Employee\EmployeeController@resendEmail');

});

