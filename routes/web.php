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

Route::get('/', 'PagesController@index');
Route::get('/anunturi', 'PagesController@anunturi')->name('anunturi');

//Route::get('/search', 'PagesController@search')->name('search');

//Route::get('/anunturi', 'PagesController@advancedSearch')->name('advancedSearch');

Route::get('/detalii/{id}', 'PagesController@detalii');
Route::get('/categorii/{id}', 'PagesController@categorii');
Route::get('/contact', 'PagesController@contact');



/* FrontEnd Location */
//Route::get('/list-products','IndexController@shop');
//Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
//Route::get('/product-detail/{id}','IndexController@detialpro');
//Route::get('/product-detail/{id}','IndexController@detialpro');


/* Admin Location */
Auth::routes(['register'=>false]);
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index');
    /// Settings Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');
    /// Category Area
    Route::resource('/category','CategoryController');
    Route::get('delete-category/{id}','CategoryController@destroy');
    Route::get('delete-catimage/{id}','CategoryController@deleteImage');
    Route::get('/check_category_name','CategoryController@checkCateName');
    /// Products Area
    Route::resource('/product','ProductsController');
    Route::get('delete-product/{id}','ProductsController@destroy');
    Route::get('delete-image/{id}','ProductsController@deleteImage');
    Route::get('/check_product_code','ProductsController@checkProductCode');
    /// Product Images Gallery
    Route::resource('/image-gallery','ImagesController');
    Route::get('delete-imageGallery/{id}','ImagesController@destroy');
});
