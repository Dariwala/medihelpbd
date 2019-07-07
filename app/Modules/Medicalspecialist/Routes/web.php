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

Route::group(['prefix' => 'medical-specialist'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/','MedicalSpecialistController@index');

    Route::get('/add', 'MedicalSpecialistController@viewAddMedicalSpecialist');

    Route::post('/add', 'MedicalSpecialistController@postAddMedicalSpecialist');

    Route::get('/add/{id}', 'MedicalSpecialistController@viewAddMedicalSpecialistById');


    Route::get('/edit/info/{id}', 'MedicalSpecialistController@viewInfoMedicalSpecialist');

    Route::get('/view/{id}', 'MedicalSpecialistController@viewMedicalSpecialist');
    
    // Route::get('/edit/about/{id}', 'MedicalSpecialistController@viewEditMedicalSpecialist');
    // Route::get('/edit/service/{id}', 'MedicalSpecialistController@viewEditMedicalSpecialist');
    // Route::get('/edit/notice/{id}', 'MedicalSpecialistController@viewEditMedicalSpecialist');

    Route::post('/edit/info/{id}', 'MedicalSpecialistController@postInfoMedicalSpecialist');
    
    Route::post('/edit/about/{id}', 'MedicalSpecialistController@postAboutMedicalSpecialist');
    Route::post('/edit/details/{id}','MedicalSpecialistController@postDetailsMedicalSpecialist');

    Route::get('/delete/{id}', 'MedicalSpecialistController@deleteMedicalSpecialist');

    Route::get('/edit/speciality/edit/{id}', 'MedicalSpecialistSpecialityController@index');
    Route::post('/edit/speciality/edit/{id}', 'MedicalSpecialistSpecialityController@postSpeciality');



    Route::get('/edit/notice/add/{id}', 'MedicalSpecialistNoticeController@getMedicalSpecialistNoticeAdd');
    Route::post('/edit/notice/add/{id}', 'MedicalSpecialistNoticeController@postMedicalSpecialistNoticeAdd');

    Route::get('/edit/notice/edit/{id}', 'MedicalSpecialistNoticeController@getMedicalSpecialistNoticeEdit');
    Route::post('/edit/notice/edit/{id}', 'MedicalSpecialistNoticeController@postMedicalSpecialistNoticeEdit');

    Route::get('/edit/notice/delete/{id}', 'MedicalSpecialistNoticeController@MedicalSpecialistNoticeDelete');


    Route::get('/edit/chamber/add/{id}', 'MedicalSpecialistChamberController@getMedicalSpecialistChamberAdd');
    Route::post('/edit/chamber/add/{id}', 'MedicalSpecialistChamberController@postMedicalSpecialistChamberAdd');

    Route::get('/edit/chamber/edit/{id}', 'MedicalSpecialistChamberController@getMedicalSpecialistChamberEdit');
    Route::post('/edit/chamber/edit/{id}', 'MedicalSpecialistChamberController@postMedicalSpecialistChamberEdit');

    Route::get('/edit/chamber/delete/{id}', 'MedicalSpecialistChamberController@MedicalSpecialistChamberDelete');
    
    /*Medical specialist appointment */

        Route::get('/edit/appointment/add/{id}', 'MedicalSpecialistAppointmentController@getMedicalSpecialistAppointmentAdd');
        Route::post('/edit/appointment/store/{id}', 'MedicalSpecialistAppointmentController@getMedicalSpecialistAppointmentStore');
        Route::get('/edit/appointment/edit/{id}', 'MedicalSpecialistAppointmentController@getMedicalSpecialistAppointmentEdit');
        Route::post('/edit/appointment/update/{id}', 'MedicalSpecialistAppointmentController@getMedicalSpecialistAppointmentUpdate');
        Route::get('/edit/appointment/delete/{id}', 'MedicalSpecialistAppointmentController@getMedicalSpecialistAppointmentDelete');

    /*Medical specialist appointment end*/
    
    /*Medical specialist appointment Notice add*/

        Route::get('/edit/appointment/notice/add/{id}', 'MedicalSpecialistAppointmentNoticeController@getMedicalSpecialistAppointmentNoticeAdd');
        Route::post('/edit/appointment/notice/store/{id}', 'MedicalSpecialistAppointmentNoticeController@getMedicalSpecialistAppointmentNoticeStore');
        Route::get('/edit/appointment/notice/edit/{id}', 'MedicalSpecialistAppointmentNoticeController@getMedicalSpecialistAppointmentNoticeEdit');
        Route::post('/edit/appointment/notice/update/{id}', 'MedicalSpecialistAppointmentNoticeController@getMedicalSpecialistAppointmentNoticeUpdate');
        Route::get('/edit/appointment/notice/delete/{id}', 'MedicalSpecialistAppointmentNoticeController@getMedicalSpecialistAppointmentNoticeDelete');

    /*Medical specialist appointment Notice end*/
    

    // for api
    Route::get('/api/phone/{id}', 'MedicalSpecialistController@getMedicalSpecialistPhone');
    Route::get('/api/email/{id}', 'MedicalSpecialistController@getMedicalSpecialistEmail');
});

    Route::get('/api/all', 'MedicalSpecialistController@all');
    
    //Api fro medical-specialist
    
    Route::get('api/list/{id}', 'MedicalSpecialistController@getMedicalSpecialist');

    Route::get('/api/hospital/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedHospitalMedicalSpecialist');

    Route::get('/api/addiction/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedAddictionMedicalSpecialist');

    Route::get('/api/herbal-center/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedHerbalCenterMedicalSpecialist');

    Route::get('/api/blood-bank/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedBloodBankMedicalSpecialist');

    Route::get('/api/eye-bank/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedEyeBankMedicalSpecialist');

    Route::get('/api/skin-laser-center/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedSkinLaserCenterMedicalSpecialist');

    Route::get('/api/vaccine-point/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedVaccinePointMedicalSpecialist');

    Route::get('/api/pharmacy/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedPharmacyMedicalSpecialist');


    Route::get('/api/foreignmedical/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedForeignmedicalMedicalSpecialist');

    Route::get('/api/homeopathic/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedHomeopathicMedicalSpecialist');

    Route::get('/api/optical/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedOpticalMedicalSpecialist');

    Route::get('/api/pharmacynew/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedPharmacynewMedicalSpecialist');

    Route::get('/api/physiotherapy/get-selected-medical-specialist/{id}', 'MedicalSpecialistController@getSelectedPhysiotherapyMedicalSpecialist');



    Route::get('/api/view/hospital/{id1}/{id2}', 'MedicalSpecialistController@viewHospitalMedicalSpecialist');

    Route::get('/api/view/addiction/{id1}/{id2}', 'MedicalSpecialistController@viewAddictionMedicalSpecialist');

    Route::get('/api/view/herbal-center/{id1}/{id2}', 'MedicalSpecialistController@viewHerbalCenterMedicalSpecialist');

    Route::get('/api/view/blood-bank/{id1}/{id2}', 'MedicalSpecialistController@viewBloodBankMedicalSpecialist');

    Route::get('/api/view/eye-bank/{id1}/{id2}', 'MedicalSpecialistController@viewEyeBankMedicalSpecialist');

    Route::get('/api/view/skin-laser-center/{id1}/{id2}', 'MedicalSpecialistController@viewSkinLaserCenterMedicalSpecialist');

    Route::get('/api/view/vaccine-point/{id1}/{id2}', 'MedicalSpecialistController@viewVaccinePointMedicalSpecialist');

    Route::get('/api/view/pharmacy/{id1}/{id2}', 'MedicalSpecialistController@viewPharmacyMedicalSpecialist');


    Route::get('/api/view/foreignmedical/{id1}/{id2}', 'MedicalSpecialistController@viewForeignmedicalMedicalSpecialist');

    Route::get('/api/view/homeopathic/{id1}/{id2}', 'MedicalSpecialistController@viewHomeopathicMedicalSpecialist');

    Route::get('/api/view/optical/{id1}/{id2}', 'MedicalSpecialistController@viewOpticalMedicalSpecialist');

    Route::get('/api/view/pharmacynew/{id1}/{id2}', 'MedicalSpecialistController@viewPharmacynewMedicalSpecialist');

    Route::get('/api/view/physiotherapy/{id1}/{id2}', 'MedicalSpecialistController@viewPhysiotherapyMedicalSpecialist');

});
