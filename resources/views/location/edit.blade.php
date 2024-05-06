@extends('layouts.app')

@section('title', 'Modifier un artiste')

@section('content')
    <h2>Modifier une location</h2>

    <form action="{{ route('location.update' ,$location->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="firstname">Code postale</label>
            <input type="text" id="postal_code" name="postal_code" 
	       @if(old('firstname'))
                value="{{ old('postal_code') }}" 
            @else
                value="{{ $location->postal_code }}" 
            @endif
	           class="@error('firstname') is-invalid @enderror">

	@error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
     @enderror
        </div>

        <div>
            <label for="lastname">locality</label>
            <input type="text" id="lastname" name="lastname" 
	       @if(old('lastname'))
                value="{{ old('locality') }}" 
            @else
                value="{{ $location->locality }}" 
            @endif
	           class="@error('lastname') is-invalid @enderror">

	@error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
     @enderror
        </div>

        <button>Modifier</button>
   <a href="{{ route('location.show',$location->id) }}">Annuler</a>
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

    <nav><a href="{{ route('location.index') }}">Retour à l'index</a></nav>
@endsection
