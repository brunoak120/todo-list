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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/listar-categorias', 'CategoryController@index')->name('category.index');
    Route::get('/adicionar-categoria', 'CategoryController@create')->name('category.create');
    Route::post('/adicionar-categoria', 'CategoryController@store')->name('category.store');
    Route::get('/editar-categorias', 'CategoryController@edit')->name('category.edit');
    Route::post('/editar-categoria', 'CategoryController@update')->name('category.update');
    Route::delete('/remove-categoria', 'CategoryController@destroy')->name('category.destroy');

});
