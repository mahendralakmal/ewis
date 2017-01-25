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
    return View::make('/admin/home');
});

Route::get('/admin/charts', function()
{
    return View::make('/admin/mcharts');
});

Route::get('/admin/tables', function()
{
    return View::make('/admin/table');
});

Route::get('/admin/forms', function()
{
    return View::make('/admin/form');
});

Route::get('/admin/grid', function()
{
    return View::make('/admin/grid');
});

Route::get('/admin/buttons', function()
{
    return View::make('/admin/buttons');
});


Route::get('/admin/icons', function()
{
    return View::make('/admin/icons');
});

Route::get('/admin/panels', function()
{
    return View::make('/admin/panel');
});

Route::get('/admin/typography', function()
{
    return View::make('/admin/typography');
});

Route::get('/admin/notifications', function()
{
    return View::make('/admin/notifications');
});

Route::get('/admin/blank', function()
{
    return View::make('/admin/blank');
});

Route::get('/admin/login', function()
{
    return View::make('/admin/login');
});

Route::get('/admin/documentation', function()
{
    return View::make('/admin/documentation');
});