@extends('layouts.app')

@section('title', 'Paiement réussi')

@section('content')
    <div class="payment-success">
        <h1>Paiement réussi !</h1>
        <p>Merci pour votre réservation. Votre paiement a été effectué avec succès.</p>
        <a href="{{ route('show.index') }}">Retour à l'index</a>
    </div>
@endsection
