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

Route::group(['prefix' => 'district'], function () {

    Route::group(['middleware' => 'auth'], function () {
    //district
    Route::get('/', 'DistrictController@index');

    Route::get('/add', 'DistrictController@viewAddDistrict');
    Route::post('/add', 'DistrictController@postAddDistrict');

    Route::get('/view/{id}', 'DistrictController@viewDistrict');

    Route::get('/edit/{id}', 'DistrictController@viewEditDistrict');
    Route::post('/edit/{id}', 'DistrictController@postEditDistrict');

    Route::get('/delete/{id}', 'DistrictController@deleteDistrict');




    //sub district
    Route::get('/sub-district', 'SubDistrictController@index');

    Route::get('/sub-district/add', 'SubDistrictController@viewAddSubDistrict');
    Route::post('/sub-district/add','SubDistrictController@postAddSubDistrict');

    Route::get('/sub-district/view/{id}', 'SubDistrictController@viewSubDistrict');

    Route::get('/sub-district/edit/{id}', 'SubDistrictController@viewEditSubDistrict');
    Route::post('/sub-district/edit/{id}', 'SubDistrictController@postEditSubDistrict');

    Route::get('/sub-district/delete/{id}', 'SubDistrictController@deleteSubDistrict');


   });




    //Api for district

    Route::get('/api/list', 'DistrictController@getDistrict');

    Route::get('/api/hospital/get-selected-district/{id}', 'DistrictController@getSelectedDistrict');

    Route::get('/api/addiction/get-selected-district/{id}', 'DistrictController@getSelectedDistrictAddiction');

    Route::get('/api/gym/get-selected-district/{id}', 'DistrictController@getSelectedDistrictGym');

    Route::get('/api/yoga/get-selected-district/{id}', 'DistrictController@getSelectedDistrictYoga');

    Route::get('/api/parlour/get-selected-district/{id}', 'DistrictController@getSelectedDistrictParlour');

    Route::get('/api/herbal-center/get-selected-district/{id}', 'DistrictController@getSelectedDistrictHerbalCenter');

    Route::get('/api/skin-laser-center/get-selected-district/{id}', 'DistrictController@getSelectedDistrictSkinLaserCenter');

    Route::get('/api/vaccine-point/get-selected-district/{id}', 'DistrictController@getSelectedDistrictVaccinePoint');

    Route::get('/api/pharmacy/get-selected-district/{id}', 'DistrictController@getSelectedDistrictPharmacy');

    Route::get('/api/medical-specialist/get-selected-district/{id}', 'DistrictController@getSelectedDistrictMedicalspecialist');

    Route::get('/api/blood-bank/get-selected-district/{id}', 'DistrictController@getSelectedDistrictBloodBank');

    Route::get('/api/eye-bank/get-selected-district/{id}', 'DistrictController@getSelectedDistrictEyeBank');

    Route::get('/api/blood-donor/get-selected-district/{id}', 'DistrictController@getSelectedDistrictBloodDonor');

    Route::get('/api/ambulance/get-selected-district/{id}', 'DistrictController@getSelectedDistrictAmbulance');

    Route::get('/api/air-ambulance/get-selected-district/{id}', 'DistrictController@getSelectedDistrictAirAmbulance');

    Route::get('/api/foreignmedical/get-selected-district/{id}', 'DistrictController@getSelectedDistrictForeignmedical');

    Route::get('/api/homeopathic/get-selected-district/{id}', 'DistrictController@getSelectedDistrictHomeopathic');

    Route::get('/api/optical/get-selected-district/{id}', 'DistrictController@getSelectedDistrictOptical');

    Route::get('/api/pharmacynew/get-selected-district/{id}', 'DistrictController@getSelectedDistrictPharmacynew');

    Route::get('/api/physiotherapy/get-selected-district/{id}', 'DistrictController@getSelectedDistrictPhysiotherapy');





    //Api fro subdistrict
    Route::get('/sub-district/api/list/{id}', 'SubDistrictController@getSubDistrict');
    
    Route::get('/api/hospital/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrict');

    Route::get('/api/addiction/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictAddiction');

    Route::get('/api/gym/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictGym');

    Route::get('/api/yoga/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictYoga');
    
    Route::get('/api/parlour/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictParlour');

    Route::get('/api/herbal-center/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictHerbalCenter');

    Route::get('/api/skin-laser-center/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictSkinLaserCenter');

    Route::get('/api/vaccine-point/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictVaccinePoint');

    Route::get('/api/pharmacy/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictPharmacy');

    Route::get('/api/medical-specialist/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictMedicalSpecialist');

    Route::get('/api/blood-bank/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictBloodBank');

    Route::get('/api/eye-bank/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictEyeBank');

    Route::get('/api/blood-donor/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictBloodDonor');

    Route::get('/api/air-ambulance/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictAirAmbulance');

    Route::get('/api/ambulance/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictAmbulance');

    Route::get('/api/foreignmedical/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictForeignmedical');

    Route::get('/api/homeopathic/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictHomeopathic');

    Route::get('/api/optical/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictOptical');

    Route::get('/api/pharmacynew/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictPharmacynew');

    Route::get('/api/physiotherapy/get-selected-subdistrict/{id}', 'SubDistrictController@getSelectedSubDistrictPhysiotherapy');


});
