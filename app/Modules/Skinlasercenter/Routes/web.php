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

Route::group(['prefix' => 'skin-laser-center'], function () {

    Route::group(['middleware' => 'auth'], function () {
    
	Route::get('/', 'SkinLaserCenterController@index');

    Route::get('/add', 'SkinLaserCenterController@viewAddSkinLaserCenter');
    Route::get('/add/{id}', 'SkinLaserCenterController@viewAddSkinLaserCenterById');
    Route::post('/add', 'SkinLaserCenterController@postAddSkinLaserCenter');

    Route::get('/view/{id}', 'SkinLaserCenterController@viewSkinLaserCenter');


    Route::get('/edit/info/{id}', 'SkinLaserCenterController@viewEditSkinLaserCenter');
    Route::get('/edit/about/{id}', 'SkinLaserCenterController@viewEditSkinLaserCenter');
    Route::get('/edit/service/{id}', 'SkinLaserCenterController@viewEditSkinLaserCenter');
    Route::get('/edit/notice/{id}', 'SkinLaserCenterController@viewEditSkinLaserCenter');

    Route::get('/edit/service/add/{id}', 'SkinLaserCenterServiceController@getSkinLaserCenterServiceAdd');
    Route::post('/edit/service/add/{id}', 'SkinLaserCenterServiceController@postSkinLaserCenterServiceAdd');

    Route::get('/edit/service/edit/{id}', 'SkinLaserCenterServiceController@getSkinLaserCenterServiceEdit');
    Route::post('/edit/service/edit/{id}', 'SkinLaserCenterServiceController@postSkinLaserCenterServiceEdit');

    Route::get('/edit/service/delete/{id}', 'SkinLaserCenterServiceController@SkinLaserCenterServiceDelete');



    Route::get('/edit/notice/add/{id}', 'SkinLaserCenterNoticeController@getSkinLaserCenterNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'SkinLaserCenterNoticeController@postSkinLaserCenterNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'SkinLaserCenterNoticeController@getSkinLaserCenterNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'SkinLaserCenterNoticeController@postSkinLaserCenterNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'SkinLaserCenterNoticeController@SkinLaserCenterNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'SkinLaserCenterDoctorController@getSkinLaserCenterDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'SkinLaserCenterDoctorController@postSkinLaserCenterDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'SkinLaserCenterDoctorController@getSkinLaserCenterDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'SkinLaserCenterDoctorController@postSkinLaserCenterDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'SkinLaserCenterDoctorController@SkinLaserCenterDoctorDelete');



    Route::post('/edit/info/{id}', 'SkinLaserCenterController@postInfoEditSkinLaserCenter');
    Route::post('/edit/about/{id}', 'SkinLaserCenterController@postAboutEditSkinLaserCenter');
    Route::post('/edit/service/{id}', 'SkinLaserCenterController@postServiceSkinLaserCenter');
    Route::post('/edit/notice/{id}', 'SkinLaserCenterController@postEditSkinLaserCenter');



    Route::get('/delete/{id}', 'SkinLaserCenterController@deleteSkinLaserCenter');

});

    // for api
    Route::get('/skin-laser-center-service/api/list/{id}/{id2}', 'SkinLaserCenterController@getSkinLaserCenterService');

    Route::get('/skin-laser-center-doctor/api/list/{id}/{id2}', 'SkinLaserCenterController@getSkinLaserCenterDoctor');

    Route::get('/api/phone/{id}', 'SkinLaserCenterController@getSkinLaserCenterPhone');
    Route::get('/api/email/{id}', 'SkinLaserCenterController@getSkinLaserCenterEmail');

});
