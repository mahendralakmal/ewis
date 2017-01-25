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


Route::get('/admin', function()
{
    return view('/admin/home');
});

Route::get('/admin/brands', 'BrandsController@admin-index');
Route::get('/admin/categories', function()
{
    return view('/admin/category');
});
Route::get('/admin/products', function()
{
    return view('/admin/products');
});
Route::get('/admin/manage-users', function()
{
    return view('/admin/manage-users');
});
Route::get('/admin/manage-clients', function()
{
    return view('/admin/manage-clients');
});