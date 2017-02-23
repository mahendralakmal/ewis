<?php


Route::get('add-to-bucket/{id}','BucketController@getAddToBucket');

Route::get('/', 'UserController@welcome');
Route::post('/signin', 'UserController@signin');
Route::get('/signout', 'UserController@signout');
Route::get('/signup', 'UserController@signup');
Route::post('/signup/go', 'UserController@signup_store');

Route::group(['prefix' => ' /client-profile'], function () {
    Route::get('/{id}', 'ClientController@show');
    Route::get('/{id}/bucket', 'BucketController@getBucket');

    Route::get('/{id}/edit', 'ClientController@editClientProfile');
    Route::post('/{id}/postCheckout', 'BucketController@postCheckout');
    Route::get('/{id}/brands', 'BrandsController@brands');
    Route::get('/{id}/{brand}/{brand_id}', 'CategoryController@category');
    Route::get('/{id}/checkout', 'BucketController@Checkout');
    Route::get('/{id}/{brand}/{category}/{category_id}', 'ProductController@products');
    Route::get('/{id}/{part_no}', 'ProductController@index');
    Route::get('{id}/bucket/history', 'BucketController@getHistory');
    Route::post('/add-to-bucket', 'BucketController@getAddToBucket');
});

Route::get('/brands/{brand}/{id}', 'CategoryController@index');
Route::get('/category/{category}/{id}', 'ProductController@index');

Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
Route::resource('brands', 'BrandsController', ['only' => ['index', 'show']]);
Route::delete('emptyBucket', 'BucketController@emptyBucket');


//=====================================================================================================================

Route::group(['prefix' => ' /admin'], function () {
    Route::get('/', function () {
        return view('/admin/home');
    });
    Route::group(['prefix' => '/brands'], function () {
        Route::get('/', 'BrandsController@admin_index');
        Route::get('/{id}', 'BrandsController@edit');
        Route::post('/store', 'BrandsController@store');
        Route::post('/update', 'BrandsController@update');
        Route::get('/{id}/remove', 'BrandsController@delete');
    });

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'CategoryController@admin_index');
        Route::get('/{id}', 'CategoryController@edit');
        Route::post('/store', 'CategoryController@store');
        Route::post('/update', 'CategoryController@update');
        Route::get('/{id}/remove', 'CategoryController@delete');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', 'ProductController@admin_index');
        Route::get('/{id}', 'ProductController@edit');
        Route::post('/store', 'ProductController@store');
        Route::post('/update', 'ProductController@update');
        Route::get('/{id}/remove', 'ProductController@delete');
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
        Route::post('/cp_update', 'ClientController@cp_update');
        Route::post('/update', 'ClientController@update');
        Route::get('/check-assignments/{id}', 'AgentController@check_assignment');
//        {
//            return view('/admin/clients/check-assignments');
//        });

        Route::get('/agent-assign/{id}', 'AgentController@index');
        Route::get('/assign/{user}/{agent}/{id}', 'AgentController@assign');
        Route::get('/remove/{user}/{agent}/{id}', 'AgentController@remove');
    });

    Route::group(['prefix' => '/manage-product-list'], function () {
        Route::get('/{id}', 'ProductController@assign_products_to_client');
        Route::get('/category/{id}', 'ProductController@load_categories');
        Route::get('/product/{id}', 'ProductController@load_products');
        Route::get('/product/details/{id}', 'ProductController@load_products_deta');
        Route::post('/product/details/{id}/store', 'ProductController@store_client_products');
    });

});
