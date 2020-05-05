<?php
Route::get('/details', 'DetailsController@index')->name('admin_details');
Route::get('/details/{id}', 'DetailsController@edit')->name('admin_details_edit');
Route::post('/details/update/{id}', 'DetailsController@update')->name('admin_details_update')->where("id",'[0-9]');
Route::get('/details/delete/{id}', 'DetailsController@destroy')->name('admin_details_delete')->where("id",'[0-9]');
Route::post('/details/insert', 'DetailsController@store')->name('admin_details_insert');
