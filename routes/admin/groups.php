<?php

Route::get('/groups', 'GroupsController@index')->name('admin_groups');
Route::get('/groups/{id}', 'GroupsController@edit')->name('admin_groups_edit');
Route::post('/groups/update/{id}', 'GroupsController@update')->name('admin_groups_update')->where("id",'[0-9]');
Route::get('/groups/delete/{id}', 'GroupsController@destroy')->name('admin_groups_delete')->where("id",'[0-9]');
Route::post('/groups/insert', 'GroupsController@store')->name('admin_groups_insert');
