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

Route::group(['prefix' => 'optical'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'OpticalController@index');

    Route::get('/add', 'OpticalController@viewAddOptical');
    Route::get('/add/{id}', 'OpticalController@viewAddOpticalById');
    Route::post('/add', 'OpticalController@postAddOptical');

    Route::get('/view/{id}', 'OpticalController@viewOptical');


    Route::get('/delete/{id}', 'OpticalController@deleteOptical');

    Route::get('/edit/info/{id}', 'OpticalController@viewEditOptical');
    Route::get('/edit/about/{id}', 'OpticalController@viewEditOptical');

    Route::get('/edit/product/add/{id}', 'OpticalProdutController@viewAddOpticalProduct');
    Route::post('/edit/product/add/{id}', 'OpticalProdutController@postAddOpticalProduct');
    Route::get('/edit/product/edit/{id}/{optical_id}', 'OpticalProdutController@viewEditOpticalProduct');
    Route::post('/edit/product/edit/{id}/{optical_id}', 'OpticalProdutController@postEditOpticalProduct');
    Route::get('/edit/product/delete/{id}', 'OpticalProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'OpticalDoctorController@getOpticalDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'OpticalDoctorController@postOpticalDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'OpticalDoctorController@getOpticalDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'OpticalDoctorController@postOpticalDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'OpticalDoctorController@OpticalDoctorDelete');
    
    
    //Optical Services
    
    Route::get('/edit/service/add/{id}', 'OpticalServiceController@getOpticalServiceAdd');
    Route::post('/edit/service/add/{id}', 'OpticalServiceController@postOpticalServiceAdd');
    Route::get('/edit/service/edit/{id}', 'OpticalServiceController@getOpticalServiceEdit');
    Route::post('/edit/service/edit/{id}', 'OpticalServiceController@postOpticalServiceEdit');
    Route::get('/edit/service/delete/{id}', 'OpticalServiceController@OpticalServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'OpticalNoticeController@getOpticalNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'OpticalNoticeController@postOpticalNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'OpticalNoticeController@getOpticalNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'OpticalNoticeController@postOpticalNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'OpticalNoticeController@OpticalNoticeDelete');



    Route::post('/edit/info/{id}', 'OpticalController@postInfoEditOptical');
    Route::post('/edit/about/{id}', 'OpticalController@postAboutEditOptical');    // for api
    Route::get('/api/phone/{id}', 'OpticalController@getOpticalPhone');
    Route::get('/api/email/{id}', 'OpticalController@getOpticalEmail');

});

    Route::get('/optical-product/api/list/{id1}', 'OpticalProdutController@getOpticalProduct');

    Route::get('/optical-doctor/api/list/{id1}/{id2}', 'OpticalDoctorController@getOpticalDoctor');
    
    Route::get('/optical-service/api/list/{id}/{id2}', 'OpticalServiceController@getOpticalService');
});
