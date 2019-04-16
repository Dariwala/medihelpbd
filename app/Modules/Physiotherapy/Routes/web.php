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

Route::group(['prefix' => 'physiotherapy'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'PhysiotherapyController@index');

    Route::get('/add', 'PhysiotherapyController@viewAddPhysiotherapy');
    Route::get('/add/{id}', 'PhysiotherapyController@viewAddPhysiotherapyById');
    Route::post('/add', 'PhysiotherapyController@postAddPhysiotherapy');

    Route::get('/view/{id}', 'PhysiotherapyController@viewPhysiotherapy');


    Route::get('/delete/{id}', 'PhysiotherapyController@deletePhysiotherapy');

    Route::get('/edit/info/{id}', 'PhysiotherapyController@viewEditPhysiotherapy');
    Route::get('/edit/about/{id}', 'PhysiotherapyController@viewEditPhysiotherapy');

    Route::get('/edit/product/add/{id}', 'PhysiotherapyProdutController@viewAddPhysiotherapyProduct');
    Route::post('/edit/product/add/{id}', 'PhysiotherapyProdutController@postAddPhysiotherapyProduct');
    Route::get('/edit/product/edit/{id}/{physiotherapy_id}', 'PhysiotherapyProdutController@viewEditPhysiotherapyProduct');
    Route::post('/edit/product/edit/{id}/{physiotherapy_id}', 'PhysiotherapyProdutController@postEditPhysiotherapyProduct');
    Route::get('/edit/product/delete/{id}', 'PhysiotherapyProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'PhysiotherapyDoctorController@getPhysiotherapyDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'PhysiotherapyDoctorController@postPhysiotherapyDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'PhysiotherapyDoctorController@getPhysiotherapyDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'PhysiotherapyDoctorController@postPhysiotherapyDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'PhysiotherapyDoctorController@PhysiotherapyDoctorDelete');
    
    
    //Physiotherapy Services
    
    Route::get('/edit/service/add/{id}', 'PhysiotherapyServiceController@getPhysiotherapyServiceAdd');
    Route::post('/edit/service/add/{id}', 'PhysiotherapyServiceController@postPhysiotherapyServiceAdd');
    Route::get('/edit/service/edit/{id}', 'PhysiotherapyServiceController@getPhysiotherapyServiceEdit');
    Route::post('/edit/service/edit/{id}', 'PhysiotherapyServiceController@postPhysiotherapyServiceEdit');
    Route::get('/edit/service/delete/{id}', 'PhysiotherapyServiceController@PhysiotherapyServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'PhysiotherapyNoticeController@getPhysiotherapyNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'PhysiotherapyNoticeController@postPhysiotherapyNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'PhysiotherapyNoticeController@getPhysiotherapyNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'PhysiotherapyNoticeController@postPhysiotherapyNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'PhysiotherapyNoticeController@PhysiotherapyNoticeDelete');



    Route::post('/edit/info/{id}', 'PhysiotherapyController@postInfoEditPhysiotherapy');
    Route::post('/edit/about/{id}', 'PhysiotherapyController@postAboutEditPhysiotherapy');    // for api
    Route::get('/api/phone/{id}', 'PhysiotherapyController@getPhysiotherapyPhone');
    Route::get('/api/email/{id}', 'PhysiotherapyController@getPhysiotherapyEmail');

});

    Route::get('/physiotherapy-product/api/list/{id1}', 'PhysiotherapyProdutController@getPhysiotherapyProduct');

    Route::get('/physiotherapy-doctor/api/list/{id1}/{id2}', 'PhysiotherapyDoctorController@getPhysiotherapyDoctor');
    
    Route::get('/physiotherapy-service/api/list/{id}/{id2}', 'PhysiotherapyServiceController@getPhysiotherapyService');
});
