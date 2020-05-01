<?php
use Illuminate\Support\Facades\Route;

Route::get('/user', 'UsersController@index')->name('admin_user');
Route::post('/user/{id}', 'UsersController@update')->name('admin_user_update')->where("id",'[0-9]');
