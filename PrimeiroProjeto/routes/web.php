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

// Listar Filmes
Route::get('/filmes', 'FilmeController@listandoFilmes');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Adicionar Filmes
    Route::get('/filmes/adicionar', 'FilmeController@adicionandoFilme');
    Route::post('/filmes/adicionar', 'FilmeController@salvandoFilme');

    // Alterando Filmes
    Route::get('/filmes/alterar/{id}', 'FilmeController@alterandoFilme');
    Route::put('/filmes/alterar/{id}', 'FilmeController@modificandoFilme');

    // Removendo Filmes
    Route::delete('/filmes/remover/{id}', 'FilmeController@removendoFilme');
});
