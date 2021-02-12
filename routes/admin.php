<?php
use Illuminate\Support\Facades\Route;

// Admin Route
Route::group(['prefix'=>'/admin','middleware'=>['auth','role:admin']],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::get('/roles', function () {
        return view('pages.admin.roles');
    })->name('admin.roles');


    /*Route::get('/employee', function () {
        return view('pages.admin.employee');
    })->name('admin.employee');*/
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
    Route::post('/add-insurance','\App\Http\Controllers\PatientController@addInsurance')->name('patient.addInsurance');
    Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('admin.employee');
    Route::get('/employee-add', 'App\Http\Controllers\EmployeeController@employeeAdd')->name('admin.employee-add');
    Route::post('/employee-store', 'App\Http\Controllers\EmployeeController@employeeStore')->name('admin.employee-store');
    Route::post('/employee-work', 'App\Http\Controllers\EmployeeController@employeeWork')->name('admin.employee-work');
    Route::get('/employee-view/{id}', 'App\Http\Controllers\EmployeeController@profile')->name('admin.employee-view');
    Route::get('/employee-remove/{id}', 'App\Http\Controllers\EmployeeController@removeEmployee')->name('admin.employee-remove');

    /*Route::get('/admin/referral-profile', function () {
        return view('pages.admin.referral-profile');
    });*/

    Route::get('/referral-approval', 'App\Http\Controllers\CompanyController@index')->name('admin.referral.approval');
    Route::get('/referral-active', 'App\Http\Controllers\CompanyController@active')->name('admin.referral.active');
    Route::get('/referral-rejected', 'App\Http\Controllers\CompanyController@rejected')->name('admin.referral.rejected');
    Route::post('/referral-status', 'App\Http\Controllers\CompanyController@updateStatus')->name('admin.updateStatus');
    Route::get('/referral-profile/{id}', 'App\Http\Controllers\CompanyController@profile');
    Route::post('/referral-profile-update', 'App\Http\Controllers\CompanyController@updateProfile')->name('admin.updateProfile');
    Route::post('/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.dashboard');
    Route::get('/', function (){
        return redirect()->route('admin.dashboard');
    })->name('admin.home');

//    Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');

    Route::get('clinician','App\Http\Controllers\Clinician\ClinicianController@clinician')->name('admin.clinician');
    Route::get('clinician-list','App\Http\Controllers\Clinician\ClinicianController@getClinicianList')->name('admin.clinician-list');
    Route::get('clinician-detail/{id}','App\Http\Controllers\Clinician\ClinicianController@getClinicianDetail')->name('admin.clinician-detail');

    // service payment details insert / update
    Route::post('/service-payment-insert-update', 'App\Http\Controllers\CompanyController@insertUpdateServicePayment')->name('admin.insertUpdateServicePayment');

    /* roles and permissions route */
    Route::get('roles-permissions','App\Http\Controllers\RolesAndPermission\RolesAndPermissionController@view')->name('admin.rolesAndPermission');
    Route::post('/get-roles-permissions', 'App\Http\Controllers\RolesAndPermission\RolesAndPermissionController@getRolePermission')->name('admin.getRolePermission');
    Route::post('roles-permissions-save','App\Http\Controllers\RolesAndPermission\RolesAndPermissionController@save')->name('admin.rolesAndPermissionSave');

});
