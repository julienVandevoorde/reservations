@extends('layouts.app')

@section('title', 'Ajouter un spectacle')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .custom-form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-checkbox {
        margin-right: 10px;
    }

    .submit-button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        align-self: flex-end;
    }

    .submit-button:hover {
        background-color: #218838;
    }

    .form-alert {
        padding: 10px;
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }

    .form-alert-danger {
        margin-top: 10px;
    }

    .invalid-input {
        border-color: #e3342f;
    }

    .navigation-link {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }

    .navigation-link:hover {
        text-decoration: underline;
    }
</style>

    <div class="form-container">
        <h2 class="form-title">Ajouter un spectacle</h2>

        <form action="{{ route('show.store') }}" method="post" class="custom-form">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Titre</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="form-input {{ $errors->has('title') ? 'invalid-input' : '' }}">

                @error('title')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description"
                          class="form-textarea {{ $errors->has('description') ? 'invalid-input' : '' }}">{{ old('description') }}</textarea>

                @error('description')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Lieu</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}"
                       class="form-input {{ $errors->has('location') ? 'invalid-input' : '' }}">

                @error('location')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="poster_url" class="form-label">URL de l'image</label>
                <input type="text" id="poster_url" name="poster_url" value="{{ old('poster_url') }}"
                       class="form-input {{ $errors->has('poster_url') ? 'invalid-input' : '' }}">

                @error('poster_url')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bookable" class="form-label">Réservable</label>
                <input type="checkbox" id="bookable" name="bookable" value="1"
                       {{ old('bookable') ? 'checked' : '' }} class="form-checkbox {{ $errors->has('bookable') ? 'invalid-input' : '' }}">
                
                @error('bookable')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Prix</label>
                <input type="text" id="price" name="price" value="{{ old('price') }}"
                       class="form-input {{ $errors->has('price') ? 'invalid-input' : '' }}">

                @error('price')
                    <div class="form-alert form-alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-button">Ajouter</button>
        </form>

        @if ($errors->any())
            <div class="form-alert form-alert-danger">
                <h2>Liste des erreurs de validation</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <nav><a href="{{ route('show.index') }}" class="navigation-link">Retour à l'index</a></nav>
    </div>
@endsection
