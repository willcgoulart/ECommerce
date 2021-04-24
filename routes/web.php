<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::prefix('/produtos')->group(function () {
    Route::get('', 'ProdutoController@index')->name('lista_produto');
    Route::get('criar', 'ProdutoController@create')->name('form_criar_produto');
    Route::post('criar', 'ProdutoController@store')->name('form_criar_produto');
    Route::post('edita', 'ProdutoController@edita')->name('form_edita_produto');
    Route::delete('{id}', 'ProdutoController@destroy');    
});

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@login');

Route::get('/cadastrar', 'CadastrarUserController@create')->name('form_cadastra_user');
Route::post('/cadastrar', 'CadastrarUserController@store')->name('form_cadastra_user');
