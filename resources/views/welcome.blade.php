@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<style>
    .hero-section {
        background: url('https://media.istockphoto.com/id/1295114854/fr/photo/fauteuils-rouges-vides-dun-th%C3%A9%C3%A2tre-pr%C3%AAt-pour-un-spectacle.jpg?s=612x612&w=0&k=20&c=JcBwWuzI4bWocUSUqQNSb9PYhkNoU8XLUXEfdBM-jH8=') no-repeat center center;
        background-size: cover;
        color: white;
        text-align: center;
        padding: 100px 0;
        width: 100vw; 
        margin-left: calc(-50vw + 50%); 
        margin-right: calc(-50vw + 50%); 
    }

    .show-section img {
        max-width: 100vw; 
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
        width: 100vw; 
        margin-left: calc(-50vw + 50%); 
        margin-right: calc(-50vw + 50%); 
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

@if (session('welcome'))
    <div class="alert alert-success" role="alert">
        {{ session('welcome') }}
    </div>
@endif

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
@endsection
