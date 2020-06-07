<?php
Route::prefix('groups')->name("groups.")->group(function () {
    Route::get('/', 'GroupsController@index')->name('index');
    Route::get('/{id}', 'GroupsController@edit')->name('edit');
    Route::post('/update/{id}', 'GroupsController@update')->name('update')->where("id",'[0-9]+');
    Route::get('/delete/{id}', 'GroupsController@destroy')->name('delete')->where("id",'[0-9]+');
    Route::post('/insert', 'GroupsController@store')->name('store');
});
