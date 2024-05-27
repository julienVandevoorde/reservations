{{-- Formulaire d'inscription --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inscription</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" required value="{{ old('login') }}">
            @error('login')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="firstname">Prénom:</label>
            <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" required value="{{ old('firstname') }}">
            @error('firstname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">Nom:</label>
            <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" required value="{{ old('lastname') }}">
            @error('lastname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="langue">Langue:</label>
            <select name="langue" id="langue" class="form-control @error('langue') is-invalid @enderror" required>
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
            </select>
            @error('langue')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
@endsection
