<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/index', 'UsuarioController@index');
Route::get('/layout', function(){
    return view('layout');
});



Route::get('/create', 'UsuarioController@create');
Route::post('/ajaxRut', 'UsuarioController@ajaxRut')->name('ajaxRut');

Route::post('/store', 'UsuarioController@store');
Route::get('destroy/{id}', 'UsuarioController@destroy');
Route::get('/edit/{id}', 'UsuarioController@edit');
Route::post('/update', 'UsuarioController@update');