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

Route::group(['prefix' => 'ambulance'], function () {

    Route::group(['middleware' => 'auth'], function () {
    
	Route::get('/', 'AmbulanceController@index');

    Route::get('/add', 'AmbulanceController@viewAddAmbulance');
    Route::get('/add/{id}', 'AmbulanceController@viewAddAmbulanceById');
    Route::post('/add', 'AmbulanceController@postAddAmbulance');

    Route::get('/view/{id}', 'AmbulanceController@viewAmbulance');


    Route::get('/delete/{id}', 'AmbulanceController@deleteAmbulance');

    Route::get('/edit/info/{id}', 'AmbulanceController@viewEditInfoAmbulance');
    
    Route::get('/edit/about/{id}', 'AmbulanceController@viewEditAmbulance');

    Route::get('/edit/notice/{id}', 'AmbulanceController@viewEditAmbulance');



    Route::get('/edit/notice/add/{id}', 'AmbulanceNoticeController@getAmbulanceNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'AmbulanceNoticeController@postAmbulanceNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'AmbulanceNoticeController@getAmbulanceNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'AmbulanceNoticeController@postAmbulanceNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'AmbulanceNoticeController@AmbulanceNoticeDelete');
    

    Route::get('/edit/pricing/add/{id}', 'AmbulancePriceController@getAmbulancePricingAdd');
    Route::post('/edit/pricing/add/{id}', 'AmbulancePriceController@postAmbulancePricingAdd');

    Route::get('/edit/pricing/edit/{id}', 'AmbulancePriceController@getAmbulancePricingEdit');
    Route::post('/edit/pricing/edit/{id}', 'AmbulancePriceController@postAmbulancePricingEdit');

    Route::get('/edit/pricing/delete/{id}', 'AmbulancePriceController@AmbulancePricingDelete');



    Route::post('/edit/info/{id}', 'AmbulanceController@postInfoEditAmbulance');
    Route::post('/edit/about/{id}', 'AmbulanceController@postAboutEditAmbulance');

    



    // Route::get('/delete/{id}', 'AmbulanceController@deleteAmbulance');



    Route::get('/api/phone/{id}', 'AmbulanceController@getAmbulancePhone');
    Route::get('/api/email/{id}', 'AmbulanceController@getAmbulanceEmail');

    
 });

});
