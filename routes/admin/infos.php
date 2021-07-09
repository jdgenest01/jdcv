<?php

Route::get('/infos', 'InfosController@index')->name('admin_infos');
Route::get('/infos/{id}', 'InfosController@edit')->name('admin_infos_edit');
Route::post('/infos/update/{id}', 'InfosController@update')->name('admin_infos_update')->where("id",'[0-9]');
Route::get('/infos/delete/{id}', 'InfosController@destroy')->name('admin_infos_delete')->where("id",'[0-9]');
Route::post('/infos/insert', 'InfosController@store')->name('admin_infos_insert');
