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
Route::get('/fag', 'front\HomeController@fag')->name('fag');
Route::get('/product/{slug}', 'front\HomeController@product')->name('product.self');
Route::get('/search', 'front\HomeController@search');
Route::get('add_cart/{id}','front\HomeController@addcart')->name('add.cart');
Route::get('removeproduct/{id}','front\HomeController@removeproduct')->name('remove.product');
Route::get('addqty/{id}','front\HomeController@addqty')->name('add.qty');
Route::patch('updateUser','front\HomeController@updateuser')->name('updateuser');
Route::get('profile','front\HomeController@profile')->name('profile');
Route::post('messages/{id?}','front\HomeController@message')->name('contact.messages');
Route::get('payStatus','front\PayController@payStatus')->name('payStatus');
Route::get('pay','front\PayController@pay')->name('pay');
Route::any('paypack_callback','front\PayController@paypack_callback')->name('paypack_callback');




Route::group(['prefix'=>'administrator'], function () {
    Route::get('/', 'back\dashboardController@index')->name('administrator');
    Route::resource('/admin', 'back\adminController');
    Route::resource('/product', 'back\productController');
    Route::resource('brand','back\brandsController');
    Route::resource('slider','back\sliderController');
    Route::resource('banner','back\bannersController');
    Route::resource('ads','back\adsController');
    Route::get('users','back\adminController@usersIndex')->name('user');
    Route::post('photo','back\productController@photoStore')->name('productPhoto');
    Route::get('navCategory','back\categoryController@navcateindex')->name('navcategory');
    Route::get('mainCategory','back\categoryController@maincateindex')->name('maincategory');
    Route::get('subCategory','back\categoryController@subcateindex')->name('subcategory');
    Route::post('createcategory','back\categoryController@create')->name('createcategory');
    Route::post('createcategorynav','back\categoryController@createnav')->name('createcategorynav');
    Route::post('createcategorymain','back\categoryController@createmain')->name('createcategorymain');
    Route::get('navcategoryedit/{id}','back\categoryController@edit')->name('navedit');
    Route::patch('navupdate/{id}','back\categoryController@navupdate')->name('navupdate');
    Route::patch('mainupdate/{id}','back\categoryController@mainupdate')->name('mainupdate');
    Route::patch('subupdate/{id}','back\categoryController@subupdate')->name('subupdate');
    Route::delete('categorydestroy/{id}','back\categoryController@destroy')->name('categorydestroy');
    Route::get('attribute','back\attributecontroller@attributeindex')->name('attributeindex');
    Route::get('attributeValue','back\attributecontroller@attributevalueindex')->name('attributevalueindex');
    Route::post('attribute/store','back\attributecontroller@storeattribute')->name('attributestore');
    Route::post('attributeValue/store','back\attributecontroller@storeattributevalue')->name('attributesvaluestore');
    Route::get('attribute/edit/{id}','back\attributecontroller@attributeedit')->name('attributeedit');
    Route::post('attribute/update/{id}','back\attributecontroller@attributeupdate')->name('attributeupdate');
    Route::delete('attribute/delete/{id}','back\attributecontroller@destroy')->name('attributedestroy');
    Route::get('attributevalue/edit/{id}','back\attributecontroller@attributevalueedit')->name('attributevalueedit');
    Route::post('attributevalue/update/{id}','back\attributecontroller@attributesvalueupdate')->name('attributesvalueupdate');
    Route::delete('attributevalue/delete/{id}','back\attributecontroller@destroyAttributeValue')->name('destroyAttributeValue');
    Route::get('photoDestroy/{id}','back\productController@photoDestroy')->name('photoDestroy');
    Route::get('messages','back\dashboardController@messages')->name('messages');
    Route::get('adminMessage','back\dashboardController@sendmessages')->name('send.messages');
    Route::delete('messagesDelete/{id}','back\dashboardController@delete')->name('messages.delete');
    Route::post('sendmessage','back\dashboardController@send')->name('messages.send');
    Route::post('sendmessagemain','back\dashboardController@sendmain')->name('messages.send.main');
    Route::get('mainmessage','back\dashboardController@mainmessage')->name('mainmessage');

});

Route::group(['prefix'=>'api'], function () {
    Route::get('categories','back\categoryController@first');
    Route::post('categories/attribute','back\categoryController@getAttribute');
    Route::post('searchProducts','back\productController@apiGetProducts');
    Route::post('messageapi','front\HomeController@messageApi');
});

