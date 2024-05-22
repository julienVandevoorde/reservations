@extends('layouts.app')

@section('title', 'Fiche d\'un lieu de spectacle')

@section('content')
    <style>
        /* Styles pour la fiche d'un lieu de spectacle */
        .venue-card {
            background-color: #fff; /* Couleur de fond */
            border-radius: 8px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            padding: 20px; /* Espacement intérieur */
            margin-bottom: 20px; /* Marge en bas */
        }

        .venue-title {
            font-size: 24px; /* Taille de la police pour le titre */
            margin-bottom: 10px; /* Marge en bas */
            color: #333; /* Couleur du texte */
        }

        .venue-address {
            margin-bottom: 10px; /* Marge en bas */
            color: #666; /* Couleur du texte */
        }

        .website-link {
            color: #007bff; /* Couleur du lien */
            text-decoration: none; /* Suppression du soulignement */
        }

        .website-link:hover {
            text-decoration: underline; /* Soulignement au survol */
        }

        .show-list {
            margin-top: 20px; /* Marge en haut */
            padding-left: 20px; /* Espacement à gauche */
            list-style: none; /* Suppression des puces */
            color: #666; /* Couleur du texte */
        }

        .show-list li {
            margin-bottom: 8px; /* Marge en bas */
        }

        .edit-link {
            margin-top: 20px; /* Marge en haut */
            text-align: right; /* Alignement à droite */
            color: #007bff; /* Couleur du texte */
        }
    </style>

    <div class="venue-card">
        <h1 class="venue-title">{{ $location->designation }}</h1>
        <p class="venue-address">{{ $location->address }}</p>
        <p class="venue-address">{{ $location->locality->postal_code }} {{ $location->locality->locality }}</p>

        @if($location->website)
            <p><a href="{{ $location->website }}" target="_blank" class="website-link">{{ $location->website }}</a></p>
        @else
            <p>Pas de site web</p>
        @endif

        @if($location->phone)
            <p><a href="tel:{{ $location->phone }}">{{ $location->phone }}</a></p>
        @else
            <p>Pas de téléphone</p>
        @endif

        <h2>Liste des spectacles</h2>
        <ul class="show-list">
            @foreach($location->shows as $show)
                <li>{{ $show->title }}</li>
            @endforeach
        </ul>
    </div>

    <div class="edit-link"><a href="{{ route('location.edit' ,$location->id) }}">Modifier</a></div>

    <nav><a href="{{ route('location.index') }}">Retour à l'index</a></nav>
    
@endsection
