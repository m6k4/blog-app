<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware([])->group(function () {

    // User
    Route::post('/users/createUser',                        ['uses'  => 'User@createUser']);

    // Authorization
    Route::post('/authorization/loginToPlatform',           ['uses'  => 'Authorization@loginToPlatform']);
    Route::get('/authorization/checkIfUserSessionExists',   ['uses'  => 'Authorization@checkIfUserSessionExists']);
    Route::delete('/authorization/logoutFromPlatform',      ['uses'  => 'Authorization@logoutFromPlatform']);

    // Rooms
    Route::get('/users/getList',   ['uses'  => 'Users@getList']);

});

