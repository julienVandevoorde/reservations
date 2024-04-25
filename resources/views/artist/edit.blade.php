@extends('layouts.app')

@section('title', 'Modifier un artiste')

@section('content')
    <div class="container">
        <h2>Modifier l'artiste</h2>

        <form action="{{ route('artist.update', $artist->id) }}" method="post" class="artist-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" 
                    @if(old('firstname'))
                        value="{{ old('firstname') }}" 
                    @else
                        value="{{ $artist->firstname }}" 
                    @endif
                    class="form-control @error('firstname') is-invalid @enderror">

                @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" 
                    @if(old('lastname'))
                        value="{{ old('lastname') }}" 
                    @else
                        value="{{ $artist->lastname }}" 
                    @endif
                    class="form-control @error('lastname') is-invalid @enderror">

                @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Modifier</button>
            <a href="{{ route('artist.index', $artist->id) }}" class="btn btn-secondary">Annuler</a>
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

        <nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
    </div>

    <style>
        /* Styles spécifiques pour la page Modifier un artiste */

        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .artist-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"].form-control {
            width: 95%; /* Réduit la largeur du champ input */
            padding: 10px;
            border: 1px solid;
            border-radius: 5px;
        }

        button.btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        button.btn:hover {
            background-color: #0056b3;
        }

        a.btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
@endsection
