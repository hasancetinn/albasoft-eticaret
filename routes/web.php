<?php

use Illuminate\Support\Facades\Route;

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

//front end yapısı
Route::get('/homepage', 'HomePageController@index')->name('homepage');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', 'DashboardController@index')->name('/dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'ProductController@index')->name('/product');
Route::post('/product/fetch', 'ProductController@fetch');
Route::post('/product/add', 'ProductController@add');
Route::post('/product/{slug}/update', 'ProductController@update');
Route::post('/product/{slug}/delete', 'ProductController@delete');
Route::post('/product/fetch-categories', 'ProductController@fetchCategories');

Route::get('/category', 'CategoryController@index')->name('/category');
Route::post('/category/fetch', 'CategoryController@fetch');
Route::post('/category/add', 'CategoryController@add');
Route::post('/category/{slug}/update', 'CategoryController@update');
Route::post('/category/{slug}/delete', 'CategoryController@delete');

Route::get('/category-list/{slug}', 'CategoryListController@index')->name('category-list');

Route::get('/product-list/{slug}', 'ProductListController@index')->name('product-list');

Route::get('/basket', 'BasketController@index')->name('basket');
Route::post('/basket/add', 'BasketController@add')->name('basket/add');
Route::post('/basket/delete', 'BasketController@delete')->name('basket/delete');