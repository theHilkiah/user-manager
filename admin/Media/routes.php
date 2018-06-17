<?php

Route::group(['middleware' => 'web', 'prefix' => 'media', 'namespace' => 'Admin\Media\Http\Controllers'], function()
{
    Route::get('/', 'MediaController@index');
});
