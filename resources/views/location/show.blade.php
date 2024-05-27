@extends('layouts.app')

@section('title', 'Fiche d\'un lieu de spectacle')

@section('content')
    <style>
        .venue-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .venue-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .venue-address {
            margin-bottom: 10px;
            color: #666;
        }

        .website-link {
            color: #007bff;
            text-decoration: none;
        }

        .website-link:hover {
            text-decoration: underline;
        }

        .show-list {
            margin-top: 20px;
            padding-left: 20px;
            list-style: none;
            color: #666;
        }

        .show-list li {
            margin-bottom: 8px;
        }

        .edit-link {
            margin-top: 20px;
            text-align: right;
            color: #007bff;
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
