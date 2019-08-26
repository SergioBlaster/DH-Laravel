@extends('layouts.master')
@section('title', 'Lista de Filmes')

@section('content')
@if ($filmes->isempty())
<section class="row">
        <header class="col-12">
            <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="256" height="256"
                class="d-block mx-auto my-3" alt="Laravel">
            <h1 class="col-12 text-center">Blockbuster DH</h1>
            <p class="col-12 d-block text-center"><b>Um projeto da hora em Laravel!</b></p>
            <h2 class="col-12 text-center">Não há filmes disponíveis na plataforma</h2>
        </header>
    </section>
@else    
<section class="row">
    <header class="col-12">
        {{-- <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="256" height="256"
            class="d-block mx-auto my-3" alt="Laravel"> --}}
        <h1 class="col-12 text-center">FILMES</h1>
        {{-- <p class="col-12 d-block text-center"><b>Um projeto da hora em Laravel!</b></p> --}}
    </header>
</section>
<section class="row">
    <article class="col-12">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Sinopse</th>
                    <th colspan="2" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filmes as $filme)
                <tr>
                    <td scope="row">{{$filme->titulo}}</td>
                    <td>{{$filme->sinopse}}</td>
                    <td>
                        <a href="filmes/alterar/{{$filme->id}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modal{{$filme->id}}">
                            <i class="fas fa-trash ml-3"></i>
                        </a>
                    </td>
                </tr>

                <div class="modal fade" id="modal{{$filme->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Filme: {{$filme->titulo}}</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form method="POST" action="filmes/remover/{{$filme->id}}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $filmes->links() }}
        </div>
    </article>
</section>
@endif
@endsection