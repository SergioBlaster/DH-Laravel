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
Route::get('/', 'FilmesController@listandoFilmes');

// Listar filmes
Route::get('/filmes', 'FilmesController@listandoFilmes');

// Adicionar filmes
Route::get('/filmes/adicionar', 'FilmesController@adicionandoFilme');
Route::post('/filmes/adicionar', 'FilmesController@salvandoFilme');

// Alterar filmes
Route::get('/filmes/alterar/{id}', 'FilmesController@alterandoFilme');
Route::put('/filmes/alterar/{id}', 'FilmesController@modificandoFilme');

// Remover filmes
Route::delete('/filmes/remover/{id}', 'FilmesController@removendoFilme');
