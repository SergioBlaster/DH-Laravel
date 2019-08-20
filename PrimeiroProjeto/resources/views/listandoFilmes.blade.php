<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <main class="container my-5">
        <section class="row">
            <header class="col-12">
                <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="256" height="256"
                    class="d-block mx-auto my-3" alt="Laravel">
                <h1 class="col-12 text-center">Blockbuster DH</h1>
                <p class="col-12 d-block text-center"><b>Um projeto da hora em Laravel!</b></p>
            </header>
        </section>
        <section class="row">
            <article class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Título</th>
                            <th colspan="2" scope="col">Sinopse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filmes as $filme)
                        <tr>
                            <th scope="row">{{$filme->titulo}}</th>
                            <td colspan="2">{{$filme->sinopse}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>
    </main>
</body>

</html>