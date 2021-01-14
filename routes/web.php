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
    Route::get('admin', 'backend\admin\adminController@indexUser')->name('home-admin');
    Route::get('users', 'backend\dataUser\dataUserController@indexUser')->name('table-dataUsers');
    Route::get('create-users', 'backend\dataUser\dataUserController@createUser')->name('users-create');
    Route::post('store-users', 'backend\dataUser\dataUserController@storeUser')->name('users-store');
    Route::get('edit-users/{dataUser}','backend\dataUser\dataUserController@editUser')->name('users-edit');
    Route::post('update-users/{dataUser}', 'backend\dataUser\dataUserController@updateUser')->name('users-update');
    Route::delete('delete-users/{id}', 'backend\dataUser\dataUserController@destroyUser')->name('users-delete');
});