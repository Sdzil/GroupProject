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

// Route::get('/', function () {
//     return view('welcome');
// });

////前端控制器////
Route::get('/', 'FrontController@index');

Route::get('/layouts', 'FrontController@layouts');

Route::get('/news', 'FrontController@news');

Route::get('/news/Info/{id}', 'FrontController@newsInfo');

Route::get('/product/cloth', 'FrontController@cloth');

Route::get('/product/cloth/{id}', 'FrontController@clothInfo');

Route::get('/product/sport', 'FrontController@sport');

Route::get('/product/sport/{id}', 'FrontController@sportInfo');

Route::get('/contacts', 'FrontController@contacts');

Route::post('/contacts/store', 'FrontController@contacts_store');




////後端控制器////
Auth::routes(['register' => false, 'reset' =>false, 'verify' =>false]);

Route::get('/admin', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware(['auth'])->group(function(){

    //Banner管理
    Route::get('banners', 'BannerController@index');
    Route::get('banners/create', 'BannerController@create');
    Route::post('banners/store', 'BannerController@store');
    Route::get('banners/edit/{id}', 'BannerController@edit');
    Route::post('banners/update/{id}', 'BannerController@update');
    Route::get('banners/destroy/{id}', 'BannerController@destroy');

    //消息表單管理
    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/update/{id}', 'NewsController@update');
    Route::get('news/destroy/{id}', 'NewsController@destroy');

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

    //庫存管理
    Route::get('stocks', 'StockController@index');
    Route::get('stocks/create', 'StockController@create');
    Route::post('stocks/store', 'StockController@store');
    Route::get('stocks/edit/{id}', 'StockController@edit');
    Route::post('stocks/update/{id}', 'StockController@update');
    Route::get('stocks/destroy/{id}', 'StockController@destroy');

    //聯絡表單管理
    Route::get('contacts', 'ContactController@index');
    Route::get('contacts/create', 'ContactController@create');
    Route::post('contacts/store', 'ContactController@store');
    Route::get('contacts/edit/{id}', 'ContactController@edit');
    Route::post('contacts/update/{id}', 'ContactController@update');
    Route::get('contacts/destroy/{id}', 'ContactController@destroy');

    //summernote
    Route::post('/ajax_upload_img','AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img','AdminController@ajax_delete_img');

    //cart
    Route::get('cart','CartController@cart'); //購物車頁
    Route::get('checkout','CartController@checkout'); //結帳頁 - 填寫付款方式,收件人資料
    Route::post('/addcart','CartController@addcart'); //一個產品加入購物車
    Route::post('/changeProductQty','CartController@changeProductQty'); //於結帳頁修改產品數量
    Route::post('/deleteProductInCart','CartController@deleteProductInCart'); //於結帳頁刪除產品


});
