<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/clinician','middleware'=>['role:clinician','check']],function (){

    Route::group(['middleware'=>['auth']],function (){
        Route::get('/','\App\Http\Controllers\Clincian\DashboardController@index')->name('clinician.dashboard');
        Route::get('/patient-list','\App\Http\Controllers\Clincian\PatientController@index')->name('clinician.patientList');
        Route::get('/new-patient-list','\App\Http\Controllers\Clincian\PatientController@newPatientRquest')->name('clinician.new.patientList');
        Route::get('/scheduled-appointment','\App\Http\Controllers\Clincian\PatientController@scheduleAppointmentRquest')->name('clinician.scheduleAppoimentList');
        Route::get('/cancelled-appointment','\App\Http\Controllers\Clincian\PatientController@cancelAppointmentRquest')->name('clinician.cancelAppointmentRquest');
        Route::get('/scheduled-appointment-ajax','\App\Http\Controllers\Clincian\PatientController@scheduleAppoimentList')->name('clinician.scheduleAppoimentList.ajax');
        Route::get('/cancel-appointment-ajax','\App\Http\Controllers\Clincian\PatientController@cancelAppoimentList')->name('clinician.cancelAppoimentList.ajax');
        Route::post('/change-appointment-status','\App\Http\Controllers\Clincian\PatientController@changeAppointmentStatus')->name('clinician.changeAppointmentStatus.ajax');
        Route::get('/get-near-by-clinician-list/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@getNearByClinicianList')->name('clinician.getNearByClinicianList');
        Route::post('/changePatientStatus','\App\Http\Controllers\Clincian\PatientController@changePatientStatus')->name('clinician.changePatientStatus');
        Route::get('/getPatientList','\App\Http\Controllers\Clincian\PatientController@getPatientList')->name('clinician.patientList.ajax');
        Route::get('/getNewPatientList','\App\Http\Controllers\Clincian\PatientController@getNewPatientList')->name('clinician.new.patientList.ajax');
        Route::get('/roadl','\App\Http\Controllers\Clincian\RoadLController@index')->name('clinician.roadl');
        Route::get('/start-roadl/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@startRoadLRequest')->name('clinician.start.roadl');
        Route::get('/running-roadl/{patient_request_id}','\App\Http\Controllers\Clincian\RoadLController@runningRoadLRequest')->name('clinician.start.running');
        Route::post('/patient-request-list','\App\Http\Controllers\Clincian\RoadLController@getPatientRequestList')->name('clinician.roadl.patientRequestList');
        Route::post('/patient-roladl-proccess','\App\Http\Controllers\Clincian\RoadLController@getRoadLProccess')->name('clinician.roadl.process');
        Route::get("/room/{id}", '\App\Http\Controllers\Clincian\RoomController@showClassRoom')
            ->where('id', '[0-9]+')
            ->name('room');
        Route::post('/start-meeting','\App\Http\Controllers\Clincian\RoomController@sendVideoMeetingNotification')->name('start.meeting');
        Route::get('/end-meeting/{appointment_id}','\App\Http\Controllers\Clincian\RoomController@leaveVideoMetting')->name('leave.meeting');
        Route::get('/start-call/{patient_request_id}','\App\Http\Controllers\Clincian\RoomController@startVideoMeetingNotification')->name('start.call');
        Route::get('/zoom-meeting','\App\Http\Controllers\Clincian\RoomController@index')->name('start.zoom');
        Route::post('/patient-request','\App\Http\Controllers\Clincian\PatientController@patientRequest')->name('patient.request');
        Route::get('/patient-detail/{patient_id}','\App\Http\Controllers\PatientController@getPatientDetail')->name('patient.detail');
        Route::post('/add-insurance','\App\Http\Controllers\PatientController@addInsurance')->name('patient.addInsurance');
    });
});
