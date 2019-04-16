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

Route::group(['prefix' => 'blood-donar'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'BloodDonarController@index');

    Route::get('/add', 'BloodDonarController@viewAddBloodDonor');
    Route::get('/add/{id}', 'BloodDonarController@viewAddBloodDonorById');
    Route::post('/add', 'BloodDonarController@postAddBloodDonor');

    Route::get('/view/{id}', 'BloodDonarController@viewBloodDonor');


    Route::get('/delete/{id}', 'BloodDonarController@deleteBloodDonor');

    Route::get('/edit/info/{id}', 'BloodDonarController@viewEditInfoBloodDonor');
    Route::get('/edit/about/{id}', 'BloodDonarController@viewEditBloodDonor');

    Route::get('/edit/pricing/add/{id}', 'BloodDonorPricingController@getBloodDonorPricingAdd');
    Route::post('/edit/pricing/add/{id}', 'BloodDonorPricingController@postBloodDonorPricingAdd');

    Route::get('/edit/pricing/edit/{id}', 'BloodDonorPricingController@getBloodDonorPricingEdit');
    Route::post('/edit/pricing/edit/{id}', 'BloodDonorPricingController@postBloodDonorPricingEdit');

    Route::get('/edit/pricing/delete/{id}', 'BloodDonorPricingController@BloodDonorPricingDelete');
    
    // Route::get('/edit/service/{id}', 'BloodDonarController@viewEditBloodDonor');
    // Route::get('/edit/notice/{id}', 'BloodDonarController@viewEditBloodDonor');

    // Route::get('/edit/service/add/{id}', 'BloodDonorServiceController@getBloodDonorServiceAdd');
    // Route::post('/edit/service/add/{id}', 'BloodDonorServiceController@postBloodDonorServiceAdd');

    // Route::get('/edit/service/edit/{id}', 'BloodDonorServiceController@getBloodDonorServiceEdit');
    // Route::post('/edit/service/edit/{id}', 'BloodDonorServiceController@postBloodDonorServiceEdit');

    // Route::get('/edit/service/delete/{id}', 'BloodDonorServiceController@BloodDonorServiceDelete');



    // Route::get('/edit/notice/add/{id}', 'BloodDonorNoticeController@getBloodDonorNoticeAdd');
    // Route::post('/edit/notice/add/{id}', 'BloodDonorNoticeController@postBloodDonorNoticeAdd');

    // Route::get('/edit/notice/edit/{id}', 'BloodDonorNoticeController@getBloodDonorNoticeEdit');
    // Route::post('/edit/notice/edit/{id}', 'BloodDonorNoticeController@postBloodDonorNoticeEdit');

    // Route::get('/edit/notice/delete/{id}', 'BloodDonorNoticeController@BloodDonorNoticeDelete');



    Route::post('/edit/info/{id}', 'BloodDonarController@postInfoEditBloodDonor');
    Route::post('/edit/about/{id}', 'BloodDonarController@postAboutEditBloodDonor');
    // Route::post('/edit/service/{id}', 'BloodDonarController@postServiceBloodDonor');
    // Route::post('/edit/notice/{id}', 'BloodDonarController@postEditBloodDonor');

    



    // Route::get('/delete/{id}', 'BloodDonarController@deleteBloodDonor');



    Route::get('/api/phone/{id}', 'BloodDonarController@getBloodDonorPhone');
    Route::get('/api/email/{id}', 'BloodDonarController@getBloodDonorEmail');
    
 });
    Route::get('/api/all', 'BloodDonarController@all');
});

