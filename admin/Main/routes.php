<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Admin\Main\Http\Controllers'], function()
{
    Route::pattern('admin', '(dashboard)');
    Route::any('dashboard', MainController::class);
    Route::any('', MainController::class);
});
