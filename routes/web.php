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



//Route::get('/user/1', function () {
//    return view('sampath/user');
//});

Route::get('user/edit', 'UserProfileController@index');


//Route::get('/user/2', function () {
//    return view('commercial/user');
//});
//
//Route::get('/user/3', function () {
//    return view('seylan/user');
//});


Route::get('add-to-bucket/{id}', [
    'uses' => 'ProductController@getAddToBucket',
    'as' => 'product.AddToBucket'
]);

Route::get('/', 'UserController@welcome');
Route::post('/signin', 'UserController@signin');
Route::get('/signout', 'UserController@signout');

Route::get('/client-profile/{id}', 'ClientController@show');

Route::get('add-to-bucket/{id}', 'ProductController@getAddToBucket');


//Route::get('/user', 'UserController@index');
Route::get('/sampath/brands', 'BrandsController@sampath_brands');
Route::get('/sampath/brands/{brand}/{id}', 'CategoryController@sampath_category');
Route::get('/sampath/category/{category}/{id}', 'ProductController@sampath_products');


Route::get('/brands/{brand}/{id}', 'CategoryController@index');
Route::get('/category/{category}/{id}', 'ProductController@index');
//Route::get('/product/{product}/{id}', 'CartController@index');

Route::resource('shop', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
Route::resource('brands', 'BrandsController', ['only' => ['index', 'show']]);
Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
//Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

//Route::resource('wishlist', 'WishlistController');
//Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
//Route::post('switchToCart/{id}', 'WishlistController@switchToCart');


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
        Route::get('/create-users', 'UserController@create');
        Route::get('/create-users/{id}', 'UserController@edit');
//        Route::get('/delete-users/{id}', 'UserController@delete');
        Route::get('/manage-user-designations', 'DesignationController@index');
        Route::get('/manage-user-designations/{id}', 'DesignationController@edit');

        Route::get('/manage-user-privileges', function () {
            return view('/admin/users/manage-user-privileges');
        });
        Route::get('/manage-users', 'UserController@mange_user');
        Route::get('/manage-users/approved/{id}', 'UserController@approved');
        Route::get('/manage-users/unapproved/{id}', 'UserController@unapproved');
//            return view('/admin/users/manage-users');
//        });
        Route::post('/store', 'UserController@store');
        Route::post('/update', 'UserController@update');
        Route::post('/delete', 'UserController@delete');
        Route::post('/designation/store', 'DesignationController@store');
        Route::post('/designation/update', 'DesignationController@update');
    });

    Route::group(['prefix' => '/manage-clients'], function () {
        Route::get('/', 'ClientController@index');
        Route::get('/update-profile/{id}', 'ClientController@update_profile');
        Route::post('/store', 'ClientController@store');
        Route::post('/update', 'ClientController@update');

        Route::get('/agent-assign', function () {
            return view('/admin/clients/agent-assign');
        });
        Route::get('/check-assignments', function () {
            return view('/admin/clients/check-assignments');
        });
    });

    Route::get('/manage-product-list', 'ProductController@assign_products_to_client');

});
