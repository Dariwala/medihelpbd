<?php



Route::group(['prefix' => 'hospital'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HospitalController@index');

    Route::get('/add', 'HospitalController@viewAddHospital');
    Route::get('/add/{id}', 'HospitalController@viewAddHospitalById');
    Route::post('/add', 'HospitalController@postAddHospital');

    Route::get('/view/{id}', 'HospitalController@viewHospital');




    Route::get('/edit/info/{id}', 'HospitalController@viewEditHospital');
    Route::get('/edit/about/{id}', 'HospitalController@viewEditHospital');
    Route::get('/edit/service/{id}', 'HospitalController@viewEditHospital');
    Route::get('/edit/notice/{id}', 'HospitalController@viewEditHospital');

    Route::get('/edit/service/add/{id}', 'HospitalServiceController@getHospitalServiceAdd');
    Route::post('/edit/service/add/{id}', 'HospitalServiceController@postHospitalServiceAdd');

    Route::get('/edit/service/edit/{id}', 'HospitalServiceController@getHospitalServiceEdit');
    Route::post('/edit/service/edit/{id}', 'HospitalServiceController@postHospitalServiceEdit');

    Route::get('/edit/service/delete/{id}', 'HospitalServiceController@hospitalServiceDelete');



    Route::get('/edit/notice/add/{id}', 'HospitalNoticeController@getHospitalNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'HospitalNoticeController@postHospitalNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'HospitalNoticeController@getHospitalNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'HospitalNoticeController@postHospitalNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'HospitalNoticeController@HospitalNoticeDelete');

    Route::get('/edit/doctor/add/{id}', 'HospitalDoctorController@getHospitalDoctorAdd');
    Route::post('/edit/doctor/add/{id}', 'HospitalDoctorController@postHospitalDoctorAdd');

    Route::get('/edit/doctor/edit/{id}', 'HospitalDoctorController@getHospitalDoctorEdit');
    Route::post('/edit/doctor/edit/{id}', 'HospitalDoctorController@postHospitalDoctorEdit');

    Route::get('/edit/doctor/delete/{id}', 'HospitalDoctorController@HospitalDoctorDelete');



    Route::post('/edit/info/{id}', 'HospitalController@postInfoEditHospital');
    Route::post('/edit/about/{id}', 'HospitalController@postAboutEditHospital');
    Route::post('/edit/service/{id}', 'HospitalController@postServiceHospital');
    Route::post('/edit/notice/{id}', 'HospitalController@postEditHospital');

    



    Route::get('/delete/{id}', 'HospitalController@deleteHospital');

// FOR API ---

    Route::get('/api/phone/{id}', 'HospitalController@getHospitalPhone');
    Route::get('/api/email/{id}', 'HospitalController@getHospitalEmail');

});


    Route::get('/api/service/all', 'HospitalServiceController@all');
    Route::get('/hospital-service/api/list/{id}/{id2}', 'HospitalController@getHospitalService');

    Route::get('/hospital-doctor/api/list/{id}/{id2}', 'HospitalController@getHospitalDoctor');

    
});
