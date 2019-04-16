<?php



Route::group(['prefix' => 'eye-bank'], function () {

    Route::group(['middleware' => 'auth'], function () {
    
	Route::get('/', 'EyeBankController@index');

    Route::get('/add', 'EyeBankController@viewAddEyeBank');
    Route::get('/add/{id}', 'EyeBankController@viewAddEyeBankById');
    Route::post('/add', 'EyeBankController@postAddEyeBank');

    Route::get('/view/{id}', 'EyeBankController@viewEyeBank');

    Route::get('/delete/{id}', 'EyeBankController@deleteEyeBank');

    Route::get('/edit/info/{id}', 'EyeBankController@viewEditInfoEyeBank');
    
    Route::get('/edit/notice/{id}', 'EyeBankController@viewEditEyeBank');

    Route::get('/edit/service/add/{id}', 'EyeBankServiceController@getEyeBankServiceAdd');
    Route::post('/edit/service/add/{id}', 'EyeBankServiceController@postEyeBankServiceAdd');

    Route::get('/edit/service/edit/{id}', 'EyeBankServiceController@getEyeBankServiceEdit');
    Route::post('/edit/service/edit/{id}', 'EyeBankServiceController@postEyeBankServiceEdit');

    Route::get('/edit/service/delete/{id}', 'EyeBankServiceController@EyeBankServiceDelete');

    Route::get('/edit/doctor/add/{id}', 'EyeBankDoctorController@getEyeBankDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'EyeBankDoctorController@postEyeBankDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'EyeBankDoctorController@getEyeBankDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'EyeBankDoctorController@postEyeBankDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'EyeBankDoctorController@EyeBankDoctorDelete');



    Route::get('/edit/notice/add/{id}', 'EyeBankNoticeController@getEyeBankNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'EyeBankNoticeController@postEyeBankNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'EyeBankNoticeController@getEyeBankNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'EyeBankNoticeController@postEyeBankNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'EyeBankNoticeController@EyeBankNoticeDelete');



    Route::post('/edit/info/{id}', 'EyeBankController@postInfoEditEyeBank');
    Route::post('/edit/about/{id}', 'EyeBankController@postAboutEditEyeBank');

// for api

    Route::get('/api/phone/{id}', 'EyeBankController@getEyeBankPhone');
    Route::get('/api/email/{id}', 'EyeBankController@getEyeBankEmail');

});

    Route::get('/eye-bank-service/api/list/{id}/{id2}', 'EyeBankServiceController@getEyeBankService');
    Route::get('/eye-bank-doctor/api/list/{id}/{id2}', 'EyeBankController@getEyeBankDoctor');


});
