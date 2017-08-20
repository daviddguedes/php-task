<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// api methods still not implemented but passport is installed and configured :-)

Route::middleware(['auth:api'])->group(function () {

    Route::resource('contacts', 'Api\ContactController');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});