@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')
    <div class="show-list-content">
        <h1>Liste des {{ $resource }}</h1>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Représentations</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($shows as $show)   
                <tr>
                    <td>{{ $show->title }}</td>
                    <td>
                    @if($show->bookable)
                        {{ $show->price }} €
                    @endif
                    </td>
                    <td>
                    @if($show->representations->count()==1)
                        1 représentation
                    @elseif($show->representations->count()>1)
                        {{ $show->representations->count() }} représentations
                    @else
                        <em>aucune représentation</em>
                    @endif
                    </td>
                    <td>
                        <a href="{{ route('show.show', $show->id) }}" class="details-button">Voir détails</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    /* Styles spécifiques pour la page Liste des spectacles */

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

    .show-list-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }

    .show-list-content th, .show-list-content td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .show-list-content th {
        background-color: #f2f2f2;
    }

    .show-list-content tr:hover {
        background-color: #f5f5f5;
    }

    .show-list-content .details-button {
        text-decoration: none;
        color: #007bff;
        font-size: 1.2em;
        margin-left: 20px;
        padding: 5px 15px;
        border: 1px solid #007bff;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .show-list-content .details-button:hover {
        background-color: #007bff;
        color: #fff;
    }

    .show-list-content span {
        font-size: 1.1em;
    }

    .show-list-content em {
        color: #999;
        font-style: italic;
    }
</style>
