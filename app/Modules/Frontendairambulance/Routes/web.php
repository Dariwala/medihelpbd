<?php

Route::group(['prefix' => 'frontendairambulance'], function () {
    Route::get('/view/{id1}/{id2}', 'FrontendAirAmbulanceController@viewAirAmbulance');
});