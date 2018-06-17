<?php

Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth', 'admin'], 
    'namespace' => 'Admin\Main\Http\Controllers'
], function()
{
    Route::pattern('admin', '(dashboard)');
    Route::any('dashboard', MainController::class);
    Route::any('', MainController::class);
});
