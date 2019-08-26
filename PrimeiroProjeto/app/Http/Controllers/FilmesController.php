<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmesController extends Controller
{
    public function listandoFilmes()
    {
        // $filmes = Filme::all();

        $filmes = Filme::orderBy('id', 'ASC')->paginate(10);

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

        return redirect('/filmes');
    }

    public function alterandoFilme($id)
    {
        $filme = Filme::find($id);
        return view('adicionandoFilmes')->with('filme', $filme);
    }

    public function modificandoFilme(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'sinopse' => 'required|max:200'
        ]);

        $filme = Filme::find($id);

        $filme->titulo = $request->input("titulo");
        $filme->sinopse = $request->input("sinopse");

        $filme->save();

        return redirect('/filmes');
    }

    public function removendoFilme($id)
    {
        $filme = Filme::find($id);
        $filme->delete();
        return redirect('/filmes');
    }
}
