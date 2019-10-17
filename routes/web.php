<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('estudiantes','EstudianteController');
Route::resource('ayudantes','AyudanteController');
Route::resource('webs','UsuarioController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('perfiles',['as'=>'perfiles.index','uses'=>'PerfilController@index']);
Route::get('perfiles/edit',['as'=>'perfiles.edit','uses'=>'PerfilController@edit']);

Route::patch('perfiles/{id}',['as'=>'perfiles.update','uses'=>'PerfilController@update']);
Route::post('perfiles/contrasena',['as'=>'perfiles.contrasena','uses'=>'PerfilController@updateB']);

Route::get('/ayudantelogin', 'AyudanteController@login');