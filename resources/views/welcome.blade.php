<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hero-section {
            background: url('https://media.istockphoto.com/id/1295114854/fr/photo/fauteuils-rouges-vides-dun-th%C3%A9%C3%A2tre-pr%C3%AAt-pour-un-spectacle.jpg?s=612x612&w=0&k=20&c=JcBwWuzI4bWocUSUqQNSb9PYhkNoU8XLUXEfdBM-jH8=') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .show-section img {
            max-width: 200px; 
            height: auto;
        }
        .card-section {
            margin: 50px 0;
        }
        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        
        .centered-card {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        
        .card-content {
            text-align: left; 
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Accueil</a>
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
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Inscription</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endauth
        </ul>
    </div>
</nav>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="hero-section">
    <h1>Bienvenue sur notre site</h1>
    <p>Découvrez les meilleurs artistes et spectacles près de chez vous</p>
    <a href="{{ route('show.index') }}" class="btn btn-primary btn-lg">Voir les spectacles</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        @foreach($shows as $show)
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body centered-card d-flex flex-column"> 
                    <div class="align-self-center"> 
                        <img src="{{ $show->poster_url }}" alt="{{ $show->title }}" class="card-img-top">
                    </div>
                    <div class="card-content text-center mt-3"> 
                        <h5 class="card-title">{{ $show->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<footer class="mt-5">
    <p>&copy; 2024. Tous droits réservés.</p>
    <p>
        <a href="#">Contact</a> | 
        <a href="#">Mentions légales</a> | 
        <a href="#">Politique de confidentialité</a>
    </p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>