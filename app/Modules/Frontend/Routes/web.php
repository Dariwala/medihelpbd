<?php



Route::get('/', function () {
    return view('frontend::home');
});

Route::get('/contact-list', 'FrontendController@viewContactList');

Route::get('/vision', 'FrontendController@vision');
Route::get('/contact', 'FrontendController@contact');
Route::get('/contact/post', 'FrontendController@contact');
Route::post('/contact/post', 'FrontendController@contactPost');
Route::get('/report_delivery', 'FrontendController@reportDelivery');
Route::get('/report_delivery/post', 'FrontendController@reportDelivery');
Route::post('/report_delivery/post', 'FrontendController@reportDeliveryPost');
Route::get('/make-appointment', 'FrontendController@appointment');
Route::get('/helpline', 'FrontendController@emergency_helpline');
Route::get('/service-entry', 'FrontendController@serviceEntry');
Route::get('/faq', 'FrontendController@faq');
Route::get('/services-list', 'FrontendController@serviceList');
Route::get('/latest-news', 'FrontendController@latestNews');
Route::get('/special-notice', 'FrontendController@specialNotice');


Route::group(['prefix' => 'frontendaddiction'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendAddictionController@viewAddiction');
});

Route::group(['prefix' => 'frontendparlour'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendParlourController@viewParlour');
});

Route::group(['prefix' => 'frontendforeignmedical'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendForeignmedicalController@viewForeignmedical');
});

Route::group(['prefix' => 'frontendgym'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendGymController@viewGym');
});

Route::group(['prefix' => 'frontendphysiotherapy'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendPhysiotherapyController@viewPhysiotherapy');
});

Route::group(['prefix' => 'frontendhomeopathic'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendHomeopathicController@viewHomeopathic');
});

Route::group(['prefix' => 'frontendoptical'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendOpticalController@viewOptical');
});

Route::group(['prefix' => 'frontendpharmacynew'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendPharmacynewController@viewPharmacynew');
});

Route::group(['prefix' => 'frontendyoga'], function () {
    Route::get('/view/{id1}/{id2}', 'ServiceDetails\FrontendYogaController@viewYoga');
});
// This route is old should be remove START
Route::post('/sevice-enty-contact','FrontendController@contactAdmin')->name('sevice.enty.contact');
// This route is old should be remove END


// Service Provider
Route::post('/service-24-hours-pharmacy','ServiceproviderController@pharmacy24hours')->name('service-pharmacy24hours');
Route::post('/service-addiction-rehabilitation-center','ServiceproviderController@addictionrehabilitationcenter')->name('service-addiction-rehabilitation-center');
Route::post('/service-air-ambulance','ServiceproviderController@airambulance')->name('service-air-ambulance');
Route::post('/service-ambulance','ServiceproviderController@ambulance')->name('service-ambulance');
Route::post('/service-beauty-parlour-and-spa','ServiceproviderController@parlourandspa')->name('service-beauty-parlour-and-spa');
Route::post('/service-blood-bank','ServiceproviderController@bloodbank')->name('service-blood-bank');
Route::post('/service-blood-donor','ServiceproviderController@blooddonor')->name('service-blood-donor');
Route::post('/service-doctor-panel','ServiceproviderController@doctorpanel')->name('service-doctor-panel');
Route::post('/service-eye-bank','ServiceproviderController@eyebank')->name('service-eye-bank');
Route::post('/service-foreign-medical-info','ServiceproviderController@foreginmedical')->name('service-foreign-medical-info');
Route::post('/service-gym','ServiceproviderController@gym')->name('service-gym');
Route::post('/service-health-care-center','ServiceproviderController@healthcarecenter')->name('service-health-care-center');
Route::post('/service-herbal-medicine-center','ServiceproviderController@herbalmedicinecenter')->name('service-herbal-medicine-center');
Route::post('/service-homeopathic-medicine-center','ServiceproviderController@homeopathicmedicinecenter')->name('service-homeopathic-medicine-center');
Route::post('/service-optical-shop','ServiceproviderController@opticalshop')->name('service-optical-shop');
Route::post('/service-pharmacy','ServiceproviderController@pharmacy')->name('service-pharmacy');
Route::post('/service-physiotherapy','ServiceproviderController@physiotherapy')->name('service-physiotherapy');
Route::post('/service-skincare','ServiceproviderController@skincare')->name('service-skincare');
Route::post('/service-vaccination-center','ServiceproviderController@vaccinationcenter')->name('service-vaccination-center');
Route::post('/service-yoga','ServiceproviderController@yoga')->name('service-yoga');

Route::get('/service-24-hours-pharmacy','FrontendController@serviceEntry')->name('service-pharmacy24hours');
Route::get('/service-addiction-rehabilitation-center','FrontendController@serviceEntry')->name('service-addiction-rehabilitation-center');
Route::get('/service-air-ambulance','FrontendController@serviceEntry')->name('service-air-ambulance');
Route::get('/service-ambulance','FrontendController@serviceEntry')->name('service-ambulance');
Route::get('/service-beauty-parlour-and-spa','FrontendController@serviceEntry')->name('service-beauty-parlour-and-spa');
Route::get('/service-blood-bank','FrontendController@serviceEntry')->name('service-blood-bank');
Route::get('/service-blood-donor','FrontendController@serviceEntry')->name('service-blood-donor');
Route::get('/service-doctor-panel','FrontendController@serviceEntry')->name('service-doctor-panel');
Route::get('/service-eye-bank','FrontendController@serviceEntry')->name('service-eye-bank');
Route::get('/service-foreign-medical-info','FrontendController@serviceEntry')->name('service-foreign-medical-info');
Route::get('/service-gym','FrontendController@serviceEntry')->name('service-gym');
Route::get('/service-health-care-center','FrontendController@serviceEntry')->name('service-health-care-center');
Route::get('/service-herbal-medicine-center','FrontendController@serviceEntry')->name('service-herbal-medicine-center');
Route::get('/service-homeopathic-medicine-center','FrontendController@serviceEntry')->name('service-homeopathic-medicine-center');
Route::get('/service-optical-shop','FrontendController@serviceEntry')->name('service-optical-shop');
Route::get('/service-pharmacy','FrontendController@serviceEntry')->name('service-pharmacy');
Route::get('/service-physiotherapy','FrontendController@serviceEntry')->name('service-physiotherapy');
Route::get('/service-skincare','FrontendController@serviceEntry')->name('service-skincare');
Route::get('/service-vaccination-center','FrontendController@serviceEntry')->name('service-vaccination-center');
Route::get('/service-yoga','FrontendController@serviceEntry')->name('service-yoga');




