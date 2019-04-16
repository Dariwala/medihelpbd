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

Route::group(['prefix' => 'homeopathic'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeopathicController@index');

    Route::get('/add', 'HomeopathicController@viewAddHomeopathic');
    Route::get('/add/{id}', 'HomeopathicController@viewAddHomeopathicById');
    Route::post('/add', 'HomeopathicController@postAddHomeopathic');

    Route::get('/view/{id}', 'HomeopathicController@viewHomeopathic');


    Route::get('/delete/{id}', 'HomeopathicController@deleteHomeopathic');

    Route::get('/edit/info/{id}', 'HomeopathicController@viewEditHomeopathic');
    Route::get('/edit/about/{id}', 'HomeopathicController@viewEditHomeopathic');

    Route::get('/edit/product/add/{id}', 'HomeopathicProdutController@viewAddHomeopathicProduct');
    Route::post('/edit/product/add/{id}', 'HomeopathicProdutController@postAddHomeopathicProduct');
    Route::get('/edit/product/edit/{id}/{homeopathic_id}', 'HomeopathicProdutController@viewEditHomeopathicProduct');
    Route::post('/edit/product/edit/{id}/{homeopathic_id}', 'HomeopathicProdutController@postEditHomeopathicProduct');
    Route::get('/edit/product/delete/{id}', 'HomeopathicProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'HomeopathicDoctorController@getHomeopathicDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'HomeopathicDoctorController@postHomeopathicDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'HomeopathicDoctorController@getHomeopathicDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'HomeopathicDoctorController@postHomeopathicDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'HomeopathicDoctorController@HomeopathicDoctorDelete');
    
    
    //Homeopathic Services
    
    Route::get('/edit/service/add/{id}', 'HomeopathicServiceController@getHomeopathicServiceAdd');
    Route::post('/edit/service/add/{id}', 'HomeopathicServiceController@postHomeopathicServiceAdd');
    Route::get('/edit/service/edit/{id}', 'HomeopathicServiceController@getHomeopathicServiceEdit');
    Route::post('/edit/service/edit/{id}', 'HomeopathicServiceController@postHomeopathicServiceEdit');
    Route::get('/edit/service/delete/{id}', 'HomeopathicServiceController@HomeopathicServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'HomeopathicNoticeController@getHomeopathicNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'HomeopathicNoticeController@postHomeopathicNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'HomeopathicNoticeController@getHomeopathicNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'HomeopathicNoticeController@postHomeopathicNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'HomeopathicNoticeController@HomeopathicNoticeDelete');



    Route::post('/edit/info/{id}', 'HomeopathicController@postInfoEditHomeopathic');
    Route::post('/edit/about/{id}', 'HomeopathicController@postAboutEditHomeopathic');    // for api
    Route::get('/api/phone/{id}', 'HomeopathicController@getHomeopathicPhone');
    Route::get('/api/email/{id}', 'HomeopathicController@getHomeopathicEmail');

});

    Route::get('/homeopathic-product/api/list/{id1}', 'HomeopathicProdutController@getHomeopathicProduct');

    Route::get('/homeopathic-doctor/api/list/{id1}/{id2}', 'HomeopathicDoctorController@getHomeopathicDoctor');
    
    Route::get('/homeopathic-service/api/list/{id}/{id2}', 'HomeopathicServiceController@getHomeopathicService');
});
