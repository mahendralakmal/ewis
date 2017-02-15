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

Route::get('user/edit/{id}', 'ClientController@editClientProfile');


Route::get('add-to-bucket/{id}', [
    'uses' => 'ProductController@getAddToBucket',
    'as' => 'product.AddToBucket'
]);

Route::get('/bucket', [
    'uses' => 'BucketController@getBucket',
    'as' => 'product.bucket'
]);

Route::get('/', 'UserController@welcome');
Route::post('/signin', 'UserController@signin');
Route::get('/signout', 'UserController@signout');

Route::group(['prefix' => ' /client-profile'], function () {
    Route::get('/{id}', 'ClientController@show');
    Route::get('/{id}/brands', 'BrandsController@brands');
    Route::get('/{id}/{brand}/{brand_id}', 'CategoryController@category');
    Route::get('/{id}/{brand}/{category}/{category_id}', 'ProductController@products');
});

Route::get('/brands/{brand}/{id}', 'CategoryController@index');
Route::get('/category/{category}/{id}', 'ProductController@index');
//Route::get('/product/{product}/{id}', 'CartController@index');

Route::resource('user/shop', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
Route::resource('brands', 'BrandsController', ['only' => ['index', 'show']]);
Route::delete('emptyBucket', 'BucketController@emptyBucket');
//Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

//Route::resource('wishlist', 'WishlistController');
//Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
//Route::post('switchToCart/{id}', 'WishlistController@switchToCart');


//=====================================================================================================================

Route::group(['prefix' => ' /admin'], function () {
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
        Route::get('/approval', 'ClientController@approval');
        Route::get('/approved/{id}', 'ClientController@approved');
        Route::get('/unapproved/{id}', 'ClientController@unapproved');
        Route::post('/store', 'ClientController@store');
        Route::post('/update', 'ClientController@update');
        Route::get('/check-assignments', function () {
            return view('/admin/clients/check-assignments');
        });

        Route::get('/agent-assign/{id}', 'AgentController@index');
        Route::get('/assign/{user}/{agent}/{id}', 'AgentController@assign');
        Route::get('/remove/{user}/{agent}/{id}', 'AgentController@remove');
    });

    Route::get('/manage-product-list', 'ProductController@assign_products_to_client');

});
