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
Route::get('/account/edit', 'AccountController@edit')->name('account_edit');
Route::post('/account/update', 'AccountController@update')->name('account_update');

Route::get('/ratings/findstore', 'AccountController@commentscode')->name('commentscode_input');
Route::get('/ratings/add', 'AccountController@rateStore')->name('rate_store');
Route::post('/ratings/post', 'AccountController@postRating')->name('rating_post');
Route::get('/ratings/edit/{comments_code}', 'AccountController@rateStore')->name('rating_edit');

Route::get('/stores', 'AccountController@stores')->name('stores');

Route::get('/stores/add', 'ManagerController@storesAdd')->name('stores_add');

// routes API
Route::get('/api/stores', 'MapController@getStores')->name('getStores');

//Route::get('/dashboard', 'ManagerController@dashboard')->name('account');

Route::get('/dashboard/{store_id}', 'ManagerController@dashboard')->name('dashboard');

Route::get('/dashboard', 'AccountController@dashboard')->name('dashboard');

Route::get('/store_card', 'Store_cardController@home')->name('store_card');
