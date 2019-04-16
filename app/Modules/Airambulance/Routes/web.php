<?php



Route::group(['prefix' => 'air-ambulance'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'AirAmbulanceController@index');

    Route::get('/add', 'AirAmbulanceController@viewAddAirAmbulance');
    Route::get('/add/{id}', 'AirAmbulanceController@viewAddAirAmbulanceById');
    Route::post('/add', 'AirAmbulanceController@postAddAirAmbulance');

    Route::get('/view/{id}', 'AirAmbulanceController@viewAirAmbulance');

    Route::get('/delete/{id}', 'AirAmbulanceController@deleteAirAmbulance');

    Route::get('/edit/info/{id}', 'AirAmbulanceController@viewEditInfoAirAmbulance');
    
    Route::get('/edit/about/{id}', 'AirAmbulanceController@viewEditAirAmbulance');

    Route::get('/edit/notice/{id}', 'AirAmbulanceController@viewEditAirAmbulance');



    Route::get('/edit/notice/add/{id}', 'AirAmbulanceNoticeController@getAirAmbulanceNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'AirAmbulanceNoticeController@postAirAmbulanceNoticeAdd');
    Route::get('/edit/notice/edit/{id}', 'AirAmbulanceNoticeController@getAirAmbulanceNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'AirAmbulanceNoticeController@postAirAmbulanceNoticeEdit');
    Route::get('/edit/notice/delete/{id}', 'AirAmbulanceNoticeController@AirAmbulanceNoticeDelete');
    

    Route::get('/edit/pricing/add/{id}', 'AirAmbulancePricieController@getAirAmbulancePricingAdd');
    Route::post('/edit/pricing/add/{id}', 'AirAmbulancePricieController@postAirAmbulancePricingAdd');
    Route::get('/edit/pricing/edit/{id}', 'AirAmbulancePricieController@getAirAmbulancePricingEdit');
    Route::post('/edit/pricing/edit/{id}', 'AirAmbulancePricieController@postAirAmbulancePricingEdit');
    Route::get('/edit/pricing/delete/{id}', 'AirAmbulancePricieController@AirAmbulancePricingDelete');


    Route::get('/edit/service/add/{id}', 'AirAmbulanceServiceController@getAirAmbulanceServiceAdd');
    Route::post('/edit/service/add/{id}', 'AirAmbulanceServiceController@postAirAmbulanceServiceAdd');
    Route::get('/edit/service/edit/{id}', 'AirAmbulanceServiceController@getAirAmbulanceServiceEdit');
    Route::post('/edit/service/edit/{id}', 'AirAmbulanceServiceController@postAirAmbulanceServiceEdit');
    Route::get('/edit/service/delete/{id}', 'AirAmbulanceServiceController@airAmbulanceServiceDelete');


    Route::post('/edit/info/{id}', 'AirAmbulanceController@postInfoEditAirAmbulance');
    Route::post('/edit/about/{id}', 'AirAmbulanceController@postAboutEditAirAmbulance');

    



    // Route::get('/delete/{id}', 'AirAmbulanceController@deleteAirAmbulance');



    Route::get('/api/phone/{id}', 'AirAmbulanceController@getAirAmbulancePhone');
    Route::get('/api/email/{id}', 'AirAmbulanceController@getAirAmbulanceEmail');
    
 });
 
 Route::get('/air-ambulance-service/api/list/{id}/{id2}', 'AirAmbulanceServiceController@getAirAmbulanceService');
    
});
