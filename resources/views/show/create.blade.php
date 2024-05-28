@extends('layouts.app')

@section('title', 'Ajouter un spectacle')

@section('content')
    <div class="show-add-content">
        <h2>Ajouter un spectacle</h2>

        <form action="{{ route('show.store') }}" method="post">
            @csrf
            <div>
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" 
                       @if(old('title'))
                           value="{{ old('title') }}" 
                       @endif
                       class="@error('title') is-invalid @enderror">

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" class="@error('description') is-invalid @enderror">@if(old('description')){{ old('description') }}@endif</textarea>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="date">Date</label>
                <input type="date" id="date" name="date" 
                       @if(old('date'))
                           value="{{ old('date') }}" 
                       @endif
                       class="@error('date') is-invalid @enderror">

                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="location">Lieu</label>
                <input type="text" id="location" name="location" 
                       @if(old('location'))
                           value="{{ old('location') }}" 
                       @endif
                       class="@error('location') is-invalid @enderror">

                @error('location')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button>Ajouter</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h2>Liste des erreurs de validation</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <nav><a href="{{ route('show.index') }}">Retour à l'index</a></nav>
    </div>
@endsection
