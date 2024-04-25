@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
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

    <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
@endsection
