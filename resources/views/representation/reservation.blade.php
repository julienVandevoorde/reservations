@extends('layouts.app')

@section('title', 'Résumé de la réservation')

@section('content')
<style>
        .reservation-summary {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            font-size: 24px;
            margin-top: 0;
        }

        h2 {
            font-size: 20px;
            margin-top: 20px;
        }

        strong {
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            margin-left: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        #card-element {
            margin-top: 20px;
        }

        #submit {
            display: block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    
    <div class="reservation-summary">
        <h1>Résumé de la réservation</h1>
        
        <h2>Spectacle</h2>
        <p><strong>Titre :</strong> {{ $show->title }}</p>
        @if($show->location)
            <p><strong>Lieu :</strong> {{ $show->location->designation }}</p>
        @endif
        <p id="price"><strong>Prix par place :</strong> {{ $show->price }} €</p>
        
        <form id="payment-form">
            @csrf
            <input type="hidden" name="representation_id" value="{{ $representation->id }}">
            <input type="hidden" id="price_per_ticket" value="{{ $show->price }}">
            <label for="num_tickets">Nombre de places (Max 10) :</label>
            
            <div class="quantity">
                <button type="button" id="decrease">-</button>
                <input type="text" id="num_tickets" name="num_tickets" value="1" readonly>
                <button type="button" id="increase">+</button>
            </div>

            <input id="payment_method" name="payment_method" type="hidden">
            <div id="card-element"></div>

            <button type="submit" id="submit">Confirmer la réservation</button>
        </form>
        
        <a href="{{ route('show.index') }}">Retour à l'index</a>
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
                priceElement.innerHTML = '<strong>Prix total :</strong> ' + totalPrice + ' €';
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