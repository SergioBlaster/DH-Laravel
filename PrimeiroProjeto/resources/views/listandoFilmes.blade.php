@extends('layouts.master')

@section('title', 'Blockbuster DH - Filmes')

@section('content')
    @if ($filmes->isEmpty())
        <section class="row">
            <header class="col-12">
                <h1 class="col-12 text-center">Não temos filmes disponíveis na plataforma</h1>
            </header>
        </section>
    @else
        <section class="row">
            <header class="col-12">
                <h1 class="col-12 text-center">Filmes</h1>
                <p class="col-12 d-block text-center"><b>listando todos os filmes da nossa plataforma digital</b></p>
            </header>
        </section>
        <section class="row">
            <article class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Capa</th>
                            <th scope="col">Título</th>
                            <th scope="col">Sinopse</th>
                            <th scope="col">Protagonista</th>
                            <th scope="col">Gênero</th>
                            <th scope="col" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filmes as $filme)
                        <tr>
                            <td scope="row">
                                <img src="{{$filme->imagem}}" width="80" height="120" alt="">
                            </td>
                            <td>{{$filme->titulo}}</td>
                            <td>{{$filme->sinopse}}</td>
                            <td>{{$filme->ator->nome}}</td>
                            <td>{{$filme->genero->descricao}}</td>
                            <td>
                                <a href="/filmes/alterar/{{$filme->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modal{{$filme->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{$filme->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Deseja realmente excluir ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Filme: {{ $filme->titulo }}</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form action="/filmes/remover/{{$filme->id}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$filmes->links()}}
                </div>
            </article>
        </section>
    @endif
@endsection
