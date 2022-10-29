<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SoloTrip;
use App\Models\SoloTripOrder;
use App\Models\TicketLottery;
use App\Models\TicketLotteryOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Laravel\Cashier\Payment as LaravelPayment;
use Stripe\PaymentIntent as StripePaymentIntent;

class TicketLotteryCheckoutController extends Controller
{
    //
    public function getPaymentIntentSecret(Request $r)
    {
        if (Auth::check()) {
            $r->validate([
                'trip_id' => 'required|numeric',
                'paymentMethodRadio' => 'required',
            ]);
        } else {
            abort(403);
        }
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
        $lottery = TicketLottery::findOrFail($r->input('trip_id'));
        if ($r->input('paymentMethodRadio') == 'new_payment_method') {
            $options = [
                'amount' => $lottery->entry_fee * 100,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
                'metadata' => ['type' => 'ticket_lottery'],
            ];

            $intent = '';
            $future_payments = false;
            if (Auth::check() && $r->has('future_payments')) {
                $future_payments = true;
                $user = User::findOrFail(Auth::id());
                $user->createOrGetStripeCustomer();

                $intent = $stripe->paymentIntents->create([
                    'amount' => $lottery->entry_fee * 100,
                    'currency' => 'usd',
                    'automatic_payment_methods' => [
                        'enabled' => 'true',
                    ],
                    'customer' => $user->stripeId(),
                    'metadata' => ['type' => 'ticket_lottery'],
                ]);
            /*       $intent =  \Stripe\PaymentIntent::create($options, Cashier::stripeOptions(['SETUP_FUTURE_USAGE' => 'on_session' , 'customer' => $user->stripeId()]));
           */
            } else {

                $intent = $stripe->paymentIntents->create($options);
            }
            $client_secret = $intent->client_secret;
            $lotteryOrder = new TicketLotteryOrder();
            $lotteryOrder->ticket_lottery_id = $lottery->id;
            $lotteryOrder->user_id = Auth::id();

            $lotteryOrder->payment_intent_id = $intent->id;
            $lotteryOrder->save();

            return response()->json(['status' => 'success', 'client_secret' => $client_secret, 'trip_order_id' => $lotteryOrder->id, 'future_payments' => $future_payments]);
        } else {
            $lotteryOrder = new TicketLotteryOrder();
            $lotteryOrder->user_id = Auth::id();
            $lotteryOrder->ticket_lottery_id = $lottery->id;

            $lotteryOrder->save();
            try {
                $user_payment_method = $r->user()->findPaymentMethod($r->input('paymentMethodRadio'));
                $payment = $r->user()->charge($lottery->entry_fee * 100, $user_payment_method->id, ['currency' => 'usd', 'metadata' => ['type' => 'ticket_lottery']]);
                $lotteryOrder->payment_intent_id = $payment->id;
                if ($payment->status == 'succeeded') {
                    $lotteryOrder->completed = true;
                }
                $lotteryOrder->save();

                return response()->json(['status' => 'done', 'trip_order_id' => $lotteryOrder->id]);
            } catch (IncompletePayment $e) {
                $lotteryOrder->payment_intent_id = $e->payment->id;
                $lotteryOrder->save();

                return response()->json(['status' => 'verification', 'trip_order_id' => $lotteryOrder->id]);
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
        $tripOrder = TicketLotteryOrder::findOrFail($order_id);
        $payment_intent =  $stripe->paymentIntents->retrieve($tripOrder->payment_intent_id);

        $succeeded = false;
        if ($payment_intent->status == 'succeeded') {
            $tripOrder->completed = true;
            $tripOrder->save();

            return redirect()->route('ticket-lottery-view', $tripOrder->lottery->id)->with('success', 'Payment has been done successfully !');
        } else {
            return redirect()->route('ticket-lottery-view', $tripOrder->lottery->id)->with('error', 'Something Went Wrong! Please Contact Our Customer Service For Assistance.');
        }
    }

    public function verification(Request $r, $id)
    {
        $order = TicketLotteryOrder::findOrFail($id);
        if ($order->user->id !== Auth::id()) {
            abort(404);
        }
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
        $payment_intent = $stripe->paymentIntents->retrieve($order->payment_intent_id);
        $laravel_payment_intent = new LaravelPayment($payment_intent);

        return view('stripeTicketLottery', ['order' => $order, 'payment' => $laravel_payment_intent, 'redirect' => route('ticket-lottery-view', $order->lottery->id)]);
    }
}
