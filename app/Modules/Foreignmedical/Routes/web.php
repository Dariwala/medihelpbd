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

Route::group(['prefix' => 'foreignmedical'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'ForeignmedicalController@index');

    Route::get('/add', 'ForeignmedicalController@viewAddForeignmedical');
    Route::get('/add/{id}', 'ForeignmedicalController@viewAddForeignmedicalById');
    Route::post('/add', 'ForeignmedicalController@postAddForeignmedical');

    Route::get('/view/{id}', 'ForeignmedicalController@viewForeignmedical');


    Route::get('/delete/{id}', 'ForeignmedicalController@deleteForeignmedical');

    Route::get('/edit/info/{id}', 'ForeignmedicalController@viewEditForeignmedical');
    Route::get('/edit/about/{id}', 'ForeignmedicalController@viewEditForeignmedical');

    Route::get('/edit/product/add/{id}', 'ForeignmedicalProdutController@viewAddForeignmedicalProduct');
    Route::post('/edit/product/add/{id}', 'ForeignmedicalProdutController@postAddForeignmedicalProduct');
    Route::get('/edit/product/edit/{id}/{foreignmedical_id}', 'ForeignmedicalProdutController@viewEditForeignmedicalProduct');
    Route::post('/edit/product/edit/{id}/{foreignmedical_id}', 'ForeignmedicalProdutController@postEditForeignmedicalProduct');
    Route::get('/edit/product/delete/{id}', 'ForeignmedicalProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'ForeignmedicalDoctorController@getForeignmedicalDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'ForeignmedicalDoctorController@postForeignmedicalDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'ForeignmedicalDoctorController@getForeignmedicalDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'ForeignmedicalDoctorController@postForeignmedicalDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'ForeignmedicalDoctorController@ForeignmedicalDoctorDelete');
    
    
    //Foreignmedical Services
    
    Route::get('/edit/service/add/{id}', 'ForeignmedicalServiceController@getForeignmedicalServiceAdd');
    Route::post('/edit/service/add/{id}', 'ForeignmedicalServiceController@postForeignmedicalServiceAdd');
    Route::get('/edit/service/edit/{id}', 'ForeignmedicalServiceController@getForeignmedicalServiceEdit');
    Route::post('/edit/service/edit/{id}', 'ForeignmedicalServiceController@postForeignmedicalServiceEdit');
    Route::get('/edit/service/delete/{id}', 'ForeignmedicalServiceController@ForeignmedicalServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'ForeignmedicalNoticeController@getForeignmedicalNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'ForeignmedicalNoticeController@postForeignmedicalNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'ForeignmedicalNoticeController@getForeignmedicalNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'ForeignmedicalNoticeController@postForeignmedicalNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'ForeignmedicalNoticeController@ForeignmedicalNoticeDelete');



    Route::post('/edit/info/{id}', 'ForeignmedicalController@postInfoEditForeignmedical');
    Route::post('/edit/about/{id}', 'ForeignmedicalController@postAboutEditForeignmedical');    // for api
    Route::get('/api/phone/{id}', 'ForeignmedicalController@getForeignmedicalPhone');
    Route::get('/api/email/{id}', 'ForeignmedicalController@getForeignmedicalEmail');

});

    Route::get('/foreignmedical-product/api/list/{id1}', 'ForeignmedicalProdutController@getForeignmedicalProduct');

    Route::get('/foreignmedical-doctor/api/list/{id1}/{id2}', 'ForeignmedicalDoctorController@getForeignmedicalDoctor');
    
    Route::get('/foreignmedical-service/api/list/{id}/{id2}', 'ForeignmedicalServiceController@getForeignmedicalService');
});
