@extends('layouts.app')

@section('title', 'Fiche d\'une représentation')

@section('content')
    <article>
        <h1>Représentation du {{ $date }} à {{ $time }}</h1>
        
        @if($representation->show)
            <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>
        @else
            <p><strong>Spectacle:</strong> <em>Non spécifié</em></p>
        @endif

        <p><strong>Lieu:</strong> 
        @if($representation->location && $representation->location->designation)
            {{ $representation->location->designation }}
        @elseif($representation->show && $representation->show->location && $representation->show->location->designation)
            {{ $representation->show->location->designation }}
        @else
            <em>à déterminer</em>
        @endif
        </p>
    </article>
    
    <nav><a href="{{ route('representation.index') }}">Retour à l'index</a></nav>
@endsection
