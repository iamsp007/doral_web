<?php

use App\Http\Controllers\Clinician\ClinicianController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/clinician','middleware'=>['auth:web','role:clinician']],function (){

    Route::get('/','\App\Http\Controllers\Clinician\DashboardController@index')->name('clinician.dashboard');
    Route::get('/patient-list','\App\Http\Controllers\Clinician\PatientController@index')->name('clinician.patientList');
    Route::get('/new-patient-list','\App\Http\Controllers\Clinician\PatientController@newPatientRquest')->name('clinician.new.patientList');
    Route::get('/scheduled-appointment','\App\Http\Controllers\Clinician\PatientController@scheduleAppointmentRquest')->name('clinician.scheduleAppoimentList');
    Route::get('/cancelled-appointment','\App\Http\Controllers\Clinician\PatientController@cancelAppointmentRquest')->name('clinician.cancelAppointmentRquest');
    Route::get('/scheduled-appointment-ajax','\App\Http\Controllers\Clinician\PatientController@scheduleAppoimentList')->name('clinician.scheduleAppoimentList.ajax');
    Route::post('/scheduled-appointment-ajax-data','\App\Http\Controllers\Clinician\PatientController@scheduleAppoimentListData')->name('clinician.scheduleAppoimentList.ajax-data');
    Route::get('/cancel-appointment-ajax','\App\Http\Controllers\Clinician\PatientController@cancelAppoimentList')->name('clinician.cancelAppoimentList.ajax');

    Route::post('/cancel-appointment-ajax-data','\App\Http\Controllers\Clinician\PatientController@cancelAppoimentListData')->name('clinician.cancelAppoimentList.ajax-data');

    Route::post('/change-appointment-status','\App\Http\Controllers\Clinician\PatientController@changeAppointmentStatus')->name('clinician.changeAppointmentStatus.ajax');
    Route::get('/get-near-by-clinician-list/{patient_request_id}','\App\Http\Controllers\Clinician\RoadLController@getNearByClinicianList')->name('clinician.getNearByClinicianList');
    Route::post('/changePatientStatus','\App\Http\Controllers\Clinician\PatientController@changePatientStatus')->name('clinician.changePatientStatus');
    Route::get('/getPatientList','\App\Http\Controllers\Clinician\PatientController@getPatientList')->name('clinician.patientList.ajax');
    Route::get('/getNewPatientList','\App\Http\Controllers\Clinician\PatientController@getNewPatientList')->name('clinician.new.patientList.ajax');
    Route::post('/getNewPatientListData','\App\Http\Controllers\Clinician\PatientController@getNewPatientListData')->name('clinician.new.patientList.data');

    Route::post('/getPatientListData','\App\Http\Controllers\Clinician\PatientController@getPatientListData')->name('clinician.patientList.data');

    Route::get('/roadl','\App\Http\Controllers\Clinician\RoadLController@index')->name('clinician.roadl');
    Route::get('/start-roadl/{patient_request_id}','\App\Http\Controllers\Clinician\RoadLController@startRoadLRequest')->name('clinician.start.roadl');
    Route::get('/running-roadl/{patient_request_id}','\App\Http\Controllers\Clinician\RoadLController@runningRoadLRequest')->name('clinician.start.running');
    Route::post('/patient-request-list','\App\Http\Controllers\Clinician\RoadLController@getPatientRequestList')->name('clinician.roadl.patientRequestList');
    Route::post('/patient-roladl-proccess','\App\Http\Controllers\Clinician\RoadLController@getRoadLProccess')->name('clinician.roadl.process');
    Route::post('/update-drive-mode','\App\Http\Controllers\Clinician\RoadLController@updateDriveMode')->name('clinician.update-drive-mode');
    Route::get("/room/{id}", '\App\Http\Controllers\Clinician\RoomController@showClassRoom')
        ->where('id', '[0-9]+')
        ->name('room');
    Route::post('/start-meeting','\App\Http\Controllers\Clinician\RoomController@sendVideoMeetingNotification')->name('start.meeting');
    Route::get('/end-meeting/{appointment_id}','\App\Http\Controllers\Clinician\RoomController@leaveVideoMetting')->name('leave.meeting');
    Route::get('/start-call/{patient_request_id}','\App\Http\Controllers\Clinician\RoomController@startVideoMeetingNotification')->name('start.call');
    Route::get('/zoom-meeting','\App\Http\Controllers\Clinician\RoomController@index')->name('start.zoom');
    Route::post('/patient-request','\App\Http\Controllers\Clinician\PatientController@patientRequest')->name('patient.request');
    Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
    Route::post('/add-insurance','\App\Http\Controllers\PatientController@addInsurance')->name('patient.addInsurance');
    Route::get('/ccm-reading-level-high','\App\Http\Controllers\PatientController@ccmReadingLevelHigh')->name('patient.ccm-reading-level-high');
    Route::post('/appointments','\App\Http\Controllers\PatientController@appointments')->name('appointments');

    Route::get('/covid-19','\App\Http\Controllers\Clinician\PatientController@covid19')->name('clinician.covid-19');
    Route::get('/covid-19-patient-list','\App\Http\Controllers\Clinician\PatientController@covid19PatientList')->name('clinician.covid-19-patient-list');
    Route::get('/covid-19/{id}/detail','\App\Http\Controllers\Clinician\PatientController@covid19Info')->name('clinician.covid-19.info');
    Route::get('/covid-19/{id}/remove','\App\Http\Controllers\Clinician\PatientController@covid19Remove')->name('clinician.covid-19.remove');
    Route::post('/covid-19/send-email','\App\Http\Controllers\Clinician\PatientController@sendEmail')->name('clinician.covid-19.send-email');
    Route::post('/covid-19/send-message','\App\Http\Controllers\Clinician\PatientController@sendMessage')->name('clinician.covid-19.send-message');
    
    Route::get('/calendar','\App\Http\Controllers\Clinician\PatientController@calendarAppoimentListData')->name('clinician.calendar');

    Route::post('get-request-user','App\Http\Controllers\Clinician\RoadLController@getUserData')->name('clinician.get-request-user');

    Route::post('get-request-clinician','App\Http\Controllers\Clinician\RoadLController@getClinicianData')->name('clinician.get-request-clinician');

    Route::get('profile/{id}', [ClinicianController::class, 'profileView'])->name('clinician.profile');
    Route::post('update-profile', [ClinicianController::class, 'profileUpdate'])->name('clinician.edit.profile');
});
