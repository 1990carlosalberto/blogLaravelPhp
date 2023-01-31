<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"6
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-
        scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador de Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/c
ss/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Laravel 6 Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-tar
get="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" ari
18 a-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    @auth
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
            </li>
        </ul>
    @endauth
    </div>

    <!-- Aqui o nome do usuário logado -->
    @auth
        <div class="float-right">
            <strong>{{auth()->user()->name}}</strong>
        </div>
    @endauth
</nav>
    <div class="container">
            @include("flash::message")
            @yield('content')
    </div>
</body>
</html>
