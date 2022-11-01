    <?php

    namespace App\Http\Controllers;

    use App\Models\Payment;
    use App\Models\SoloTrip;
    use App\Models\SoloTripOrder;
    use App\Models\User;
    use App\Notifications\FundMyTripSoloNewDonation;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;
    use Laravel\Cashier\Cashier;
    use Laravel\Cashier\Exceptions\IncompletePayment;
    use Laravel\Cashier\Payment as LaravelPayment;
    use Stripe\PaymentIntent as StripePaymentIntent;

    class Checkout extends Controller
    {
        //

        public function save_card(Request $request)
        {
            $user = User::find(Auth::id());
            $stripeCustomer = $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request['payment_id']);
        }

        public function handleChargeSuccess(Request $r)
        {
            Log::debug(dd($r));
        }

        public function getPaymentIntentSecret(Request $r)
        {
            if (Auth::check()) {
                $r->validate([
                    'amount' => 'required|numeric:between:1,100000',
                    'trip_id' => 'required|numeric',
                    'paymentMethodRadio' => 'required',
                ]);
            } else {
                $r->validate([
                    'amount' => 'required|numeric:between:1,100000',
                    'trip_id' => 'required|numeric',
                    'paymentMethodRadio' => 'required',
                    'email' => 'nullable|string',

                ]);
            }
            $amount_to_be_charged = ($r->input('amount'));
            $percentage = 0.034;
            $reminder = 1 - $percentage;
            $base_amount = ceil($amount_to_be_charged * $reminder);
            $amount_to_be_charged *= 100;
        $stripe = new \Stripe\StripeClient(
                        config('services.stripe.secret')
                    );
            if (Auth::check() == false || $r->input('paymentMethodRadio') == 'new_payment_method') {
                $options = [
                    'amount' => $amount_to_be_charged,
                    'currency' => 'EUR',
                    'automatic_payment_methods' => [
                        'enabled' => 'true',
                    ],
                    'metadata' => ['type' => 'fund_my_trip_solo'],
                ];

                $intent = '';
                $future_payments = false;
                if (Auth::check() && $r->has('future_payments')) {
                    $future_payments = true;
                    $user = User::findOrFail(Auth::id());
                    $user->createOrGetStripeCustomer();

                    $intent = $stripe->paymentIntents->create([
                        'amount' => $amount_to_be_charged,
                        'currency' => 'EUR',
                        'automatic_payment_methods' => [
                            'enabled' => 'true',
                        ],
                        'customer' => $user->stripeId(),
                        'metadata' => ['type' => 'fund_my_trip_solo'],
                    ]);
                /*       $intent =  \Stripe\PaymentIntent::create($options, Cashier::stripeOptions(['SETUP_FUTURE_USAGE' => 'on_session' , 'customer' => $user->stripeId()]));
            */
                } else {
                    $intent = $stripe->paymentIntents->create($options);
                }
                $client_secret = $intent->client_secret;
                $soloOrder = new SoloTripOrder();
                $soloOrder->amount = $base_amount;
                $soloOrder->user_id = Auth::check() ? Auth::id() : null;
                $soloOrder->email = Auth::check() ? $r->user()->email : $r->input('email');
                $soloOrder->trip_id = $r->has('trip_id') ? $r->input('trip_id') : null;
                $soloOrder->payment_intent_id = $intent->id;
                $soloOrder->save();

                return response()->json(['status' => 'success', 'client_secret' => $client_secret, 'trip_order_id' => $soloOrder->id, 'future_payments' => $future_payments]);
            } else {
                $soloOrder = new SoloTripOrder();
                $soloOrder->amount = $base_amount;
                $soloOrder->user_id = Auth::check() ? Auth::id() : null;
                $soloOrder->email = Auth::check() ? $r->user()->email : $r->input('email');
                $soloOrder->trip_id = $r->has('trip_id') ? $r->input('trip_id') : null;
                $soloOrder->save();
                try {
                    $user_payment_method = $r->user()->findPaymentMethod($r->input('paymentMethodRadio'));
                    $payment = $r->user()->charge($amount_to_be_charged, $user_payment_method->id, ['currency' => 'EUR', 'metadata' => ['type' => 'fund_my_trip_solo']]);
                    $soloOrder->payment_intent_id = $payment->id;
                    if ($payment->status == 'succeeded') {
                        $soloOrder->completed = true;
                    }
                    $soloOrder->save();

                    return response()->json(['status' => 'done', 'trip_order_id' => $soloOrder->id]);
                } catch (IncompletePayment $e) {
                    $soloOrder->payment_intent_id = $e->payment->id;
                    $soloOrder->save();

                    return response()->json(['status' => 'verification', 'trip_order_id' => $soloOrder->id]);
                }
            }
        }

        public function checkPaymentSuccess(Request $r)
        {
            $r->validate([
                'trip_order_id' => 'required|numeric',

            ]);

            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $order_id = $r->input('trip_order_id');
            $tripOrder = SoloTripOrder::findOrFail($order_id);
            $payment_intent = $stripe->paymentIntents->retrieve($tripOrder->payment_intent_id);

            $succeeded = false;
            if ($payment_intent->status == 'succeeded') {
                $tripOrder->completed = true;
                $tripOrder->save();
                $tripOrder->trip->user->notify(new FundMyTripSoloNewDonation($tripOrder));

                return redirect()->route('solo-browse', $tripOrder->trip->id)->with('success', 'Payment has been done successfully !');
            } else {
                return redirect()->route('solo-browse', $tripOrder->trip->id)->with('error', 'Something Went Wrong! Please Contact Our Customer Service For Assistance.');
            }
        }

        public function verification(Request $r, $id)
        {
            $order = SoloTripOrder::findOrFail($id);
            if ($order->user->id !== Auth::id()) {
                abort(404);
            }
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );

            $payment_intent = $stripe->paymentIntents->retrieve($order->payment_intent_id);
            $laravel_payment_intent = new LaravelPayment($payment_intent);

            return view('stripe', ['order' => $order, 'payment' => $laravel_payment_intent, 'redirect' => route('solo-browse', $order->trip->id)]);
        }
        /*     public
        function charge(Request $request)
        {
            $object_name = $request['object_name'];
            $object_id = $request['object_id'];

            if ($object_name == "solo") {
                try {

                    $t = SoloTrip::findOrFail($object_id);
                    $amount = $request["amount"];
                    $payment = $request->user()->charge($amount * 100, $request['payment_id']);
                    $t->donations += $amount;
                    $t->save();
                } catch (IncompletePayment $e) {

                    $payment = new Payment();

                    return redirect()->route(
                        'cashier.payment',
                        [$e->payment->id, 'redirect' => route('solo-view', $t->id)]
                    );
                }
            }
        } */
    }
