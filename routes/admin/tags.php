<?php
use Illuminate\Support\Facades\Route;

Route::get('/tags', 'TagsController@index')->name('admin_tags');
Route::get('/tags/{id}', 'TagsController@edit')->name('admin_tags_edit');
Route::post('/tags/update/{id}', 'TagsController@update')->name('admin_tags_update')->where("id",'[0-9]');
Route::get('/tags/delete/{id}', 'TagsController@destroy')->name('admin_tags_delete')->where("id",'[0-9]');
Route::post('/tags/insert', 'TagsController@store')->name('admin_tags_insert');
