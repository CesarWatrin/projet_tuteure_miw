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

Route::get('/', 'PagesController@home')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/map', 'MapController@home')->name('map');

Route::get('/favoris', 'FavorisController@home')->name('favoris');


Route::get('/account', 'AccountController@home')->name('account');

Route::get('/stores', 'AccountController@stores')->name('stores');

Route::get('/store/add', 'ManagerController@storeAdd')->name('store_add');

// routes API
Route::get('/api/stores', 'MapController@getStores')->name('getStores');
