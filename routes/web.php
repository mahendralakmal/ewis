<?php
use Illuminate\Support\Facades\Redirect;

Route::get('/ewis-home', function (){ return Redirect::to('http://www.ewisperipherals.lk/');});

Route::get('add-to-bucket/{id}', 'BucketController@getAddToBucket');

Route::get('/', 'UserController@welcome');
Route::post('/signin', 'UserController@signin');
Route::get('/signout', 'UserController@signout');
Route::get('/signup', 'UserController@signup');
Route::post('/signup/go', 'UserController@signup_store');
Route::get('/reset-password', 'UserController@password_reset_request');
Route::post('/reset-password-request', 'UserController@password_reset_request_send');
Route::get('/password/reset/{token}','UserController@password_reset_view');
Route::post('/reset-password', 'UserController@pass_reset');


Route::get('/remove_item/{part_no}', 'BucketController@remove_item');

Route::group(['prefix' => ' /client-profile'], function () {
    Route::get('/{id}', 'ClientController@show');
    Route::get('/{id}/bucket', 'BucketController@getBucket');
    Route::get('/{id}/bucket/history', 'BucketController@getHistory');
    Route::get('/po-details/{id}', 'BucketController@historyPODetails');

    Route::get('/{id}/edit', 'ClientController@editClientProfile');
    Route::post('/{id}/postCheckout', 'BucketController@postCheckout');
    Route::post('/SendMail', 'MailController@SendMail');

    Route::get('/{id}/brands', 'BrandsController@brands');
    Route::get('/{id}/{branch}/{brand}/{category}', 'ProductController@products');
    Route::get('/{id}/{brand}/{brand_id}', 'CategoryController@category');

    Route::get('/{id}/checkout', 'BucketController@Checkout');
    Route::get('/{id}/{part_no}', 'ProductController@index');
    Route::post('/add-to-bucket', 'BucketController@getAddToBucket');

});

Route::get('/sendmail', 'MailController@sendmail');
Route::get('/brands/{brand}/{id}', 'CategoryController@index');
Route::get('/category/{category}/{id}', 'ProductController@index');

Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
Route::resource('brands', 'BrandsController', ['only' => ['index', 'show']]);
Route::delete('emptyBucket', 'BucketController@emptyBucket');


//=====================================================================================================================

