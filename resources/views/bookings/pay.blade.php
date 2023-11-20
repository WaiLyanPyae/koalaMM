@extends('layouts.app')

@section('title', 'Process Payment')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-Primary mb-6">Payment for Booking #{{ $booking->id }}</h1>

        <!-- Payment Form -->
        <form action="{{ route('bookings.processPayment', $booking->id) }}" method="POST" id="payment-form"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <!-- Card Number -->
            <div class="mb-4">
                <label for="card-number" class="block text-gray-700 text-sm font-bold mb-2">Card Number:</label>
                <div id="card-number" class="border rounded w-full px-3 py-2"></div>
            </div>

            <!-- Expiration Date -->
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="exp-month" class="block text-gray-700 text-sm font-bold mb-2">Expiration:</label>
                    <div id="exp-month" class="border rounded w-full px-3 py-2"></div>
                </div>
            </div>

            <!-- CVV -->
            <div class="mb-4">
                <label for="cvc" class="block text-gray-700 text-sm font-bold mb-2">CVC:</label>
                <div id="cvc" class="border rounded w-full px-3 py-2"></div>
            </div>

            <!-- Stripe Errors -->
            <div id="card-errors" role="alert" class="text-red-500 mb-4"></div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                Process Payment
            </button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
            var style = {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                },
            };

            var cardNumber = elements.create('cardNumber', {
                style: style
            });
            cardNumber.mount('#card-number');

            var cardExpiry = elements.create('cardExpiry', {
                style: style
            });
            cardExpiry.mount('#exp-month');

            var cardCvc = elements.create('cardCvc', {
                style: style
            });
            cardCvc.mount('#cvc');

            cardNumber.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(cardNumber).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
@endsection