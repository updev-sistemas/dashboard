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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ajax/demostrative/view/store/{key}','DemonstrativeApiController@getDemonstrative')->name('api.demonstrative.getDemonstrative');

Route::get('/loja/view/data/{id}','DemonstrativeApiController@getPayload')->name('api.demonstrative.getPayload');

Route::post('/loja/{id}', 'DemonstrativeApiController@registerWithValidation')->name('api.demonstrative.register');
Route::post('/update/data', 'DemonstrativeApiController@registerAlt')->name('api.demonstrative.register_alt');

Route::post('integracao/set/u/{key}','AuthApiController@registerAuth')->name('api.auth.change_password');
Route::post('integracao/set/p/{key}','AuthApiController@changePassword')->name('api.auth.change_password');
