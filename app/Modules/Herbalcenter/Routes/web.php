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

Route::group(['prefix' => 'herbal-center'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HerbalCenterController@index');

    Route::get('/add', 'HerbalCenterController@viewAddHerbalCenter');
    Route::get('/add/{id}', 'HerbalCenterController@viewAddHerbalCenterById');
    Route::post('/add', 'HerbalCenterController@postAddHerbalCenter');

    Route::get('/view/{id}', 'HerbalCenterController@viewHerbalCenter');



    Route::get('/edit/info/{id}', 'HerbalCenterController@viewEditHerbalCenter');
    Route::get('/edit/about/{id}', 'HerbalCenterController@viewEditHerbalCenter');
    Route::get('/edit/service/{id}', 'HerbalCenterController@viewEditHerbalCenter');
    Route::get('/edit/notice/{id}', 'HerbalCenterController@viewEditHerbalCenter');

    Route::get('/edit/service/add/{id}', 'HerbalCenterServiceController@getHerbalCenterServiceAdd');
    Route::post('/edit/service/add/{id}', 'HerbalCenterServiceController@postHerbalCenterServiceAdd');

    Route::get('/edit/service/edit/{id}', 'HerbalCenterServiceController@getHerbalCenterServiceEdit');
    Route::post('/edit/service/edit/{id}', 'HerbalCenterServiceController@postHerbalCenterServiceEdit');

    Route::get('/edit/service/delete/{id}', 'HerbalCenterServiceController@HerbalCenterServiceDelete');


    Route::get('/edit/product/add/{id}', 'HerbalCenterProdutController@viewAddHerbalCenterProduct');
    Route::post('/edit/product/add/{id}', 'HerbalCenterProdutController@postAddHerbalCenterProduct');
    Route::get('/edit/product/edit/{id}/{herbal_center_id}', 'HerbalCenterProdutController@viewEditHerbalCenterProduct');
    Route::post('/edit/product/edit/{id}/{herbal_center_id}', 'HerbalCenterProdutController@postEditHerbalCenterProduct');
    Route::get('/edit/product/delete/{id}', 'HerbalCenterProdutController@destroy');

    

    Route::get('/edit/notice/add/{id}', 'HerbalCenterNoticeController@getHerbalCenterNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'HerbalCenterNoticeController@postHerbalCenterNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'HerbalCenterNoticeController@getHerbalCenterNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'HerbalCenterNoticeController@postHerbalCenterNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'HerbalCenterNoticeController@HerbalCenterNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'HerbalCenterDoctorController@getHerbalCenterDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'HerbalCenterDoctorController@postHerbalCenterDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'HerbalCenterDoctorController@getHerbalCenterDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'HerbalCenterDoctorController@postHerbalCenterDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'HerbalCenterDoctorController@HerbalCenterDoctorDelete');



    Route::post('/edit/info/{id}', 'HerbalCenterController@postInfoEditHerbalCenter');
    Route::post('/edit/about/{id}', 'HerbalCenterController@postAboutEditHerbalCenter');
    Route::post('/edit/service/{id}', 'HerbalCenterController@postServiceHerbalCenter');
    Route::post('/edit/notice/{id}', 'HerbalCenterController@postEditHerbalCenter');

    



    Route::get('/delete/{id}', 'HerbalCenterController@deleteHerbalCenter');

});

// for api
    Route::get('/herbal-center-service/api/list/{id}/{id2}', 'HerbalCenterController@getHerbalCenterService');

    Route::get('/herbal-center-doctor/api/list/{id}/{id2}', 'HerbalCenterController@getHerbalCenterDoctor');

    Route::get('/api/phone/{id}', 'HerbalCenterController@getHerbalCenterPhone');
    Route::get('/api/email/{id}', 'HerbalCenterController@getHerbalCenterEmail');
});
