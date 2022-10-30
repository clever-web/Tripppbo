@extends('layout')
@section('head')

    <meta name="lottery_id" content="{{$lottery->id}}">

@endsection
@section('content')

    <div class="container m-lg-5">
        <div class="container mt-5 m-lg-5 p-5" style="background-color: #718096;border-radius: 8px;">

            <div class="row ">

                <div class="col-md-10 d-flex flex-row justify-center align-items-center">

                    <input class="form-control" id="card-holder-name" type="text" placeholder="Full Name">
                </div>
                <div class="col-md-2 d-flex flex-row justify-center align-items-center">
                    <input id="amount" name="amount" class="form-control" id="card-holder-name" placeholder="Amount..." type="text" disabled value="{{$lottery->entry_fee}}"/> <span
                        style="color: white">USD</span>

                </div>
                <div class="col-md-12 d-flex flex-row justify-center align-items-center">

                    <input class="form-control" id="card-holder-name" type="email" disabled value="{{$email}}"/>
                </div>

            </div>

            <div class="d-flex justify-content-center ">
                <div class="p-4 m-2" style="background-color: white;width: 400px;">
                    <!-- Stripe Elements Placeholder -->
                    <div style="margin: 0 auto;">
                        <div id="card-element"></div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center ">
                <button id="card-button" style="margin: 0 auto" type="button" class="btn btn-primary">Pay {{$lottery->entry_fee}}$
                </button>
            </div>

        </div>


    </div>


    <form id="payment_form" action="{{route('ticket-lottery-charge')}}" method="POST">
        @csrf
        <input id="payment_id" type="hidden" name="payment_id" value="" />
        <input id="lottery_id" type="hidden" name="lottery_id" value="{{$lottery->id}}" />

    </form>
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

        cardButton.addEventListener('click', async (e) => {
            cardButton.disabled = true;
            cardButton.textContent = "Processing..."
            const {paymentMethod, error} = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {name: cardHolderName.value}
                }
            );

            if (error) {
                alert(error.message)
                cardButton.disabled = false;
                cardButton.textContent = "Fund Trip Now !"
                // Display "error.message" to the user...
            } else {



                $("#payment_id").val(paymentMethod.id);
                $("#payment_form").submit();
             /*   $.ajax({
                    type: 'POST',
                    url: '/buy-ticket',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        'lottery_id': $('meta[name=lottery_id]').attr('content'),
                        'payment_id': paymentMethod.id

                    },
                    beforeSend: function () {

                    },
                    success: function () {
                  //      window.location.replace("/ticket-lottery/view/" + $('meta[name=lottery_id]').attr('content'));

                    },
                    error: function () {

                    },
                    complete: function () {

                    }
                });
*/
                // The card has been verified successfully...
            }

        });
    </script>
@endsection
