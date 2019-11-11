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

use App\Utils\Constants;

Route::get('/', function () {
    return redirect('app/website');
});

Route::get('/admin', function () {
    return redirect('app/administrator');
});

Route::fallback(function(){
    return \Response::json([
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_RESOURCE_NOT_FOUND,
        Constants::DATA     => []
    ], 404)->header('access-control-expose-headers', '*');
});
