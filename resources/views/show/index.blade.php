@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')
    <div class="show-list-content">
        <h1>Liste des {{ $resource }}</h1>

        <div class="search-container">
            <form action="{{ route('search.show') }}" method="GET">
                <input type="text" name="query" placeholder="Rechercher un spectacle">
                <button type="submit">Rechercher</button>
                @if(request()->has('query'))
                    <a href="{{ route('show.index') }}" class="btn btn-secondary">Annuler la recherche</a>
                @endif
            </form>
        </div>

        <div class="show-cards">
            @foreach($shows as $show)
                <div class="show-card">
                    <img src="{{ asset($show->image_path) }}" alt="{{ $show->title }}" class="show-image">
                    <div class="show-info">
                        <h2>{{ $show->title }}</h2>
                        <p>
                            @if($show->bookable)
                                {{ $show->price }} €
                            @else
                                Non disponible à la réservation
                            @endif
                        </p>
                        <a href="{{ route('show.show', $show->id) }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>
    .show-list-content {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        width: 80%;
        margin-top: 50px;
    }

    .show-list-content h1 {
        text-align: center;
        margin-bottom: 40px;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-container form {
        display: flex;
        align-items: center;
    }

    .search-container input[type="text"] {
        padding: 10px;
        margin-right: 10px;
    }

    .show-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .show-card {
        width: 300px;
        margin: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .show-card:hover {
        transform: translateY(-10px);
    }

    .show-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .show-info {
        padding: 20px;
    }

    .show-info h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .show-info p {
        font-size: 1.2em;
        margin-bottom: 15px;
    }

    .btn-secondary {
        margin-left: 10px;
    }
</style>
