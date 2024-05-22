@extends('layouts.app')

@section('title', 'Liste des lieux de spectacle')

@section('content')
    <style>
        /* Styles pour la liste des lieux de spectacle */
        .venue-card {
            border: 1px solid #ddd; /* Bordure de la carte */
            border-radius: 8px; /* Coins arrondis */
            padding: 20px; /* Espacement intérieur */
            margin-bottom: 20px; /* Marge en bas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .venue-name {
            font-size: 20px; /* Taille de la police du nom du lieu */
            margin-bottom: 10px; /* Marge en bas */
        }

        .website-link {
            color: #007bff; /* Couleur du lien */
            text-decoration: none; /* Suppression du soulignement */
        }

        .website-link:hover {
            text-decoration: underline; /* Soulignement au survol */
        }
    </style>

    <h1>Liste des {{ $resource }}</h1>

    @foreach($locations as $location)
        <div class="venue-card">
            <h2 class="venue-name">
                <a href="{{ route('location.show', $location->id) }}">{{ $location->designation }}</a>
            </h2>
            @if($location->website)
                <p>
                    Site Web : <a href="{{ $location->website }}" class="website-link">{{ $location->website }}</a>
                </p>
            @endif
        </div>
    @endforeach

    <a href="{{ route('welcome') }}">Accueil</a>
@endsection
