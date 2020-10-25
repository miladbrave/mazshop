<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'front\HomeController@index')->name('home');
Route::get('/about', 'front\HomeController@about')->name('about');
Route::get('/cart', 'front\HomeController@cart')->name('cart.self');
Route::get('/category/{id}/{sort?}', 'front\HomeController@category')->name('category');
Route::get('/checkout', 'front\HomeController@checkout')->name('checkout');
Route::get('/contact', 'front\HomeController@contact')->name('contact');
Route::get('fag', 'front\HomeController@fag')->name('fag');
Route::get('video/{id}', 'front\HomeController@video')->name('video');
Route::get('product/{slug}', 'front\HomeController@product')->name('product.self');
Route::get('add_cart/{id}','front\HomeController@addcart')->name('add.cart');
Route::get('add_cart_download/{id}','front\HomeController@addcartdownload')->name('add.cart.download');
Route::get('removeproduct/{id}','front\HomeController@removeproduct')->name('remove.product');
Route::get('addqty/{id}','front\HomeController@addqty')->name('add.qty');
Route::patch('updateUser','front\HomeController@updateuser')->name('updateuser');
Route::get('/profile','front\HomeController@profile')->name('profile');
Route::post('messages/{id?}','front\HomeController@message')->name('contact.messages');
Route::get('removedownloads/{id}','front\HomeController@removedownload')->name('remove.downloads');
Route::get('downloads','front\HomeController@downloads')->name('downloads');
Route::patch('userupdate','front\HomeController@userUpdate')->name('userUpdate');

Route::get('payStatus','front\PayController@payStatus')->name('payStatus');
Route::get('pay','front\PayController@pay')->name('pay');
Route::get('dirpay','front\PayController@pay2')->name('pay2');
Route::any('paypack_callback','front\PayController@paypack_callback')->name('paypack_callback');
Route::post('directpay','front\HomeController@direct')->name('directpay');



Route::group(['prefix'=>'administrator','middleware'=>'admin'], function () {
    Route::get('/', 'back\dashboardController@index')->name('administrator');
    Route::resource('admin', 'back\adminController');
    Route::resource('/product', 'back\productController');
    Route::resource('brand','back\brandsController');
    Route::resource('slider','back\sliderController');
    Route::resource('banner','back\bannersController');
    Route::resource('ads','back\adsController');
    Route::resource('category','back\categoryController');
    Route::resource('attribute','back\attributeController');
    Route::resource('attributeValue','back\attributeValueController');
    Route::resource('message','back\messageController');
    Route::resource('download','back\downloadController');
    Route::post('photo','back\productController@photoStore')->name('productPhoto');
    Route::get('photoDestroy/{id}','back\productController@photoDestroy')->name('photoDestroy');
    Route::post('sendmessagemain','back\dashboardController@sendmain')->name('messages.send.main');
    Route::get('mainmessage','back\dashboardController@mainmessage')->name('mainmessage');

});

Route::group(['prefix'=>'api'], function () {
    Route::get('categories','back\categoryController@first');
    Route::post('categories/attribute','back\categoryController@getAttribute');
    Route::post('searchProducts','back\productController@apiGetProducts');
    Route::post('messageapi','front\HomeController@messageApi');
    Route::get('chart','back\dashboardController@chartApi');
});

