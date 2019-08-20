<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmesController extends Controller
{
    public function listandoFilmes()
    {
        $filmes = Filme::all();

        return view('listandoFilmes')->with('filmes', $filmes);
    }

    public function adicionandoFilme()
    {
        return view('adicionandoFilmes');
    }

    public function salvandoFilme(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'sinopse' => 'required|max:200'
        ]);

        $filme = Filme::create([
            'titulo' => $request->input("titulo"),
            'sinopse' => $request->input("sinopse")
        ]);

        $filme->save();

        return redirect('/listandoFilmes');
    }
}