Route::group(['prefix' => '/admin'], function () {

    Route::get('/clean', function (){
        session()->forget('success_message');
        session()->forget('error_message');
    });

    Route::get('/', function () {
        return view('/admin/home');
    });

    Route::get('/getPendingPoCount', 'BucketController@getPendingPoCount');

    Route::get('/getPCompletePoCount', 'BucketController@getPCompletePoCount');

    Route::get('/test', function () {
        return view('/admin/test');
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
        Route::get('/manage-user-designations', 'DesignationController@index');
        Route::get('/manage-user-designations/{id}', 'DesignationController@edit');

        Route::get('/manage-users', 'UserController@mange_user');
        Route::get('/manage-users/{user}/privileges', 'UserController@showPrivileges');
        Route::post('/manage-users/privileges/store', 'UserController@StorePrivileges');
        Route::post('/manage-users/privileges/update', 'UserController@UpdatePrivileges');

        Route::get('/manage-users/approved/{id}', 'UserController@approved');
        Route::get('/manage-users/unapproved/{id}', 'UserController@unapproved');

        Route::post('/store', 'UserController@store');
        Route::post('/update', 'UserController@update');
        Route::post('/delete', 'UserController@delete');
        Route::post('/designation/store', 'DesignationController@store');
        Route::post('/designation/update', 'DesignationController@update');
    });

    Route::group(['prefix' => '/purchase-orders'], function () {
        Route::get('/purchase-orders-view', 'BucketController@getPurchaseOrder');
        Route::get('/purchase-orders-pending', 'BucketController@pendingPurchaseOrder');
        Route::get('/purchase-orders-processing', 'BucketController@processingPurchaseOrder');
        Route::get('/purchase-orders-partial-completed', 'BucketController@pcPurchaseOrder');
        Route::get('/purchase-orders-completed', 'BucketController@CompletedPurchaseOrders');
    });

    Route::group(['prefix' => '/manage-clients'], function () {
        Route::get('/', 'ClientController@index');
        Route::get('/create-clientuser', 'UserController@client');
        Route::get('/create-clientuser/{id}', 'UserController@clientedit');
        Route::get('/create-profile/', 'ClientController@create_profile');
        Route::get('/update-profile/{id}', 'ClientController@update_profile');
        Route::get('/approval', 'ClientController@approval');
        Route::get('/approved/{id}', 'ClientController@approved');
        Route::get('/unapproved/{id}', 'ClientController@unapproved');
        Route::post('/store', 'ClientController@store');
        Route::post('/cp_update', 'ClientController@cp_update');
        Route::post('/update', 'ClientController@update');
        Route::get('/check-assignments/{id}', 'AgentController@check_assignment');



        Route::get('/purchase-orders/{from}/{to}/{status}', 'BucketController@ajaxPurchaseOrderStatus');
        Route::get('/po-details/{id}', 'BucketController@getPODetails');
        Route::get('/po-details/change_status/{id}/{status}', 'BucketController@change_status');

        Route::get('/client_branch/{client_id}', 'ClientController@get_client_Branches');

        Route::get('/client_user/{user}', 'AgentController@client_user');

        Route::get('/client_user/{user}/activate', 'AgentController@client_user_activate');
        Route::get('/client_user/{user}/deactivate', 'AgentController@client_user_deactivate');
        Route::post('/agent-assign/store', 'AgentController@store');
        Route::post('/agent-assign/update', 'AgentController@update');
        Route::get('/agent-assign/{id}', 'AgentController@index');
        Route::get('/assign/{branch}/{agent}', 'AgentController@assign');
        Route::get('/remove/{branch}/{agent}', 'AgentController@remove');

        Route::get('/create-branch', 'ClientsBranchController@create');
        Route::post('/create-branch', 'ClientsBranchController@store');
        Route::post('/update-branch', 'ClientsBranchController@update');
        Route::get('/create-branch/{id}/edit', 'ClientsBranchController@edit');
//        Route::get('/create-branch/{id}/remove', 'ClientsBranchController@remove');
    });

    Route::group(['prefix' => '/reports'], function () {

        Route::get('/client-wise-purchase-orders','BucketController@CompletedPurchaseOrder');
        Route::get('/agent-wise-purchase-orders','BucketController@AgentPurchaseOrder');
        Route::get('/sectorhead-wise-purchase-orders','BucketController@SectorHeadPurchaseOrder');
        Route::get('/all-purchase-orders','BucketController@AllPurchaseOrder');
        Route::get('/all-products-list','ProductController@getAllProducts');
        Route::post('/client-wise-purchase-orders','BucketController@getPurchaseOrdersByClient');
        Route::post('/agent-wise-purchase-orders','BucketController@getPurchaseOrdersByAccountManager');
        Route::post('/sectorhead-wise-purchase-orders','BucketController@getPurchaseOrdersBySectorHead');
        Route::post('/all-purchase-orders','BucketController@getAllPurchaseOrders');

        Route::post('/account-manager-wise-price-list','BucketController@getPLByAccMgr');
        Route::get('/account-manager-wise-price-list','BucketController@getPriceListByAccMgr');

        Route::get('/get-brands/{brands}','BrandsController@get_brands');
        Route::get('/get-category/{id}','CategoryController@get_categories');
        Route::get('/get-product/{id}','ProductController@get_products');
    });

    Route::group(['prefix' => '/manage-product-list'], function () {
        Route::get('/{id}', 'ProductController@assign_products_to_client');
        Route::get('/ccategory/category/{id}', 'ProductController@load_ccategory_details');
        Route::get('/ccategory/{brand}/{branch}', 'ProductController@load_ccategories');
        Route::get('/category/{id}', 'ProductController@load_categories');
        Route::get('/cproduct/product/{id}', 'ProductController@load_cproducts_details');

        Route::get('/cproduct/{id}', 'ProductController@load_cproducts');

        Route::get('/cproduct/{brand}/{branch}', 'ProductController@load_cproducts_ccategorie');

        Route::get('/product/{id}', 'ProductController@load_products');
        Route::get('/product/details/{id}', 'ProductController@load_products_deta');
        Route::post('/product/details/{id}/store', 'ProductController@store_client_products');
        Route::get('/product/details/edit/{id}', 'ProductController@edit_client_products');
        Route::post('/product/details/update', 'ProductController@update_client_products');
        Route::get('/product/details/remove/{id}', 'ProductController@remove_client_products');

        Route::get('/{id}/brands', 'BrandsController@assign_brands_to_client');
        Route::post('/brand/details/{id}/store', 'BrandsController@store_client_brands');
        Route::post('/brand/details/update', 'BrandsController@update_client_brands');
        Route::get('/brand/details/remove/{id}', 'BrandsController@remove_client_brands');
        Route::get('/brand/details/edit/{id}', 'BrandsController@edit_client_brands');
        Route::post('/brand/details/update', 'BrandsController@update_client_brands');
        Route::get('/brand/details/remove/{id}', 'BrandsController@remove_client_brands');

        Route::get('/{id}/categories', 'CategoryController@assign_category_to_client');
        Route::post('/category/details/{id}/store', 'CategoryController@store_client_category');
        Route::post('/category/details/update', 'CategoryController@update_client_category');
        Route::get('/category/details/remove/{id}', 'CategoryController@remove_client_category');
        Route::get('/category/details/edit/{id}', 'CategoryController@edit_client_category');
        Route::post('/category/details/update', 'CategoryController@update_client_category');
        Route::get('/category/details/remove/{id}', 'CategoryController@remove_client_category');
    });
});
