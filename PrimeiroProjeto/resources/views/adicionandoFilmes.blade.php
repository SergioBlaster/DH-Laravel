@extends('layouts.master')
@section('title', 'Cadastro de Filmes')

@section('content')
@if(Request::is('filmes/adicionar'))
<h1>Adicionar Filme</h1>

<form method="POST" action="/filmes/adicionar">

    @csrf
    {{ method_field('POST') }}

    <div class="form-group col-md-6 col-sm-12">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título">
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="exampleInputPassword1">Sinopse</label>
        <input type="text" class="form-control" name="sinopse" id="sinopse" placeholder="Sinopse">
    </div>
    <div class="col-md-6 col-sm-12">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
@else
<h1>Alterar Filme</h1>

<form method="POST" action="/filmes/alterar/{{ $filme->id }}">

    @csrf
    {{ method_field('PUT') }}

    <div class="form-group col-md-6 col-sm-12">
        <label for="exampleInputEmail1">Título</label>
        <input type="text" value="{{ $filme->titulo }}" class="form-control" name="titulo" id="titulo"
            placeholder="Título">
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="exampleInputPassword1">Sinopse</label>
        <input type="text" value="{{ $filme->sinopse }}" class="form-control" name="sinopse" id="sinopse" placeholder="Sinopse">
    </div>
    <div class="col-md-6 col-sm-12">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger mt-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection