<?php

Route::group([ 
    'prefix' => 'admin', 
    'middleware' => ['web', 'admin', 'auth'],
    'namespace' => 'Modules\Admin\Http\Controllers'
], function() {
    Route::get('/', 'AdminController@index');
});
