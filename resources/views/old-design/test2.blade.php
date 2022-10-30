@extends('layout')


@section('head')


@endsection
@section('content')

<div class="container">
    <input id="card-holder-name" type="text">

    <!-- Stripe Elements Placeholder -->
    <div id="card-element"></div>

    <button id="card-button" data-secret="{{ $intent->client_secret }}">
        Add Payment Method
    </button>



    <form id="payment_form" action="{{route('payment-save-card')}}" method="POST">
        @csrf
        <input id="payment_id" type="hidden" name="payment_id" value=""/>
    </form>
</div>
@endsection


@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('pk_test_vcaFIAmCgaRUXFtdayPIqifR');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                alert(error.message)
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...

                $("#payment_id").val(setupIntent.payment_method);
                $("#payment_form").submit();
            }
        });
    </script>

@endsection
