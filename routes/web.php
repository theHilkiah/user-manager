<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
});

//Auth::routes();
Route::group([
    'prefix' => 'auth'
], function(){
    Auth::routes();
    Route::any('{page?}/{action?}', Auth\ManageController::class);
});

Route::get('/home', User\HomeController::class);

Route::group([
  'namespace' => 'User',
  "middleware" => ["web", "auth"]
], function(){
    Route::resource('user', UserController::class);
});
