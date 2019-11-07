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

Route::get('/', 'ProdutosController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/produtos', 'ProdutosController');
Route::get('/meus_produtos', 'ProdutosController@meus_produtos')->name('meus_produtos');
Route::resource('/solicitacoes', 'SolicitacoesController');