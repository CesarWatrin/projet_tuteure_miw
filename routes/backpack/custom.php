<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::get('admin/register', 'App\Http\Controllers\Admin\Auth\RegisterController@showRegistrationForm')->middleware('web')->name('backpack.auth.register');
Route::post('admin/register', 'App\Http\Controllers\Admin\Auth\RegisterController@register')->middleware('web')->name('backpack.auth.register');

Route::get('admin/edit-account-info', 'App\Http\Controllers\Admin\MyAccountController@getAccountInfoForm')->middleware('web')->name('backpack.account.info');
Route::post('admin/edit-account-info', 'App\Http\Controllers\Admin\MyAccountController@postAccountInfoForm')->middleware('web')->name('backpack.account.info.store');

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file