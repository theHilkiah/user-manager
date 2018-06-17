<?php

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth', 'admin'], 
    'namespace' => 'Admin\Media\Http\Controllers'
], function()
{
    Route::resource('media', MediaController::class);
});
