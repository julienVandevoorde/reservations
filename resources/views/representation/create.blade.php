@extends('layouts.app')

@section('title', 'Ajouter une représentation')

@section('content')
    <h1>Ajouter une représentation pour le spectacle : {{ $show->title }}</h1>
    <form action="{{ route('representation.store', $show->id) }}" method="POST">
        @csrf
        <div>
            <label for="when">Date et heure :</label>
            <input type="datetime-local" id="when" name="when" required>
        </div>
        <div>
            <label for="location_id">Lieu :</label>
            <select id="location_id" name="location_id">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->designation }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Ajouter la représentation</button>
    </form>
    <nav><a href="{{ route('show.show', $show->id) }}">Retour au spectacle</a></nav>
@endsection
