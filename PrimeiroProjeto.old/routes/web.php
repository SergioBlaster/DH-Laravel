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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/teste/{idioma?}', function ($idioma = "pt-BR") {
    app()->setLocale($idioma);
    return view('teste');
});

// Default
Route::get('/', 'FilmeController@listandoFilmes');

// Listar filmes
Route::get('/filmes', 'FilmeController@listandoFilmes');

// Adicionar filmes
Route::get('/filmes/adicionar', 'FilmeController@adicionandoFilme');
Route::post('/filmes/adicionar', 'FilmeController@salvandoFilme');

// Alterar filmes
Route::get('/filmes/alterar/{id}', 'FilmeController@alterandoFilme');
Route::put('/filmes/alterar/{id}', 'FilmeController@modificandoFilme');

// Remover filmes
Route::delete('/filmes/remover/{id}', 'FilmeController@removendoFilme');

// Relacionamentos
Route::get('/testandoRelacionamentos', 'Genero@testandoRelacionamentos');