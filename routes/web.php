<?php

use Illuminate\Support\Facades\Route;



Route::get('/index', 'UsuarioController@index');
Route::get('/create', 'UsuarioController@create');
Route::post('/ajaxRut', 'UsuarioController@ajaxRut')->name('ajaxRut');
Route::post('/ajaxEmail', 'UsuarioController@ajaxEmail')->name('ajaxEmail');
Route::post('/ajaxAvatar', 'UsuarioController@ajaxAvatar')->name('ajaxAvatar');
Route::post('/store', 'UsuarioController@store');
Route::get('destroy/{id}', 'UsuarioController@destroy');
Route::get('/edit/{id}', 'UsuarioController@edit');
Route::post('/update', 'UsuarioController@update');