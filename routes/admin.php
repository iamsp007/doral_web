<?php
use Illuminate\Support\Facades\Route;

// Admin Route
Route::group(['prefix'=>'/admin','middleware'=>['auth','check']],function (){
//    \Illuminate\Support\Facades\Auth::routes();
    Route::get('/roles', function () {
        return view('pages.admin.roles');
    })->name('admin.roles');


    /*Route::get('/employee', function () {
        return view('pages.admin.employee');
    })->name('admin.employee');*/

    Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('admin.employee');
    Route::get('/employee-add', 'App\Http\Controllers\EmployeeController@employeeAdd')->name('admin.employee-add');
    Route::post('/employee-store', 'App\Http\Controllers\EmployeeController@employeeStore')->name('admin.employee-store');
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
    Route::post('/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.dashboard');

//    Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');
});
