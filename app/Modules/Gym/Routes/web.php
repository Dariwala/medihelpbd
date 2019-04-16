<?php



Route::group(['prefix' => 'gym'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'GymController@index');

    Route::get('/add', 'GymController@viewAddGym');
    Route::get('/add/{id}', 'GymController@viewAddGymById');
    Route::post('/add', 'GymController@postAddGym');

    Route::get('/view/{id}', 'GymController@viewGym');




    Route::get('/edit/info/{id}', 'GymController@viewEditGym');
    Route::get('/edit/about/{id}', 'GymController@viewEditGym');
    Route::get('/edit/service/{id}', 'GymController@viewEditGym');
    Route::get('/edit/notice/{id}', 'GymController@viewEditGym');

    Route::get('/edit/service/add/{id}', 'GymServiceController@getGymServiceAdd');
    Route::post('/edit/service/add/{id}', 'GymServiceController@postGymServiceAdd');

    Route::get('/edit/service/edit/{id}', 'GymServiceController@getGymServiceEdit');
    Route::post('/edit/service/edit/{id}', 'GymServiceController@postGymServiceEdit');

    Route::get('/edit/service/delete/{id}', 'GymServiceController@gymServiceDelete');



    Route::get('/edit/notice/add/{id}', 'GymNoticeController@getGymNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'GymNoticeController@postGymNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'GymNoticeController@getGymNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'GymNoticeController@postGymNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'GymNoticeController@GymNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'GymDoctorController@getGymDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'GymDoctorController@postGymDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'GymDoctorController@getGymDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'GymDoctorController@postGymDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'GymDoctorController@GymDoctorDelete');



    Route::post('/edit/info/{id}', 'GymController@postInfoEditGym');
    Route::post('/edit/about/{id}', 'GymController@postAboutEditGym');
    Route::post('/edit/service/{id}', 'GymController@postServiceGym');
    Route::post('/edit/notice/{id}', 'GymController@postEditGym');

    



    Route::get('/delete/{id}', 'GymController@deleteGym');

// FOR API ---

    Route::get('/api/phone/{id}', 'GymController@getGymPhone');
    Route::get('/api/email/{id}', 'GymController@getGymEmail');

});


    Route::get('/api/service/all', 'GymServiceController@all');
    Route::get('/gym-service/api/list/{id}/{id2}', 'GymController@getGymService');

    Route::get('/gym-doctor/api/list/{id}/{id2}', 'GymController@getGymDoctor');

    
});
