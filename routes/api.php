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

Route::middleware('check_token:api')->post('/create', 'leadController@create');

Route::middleware('check_token:api')->get('/read', 'leadController@read');

Route::middleware('check_token:api')->post('/update', 'leadController@update');

Route::middleware('check_token:api')->post('/delete', 'leadController@delete');