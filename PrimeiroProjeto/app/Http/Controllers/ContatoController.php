<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();

        var_dump($contatos[0]["table"]);
        var_dump($contatos[0]);
    }
}
