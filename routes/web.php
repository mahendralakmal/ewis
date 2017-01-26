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




Route::group(['prefix' => '/admin'], function () {
    Route::get('/', function () { return view('/admin/home'); });
    Route::group(['prefix' => '/brands'], function () {
        Route::get('/', 'BrandsController@admin_index');
        Route::post('/store', 'BrandsController@store');
    });

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'CategoryController@admin_index');
        Route::post('/store', 'CategoryController@store');
    });

    Route::get('/products', 'ProductController@admin_index');

    Route::get('/manage-users', function () {
        return view('/admin/manage-users');
    });
    Route::get('/manage-clients', function () {
        return view('/manage-clients');
    });

});
