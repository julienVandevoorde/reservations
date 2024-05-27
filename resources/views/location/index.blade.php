@extends('layouts.app')

@section('title', 'Liste des lieux de spectacle')

@section('content')
    <style>

        .venue-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .venue-name {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .website-link {
            color: #007bff;
            text-decoration: none;
        }

        .website-link:hover {
            text-decoration: underline;
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
