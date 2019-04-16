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

Route::group(['prefix' => 'product-category'], function () {

    Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'ProductController@index');

    Route::get('/add', 'ProductController@viewAddProduct');
    Route::post('/add', 'ProductController@postAddProduct');


    Route::get('/view/{id}', 'ProductController@viewProduct');

    Route::get('/edit/{id}', 'ProductController@viewEditProduct');
    Route::post('/edit/{id}', 'ProductController@postEditProduct');

    Route::get('/delete/{id}', 'ProductController@deleteProduct');

    


    //sub product
    Route::get('/sub-category', 'SubProductController@index');

    Route::get('/sub-category/add', 'SubProductController@viewAddSubProduct');
    Route::post('/sub-category/add', 'SubProductController@postAddSubProduct');

    Route::get('/sub-category/view/{id}', 'SubProductController@viewSubProduct');

    Route::get('/sub-category/edit/{id}', 'SubProductController@viewEditSubProduct');
    Route::post('/sub-category/edit/{id}', 'SubProductController@postEditSubProduct');

    Route::get('/sub-category/delete/{id}', 'SubProductController@deleteSubProduct');
});

    // api for product Category
    Route::get('/api/pharmacy/get-selected-product-category/{id}', 'ProductController@getSelectedPharmacyProductCategory');
    Route::get('/api/herbal-center/get-selected-product-category/{id}', 'ProductController@getSelectedHerbalCenterProductCategory');
    Route::get('/api/list', 'ProductController@getProductCategory');

    Route::get('/api/view/pharmacy/{id}', 'ProductController@viewPharmacyProductCategory');
    Route::get('/api/view/herbal-center/{id}', 'ProductController@viewHerbalCenterProductCategory');


    //api for Subproduct Category

    Route::get('/api/pharmacy/get-selected-product-subcategory/{id}', 'SubProductController@getSelectedPharmacySubProductCategory');
    Route::get('/api/herbal-center/get-selected-product-subcategory/{id}', 'SubProductController@getSelectedHerbalCenterSubProductCategory');
    Route::get('/sub-category/api/list/{id}', 'SubProductController@getSubProductCategory');

    Route::get('/product-subcategory/api/view/pharmacy/{id1}/{id2}', 'SubProductController@viewPharmacySubProductCategory');
    Route::get('/product-subcategory/api/view/herbal-center/{id1}/{id2}', 'SubProductController@viewHerbalCenterSubProductCategory');

    
});
