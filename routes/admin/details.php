<?php
Route::prefix('details')->name("details.")->group(function () {
    Route::get('/', 'DetailsController@index')->name('index');
    Route::get('/create', 'DetailsController@create')->name('create');
    Route::get('/{id}', 'DetailsController@edit')->name('edit');
    Route::post('/update/{id}', 'DetailsController@update')->name('update')->where("id",'[0-9]');
    Route::get('/delete/{id}', 'DetailsController@destroy')->name('delete')->where("id",'[0-9]');
    Route::post('/insert', 'DetailsController@store')->name('store');
});
