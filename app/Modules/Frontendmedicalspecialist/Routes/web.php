<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'frontendmedicalspecialist'], function () {
    Route::get('/view/{id1}/{id2}', 'FrontendMedicalSpecialistController@viewMedicalSpecialist');
    Route::post('/chamber-search/{id1}/{id2}', 'FrontendMedicalSpecialistController@chamberSearch');
    Route::get('/chamber-search/{id1}/{id2}', 'FrontendMedicalSpecialistController@viewMedicalSpecialist');
    
    Route::get('/morning_appointment/{id}/{date}/{chamber_id}', 'FrontendMedicalSpecialistController@morning_appointment_pdf')->name('morning_appointment_pdf');
    Route::get('/evening_appointment/{id}/{date}/{chamber_id}', 'FrontendMedicalSpecialistController@evening_appointment_pdf')->name('evening_appointment_pdf');

    Route::get('/view/{id}', 'FrontendMedicalSpecialistController@viewMedicalSpecialistByid');
    Route::post('/appointment_booking/{doctor_id}/{subdistrict_id}', 'FrontendMedicalSpecialistController@appointmentBooking');
    Route::get('/appointment_booking', 'FrontendMedicalSpecialistController@viewMedicalSpecialist');
});
