<?php

Route::group([
    'prefix' => 'admin', 
    'middleware' => ['web', 'auth', 'admin'], 
    'namespace' => 'Admin\Users\Http\Controllers'], function()
{
    Route::resource('users', UsersController::class);
    Route::resource('groups', GroupsController::class);
});
