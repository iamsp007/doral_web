<?php
Route::group(['prefix'=>'admin'],function (){
    Route::get('/login','App\Http\Controllers\Auth\AdminController@showLoginForm')->name('admin.login');
    Route::post('/login','App\Http\Controllers\Auth\AdminController@login')->name('admin.login');
    Route::get('/register','App\Http\Controllers\Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register','App\Http\Controllers\Auth\AdminRegisterController@register')->name('admin.register');

    Route::group(['middleware'=>['auth:sanctum']],function (){
        Route::get('/', function () {
            return view('pages.admin.login');
        });

        Route::get('/roles', function () {
            return view('pages.admin.roles');
        });

        Route::get('/employee', function () {
            return view('pages.admin.employee');
        });

        Route::get('/employee-add', 'App\Http\Controllers\EmployeeController@index');

        /*Route::get('/admin/referral-profile', function () {
            return view('pages.admin.referral-profile');
        });*/

        Route::get('/referral-approval', 'App\Http\Controllers\CompanyController@index');
        Route::post('/referral-status', 'App\Http\Controllers\CompanyController@updateStatus');
        Route::get('/referral-profile/{id}', 'App\Http\Controllers\CompanyController@profile');
        Route::post('/loginaccess', 'App\Http\Controllers\Admin\HomeController@login');
        Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index');

        Route::get('/logout', 'App\Http\Controllers\Admin\HomeController@logout');

    });
});
