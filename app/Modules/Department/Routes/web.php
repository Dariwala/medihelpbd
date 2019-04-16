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

Route::group(['prefix' => 'medical-department'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'DepartmentController@index');

    Route::get('/add', 'DepartmentController@viewAddDepartment');
    Route::post('/add', 'DepartmentController@postAddDepartment');


    Route::get('/view/{id}', 'DepartmentController@viewDepartment');

    Route::get('/edit/{id}', 'DepartmentController@viewEditDepartment');
    Route::post('/edit/{id}', 'DepartmentController@postEditDepartment');

    Route::get('/delete/{id}', 'DepartmentController@deleteDepartment');

});

    // for api

     //Api for Department
    
    Route::get('/api/list', 'DepartmentController@getDepartment');

    Route::get('/api/hospital/get-selected-department/{id}', 'DepartmentController@getSelectedHospitalDepartment');

    Route::get('/api/addiction/get-selected-department/{id}', 'DepartmentController@getSelectedAddictionDepartment');

    Route::get('/api/gym/get-selected-department/{id}', 'DepartmentController@getSelectedGymDepartment');

    Route::get('/api/yoga/get-selected-department/{id}', 'DepartmentController@getSelectedYogaDepartment');

    Route::get('/api/parlour/get-selected-department/{id}', 'DepartmentController@getSelectedParlourDepartment');

    Route::get('/api/foreignmedical/get-selected-department/{id}', 'DepartmentController@getSelectedForeignmedicalDepartment');

    Route::get('/api/homeopathic/get-selected-department/{id}', 'DepartmentController@getSelectedHomeopathicDepartment');

    Route::get('/api/optical/get-selected-department/{id}', 'DepartmentController@getSelectedOpticalDepartment');

    Route::get('/api/pharmacynew/get-selected-department/{id}', 'DepartmentController@getSelectedPharmacynewDepartment');

    Route::get('/api/physiotherapy/get-selected-department/{id}', 'DepartmentController@getSelectedPhysiotherapyDepartment');

    Route::get('/api/herbal-center/get-selected-department/{id}', 'DepartmentController@getSelectedHerbalCenterDepartment');

    Route::get('/api/blood-bank/get-selected-department/{id}', 'DepartmentController@getSelectedBloodBankDepartment');

    Route::get('/api/eye-bank/get-selected-department/{id}', 'DepartmentController@getSelectedEyeBankDepartment');

    Route::get('/api/skin-laser-center/get-selected-department/{id}', 'DepartmentController@getSelectedSkinLaserCenterDepartment');

    Route::get('/api/vaccine-point/get-selected-department/{id}', 'DepartmentController@getSelectedVaccinePointDepartment');

    Route::get('/api/pharmacy/get-selected-department/{id}', 'DepartmentController@getSelectedPharmacyDepartment');


    Route::get('/api/view/hospital/{id}', 'DepartmentController@viewHospitalDepartment');

    Route::get('/api/view/addiction/{id}', 'DepartmentController@viewAddictionDepartment');

    Route::get('/api/view/gym/{id}', 'DepartmentController@viewGymDepartment');
    
    Route::get('/api/view/yoga/{id}', 'DepartmentController@viewYogaDepartment');

    Route::get('/api/view/parlour/{id}', 'DepartmentController@viewParlourDepartment');

    Route::get('/api/view/foreignmedical/{id}', 'DepartmentController@viewForeignmedicalDepartment');

    Route::get('/api/view/homeopathic/{id}', 'DepartmentController@viewHomeopathicDepartment');

    Route::get('/api/view/optical/{id}', 'DepartmentController@viewOpticalDepartment');

    Route::get('/api/view/pharmacynew/{id}', 'DepartmentController@viewPharmacynewDepartment');

    Route::get('/api/view/physiotherapy/{id}', 'DepartmentController@viewPhysiotherapyDepartment');

    Route::get('/api/view/herbal-center/{id}', 'DepartmentController@viewHerbalCenterDepartment');
    
    Route::get('/api/view/blood-bank/{id}', 'DepartmentController@viewBloodBankDepartment');
    
    Route::get('/api/view/eye-bank/{id}', 'DepartmentController@viewEyeBankDepartment');

    Route::get('/api/view/skin-laser-center/{id}', 'DepartmentController@viewSkinLaserCenterDepartment');

    Route::get('/api/view/vaccine-point/{id}', 'DepartmentController@viewVaccinePointDepartment');

    Route::get('/api/view/pharmacy/{id}', 'DepartmentController@viewPharmacyDepartment');

    

});
