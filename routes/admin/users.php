<?php
use Illuminate\Support\Facades\Route;
Route::prefix('user')->name("user.")->group(function () {
    Route::get('/', 'UsersController@index')->name('index');
    Route::post('/{id}', 'UsersController@update')->name('update')->where("id",'[0-9]+');
});
