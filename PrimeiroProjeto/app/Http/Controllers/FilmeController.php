<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\Ator;
use App\Genero;

class FilmeController extends Controller
{
    // Listando Filmes
    public function listandoFilmes()
    {
        // listando todos os registros do banco de dados
        // $filmes = Filme::all();
        $filmes = Filme::orderBy('id', 'ASC')->paginate(10);

        return view('listandoFilmes')->with('filmes', $filmes);
    }

    // Adicionando Filme
    public function adicionandoFilme()
    {
        // listando todos os atores
        // $atores = Ator::all();
        // listando todos os atores ordenados por nome de forma alfabética
        $atores = Ator::orderBy('nome', 'ASC')->get();
        // listando todos os gêneros
        $generos = Genero::orderBy('descricao', 'ASC')->get();

        return view('adicionandoFilme')->with(["atores" => $atores, "generos" => $generos]);
    }

    public function salvandoFilme(Request $request)
    {
        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200",
            "genero" => "required",
            "ator" => "required"
        ]);

        // salvando caminho da imagem e armazenando-a no projeto
        // capturando imagem selecionada pelo usuário
        $arquivo = $request->file('imagem');

        if (empty($arquivo)) {
            abort(400, 'Nenhum arquivo foi enviado');
        }

        $nomePasta = "uploads";

        // capturando o caminho até o projeto
        $arquivo->storePublicly($nomePasta);

        // caminho absoluto que sempre será utilizado o mesmo
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta";

        // capturando o tmp_name
        $nomeArquivo = $arquivo->getClientOriginalName();

        // capturando o caminho relativo dentro do projeto
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";

        // movendo/armazenando imagem dentro do projeto
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme = Filme::create([
            "titulo" => $request->input("titulo"),
            "sinopse" => $request->input("sinopse"),
            "imagem" => $caminhoRelativo,
            "id_protagonista" => $request->input("ator"),
            "id_genero" => $request->input("genero")
        ]);

        $filme->save();

        return redirect('/filmes');
    }

    // Alterando Filme
    public function alterandoFilme($id)
    {
        $filme = Filme::find($id);

        $generos = Genero::orderBy('descricao', 'ASC')->get();
        $atores = Ator::orderBy('nome', 'ASC')->get();

        return view('adicionandoFilme')->with(['filme' => $filme, 'generos' => $generos, 'atores' => $atores]);
    }

    public function modificandoFilme(Request $request, $id)
    {
        $filme = Filme::find($id);

        $request->validate([
            "titulo" => "required|max:50",
            "sinopse" => "required|max:200",
            "genero" => "required",
            "ator" => "required"
        ]);

        $arquivo = $request->file('imagem');

        if (empty($arquivo)) {
            abort(400, 'Nenhum arquivo foi enviado');
        }

        $nomePasta = "uploads";

        // capturando o caminho até o projeto
        $arquivo->storePublicly($nomePasta);

        // caminho absoluto que sempre será utilizado o mesmo
        $caminhoAbsoluto = public_path() . "/storage/$nomePasta";

        // capturando o tmp_name
        $nomeArquivo = $arquivo->getClientOriginalName();

        // capturando o caminho relativo dentro do projeto
        $caminhoRelativo = "storage/$nomePasta/$nomeArquivo";

        // movendo/armazenando imagem dentro do projeto
        $arquivo->move($caminhoAbsoluto, $nomeArquivo);

        $filme->titulo = $request->input('titulo');
        $filme->sinopse = $request->input('sinopse');
        $filme->id_genero = $request->input('genero');
        $filme->id_protagonista = $request->input('ator');
        $filme->imagem = $caminhoRelativo;

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
