    <?php

    namespace App\Http\Controllers;

    use App\Models\BookActivityOrder;
    use App\Models\BookFlightOrder;
    use App\Models\BookHotelOrder;
    use App\Models\BookTripOrder;
    use App\Models\Country;
    use App\Models\FlightSupportPackage;
    use App\Models\GiftCard;
    use App\Models\Trip;
    use App\Rules\GoogleInvisibleRecaptchaV2;
    use App\Rules\GoogleRecaptchaV2;
    use App\Services\Klarna\Klarna;
    use App\Services\Travelomatix\Flights;
    use App\Services\Trippbo\CurrencyManagement;
    use App\Services\Trippbo\OnGoingOrderManager;
    use App\Services\Trippbo\SessionController;
    use App\Services\Trippbo\TripboOrder;
    use App\Services\Trippbo\TrippboOrder;
    use Carbon\Carbon;
    use Illuminate\Contracts\Session\Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;
    use Laravel\Cashier\Cashier;
    use Laravel\Cashier\Payment as LaravelPayment;
    use Stripe\Discount;
    use Stripe\PaymentIntent as StripePaymentIntent;
    use Symfony\Component\ErrorHandler\Debug;

    class BookTripCheckoutController extends Controller
    {
        public function index(Request $r)
        {
            $local_order_id =  $r->has('local_hotel_order_id') ? $r['local_hotel_order_id'] : null;
            session(['latest_local_id' => $local_order_id]);
            $ongoing_order = new OnGoingOrderManager();

            $countries = new Country();
            $all = $countries->getAllCountriesCached();

            return view('checkout.checkout', [
                'countries' => $all, 'pendingActivity' => $ongoing_order->pendingActivity, 'pendingFlight' => $ongoing_order->pendingFlight, 'order_id' => $ongoing_order->order->id, 'pendingHotel' => $ongoing_order->pendingHotel, 'hotel_passenger_types' => $ongoing_order->hotel_passenger_types, 'checkout_hotel_to_trip' => $ongoing_order->checkoutHotelToTrip,
                'checkout_flight_to_trip' => $ongoing_order->checkoutFlightToTrip,
                'tripId' => $ongoing_order->tripId,
                'total' => $ongoing_order->total,
                'currency' => $ongoing_order->currency,
                'flightSupportPackage' => $ongoing_order->supportPackage,
                'flightSupportPackagePrice' => $ongoing_order->supportPackagePrice,
                'hotel_passengers' => $ongoing_order->hotel_passengers,
                'discount' => $ongoing_order->discount,
                'coupon_enabled' => $ongoing_order->hasCoupon(),
                'gift_card_enabled' => $ongoing_order->hasGiftCard(),
                'trippbo_balance_enabled' => $ongoing_order->hasBalance(),
                'hotelbeds_hotel' => $ongoing_order->pendingHotelbedsHotel,
                'local_hotel_order_id' => $local_order_id,


            ]);
        }

        public function getPaymentIntentSecret(Request $r)
        {
            $ongoing_order = new OnGoingOrderManager();

            if ($ongoing_order->total - $ongoing_order->discount == 0) {
                return response()->json(['status' => 'success', 'client_secret' => '', 'total' => $ongoing_order->total, 'discount' => $ongoing_order->discount]);
            }
            $options = [
                'amount' => ($ongoing_order->total - $ongoing_order->discount),
                'currency' => CurrencyManagement::determine_user_currency(),

                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
            ];
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $intent = $stripe->paymentIntents->create($options);
            $client_secret = $intent->client_secret;
            $ongoing_order->order->stripe_payment_intent_id = $intent->id;
            $ongoing_order->order->save();

            return response()->json(['status' => 'success', 'client_secret' => $client_secret, 'total' => $ongoing_order->total, 'discount' => $ongoing_order->discount]);
        }

        public function addGiftCard(Request $r)
        {
            $r->validate([
                'code' => 'required|string',
                'g-recaptcha-response' => ['required', new GoogleInvisibleRecaptchaV2],
            ]);
            $ongoing_order = new OnGoingOrderManager();
            $code = $r->input('code');
            $ongoing_order->addGiftCard($code);

            $gift_card_remaining_value = $ongoing_order->order->GiftCard->RemainingValueInTargetCurrency(null);

            return response()->json(['card_remaining_value' => $gift_card_remaining_value * 100, 'total' => $ongoing_order->total, 'discount' => $ongoing_order->discount]);
        }

        public function removeGiftCard(Request $r)
        {
            $ongoing_order = new OnGoingOrderManager();
            $ongoing_order->removeGiftCard();
        }

        public function addCoupon(Request $r)
        {
            $r->validate([
                'code' => 'required|string',
                'g-recaptcha-response' => ['required', new GoogleInvisibleRecaptchaV2],
            ]);
            $ongoing_order = new OnGoingOrderManager();
            $code = $r->input('code');
            $ongoing_order->addCoupon($code);

            return response()->json(['percentage' => $ongoing_order->coupon->coupon_off_percentage, 'total' => $ongoing_order->total, 'discount' => $ongoing_order->total * ($ongoing_order->coupon->coupon_off_percentage / 100)]);
        }

        public function removeCoupon(Request $r)
        {
            $ongoing_order = new OnGoingOrderManager();
            $ongoing_order->removeCoupon();
        }

        public function showOrderConfirmation(Request $r)
        {
            $order_id = session('order_id');
            $order = BookTripOrder::findOrFail(['id' => $order_id]);
            $flightOrder = BookFlightOrder::where('order_id', $order_id)->first();
            $hotelOrder = BookHotelOrder::where('order_id', $order_id)->first();
            $activityOrder = BookActivityOrder::where('order_id', $order_id)->first();
            $pendingActivity = session('pending_activity', null);
            $pendingFlight = session('pending_flight', null);
            $pendingHotel = session('pending_hotel', null);
            $hotel_num_of_adults = session('hotel_number_of_adults');
            $hotel_num_of_children = session('hotel_number_of_child');

            $checkinDate = null;
            $checkoutDate = null;
            if ($pendingHotel !== null) {
                $checkinDate = new Carbon($pendingHotel['checkInDate']);
                $checkoutDate = new Carbon($pendingHotel['checkOutDate']);
            }

            return view('order-conformation-page', [
                'hotel' => $pendingHotel,
                'order_id' => session('order_id'),
                'hotel_order_id' => $hotelOrder->id,
                'checkin_date' => $checkinDate,
                'checkout_date' => $checkoutDate,
                'hotel_num_of_adults' => $hotel_num_of_adults,
                'hotel_num_of_children' => $hotel_num_of_children,
                'hotel_room_count' => session('hotel_room_count'),

            ]);
        }

        public function processOrder(Request $r)
        {
            return 'ok';
            $ongoing_order = new OnGoingOrderManager();
            //  $ongoing_order->processOrder();
        }
    }
