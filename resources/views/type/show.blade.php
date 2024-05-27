@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <div class="type-content">
        <h1>{{ ucfirst($type->type) }}</h1>

        @if($type->artists !== null && $type->artists->count() > 0)
            <h2>Liste des artistes</h2>
            <ul>
                @foreach($type->artists as $artist)    
                    <li>{{ $artist->firstname }} {{ $artist->lastname }}</li>
                @endforeach
            </ul>
        @elseif($type->artists !== null && $type->artists->count() === 0)
            <p>Aucun artiste associé à ce type.</p>
        @else
            <p>Erreur: Aucune information sur les artistes pour ce type.</p>
        @endif

        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('type.edit', $type->id) }}" class="button">Modifier</a>
            @endif
        @endauth
    </div>
@endsection

<style>

    .type-content {
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

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .type-content ul {
        list-style-type: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .type-content ul li {
        margin-bottom: 10px;
    }

    .type-content a {
        text-decoration: none;
    }

    .type-content a:hover {
        text-decoration: underline;
    }

    .type-content a.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 20px; 
    }

    .type-content a.button:hover {
        background-color: #0056b3;
    }

    .type-content nav {
        margin-top: 20px; 
    }
</style>
