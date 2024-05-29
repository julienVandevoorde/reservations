@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Ajouter les champs de formulaire ici pour chaque attribut comme login, firstname, etc. -->
        <div>
            <label for="login">Login:</label>
            <input type="text" name="login" value="{{ $user->login }}">
        </div>
        <!-- Ajouter des champs supplémentaires pour firstname, lastname, etc. -->
        <button type="submit">Save Changes</button>
    </form>
</div>
@endsection
