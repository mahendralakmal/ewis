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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//
//Route::get('/category/{title}/{id}', 'ProductController@index');


Route::get('/user/1', function () {
    return view('sampath/user');
});

Route::get('/user/2', function () {
    return view('commercial/user');
});

Route::get('/user/3', function () {
    return view('seylan/user');
});

//Route::get('/user', 'UserController@index');
Route::get('/brands/{brand}/{id}', 'CategoryController@index');
Route::get('/category/{category}/{id}', 'ProductController@index');
//Route::get('/product/{product}/{id}', 'CartController@index');

Route::resource('shop', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
Route::resource('brands', 'BrandsController', ['only' => ['index', 'show']]);
Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');


//=====================================================================================================================

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', function () {
        return view('/admin/home');
    });
    Route::group(['prefix' => '/brands'], function () {
        Route::get('/', 'BrandsController@admin_index');
        Route::post('/store', 'BrandsController@store');
    });

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'CategoryController@admin_index');
        Route::post('/store', 'CategoryController@store');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', 'ProductController@admin_index');
        Route::post('/store', 'ProductController@store');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/create-users', function () {
            return view('/admin/users/create-user');
        });
        Route::get('/manage-user-privileges', function () {
            return view('/admin/users/manage-user-privileges');
        });
        Route::get('/manage-users', function () {
            return view('/admin/users/manage-users');
        });
    });

    Route::group(['prefix' => '/manage-clients'], function () {
        Route::get('/', function () {
            return view('/admin/clients/manage-client');
        });
        Route::get('/update-profile', function () {
            return view('/admin/clients/client-profile');
        });
        Route::get('/agent-assign', function () {
            return view('/admin/clients/agent-assign');
        });
    });

});