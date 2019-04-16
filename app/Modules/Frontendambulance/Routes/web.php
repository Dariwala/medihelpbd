<?php



Route::group(['prefix' => 'frontendambulance'], function () {
    Route::get('/view/{id1}/{id2}', 'FrontendAmbulanceController@viewAmbulance');
});
