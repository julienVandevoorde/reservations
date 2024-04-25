<!-- resources/views/artist/show.blade.php -->
@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <div class="container mt-5">
        <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>

        <h2>Liste des types</h2>
        <ul class="artist-types">
            @foreach($artist->types as $type)    
                <li>{{ $type->type }}</li>
            @endforeach
        </ul>

        <form method="post" action="{{ route('artist.delete', $artist->id) }}" class="delete-form">
            @csrf
            @method('DELETE')
            <button class="delete-button">Supprimer</button>
        </form>

        <div class="artist-edit-link"><a href="{{ route('artist.edit', $artist->id) }}">Modifier</a></div>

        <nav class="artist-index-link"><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
    </div>

    <style>
        /* Styles spécifiques pour la page d'affichage d'un artiste */

        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 40px;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul.artist-types {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        ul.artist-types li {
            margin-bottom: 10px;
        }

        .delete-button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .artist-edit-link a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .artist-edit-link a:hover {
            color: #0056b3;
        }

        .artist-index-link a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .artist-index-link a:hover {
            color: #0056b3;
        }
    </style>
@endsection
