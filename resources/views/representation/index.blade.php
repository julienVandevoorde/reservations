@extends('layouts.app')

@section('title', 'Liste des représentations')

@section('content')
    <style>
        .representation-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .representation-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .location-name {
            color: #007bff;
            font-weight: bold;
        }

        .datetime {
            font-style: italic;
            color: #666;
        }
    </style>

    <h1>Liste des {{ $resource }}</h1>

    @foreach($representations as $representation)
        <div class="representation-card">
            <div class="representation-title">
                @if ($representation->show && $representation->show->title)
                    {{ $representation->show->title }}
                @else
                    Titre inconnu
                @endif
            </div>

            <div class="location-name">
                @if($representation->location && $representation->location->designation)
                    {{ $representation->location->designation }}
                @else
                    Lieu inconnu
                @endif
            </div>

            <div class="datetime">
                {{ substr($representation->when, 0, -3) }}
            </div>
        </div>
    @endforeach
@endsection
