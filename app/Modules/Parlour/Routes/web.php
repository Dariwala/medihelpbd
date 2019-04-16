<?php



Route::group(['prefix' => 'parlour'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'ParlourController@index');

    Route::get('/add', 'ParlourController@viewAddParlour');
    Route::get('/add/{id}', 'ParlourController@viewAddParlourById');
    Route::post('/add', 'ParlourController@postAddParlour');

    Route::get('/view/{id}', 'ParlourController@viewParlour');




    Route::get('/edit/info/{id}', 'ParlourController@viewEditParlour');
    Route::get('/edit/about/{id}', 'ParlourController@viewEditParlour');
    Route::get('/edit/service/{id}', 'ParlourController@viewEditParlour');
    Route::get('/edit/notice/{id}', 'ParlourController@viewEditParlour');

    Route::get('/edit/service/add/{id}', 'ParlourServiceController@getParlourServiceAdd');
    Route::post('/edit/service/add/{id}', 'ParlourServiceController@postParlourServiceAdd');

    Route::get('/edit/service/edit/{id}', 'ParlourServiceController@getParlourServiceEdit');
    Route::post('/edit/service/edit/{id}', 'ParlourServiceController@postParlourServiceEdit');

    Route::get('/edit/service/delete/{id}', 'ParlourServiceController@parlourServiceDelete');



    Route::get('/edit/notice/add/{id}', 'ParlourNoticeController@getParlourNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'ParlourNoticeController@postParlourNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'ParlourNoticeController@getParlourNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'ParlourNoticeController@postParlourNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'ParlourNoticeController@ParlourNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'ParlourDoctorController@getParlourDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'ParlourDoctorController@postParlourDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'ParlourDoctorController@getParlourDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'ParlourDoctorController@postParlourDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'ParlourDoctorController@ParlourDoctorDelete');



    Route::post('/edit/info/{id}', 'ParlourController@postInfoEditParlour');
    Route::post('/edit/about/{id}', 'ParlourController@postAboutEditParlour');
    Route::post('/edit/service/{id}', 'ParlourController@postServiceParlour');
    Route::post('/edit/notice/{id}', 'ParlourController@postEditParlour');

    



    Route::get('/delete/{id}', 'ParlourController@deleteParlour');

// FOR API ---

    Route::get('/api/phone/{id}', 'ParlourController@getParlourPhone');
    Route::get('/api/email/{id}', 'ParlourController@getParlourEmail');

});


    Route::get('/api/service/all', 'ParlourServiceController@all');
    Route::get('/parlour-service/api/list/{id}/{id2}', 'ParlourController@getParlourService');

    Route::get('/parlour-doctor/api/list/{id}/{id2}', 'ParlourController@getParlourDoctor');

    
});
