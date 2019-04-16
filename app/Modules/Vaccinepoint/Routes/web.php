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

Route::group(['prefix' => 'vaccine-point'], function () {

    Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', 'VaccinePointController@index');

    Route::get('/add', 'VaccinePointController@viewAddVaccinePoint');
    Route::get('/add/{id}', 'VaccinePointController@viewAddVaccinePointById');
    Route::post('/add', 'VaccinePointController@postAddVaccinePoint');

    Route::get('/view/{id}', 'VaccinePointController@viewVaccinePoint');



    Route::get('/edit/info/{id}', 'VaccinePointController@viewEditVaccinePoint');
    Route::get('/edit/about/{id}', 'VaccinePointController@viewEditVaccinePoint');
    Route::get('/edit/service/{id}', 'VaccinePointController@viewEditVaccinePoint');
    Route::get('/edit/notice/{id}', 'VaccinePointController@viewEditVaccinePoint');

    Route::get('/edit/service/add/{id}', 'VaccinePointServiceController@getVaccinePointServiceAdd');
    Route::post('/edit/service/add/{id}', 'VaccinePointServiceController@postVaccinePointServiceAdd');

    Route::get('/edit/service/edit/{id}', 'VaccinePointServiceController@getVaccinePointServiceEdit');
    Route::post('/edit/service/edit/{id}', 'VaccinePointServiceController@postVaccinePointServiceEdit');

    Route::get('/edit/service/delete/{id}', 'VaccinePointServiceController@VaccinePointServiceDelete');



    Route::get('/edit/notice/add/{id}', 'VaccinePointNoticeController@getVaccinePointNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'VaccinePointNoticeController@postVaccinePointNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'VaccinePointNoticeController@getVaccinePointNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'VaccinePointNoticeController@postVaccinePointNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'VaccinePointNoticeController@VaccinePointNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'VaccinePointDoctorController@getVaccinePointDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'VaccinePointDoctorController@postVaccinePointDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'VaccinePointDoctorController@getVaccinePointDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'VaccinePointDoctorController@postVaccinePointDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'VaccinePointDoctorController@VaccinePointDoctorDelete');



    Route::post('/edit/info/{id}', 'VaccinePointController@postInfoEditVaccinePoint');
    Route::post('/edit/about/{id}', 'VaccinePointController@postAboutEditVaccinePoint');
    Route::post('/edit/service/{id}', 'VaccinePointController@postServiceVaccinePoint');
    Route::post('/edit/notice/{id}', 'VaccinePointController@postEditVaccinePoint');

    Route::get('/delete/{id}', 'VaccinePointController@deleteVaccinePoint');

});


    // for api
    Route::get('/vaccine-point-service/api/list/{id}/{id2}', 'VaccinePointController@getVaccinePointService');

    Route::get('/vaccine-point-doctor/api/list/{id}/{id2}', 'VaccinePointController@getVaccinePointDoctor');

    Route::get('/api/phone/{id}', 'VaccinePointController@getVaccinePointPhone');
    Route::get('/api/email/{id}', 'VaccinePointController@getVaccinePointEmail');



});
