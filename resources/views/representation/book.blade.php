@extends('layouts.app')

@section('title', 'Fiche d\'une représentation')

@section('content')
    <article>
        <h1>Représentation du {{ $date }} à {{ $time }}</h1>
        
        @if($representation->show)
            <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>
        @else
            <p><strong>Spectacle:</strong> <em>Non spécifié</em></p>
        @endif

        <p><strong>Lieu:</strong> 
        @if($representation->location && $representation->location->designation)
            {{ $representation->location->designation }}
        @elseif($representation->show && $representation->show->location && $representation->show->location->designation)
            {{ $representation->show->location->designation }}
        @else
            <em>à déterminer</em>
        @endif
        </p>
    </article>
    
    <form id="reservationForm" action="{{ route('reservation.store')}}" method="post"> 
    @csrf
        <label for="places">Places</label>
        <input type="number" id="places" name="places" min="1" onchange="updatePrice()">
        
        <label for="price">Prix</label>
        <input type="text" id="price" name="price" readonly>

        <button type="submit">Reserver</button>
    </form>

    <nav><a href="{{ route('show.index') }}">Retour à l'index</a></nav>

    <script>
        function updatePrice() {
            var places = document.getElementById('places').value;
            var pricePerTicket = "{{ $representation->show->price }}";
            var totalPrice = places * pricePerTicket;
            document.getElementById('price').value = totalPrice.toFixed(2) + " €";
        }
    </script>
@endsection
