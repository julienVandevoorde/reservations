@extends('layouts.app')

@section('title', 'Résumé de la réservation')

@section('content')
<style>
    .booking-summary-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .booking-title {
        font-size: 26px;
        margin-bottom: 20px;
        text-align: center;
    }

    .booking-subtitle {
        font-size: 22px;
        margin-top: 20px;
        color: #333;
    }

    .important-text {
        font-weight: bold;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        color: #444;
    }

    .input-field {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #bbb;
        width: 100%;
        margin-bottom: 15px;
    }

    .ticket-selector {
        display: flex;
        align-items: center;
    }

    .control-button {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #5cb85c;
        color: white;
        margin-left: 5px;
    }

    .control-button:hover {
        background-color: #4cae4c;
    }

    .card-element-container {
        margin-top: 20px;
    }

    .confirm-button {
        display: block;
        margin-top: 25px;
        padding: 12px 20px;
        background-color: #5cb85c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }

    .confirm-button:hover {
        background-color: #4cae4c;
    }

    .back-link {
        display: block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
        text-align: center;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>
    
<div class="booking-summary-container">
    <h1 class="booking-title">Résumé de la réservation</h1>
    
    <h2 class="booking-subtitle">Spectacle</h2>
    <p><span class="important-text">Titre :</span> {{ $show->title }}</p>
    @if($show->location)
        <p><span class="important-text">Lieu :</span> {{ $show->location->designation }}</p>
    @endif
    <p id="price"><span class="important-text">Prix par place :</span> {{ $show->price }} €</p>
    
    <form id="payment-form">
        @csrf
        <input type="hidden" name="representation_id" value="{{ $representation->id }}">
        <input type="hidden" id="price_per_ticket" value="{{ $show->price }}">
        <label for="num_tickets" class="form-label">Nombre de places (Max 10) :</label>
        
        <div class="ticket-selector">
            <button type="button" id="decrease" class="control-button">-</button>
            <input type="text" id="num_tickets" name="num_tickets" value="1" class="input-field" readonly>
            <button type="button" id="increase" class="control-button">+</button>
        </div>

        <input id="payment_method" name="payment_method" type="hidden">
        <div id="card-element" class="card-element-container"></div>

        <button type="submit" id="submit" class="confirm-button">Confirmer la réservation</button>
    </form>
    
    <a href="{{ route('show.index') }}" class="back-link">Retour à l'index</a>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card', {
            style: {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a',
                },
            },
        });

        cardElement.mount('#card-element');

        var priceElement = document.getElementById('price');
        var numTicketsInput = document.getElementById('num_tickets');
        var increaseButton = document.getElementById('increase');
        var decreaseButton = document.getElementById('decrease');
        var pricePerTicket = parseFloat(document.getElementById('price_per_ticket').value);
        
        function updatePrice() {
            var numTickets = numTicketsInput.value;
            var totalPrice = numTickets * pricePerTicket;
            priceElement.innerHTML = '<span class="important-text">Prix total :</span> ' + totalPrice + ' €';
        }

        increaseButton.addEventListener('click', function() {
            var currentValue = parseInt(numTicketsInput.value);
            if (currentValue < 10) { 
                numTicketsInput.value = currentValue + 1;
                updatePrice();
            }
        });

        decreaseButton.addEventListener('click', function() {
            var currentValue = parseInt(numTicketsInput.value);
            if (currentValue > 1) {
                numTicketsInput.value = currentValue - 1;
                updatePrice();
            }
        });

        updatePrice();

        var submitButton = document.getElementById('submit');
        submitButton.addEventListener('click', async (e) => {
            e.preventDefault();
            const { error, paymentMethod } = await stripe.createPaymentMethod('card', cardElement);

            if (error) {    
                console.log('[error]', error);
                alert(error.message);
            } else {
                console.log('[PaymentMethod]', paymentMethod);
                document.getElementById('payment_method').value = paymentMethod.id;

                var form = document.getElementById('payment-form');
                var formData = new FormData(form);
                formData.append('price_per_ticket', pricePerTicket);

                fetch('{{ route("handle.payment") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '{{ route("payment.success") }}';
                    } else {
                        alert('Erreur lors du paiement : ' + data.error);
                    }
                })
                .catch(error => console.error('Erreur:', error));
            }
        });
    });
</script>
@endsection
