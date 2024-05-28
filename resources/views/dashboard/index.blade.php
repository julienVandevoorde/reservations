@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <h1>Dashboard</h1>

        <div class="user-list">
            <h2>Liste des utilisateurs</h2>
            <ul>
                @foreach ($users as $user)
                    <li>
                        <span class="user-name">{{ $user->name }}</span>
                        <span class="user-email">{{ $user->email }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

<style>
    .dashboard-container {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        color: #333;
        padding: 20px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 800px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dashboard-container h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2.5em;
        color: #444;
    }

    .user-list {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .user-list h2 {
        font-size: 1.5em;
        margin-bottom: 15px;
        color: #555;
    }

    .user-list ul {
        list-style: none;
        padding: 0;
    }

    .user-list li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
        transition: background 0.3s ease;
    }

    .user-list li:hover {
        background: #f1f1f1;
    }

    .user-name {
        font-weight: bold;
        color: #333;
    }

    .user-email {
        color: #777;
        font-style: italic;
    }
</style>
