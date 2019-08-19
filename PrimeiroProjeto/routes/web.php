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

Route::get('/teste', function () {
    // $nome = "Victor";
    // return view('teste')->with("nome", $nome);
    return view('teste');
});

Route::get('/testando/{nome}-{sobrenome}-{email}', function ($nome, $sobrenome, $email) {
    // $nome = "Victor";
    // return view('teste')->with("nome", $nome);
    return "Olá " . $nome . " " . $sobrenome . " (" . $email . ")";
    // return view('teste');
});

Route::get('/testando/{numero}', function ($numero) {
    if ($numero % 2 == 0) {
        return "É par!";
    }
});

Route::get('/testando2/{numero1}/{numero2?}', function ($numero1, $numero2 = null) {
    if ($numero2 == null) {
        return $numero1 % 2 == 0 ? "É par" : "É ímpar";
    } else
        return $numero1 * $numero2;
});

Route::get('/testando3/{numero}', function ($numero) {
    $retorno = "<br>";

    for ($i = 1; $i <= 10; $i++) {
        $retorno = $retorno . $numero . " X " . $i . " = " . $numero * $i . "<br>";
    }

    return $retorno;
});

Route::get('/teste2/{locale}', function ($locale) {
    App::setlocale($locale);
    return view('welcome');
});

Route::get('/contatos', 'ContatoController@index');
