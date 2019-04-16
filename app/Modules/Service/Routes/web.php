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

Route::group(['prefix' => 'service'], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'ServiceController@index');

        Route::get('/add', 'ServiceController@viewAddService');
        Route::post('/add', 'ServiceController@postAddService');
    
        Route::get('/view/{id}', 'ServiceController@viewService');
    
        Route::get('/edit/{id}', 'ServiceController@viewEditService');
        Route::post('/edit/{id}', 'ServiceController@postEditService');
    
        Route::get('/delete/{id}', 'ServiceController@deleteService');
    
    
        //sub service
        Route::get('/sub-service', 'SubServiceController@index');
    
        Route::get('/sub-service/add', 'SubServiceController@viewAddSubService');
        Route::post('/sub-service/add', 'SubServiceController@postAddSubService');
    
        Route::get('/sub-service/view/{id}', 'SubServiceController@viewSubService');
    
        Route::get('/sub-service/edit/{id}', 'SubServiceController@viewEditSubService');
        Route::post('/sub-service/edit/{id}', 'SubServiceController@postEditSubService');
    
    
        Route::get('/sub-service/delete/{id}', 'SubServiceController@deleteSubService');
        
        //common modules
        Route::get('/modules', 'commonModulesController@index')->name('modules_index');
        Route::post('/modules', 'commonModulesController@update')->name('modules_update');


    });




    //Api for service
    
    Route::get('/api/list', 'ServiceController@getService');

    Route::get('/api/hospital/get-selected-service/{id}', 'ServiceController@getSelectedHospitalService');

    Route::get('/api/addiction/get-selected-service/{id}', 'ServiceController@getSelectedAddictionService');

    Route::get('/api/gym/get-selected-service/{id}', 'ServiceController@getSelectedGymService');

    Route::get('/api/yoga/get-selected-service/{id}', 'ServiceController@getSelectedYogaService');

    Route::get('/api/parlour/get-selected-service/{id}', 'ServiceController@getSelectedParlourService');

    Route::get('/api/herbal-center/get-selected-service/{id}', 'ServiceController@getSelectedHerbalCenterService');

    Route::get('/api/skin-laser-center/get-selected-service/{id}', 'ServiceController@getSelectedSkinLaserCenterService');

    Route::get('/api/vaccine-point/get-selected-service/{id}', 'ServiceController@getSelectedVaccinePointService');

    Route::get('/api/blood-bank/get-selected-service/{id}', 'ServiceController@getSelectedBloodBankService');

    Route::get('/api/eye-bank/get-selected-service/{id}', 'ServiceController@getSelectedEyeBankService');

    Route::get('/api/view/hospital/{id}', 'ServiceController@viewHospitalService');

    Route::get('/api/view/addiction/{id}', 'ServiceController@viewAddictionService');

    Route::get('/api/view/gym/{id}', 'ServiceController@viewGymService');

    Route::get('/api/view/yoga/{id}', 'ServiceController@viewYogaService');

    Route::get('/api/view/parlour/{id}', 'ServiceController@viewParlourService');

    Route::get('/api/view/herbal-center/{id}', 'ServiceController@viewHerbalCenterService');

    Route::get('/api/view/skin-laser-center/{id}', 'ServiceController@viewSkinLaserCenterService');

    Route::get('/api/view/vaccine-point/{id}', 'ServiceController@viewVaccinePointService');

    Route::get('/api/view/eye-bank/{id}', 'ServiceController@viewEyeBankService');

    Route::get('/api/view/blood-bank/{id}', 'ServiceController@viewBloodBankService');
    
    Route::get('/api/view/pharmacy/{id}', 'ServiceController@viewPharmacyService');

    Route::get('/api/view/foreignmedical/{id}', 'ServiceController@viewForeignmedicalService');

    Route::get('/api/view/homeopathic/{id}', 'ServiceController@viewHomeopathicService');

    Route::get('/api/view/optical/{id}', 'ServiceController@viewOpticalService');

    Route::get('/api/view/pharmacynew/{id}', 'ServiceController@viewPharmacynewService');

    Route::get('/api/view/physiotherapy/{id}', 'ServiceController@viewPhysiotherapyService');
    
    Route::get('/api/view/air-ambulance/{id}', 'ServiceController@viewAirAmbulanceService');



    //Api fro subservice
    Route::get('/sub-service/api/list/{id}', 'SubServiceController@getSubService');

    Route::get('/api/hospital/get-selected-subservice/{id}', 'SubServiceController@getSelectedHospitalSubService');

    Route::get('/api/addiction/get-selected-subservice/{id}', 'SubServiceController@getSelectedAddictionSubService');

    Route::get('/api/gym/get-selected-subservice/{id}', 'SubServiceController@getSelectedGymSubService');

    Route::get('/api/yoga/get-selected-subservice/{id}', 'SubServiceController@getSelectedYogaSubService');
    
    Route::get('/api/parlour/get-selected-subservice/{id}', 'SubServiceController@getSelectedParlourSubService');

    Route::get('/api/herbal-center/get-selected-subservice/{id}', 'SubServiceController@getSelectedHerbalCenterSubService');

    Route::get('/api/skin-laser-center/get-selected-subservice/{id}', 'SubServiceController@getSelectedSkinLaserCenterSubService');

    Route::get('/api/vaccine-point/get-selected-subservice/{id}', 'SubServiceController@getSelectedVaccinePointSubService');

    Route::get('/api/blood-bank/get-selected-subservice/{id}', 'SubServiceController@getSelectedBloodBankSubService');

    Route::get('/api/eye-bank/get-selected-subservice/{id}', 'SubServiceController@getSelectedEyeBankSubService');

    Route::get('sub-service/api/view/hospital/{id1}/{id2}', 'SubServiceController@viewHospitalSubService');

    Route::get('sub-service/api/view/herbal-center/{id1}/{id2}', 'SubServiceController@viewHerbalCenterSubService');

    Route::get('sub-service/api/view/skin-laser-center/{id1}/{id2}', 'SubServiceController@viewSkinLaserCenterSubService');

    Route::get('sub-service/api/view/vaccine-point/{id1}/{id2}', 'SubServiceController@viewVaccinePointSubService');

    Route::get('sub-service/api/view/eye-bank/{id1}/{id2}', 'SubServiceController@viewEyeBankSubService');

    Route::get('sub-service/api/view/blood-bank/{id1}/{id2}', 'SubServiceController@viewBloodBankSubService');
    
    Route::get('sub-service/api/view/pharmacy/{id1}/{id2}', 'SubServiceController@viewPharmacySubService');

    Route::get('sub-service/api/view/foreignmedical/{id1}/{id2}', 'SubServiceController@viewForeignmedicalSubService');

    Route::get('sub-service/api/view/homeopathic/{id1}/{id2}', 'SubServiceController@viewHomeopathicSubService');

    Route::get('sub-service/api/view/optical/{id1}/{id2}', 'SubServiceController@viewOpticalSubService');

    Route::get('sub-service/api/view/pharmacynew/{id1}/{id2}', 'SubServiceController@viewPharmacynewSubService');

    Route::get('sub-service/api/view/physiotherapy/{id1}/{id2}', 'SubServiceController@viewPhysiotherapySubService');
    
    Route::get('sub-service/api/view/air-ambulance/{id1}/{id2}', 'SubServiceController@viewAirAmbulanceSubService');

});




Route::group(['prefix' => 'notice'], function () {
    
    Route::get('/', 'NoticeController@index')->name('notice_index');
    Route::get('/create', 'NoticeController@create')->name('notice_create');
    Route::post('/store', 'NoticeController@store')->name('notice_store');
    Route::get('/edit/{id}', 'NoticeController@edit')->name('notice_edit');
    Route::post('/update/{id}', 'NoticeController@update')->name('notice_update');
    Route::get('/delete/{id}', 'NoticeController@delete')->name('notice_delete');
    Route::get('/frontend/{id}/{sub_district_id}', 'NoticeController@noticeFrontend')->name('notice_frontend');
    
    Route::get('/ajax-sub-district/{id}', 'NoticeController@ajaxSubdistrict')->name('notice_sub_district');
    
});