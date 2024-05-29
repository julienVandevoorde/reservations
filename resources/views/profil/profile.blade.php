@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container">
    <h1>Mon Profil :</h1>
    <br><br>
    <h2>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Nouveau mot de passe (optionnel)</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <small class="text-muted">Laissez vide pour ne pas changer le mot de passe.</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
