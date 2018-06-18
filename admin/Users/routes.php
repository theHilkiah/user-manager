<?php

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth', 'admin'],
    'namespace' => 'Admin\Users\Http\Controllers'], function()
{
    Route::resource('access', AccessController::class);
    Route::resource('groups', GroupsController::class);
    Route::resource('users', UsersController::class);
});
