@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <br>
    <h2>Liste des utilisateurs :</h2>
    <br>
    
    <a href="{{ route('dashboard.export') }}" class="btn btn-primary">download users in .csv</a>
    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Langue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->login }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->langue }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
