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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    // Route::get('users', 'Api\ApiServiceController@indexUser');
    // Route::post('create-users', 'Api\ApiServiceController@storeUser');
    // Route::put('update-users/{dataUser}', 'Api\ApiServiceController@updateUser');
    // Route::delete('delete-users/{id}', 'Api\ApiServiceController@destroyUser');

Route::post('auth/register',  'UserController@register');
Route::post('auth/login' ,  'UserController@login');
Route::post('auth/logout' , 'UserController@logout');
Route::group (['middleware' =>  'jwt.auth'],function(){
    Route::get('user', 'UserController@getAuthUser');
});