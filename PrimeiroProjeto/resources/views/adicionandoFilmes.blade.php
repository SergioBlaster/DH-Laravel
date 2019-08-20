<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blockbuster DH</title>
    <link rel="shortcut icon" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">
    <link rel="icon" type="image/png" sizes="60x60"
        href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="30" height="30"
                    class="d-inline-block mr-2" alt="Laravel">
                Blockbuster DH
            </a>
        </nav>
    </header>
    <main class="container my5">
        <h1>Cadastro de Filmes</h1>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/adicionandoFilmes">

            @csrf

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
    </main>
</body>

</html>