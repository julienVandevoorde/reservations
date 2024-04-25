@extends('layouts.app')

@section('title', 'Modifier un type')

@section('content')
    <div class="type-edit-content">
        <h2>Modifier un type</h2>

        <form action="{{ route('type.update', $type->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" 
                    @if(old('type'))
                        value="{{ old('type') }}" 
                    @else
                        value="{{ $type->type }}" 
                    @endif
                    class="@error('type') is-invalid @enderror">

                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button>Modifier</button>
            <a href="{{ route('type.show', $type->id) }}">Annuler</a>
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

        <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
    </div>
@endsection

<style>
    /* Styles spécifiques pour la page Modifier un type */

    .type-edit-content {
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

    .type-edit-content h2 {
        text-align: center;
        margin-top: 50px; 
        margin-bottom: 20px;
    }

    .type-edit-content form {
        width: 80%;
        margin-top: 20px; 
    }

    .type-edit-content .form-group {
        margin-bottom: 20px;
    }

    .type-edit-content label {
        display: block;
        margin-bottom: 5px;
    }

    .type-edit-content input[type="text"] {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .type-edit-content .alert {
        margin-top: 20px; 
    }

    .type-edit-content button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        margin-right: 10px; 
    }

    .type-edit-content a {
        text-decoration: none;
        color: #007bff;
    }

    .type-edit-content a:hover {
        text-decoration: underline;
    }

    .type-edit-content nav {
        margin-top: 20px; 
    }
</style>
