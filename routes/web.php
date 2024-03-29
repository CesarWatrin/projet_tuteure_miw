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

Route::get('auth/google', 'GoogleController@redirectToGoogle')->name('redirect_to_goggle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback')->name('handle_google_callback');
Route::post('auth/google/register', 'GoogleController@registerWithGoogle')->name('register_with_google');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/map', 'MapController@home')->name('map');

Route::get('/favoris', 'FavorisController@home')->name('favoris');


Route::get('/account', 'AccountController@home')->name('account');
Route::get('/account/edit', 'AccountController@edit')->name('account_edit');
Route::post('/account/update', 'AccountController@update')->name('account_update');
Route::post('/account/password/update', 'AccountController@updatePassword')->name('password_update');

Route::get('/ratings/findstore', 'AccountController@commentscode')->name('commentscode_input');
Route::get('/ratings/add', 'AccountController@rateStore')->name('rate_store');
Route::post('/ratings/post', 'AccountController@postRating')->name('rating_post');
Route::post('/ratings/delete', 'AccountController@deleteRating')->name('rating_delete');

Route::get('/stores', 'AccountController@stores')->name('stores');

Route::get('/stores/add', 'ManagerController@storesAdd')->name('stores_add');
Route::post('/stores/add', 'ManagerController@storePost')->name('store_post');

// routes API
Route::get('/api/stores', 'MapController@getStores')->name('getStores');
Route::post('/api/view/add', 'MapController@addView')->name('addView');

Route::get('/dashboard/{store_id}', 'ManagerController@dashboard')->name('dashboard');
Route::post('/dashboard/{id}', 'ManagerController@storeUpdate')->name('store_update');
Route::get('/report/{id}', 'ManagerController@commentReport')->name('comment_report');


Route::get('/store_card', 'Store_cardController@home')->name('store_card');

Route::get('/legal', 'PagesController@legal')->name('legal');

Route::get('/catalogue/{store_id}', 'CatalogueController@catalogue')->name('catalogue');

Route::get('/store/addFavorite', 'StoreController@addFavorite')->name('addFavorite');
Route::get('/store/removeFavorite', 'StoreController@removeFavorite')->name('removeFavorite');
Route::get('/store/randomNearStores', 'StoreController@randomNearStores')->name('randomNearStores');
