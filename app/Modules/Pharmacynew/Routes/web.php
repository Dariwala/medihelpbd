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

Route::group(['prefix' => 'pharmacynew'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'PharmacynewController@index');

    Route::get('/add', 'PharmacynewController@viewAddPharmacynew');
    Route::get('/add/{id}', 'PharmacynewController@viewAddPharmacynewById');
    Route::post('/add', 'PharmacynewController@postAddPharmacynew');

    Route::get('/view/{id}', 'PharmacynewController@viewPharmacynew');


    Route::get('/delete/{id}', 'PharmacynewController@deletePharmacynew');

    Route::get('/edit/info/{id}', 'PharmacynewController@viewEditPharmacynew');
    Route::get('/edit/about/{id}', 'PharmacynewController@viewEditPharmacynew');

    Route::get('/edit/product/add/{id}', 'PharmacynewProdutController@viewAddPharmacynewProduct');
    Route::post('/edit/product/add/{id}', 'PharmacynewProdutController@postAddPharmacynewProduct');
    Route::get('/edit/product/edit/{id}/{pharmacynew_id}', 'PharmacynewProdutController@viewEditPharmacynewProduct');
    Route::post('/edit/product/edit/{id}/{pharmacynew_id}', 'PharmacynewProdutController@postEditPharmacynewProduct');
    Route::get('/edit/product/delete/{id}', 'PharmacynewProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'PharmacynewDoctorController@getPharmacynewDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'PharmacynewDoctorController@postPharmacynewDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'PharmacynewDoctorController@getPharmacynewDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'PharmacynewDoctorController@postPharmacynewDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'PharmacynewDoctorController@PharmacynewDoctorDelete');
    
    
    //Pharmacynew Services
    
    Route::get('/edit/service/add/{id}', 'PharmacynewServiceController@getPharmacynewServiceAdd');
    Route::post('/edit/service/add/{id}', 'PharmacynewServiceController@postPharmacynewServiceAdd');
    Route::get('/edit/service/edit/{id}', 'PharmacynewServiceController@getPharmacynewServiceEdit');
    Route::post('/edit/service/edit/{id}', 'PharmacynewServiceController@postPharmacynewServiceEdit');
    Route::get('/edit/service/delete/{id}', 'PharmacynewServiceController@PharmacynewServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'PharmacynewNoticeController@getPharmacynewNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'PharmacynewNoticeController@postPharmacynewNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'PharmacynewNoticeController@getPharmacynewNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'PharmacynewNoticeController@postPharmacynewNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'PharmacynewNoticeController@PharmacynewNoticeDelete');



    Route::post('/edit/info/{id}', 'PharmacynewController@postInfoEditPharmacynew');
    Route::post('/edit/about/{id}', 'PharmacynewController@postAboutEditPharmacynew');    // for api
    Route::get('/api/phone/{id}', 'PharmacynewController@getPharmacynewPhone');
    Route::get('/api/email/{id}', 'PharmacynewController@getPharmacynewEmail');

});

    Route::get('/pharmacynew-product/api/list/{id1}', 'PharmacynewProdutController@getPharmacynewProduct');

    Route::get('/pharmacynew-doctor/api/list/{id1}/{id2}', 'PharmacynewDoctorController@getPharmacynewDoctor');
    
    Route::get('/pharmacynew-service/api/list/{id}/{id2}', 'PharmacynewServiceController@getPharmacynewService');
});
