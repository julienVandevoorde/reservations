@extends('layouts.app')

@section('title', 'Liste des types d’artistes')

@section('content')
    <div class="container">
        <h1>Liste des {{ $resource }}</h1>

        <div class="content-wrapper">
            <table class="type-table">
                <thead>
                    <tr>
                        <th>Types</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ $type->type }}</td>
                            <td>
                                <a href="{{ route('type.show', $type->id) }}" class="btn btn-primary">Voir détails</a>
                            @can('update', $type)
                                <a href="{{ route('type.edit', $type->id) }}" class="btn btn-secondary">Modifier</a>
                            @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .content-wrapper {
            width: 80%;
            margin-top: 50px;
        }

        .type-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .type-table th, .type-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .type-table th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-left: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection
