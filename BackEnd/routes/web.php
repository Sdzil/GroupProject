<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' =>false, 'verify' =>false]);

Route::get('/admin', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware(['auth'])->group(function(){

    // //Banner管理
    // Route::get('banners', 'BannerController@index');
    // Route::get('banners/create', 'BannerController@create');
    // Route::post('banners/store', 'BannerController@store');
    // Route::get('banners/edit/{id}', 'BannerController@edit');
    // Route::post('banners/update/{id}', 'BannerController@update');
    // Route::get('banners/destroy/{id}', 'BannerController@destroy');

    //第一層產品類型管理
    Route::get('productMainClasses', 'productMainClassController@index');
    Route::get('productMainClasses/create', 'productMainClassController@create');
    Route::post('productMainClasses/store', 'productMainClassController@store');
    Route::get('productMainClasses/edit/{id}', 'productMainClassController@edit');
    Route::post('productMainClasses/update/{id}', 'productMainClassController@update');
    Route::get('productMainClasses/destroy/{id}', 'productMainClassController@destroy');

    //第二層產品類型管理
    Route::get('productClasses', 'productClassController@index');
    Route::get('productClasses/create', 'productClassController@create');
    Route::post('productClasses/store', 'productClassController@store');
    Route::get('productClasses/edit/{id}', 'productClassController@edit');
    Route::post('productClasses/update/{id}', 'productClassController@update');
    Route::get('productClasses/destroy/{id}', 'productClassController@destroy');

    //第三層產品類型管理
    Route::get('productTypes', 'productTypeController@index');
    Route::get('productTypes/create', 'productTypeController@create');
    Route::post('productTypes/store', 'productTypeController@store');
    Route::get('productTypes/edit/{id}', 'productTypeController@edit');
    Route::post('productTypes/update/{id}', 'productTypeController@update');
    Route::get('productTypes/destroy/{id}', 'productTypeController@destroy');

    //產品管理
    Route::get('products', 'ProductController@index');
    Route::get('products/create', 'ProductController@create');
    Route::post('products/store', 'ProductController@store');
    Route::get('products/edit/{id}', 'ProductController@edit');
    Route::post('products/update/{id}', 'ProductController@update');
    Route::get('products/destroy/{id}', 'ProductController@destroy');

    //產品類型管理
    Route::get('product_types', 'ProductTypeController@index');
    Route::get('product_types/create', 'ProductTypeController@create');
    Route::post('product_types/store', 'ProductTypeController@store');
    Route::get('product_types/edit/{id}', 'ProductTypeController@edit');
    Route::post('product_types/update/{id}', 'ProductTypeController@update');
    Route::get('product_types/destroy/{id}', 'ProductTypeController@destroy');

    //聯絡表單管理
    Route::get('contacts', 'ContactController@index');
    Route::get('contacts/create', 'ContactController@create');
    Route::post('contacts/store', 'ContactController@store');
    Route::get('contacts/edit/{id}', 'ContactController@edit');
    Route::post('contacts/update/{id}', 'ContactController@update');
    Route::get('contacts/destroy/{id}', 'ContactController@destroy');

});
