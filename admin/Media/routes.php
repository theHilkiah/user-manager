<?php

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth'], 
    'namespace' => 'Admin\Media\Http\Controllers'
], function()
{
    Route::resource('media', MediaController::class);
});
