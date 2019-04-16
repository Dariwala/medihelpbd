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

Route::group(['prefix' => 'blood-bank'], function () {

  Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'BloodBankController@index');

    Route::get('/add', 'BloodBankController@viewAddBloodBank');
    Route::get('/add/{id}', 'BloodBankController@viewAddBloodBankById');
    Route::post('/add', 'BloodBankController@postAddBloodBank');

    Route::get('/view/{id}', 'BloodBankController@viewBloodBank');

    Route::get('/delete/{id}', 'BloodBankController@deleteBloodBank');

    Route::get('/edit/info/{id}', 'BloodBankController@viewEditInfoBloodBank');
    
    Route::get('/edit/notice/{id}', 'BloodBankController@viewEditBloodBank');

    Route::get('/edit/service/add/{id}', 'BloodBankServiceController@getBloodBankServiceAdd');
    Route::post('/edit/service/add/{id}', 'BloodBankServiceController@postBloodBankServiceAdd');

    Route::get('/edit/service/edit/{id}', 'BloodBankServiceController@getBloodBankServiceEdit');
    Route::post('/edit/service/edit/{id}', 'BloodBankServiceController@postBloodBankServiceEdit');

    Route::get('/edit/service/delete/{id}', 'BloodBankServiceController@BloodBankServiceDelete');



    Route::get('/edit/notice/add/{id}', 'BloodBankNoticeController@getBloodBankNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'BloodBankNoticeController@postBloodBankNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'BloodBankNoticeController@getBloodBankNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'BloodBankNoticeController@postBloodBankNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'BloodBankNoticeController@BloodBankNoticeDelete');



    Route::post('/edit/info/{id}', 'BloodBankController@postInfoEditBloodBank');
    Route::post('/edit/about/{id}', 'BloodBankController@postAboutEditBloodBank');

    
    Route::get('/edit/doctor/add/{id}', 'BloodBankDoctorController@getBloodBankDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'BloodBankDoctorController@postBloodBankDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'BloodBankDoctorController@getBloodBankDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'BloodBankDoctorController@postBloodBankDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'BloodBankDoctorController@BloodBankDoctorDelete');

    // Route::get('/delete/{id}', 'BloodBankController@deleteBloodBank');

// for api

    Route::get('/api/phone/{id}', 'BloodBankController@getBloodBankPhone');
    Route::get('/api/email/{id}', 'BloodBankController@getBloodBankEmail');
 });
 
    Route::get('/blood-bank-doctor/api/list/{id}/{id2}', 'BloodBankController@getBloodBankDoctor');
    Route::get('/blood-bank-service/api/list/{id}/{id2}', 'BloodBankServiceController@getBloodBankService');

});
