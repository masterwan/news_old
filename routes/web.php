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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// index
Route::get('/categories', 'CategoryController@index')->name('category.index');


// brands
Route::get('/brands', 'BrandController@index')->name('brand.index');
Route::get('/brands/{name}', 'BrandController@show')->name('brand.show');


// articles
Route::get('/category/{category}', 'ArticleController@index')->name('article.index');
Route::get('/category/{category}/{id}', 'ArticleController@show')->name('article.show');

//Route::resource('category', 'CategoryController');

// admin panel
Route::group(['prefix' => 'manager',  'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\DashboardController@index' )->name('dashboard.index');
    Route::resource('category', 'Admin\CategoryController');
});



