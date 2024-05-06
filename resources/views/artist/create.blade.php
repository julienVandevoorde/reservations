@extends('layouts.app')

@section('title', 'Ajouter un artiste')

@section('content')
    <div class="artist-add-content">
        <h2>Ajouter un artiste</h2>

        <form action="{{ route('artist.store') }}" method="post">
            @csrf
            <div>
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" 
                       @if(old('firstname'))
                           value="{{ old('firstname') }}" 
                       @endif
                       class="@error('firstname') is-invalid @enderror">

                @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" 
                       @if(old('lastname'))
                           value="{{ old('lastname') }}" 
                       @endif
                       class="@error('lastname') is-invalid @enderror">

                @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button>Ajouter</button>
            <a href="{{ route('artist.index') }}">Annuler</a>
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
@endsection

<style>


    .artist-add-content {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        width: 80%;
        margin-top: 50px; 
    }

    .artist-add-content h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .artist-add-content form {
        width: 40%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .artist-add-content form div {
        margin-bottom: 15px;
    }

    .artist-add-content label {
        display: block;
    }

    .artist-add-content input[type="text"] {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .artist-add-content button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .artist-add-content button:hover {
        background-color: #0056b3;
    }

    .artist-add-content a.button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #dc3545;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        margin-left: 10px;
    }

    .artist-add-content a.button:hover {
        background-color: #c82333;
    }

    .artist-add-content .alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .artist-add-content .is-invalid {
        border-color: #dc3545;
    }
</style>
