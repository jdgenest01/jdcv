<?php
Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', 'TagsController@index')->name('index');
    Route::get('/{id}', 'TagsController@edit')->name('edit');
    Route::post('/update/{id}', 'TagsController@update')->name('update')->where("id",'[0-9]');
    Route::get('/delete/{id}', 'TagsController@destroy')->name('delete')->where("id",'[0-9]');
    Route::post('/insert', 'TagsController@store')->name('store');
});
