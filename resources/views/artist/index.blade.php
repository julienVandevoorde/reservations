@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')
    <div class="container">
        <h1>Liste des artistes</h1>

        <ul class="button-list">
            <li><a href="{{ route('artist.create') }}" class="button">Ajouter</a></li> 
            <li><a href="{{ route('welcome') }}" class="button">Retour à l'accueil</a></li>
        </ul>
        
        <table class="artist-table">
            <thead>
                <tr>
                    <th>Artiste</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->firstname }} {{ $artist->lastname }}</td>
                    <td>
                        <a href="{{ route('artist.show', $artist->id) }}" class="button">Voir détails</a>
                        <a href="{{ route('artist.edit', $artist->id) }}" class="button">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <style>
        /* Styles spécifiques pour la page Liste des artistes */

        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul.button-list {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        ul.button-list li {
            display: inline-block;
            margin-right: 10px;
        }

        table.artist-table {
            width: 50%;
            margin: 0 auto; 
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table.artist-table th, table.artist-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table.artist-table th {
            background-color: #f2f2f2;
        }

        table.artist-table tr:hover {
            background-color: #e0e0e0;
        }

        a.button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
