<?php



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('english','LanguageController@english');
Route::get('bangla','LanguageController@bangla');

Route::get('password/change', 'Auth\ChangePasswordController@index')->name('change_password_index');
Route::post('password/change/{id}', 'Auth\ChangePasswordController@change')->name('change_password');
