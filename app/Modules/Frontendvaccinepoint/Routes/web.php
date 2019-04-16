<?php




Route::group(['prefix' => 'frontendvaccinepoint'], function () {
    Route::get('/view/{id1}/{id2}', 'FrontendVaccinePointController@viewVaccinePoint');
});