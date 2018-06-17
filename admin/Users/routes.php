<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Admin\Users\Http\Controllers'], function()
{
    Route::resource('users', UsersController::class);
});
