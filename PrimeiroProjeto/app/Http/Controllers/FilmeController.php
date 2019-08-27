<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmeController extends Controller
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
            'sinopse' => 'required|max:200',
            'genero' => 'required',
            'ator' => 'required'
        ]);

        $arquivo = $request->file('imagem');
        $nomePasta = "uploads";
        $arquivo->storePublicly($nomePasta);
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta"; 
        $nomeArquivo = $arquivo->getClientOriginalName();
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme = Filme::create([
            'titulo' => $request->input("titulo"),
            'sinopse' => $request->input("sinopse"),
            'imagem' => $caminhoRelativo,
            'id_genero' => $request->input('genero'),
            'id_protagonista' => $request->input('ator')
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
            'sinopse' => 'required|max:200',
            'genero' => 'required',
            'ator' => 'required'
        ]);

        $arquivo = $request->file('imagem');
        $nomePasta = "uploads";
        $arquivo->storePublicly($nomePasta);
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta"; 
        $nomeArquivo = $arquivo->getClientOriginalName();
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme = Filme::find($id);

        $filme->titulo = $request->input("titulo");
        $filme->sinopse = $request->input("sinopse");
        $filme->imagem = $caminhoRelativo;
        $filme->id_genero = $request->input('genero');
        $filme->id_protagonista = $request->input('ator');

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
