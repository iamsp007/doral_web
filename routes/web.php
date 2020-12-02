<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Clincian Route



Route::get('/', function () {
    return view('pages.login');
});


Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});

// Login / Register
Route::post('companyregister', 'App\Http\Controllers\CompanyController@store');
Route::post('companylogin', 'App\Http\Controllers\CompanyController@login');
Route::post('companyresetpassword', 'App\Http\Controllers\CompanyController@resetpassword');

// Email Template Route
Route::get('emaillist', 'App\Http\Controllers\EmailTemplateController@index');

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/resetpassword', function () {
    return view('pages.resetpassword');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Panel
Route::get('/admin/', function () {
    return view('pages.admin.login');
});

Route::get('/admin/roles', function () {
    return view('pages.admin.roles');
});

Route::get('/admin/employee', function () {
    return view('pages.admin.employee');
});

Route::get('admin/employee-add', 'App\Http\Controllers\EmployeeController@index');

/*Route::get('/admin/referral-profile', function () {
    return view('pages.admin.referral-profile');
});*/

Route::get('/admin/referral-approval', 'App\Http\Controllers\CompanyController@index');
Route::post('/admin/referral-status', 'App\Http\Controllers\CompanyController@updateStatus');
Route::get('/admin/referral-profile/{id}', 'App\Http\Controllers\CompanyController@profile');
Route::post('/admin/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index');

Route::get('/admin/logout', 'App\Http\Controllers\Admin\HomeController@logout');
Route::get('/referral/logout', 'App\Http\Controllers\Admin\HomeController@logout');


// Referral Panel
Route::get('/referral/dashboard', function () {
    return view('pages.referral.dashboard');
});

Route::get('/referral/vbc', 'App\Http\Controllers\PatientReferralController@vbc');
Route::get('/referral/vbc-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@vbcUploadBulk');
Route::get('/referral/md-order', 'App\Http\Controllers\PatientReferralController@mdOrder');
Route::get('/referral/md-order-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@mdOrderUploadBulk');
Route::get('/referral/employee-pre-physical', 'App\Http\Controllers\PatientReferralController@employeePrePhysical');
Route::get('/referral/employee-pre-physical-upload-bulk-data', 'App\Http\Controllers\PatientReferralController@employeePrePhysicalUploadBulk');

/*Route::get('/referral/employee-pre-physical', function () {
    return view('pages.referral.employee-pre-physical');
});*/

//Route::get('/caregiver/1', function () {
//    return view('pages.caregiver');
//});
Route::get('/caregiver/1', 'App\Http\Controllers\Admin\HomeController@caregiverResponse');
Route::get('/caregiver/2', 'App\Http\Controllers\Admin\HomeController@clinicianResponse');
Route::get('/caregiver/3', 'App\Http\Controllers\Admin\HomeController@caregiverforGluco');
Route::get('/caregiver/4', 'App\Http\Controllers\Admin\HomeController@caregiverforGlucoHigh');
Route::post('/caregiverResponseSubmit', 'App\Http\Controllers\Admin\HomeController@caregiverResponseSubmit');


# Referral-Patient api
Route::post('/referral/vbc-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
Route::post('/referral/md-order-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');
Route::post('/referral/employee-pre-physical-upload-bulk-data-store', 'App\Http\Controllers\PatientReferralController@store');


Route::group(['prefix'=>'/clinician'],function (){
    \Illuminate\Support\Facades\Auth::routes();
    Route::group(['middleware'=>['auth','CheckRoleMiddleWare:clinician']],function (){
        Route::get('/','\App\Http\Controllers\Clincian\DashboardController@index')->name('clinician.dashboard');
        Route::get('/patient-list','\App\Http\Controllers\Clincian\PatientController@index')->name('clinician.patientList');
        Route::get('/new-patient-list','\App\Http\Controllers\Clincian\PatientController@newPatientRquest')->name('clinician.new.patientList');
        Route::post('/changePatientStatus','\App\Http\Controllers\Clincian\PatientController@changePatientStatus')->name('clinician.changePatientStatus');
        Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('clinician.patientList.ajax');
        Route::get('/getNewPatientList','\App\Http\Controllers\Clincian\PatientController@getNewPatientList')->name('clinician.new.patientList.ajax');
        Route::get('/roadl','\App\Http\Controllers\Clincian\RoadLController@index')->name('clinician.roadl');
        Route::get('/start-roadl','\App\Http\Controllers\Clincian\RoadLController@startRoadLRequest')->name('clinician.start.roadl');
        Route::post('/patient-request-list','\App\Http\Controllers\Clincian\RoadLController@getPatientRequestList')->name('clinician.roadl.patientRequestList');
    });
});

// Admin Route
Route::group(['prefix'=>'/admin'],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::group(['middleware'=>['auth','CheckRoleMiddleWare:admin']],function (){
        Route::get('/','\App\Http\Controllers\Clincian\DashboardController@index')->name('admin.dashboard');
        Route::get('/patient-list','\App\Http\Controllers\Clincian\PatientController@index')->name('admin.patientList');
        Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('admin.patientList.ajax');
        Route::get('/roadl','\App\Http\Controllers\Clincian\DashboardController@index')->name('admin.roadl');
    });
});
