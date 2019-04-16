<?php



Route::group(['prefix' => 'addiction'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'AddictionController@index');

    Route::get('/add', 'AddictionController@viewAddAddiction');
    Route::get('/add/{id}', 'AddictionController@viewAddAddictionById');
    Route::post('/add', 'AddictionController@postAddAddiction');

    Route::get('/view/{id}', 'AddictionController@viewAddiction');




    Route::get('/edit/info/{id}', 'AddictionController@viewEditAddiction');
    Route::get('/edit/about/{id}', 'AddictionController@viewEditAddiction');
    Route::get('/edit/service/{id}', 'AddictionController@viewEditAddiction');
    Route::get('/edit/notice/{id}', 'AddictionController@viewEditAddiction');

    Route::get('/edit/service/add/{id}', 'AddictionServiceController@getAddictionServiceAdd');
    Route::post('/edit/service/add/{id}', 'AddictionServiceController@postAddictionServiceAdd');

    Route::get('/edit/service/edit/{id}', 'AddictionServiceController@getAddictionServiceEdit');
    Route::post('/edit/service/edit/{id}', 'AddictionServiceController@postAddictionServiceEdit');

    Route::get('/edit/service/delete/{id}', 'AddictionServiceController@addictionServiceDelete');



    Route::get('/edit/notice/add/{id}', 'AddictionNoticeController@getAddictionNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'AddictionNoticeController@postAddictionNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'AddictionNoticeController@getAddictionNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'AddictionNoticeController@postAddictionNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'AddictionNoticeController@AddictionNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'AddictionDoctorController@getAddictionDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'AddictionDoctorController@postAddictionDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'AddictionDoctorController@getAddictionDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'AddictionDoctorController@postAddictionDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'AddictionDoctorController@AddictionDoctorDelete');



    Route::post('/edit/info/{id}', 'AddictionController@postInfoEditAddiction');
    Route::post('/edit/about/{id}', 'AddictionController@postAboutEditAddiction');
    Route::post('/edit/service/{id}', 'AddictionController@postServiceAddiction');
    Route::post('/edit/notice/{id}', 'AddictionController@postEditAddiction');

    



    Route::get('/delete/{id}', 'AddictionController@deleteAddiction');

// FOR API ---

    Route::get('/api/phone/{id}', 'AddictionController@getAddictionPhone');
    Route::get('/api/email/{id}', 'AddictionController@getAddictionEmail');

});


    Route::get('/api/service/all', 'AddictionServiceController@all');
    Route::get('/addiction-service/api/list/{id}/{id2}', 'AddictionController@getAddictionService');

    Route::get('/addiction-doctor/api/list/{id}/{id2}', 'AddictionController@getAddictionDoctor');

    
});
