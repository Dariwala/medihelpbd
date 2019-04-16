<?php



Route::group(['prefix' => 'yoga'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'YogaController@index');

    Route::get('/add', 'YogaController@viewAddYoga');
    Route::get('/add/{id}', 'YogaController@viewAddYogaById');
    Route::post('/add', 'YogaController@postAddYoga');

    Route::get('/view/{id}', 'YogaController@viewYoga');




    Route::get('/edit/info/{id}', 'YogaController@viewEditYoga');
    Route::get('/edit/about/{id}', 'YogaController@viewEditYoga');
    Route::get('/edit/service/{id}', 'YogaController@viewEditYoga');
    Route::get('/edit/notice/{id}', 'YogaController@viewEditYoga');

    Route::get('/edit/service/add/{id}', 'YogaServiceController@getYogaServiceAdd');
    Route::post('/edit/service/add/{id}', 'YogaServiceController@postYogaServiceAdd');

    Route::get('/edit/service/edit/{id}', 'YogaServiceController@getYogaServiceEdit');
    Route::post('/edit/service/edit/{id}', 'YogaServiceController@postYogaServiceEdit');

    Route::get('/edit/service/delete/{id}', 'YogaServiceController@yogaServiceDelete');



    Route::get('/edit/notice/add/{id}', 'YogaNoticeController@getYogaNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'YogaNoticeController@postYogaNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'YogaNoticeController@getYogaNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'YogaNoticeController@postYogaNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'YogaNoticeController@YogaNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'YogaDoctorController@getYogaDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'YogaDoctorController@postYogaDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'YogaDoctorController@getYogaDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'YogaDoctorController@postYogaDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'YogaDoctorController@YogaDoctorDelete');



    Route::post('/edit/info/{id}', 'YogaController@postInfoEditYoga');
    Route::post('/edit/about/{id}', 'YogaController@postAboutEditYoga');
    Route::post('/edit/service/{id}', 'YogaController@postServiceYoga');
    Route::post('/edit/notice/{id}', 'YogaController@postEditYoga');

    



    Route::get('/delete/{id}', 'YogaController@deleteYoga');

// FOR API ---

    Route::get('/api/phone/{id}', 'YogaController@getYogaPhone');
    Route::get('/api/email/{id}', 'YogaController@getYogaEmail');

});


    Route::get('/api/service/all', 'YogaServiceController@all');
    Route::get('/yoga-service/api/list/{id}/{id2}', 'YogaController@getYogaService');

    Route::get('/yoga-doctor/api/list/{id}/{id2}', 'YogaController@getYogaDoctor');

    
});
