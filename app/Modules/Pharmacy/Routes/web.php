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

Route::group(['prefix' => 'pharmacy'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'PharmacyController@index');

    Route::get('/add', 'PharmacyController@viewAddPharmacy');
    Route::get('/add/{id}', 'PharmacyController@viewAddPharmacyById');
    Route::post('/add', 'PharmacyController@postAddPharmacy');

    Route::get('/view/{id}', 'PharmacyController@viewPharmacy');


    Route::get('/delete/{id}', 'PharmacyController@deletePharmacy');

    Route::get('/edit/info/{id}', 'PharmacyController@viewEditPharmacy');
    Route::get('/edit/about/{id}', 'PharmacyController@viewEditPharmacy');

    Route::get('/edit/product/add/{id}', 'PharmacyProdutController@viewAddPharmacyProduct');
    Route::post('/edit/product/add/{id}', 'PharmacyProdutController@postAddPharmacyProduct');
    Route::get('/edit/product/edit/{id}/{pharmacy_id}', 'PharmacyProdutController@viewEditPharmacyProduct');
    Route::post('/edit/product/edit/{id}/{pharmacy_id}', 'PharmacyProdutController@postEditPharmacyProduct');
    Route::get('/edit/product/delete/{id}', 'PharmacyProdutController@destroy');



    Route::get('/edit/doctor/add/{id}', 'PharmacyDoctorController@getPharmacyDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'PharmacyDoctorController@postPharmacyDoctorAdd');
    Route::get('/edit/doctor/edit/{id}', 'PharmacyDoctorController@getPharmacyDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'PharmacyDoctorController@postPharmacyDoctorEdit');
    Route::get('/edit/doctor/delete/{id}', 'PharmacyDoctorController@PharmacyDoctorDelete');
    
    
    //Pharmacy Services
    
    Route::get('/edit/service/add/{id}', 'PharmacyServiceController@getPharmacyServiceAdd');
    Route::post('/edit/service/add/{id}', 'PharmacyServiceController@postPharmacyServiceAdd');
    Route::get('/edit/service/edit/{id}', 'PharmacyServiceController@getPharmacyServiceEdit');
    Route::post('/edit/service/edit/{id}', 'PharmacyServiceController@postPharmacyServiceEdit');
    Route::get('/edit/service/delete/{id}', 'PharmacyServiceController@PharmacyServiceDelete');
    


    Route::get('/edit/notice/add/{id}', 'PharmacyNoticeController@getPharmacyNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'PharmacyNoticeController@postPharmacyNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'PharmacyNoticeController@getPharmacyNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'PharmacyNoticeController@postPharmacyNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'PharmacyNoticeController@PharmacyNoticeDelete');



    Route::post('/edit/info/{id}', 'PharmacyController@postInfoEditPharmacy');
    Route::post('/edit/about/{id}', 'PharmacyController@postAboutEditPharmacy');    // for api
    Route::get('/api/phone/{id}', 'PharmacyController@getPharmacyPhone');
    Route::get('/api/email/{id}', 'PharmacyController@getPharmacyEmail');

});

    Route::get('/pharmacy-product/api/list/{id1}', 'PharmacyProdutController@getPharmacyProduct');

    Route::get('/pharmacy-doctor/api/list/{id1}/{id2}', 'PharmacyDoctorController@getPharmacyDoctor');
    
    Route::get('/pharmacy-service/api/list/{id}/{id2}', 'PharmacyServiceController@getPharmacyService');
});
