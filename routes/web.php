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
})->name('home');

Route::get('/ecommerce', 'EcommerceController@index')->name('ecommerce');
Route::get('/ecommerce#cart', 'EcommerceController@index')->name('carrinho');

Route::get('/assinatura', function () {
    return view('assinatura');
})->name('assinatura');

Route::prefix('/produtos')->group(function () {
    Route::get('', 'ProdutoController@index')->name('lista_produto');
    Route::get('criar', 'ProdutoController@create')->name('form_criar_produto');
    Route::post('criar', 'ProdutoController@store')->name('form_criar_produto');
    Route::post('edita', 'ProdutoController@edita')->name('form_edita_produto');
    Route::delete('{id}', 'ProdutoController@destroy');    
});

Route::prefix('/dashboard')->group(function () {
    Route::get('cliente', 'ClienteController@index')->name('dashboard_cliente');
    Route::get('adm', 'AdmController@index')->name('dashboard_adm');
});

Route::get('/deslogar', 'EntrarController@deslogar')->name('deslogar');
Route::get('/entrar', 'EntrarController@index')->name('login');
Route::post('/entrar', 'EntrarController@login');

Route::get('/cadastrar', 'CadastrarUserController@create')->name('form_cadastra_user');
Route::post('/cadastrar', 'CadastrarUserController@store')->name('form_cadastra_user');

Route::post('/criaPedido', 'PedidosController@create')->name('criar_pedido');
