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
    return view('welcome');
});

Route::prefix('dasboard')->group(function(){
    Route::get('admin', 'backend\admin\adminController@index')->name('home-admin');
    Route::get('users', 'backend\dataUser\dataUserController@index')->name('table-dataUsers');
    Route::get('create-users', 'backend\dataUser\dataUserController@create')->name('users-create');
    Route::post('store-users', 'backend\dataUser\dataUserController@store')->name('users-store');
    Route::get('edit-users/{dataUsers}','backend\dataUser\dataUserController@edit')->name('users-edit');
    Route::post('update-users/{dataUsers}', 'backend\dataUser\dataUserController@update')->name('users-update');
    Route::delete('delete-users/{id}', 'backend\dataUser\dataUserController@destroy')->name('users-delete');
});