@extends('layouts.app')

@section('title', 'Liste des représentations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
    @foreach($representations as $representation)
        <li>
            @if ($representation->show && $representation->show->title)
                {{ $representation->show->title }}
            @else
                Titre inconnu
            @endif

            @if($representation->location && $representation->location->designation)
                - <span>{{ $representation->location->designation }}</span>
            @else
                Lieu inconnu
            @endif

            - <datetime>{{ substr($representation->when, 0, -3) }}</datetime>
        </li>
    @endforeach
    </ul>
@endsection
