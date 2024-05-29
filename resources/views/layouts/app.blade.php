<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Accueil')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('welcome') }}">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('artist.index') }}">Artistes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('type.index') }}">Types</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('location.index') }}">Lieux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('show.index') }}">Show</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('representation.index') }}">Representation</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(auth()->check() && auth()->user()->isAdmin())
            <li class="nav-item">
                <a class="btn btn-success" href="{{ route('dashboard.index') }}" role="button">Dashboard</a>
            </li>
            @endif
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">Mon Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Inscription</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
