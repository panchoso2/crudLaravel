<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('index', 'UsuarioController@index');
Route::get('layout', function(){
    return view('layout');
});
Route::get('create', 'UsuarioController@create');