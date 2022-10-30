<?php

namespace App\Services\Trippbo;

use App\Models\BookActivityOrder;
use App\Models\BookFlightOrder;
use App\Models\BookHotelOrder;
use App\Models\BookTripHotelbedsHotelOrder;
use App\Models\BookTripOrder;
use App\Models\Country;
use App\Models\CouponCode;
use App\Models\FlightSupportPackage;
use App\Models\GiftCard;
use App\Models\Trip;
use App\Rules\GoogleInvisibleRecaptchaV2;
use App\Rules\GoogleRecaptchaV2;
use App\Services\Hotelbeds\HotelService;
use App\Services\Klarna\Klarna;
use App\Services\Travelomatix\Flights;
use App\Services\Trippbo\CurrencyManagement;
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

class OnGoingOrderManager
{
    public $pendingActivity;

    public $pendingFlight;

    public $pendingHotel;
    public $pendingHotelbedsHotel;
    public $hotelbedsHotelPending;

    public $order_id;

    public $hotel_passenger_types;

    public $checkoutHotelToTrip;

    public $checkoutFlightToTrip;

    public $tripId;

    public $currency;

    public $SupportPackage;

    public $SupportPackagePrice;

    public $hotel_passengers;

    public $discount;

    public $total;

    public $order;

    public $giftcard;

    public $coupon;

    public $user;

    private $hotelbeds_hotel_checkin_date;
    private $hotelbeds_hotel_number_of_nights;
    private $hotelbeds_hotel_booked_room;
    private $hotelbeds_local_order_id;

    public function __construct($hotelbeds_local_order_id = null)
    {
        $this->hotelbeds_local_order_id = session('latest_local_id', null);
        $this->fetchCurrentOrder();
    }
    public function getOrderId()
    {
        return $this->order_id;
    }
    public function addCoupon($code)
    {
        if ($this->order->User->getBalance() > 0) {
            abort(403);
        }
        if ($this->hasGiftCard()) {
            $this->removeGiftCard();
        }

        $coupon = CouponCode::where('coupon_code', $code)->first();
        if ($coupon == null) {
            abort(404);
        }
        $this->order->coupon_id = $coupon->id;
        $this->order->save();

        $this->fetchCurrentOrder();
    }

    public function removeCoupon()
    {
        $this->order->coupon_id = null;
        $this->discount = 0;
        $this->order->save();
        $this->fetchCurrentOrder();
    }

    public function hasCoupon()
    {
        $this->fetchCurrentOrder();

        return $this->order->Coupon == null ? false : true;
    }

    public function hasBalance()
    {
        $this->fetchCurrentOrder();
        if (Auth::check() && $this->order->User->getBalance() > 0) {
            return true;
        }

        return false;
    }

    public function addGiftCard($code)
    {
        if ($this->order->User->getBalance() > 0) {
            abort(403);
        }
        if ($this->hasCoupon()) {
            $this->removeCoupon();
        }
        $gift_card = GiftCard::where('code', $code)->first();
        if ($gift_card == null) {
            abort(404);
        }

        if ($gift_card->RemainingValueInTargetCurrency(null) * 100 >= $this->total) {
            $this->discount = $this->total;
        } else {
            $this->discount = $gift_card->RemainingValueInTargetCurrency(null) * 100;
        }
        $this->order->gift_card_id = $gift_card->id;
        $this->order->save();
        $this->fetchCurrentOrder();
    }

    public function removeGiftCard()
    {
        $this->order->gift_card_id = null;
        $this->discount = 0;
        $this->order->save();
        $this->fetchCurrentOrder();
    }

    public function getGiftCard()
    {
        return $this->order->GiftCard();
    }

    public function hasGiftCard()
    {
        return $this->order->GiftCard == null ? false : true;
    }

    public function fetchCurrentOrder()
    {
        $pendingActivity = session('pending_activity', null);
        $pendingFlight = session('pending_flight', null);
        $pendingHotel = session('pending_hotel', null);
        $hotelbedsHotel = null;
        if ($this->hotelbeds_local_order_id !== null) {
            $hotelbedsHotel =  session('hotelbeds_hotel_orders' . $this->hotelbeds_local_order_id, null);
        }


        $supportPackage = '';
        $gift_card = null;
        $coupon = null;
        $user = null;
        $hotel_passengers = null;
        $supportPackagePrice = 0;
        /*   return dd($pendingFlight); */
        //      return dd($pendingHotel);
        //   return dd($pendingFlight);
        $checkoutHotelToTrip = false;
        $checkoutFlightToTrip = false;

        $tripId = '';
        $flightOrderId = '';
        $hotelOrderId = '';
        $trip_hotel = '';
        $checkoutFlightToTrip = session('pending_review_flight_trip_id') == '' ? false : true;
        $checkoutHotelToTrip = ($trip_hotel !== '' && $trip_hotel !== null);

        $order = session('order_id', null);
        if ($order == null) {
            $order = new BookTripOrder();
            $order->save();
            session(['order_id' => $order->id]);
        } else {
            $order = BookTripOrder::firstOrCreate(['id' => $order]);
        }

        $orderlines = [];
        $total = 0;

        if ($pendingFlight !== null) {
            $flight = new Flights();
            $baseFlightPrice = 0;
            $passengers = $pendingFlight['price'];
            foreach ($passengers as $type => $pass) {
                $baseFlightPrice += $pass['passengers_cost'] * 100;
                $total += $pass['passengers_cost'] * 100;
            }
            $supportPackage = FlightSupportPackage::findOrFail($pendingFlight['flightSupportPackage']);

            $supportPackagePrice = ceil(($baseFlightPrice / 100) * ($supportPackage->price_percentage / 100)) * 100;

            $total += $supportPackagePrice;

            $passengers = $pendingFlight['selectedExtrasPerPassenger'];
            foreach ($passengers as $passengerId => $passengerExtras) {
                foreach ($passengerExtras as $serviceName => $serviceId) {
                    $priceForService = 0;
                    $serviceNamelocal = 0;
                    $serviceDescription = '';
                    if ($serviceName == 'Meal') {
                        foreach ($pendingFlight['extras']['Meals'] as $meal) {
                            if ($serviceId == $meal['MealId']) {
                                $priceForService = $meal['Price'];
                                $serviceNamelocal = 'Meal';
                                $serviceDescription = $meal['Description'];
                                $pendingFlight['selectedExtrasPerPassenger'][$passengerId]['meal_description'] = 'Meal - ' . $meal['Description'];
                                $pendingFlight['selectedExtrasPerPassenger'][$passengerId]['meal_price'] = $priceForService;
                            }
                        }
                    } elseif ($serviceName == 'Baggage') {
                        foreach ($pendingFlight['extras']['Baggage'] as $baggage) {
                            if ($serviceId == $baggage['BaggageId']) {
                                $priceForService = $baggage['Price'];
                                $serviceNamelocal = 'Extra Baggage';
                                $serviceDescription = $baggage['Weight'];

                                $pendingFlight['selectedExtrasPerPassenger'][$passengerId]['baggage_weight'] = $serviceDescription;
                                $pendingFlight['selectedExtrasPerPassenger'][$passengerId]['baggage_price'] = $priceForService;
                            }
                        }
                    }
                    $total += $priceForService * 100;
                }
            }

            $flightOrder = BookFlightOrder::firstOrCreate(['order_id' => $order->id]);

            if ($flightOrder->submitted) {
                abort(404);
            }
            //     $flightOrder->passenger()->delete();

            $flightOrder->ResultToken = $pendingFlight['resultToken'];
            $flightOrder->AppReference = Str::uuid();
            $flightOrder->flight_service_package_id = $pendingFlight['flightSupportPackage'];
            $flightOrder->save();
            $flightOrderId = $flightOrder->id;
        }
        $hotel_passenger_types = null;
        if ($pendingHotel !== null) {
            $hotel_passengers = session('hotel_passengers');

            $hotel_passenger_types = [];
            $hotel_passenger_types[] = session('hotel_number_of_adults');
            $hotel_passenger_types[] = session('hotel_number_of_child');

            $total += $pendingHotel['Price'] * 100;

            $hotelOrder = BookHotelOrder::firstOrCreate(['order_id' => $order->id]);

            if ($hotelOrder->submitted) {
                abort(404);
            }

            $hotelOrder->passengers()->delete();

            $hotelOrder->ResultToken = $pendingHotel['ResultToken'];
            $hotelOrder->AppReference = Str::uuid();
            $hotelOrder->BlockRoomId = $pendingHotel['BlockRoomId'];

            $hotelOrder->save();
            $hotelOrderId = $hotelOrder->id;
        }

        if ($hotelbedsHotel) {

            $h = new HotelService();
            $hotelOrder = BookTripHotelbedsHotelOrder::firstOrCreate(['order_id' => $order->id]);
            $hotelOrder->client_reference = 'Hotel-' . $order->id;
            $hotelOrder->rate_key = $hotelbedsHotel['rateKey'];
            $hotelOrder->amount_of_rooms = session('hotel_room_count');
            $hotelOrder->save();
            $hotelOrderId = $hotelOrder->id;
            $price = 0;
            $currency = '';
            $this->hotelbeds_hotel_checkin_date = $hotelbedsHotel['hotelbeds_hotel_checkinDate'];
            $this->hotelbeds_hotel_number_of_nights = $hotelbedsHotel['hotelbeds_hotel_noOfNights'];
            $h = new HotelService();
            $hotel = $h->getHotelSubpage($hotelbedsHotel['hotelbeds_city_id'], $hotelbedsHotel['hotelbeds_hotel_code']);
            $ratekeyFound = false;
            foreach ($hotel['hotel']['rooms'] as $room) {
                foreach ($room['rates'] as $rate) {
                    if ($rate['rateKey'] == $hotelbedsHotel['rateKey']) {
                        $this->hotelbeds_hotel_booked_room = $room;
                        $ratekeyFound = true;

                        $price = $rate['net'];
                        $currency = $hotel['hotel']['currency'];
                    }
                }
            }
            if ($ratekeyFound == false) {
                abort(404);
            }

            $price = ceil($price);

            $total += 100 * CurrencyManagement::getPrice($currency, null,  $price);

            $hotelbeds = new HotelService();

            $hotelbeds = $hotelbeds->getHotelSubpage($hotelbedsHotel['hotelbeds_city_id'], $hotelbedsHotel['hotelbeds_hotel_code']);
            $this->pendingHotelbedsHotel = $hotelbeds;
            $this->pendingHotelbedsHotel['numberOfNights'] = $this->hotelbeds_hotel_number_of_nights;
            $this->pendingHotelbedsHotel['checkinDate'] = $this->hotelbeds_hotel_checkin_date;
            $this->pendingHotelbedsHotel['booked_room'] = $this->hotelbeds_hotel_booked_room;
        }

        if ($pendingActivity !== null) {
            $total += $pendingActivity['Price'] * 100;
            $orderlines[] = [
                'type' => 'Physical',
                'reference' => $order->id,
                'name' => 'Activity By Trippbo',
                'quantity' => 1,
                'quantity_unit' => 'Ticket',
                'unit_price' => $pendingActivity['Price'] * 100,
                'tax_rate' => 0,
                'total_amount' => $pendingActivity['Price'] * 100,
                'total_discount_amount' => 0,
                'total_tax_amount' => 0,
            ];

            $activityOrder = BookActivityOrder::firstOrCreate(['order_id' => $order->id]);

            $activityOrder->BlockTourId = $pendingActivity['BlockTourId'];
            $activityOrder->AppReference = Str::uuid();
            $activityOrder->ProductCode = $pendingActivity['ProductCode'];
            $activityOrder->BlockTourId = $pendingActivity['BlockTourId'];
            $activityOrder->BookingDate = $pendingActivity['BookingDate'];
            $activityOrder->GradeCode = $pendingActivity['GradeCode'];

            $activityOrder->save();
        }
        $discount = 0;

        if ($order->gift_card_id !== null) {
            $gift_card = GiftCard::findOrFail($order->gift_card_id);

            $gift_card->on_hold = true;
            $gift_card->save();
            $gift_card_remaining_value = $gift_card->value - $gift_card->redeemed_portion;

            $gift_card_remaining_value = CurrencyManagement::getPrice($gift_card->currency, null, $gift_card_remaining_value);
            $gift_card_remaining_value *= 100;
            if ($gift_card_remaining_value < $total) {
                $discount = $gift_card_remaining_value;
            }
            if ($gift_card_remaining_value >= $total) {
                $discount = $total;
            }
        }
        if ($order->coupon_id !== null) {
            $coupon = CouponCode::findOrFail($order->coupon_id);
            $percetage = $coupon->coupon_off_percentage;

            $discount = ($total * ($percetage / 100));
        }

        $userBalance = 0;
        if (Auth::check()) {
            $order->user_id = Auth::id();
            if (($userBalance = $order->User->getBalance()) > 0) {
                $userBalance = CurrencyManagement::getPrice('EUR', null, $userBalance);
                if ($userBalance < $total) {
                    $discount = $userBalance * 100;
                }
                if ($userBalance >= $total) {
                    $discount = $total;
                }
            }
        }

        $order->save();

        $this->supportPackage = $supportPackage;
        $this->supportPackagePrice = $supportPackagePrice;
        $this->pendingActivity = $pendingActivity;
        $this->pendingFlight = $pendingFlight;
        $this->order_id = $order->id;
        $this->pendingHotel = $pendingHotel;
        $this->hotel_passenger_types = $hotel_passenger_types;
        $this->checkout_hotel_to_trip = $checkoutHotelToTrip;
        $this->checkout_flight_to_trip = $checkoutFlightToTrip;
        $this->tripId = $tripId;
        $this->total = ceil($total);
        $this->currency = CurrencyManagement::determine_user_currency();
        $this->hotel_passengers = $hotel_passengers;
        $this->discount = $discount;
        $this->order = $order;
        $this->giftcard = $gift_card;
        $this->coupon = $coupon;
        $this->user = $order->User;
    }

    public function processOrder()
    {
        $this->fetchCurrentOrder();

        if ($this->order->gift_card_id !== null) {
            $gift_card = GiftCard::findOrFail($this->order->gift_card_id);

            $gift_card->on_hold = true;
            $gift_card->save();
            $gift_card_remaining_value = $gift_card->value - $gift_card->redeemed_portion;

            $gift_card_remaining_value = CurrencyManagement::getPrice($gift_card->currency, null, $gift_card_remaining_value);

            if ($gift_card_remaining_value < $this->total && $gift_card_remaining_value > 0) {
                $discount = $gift_card_remaining_value;
            }
            if ($gift_card_remaining_value >= $this->total) {
                $discount = $this->total;
            }
        }

        $gift_card->redeemed_portion += CurrencyManagement::getPrice(CurrencyManagement::determine_user_currency(), $gift_card->currency, $discount);
        $gift_card->save();
        $ord = new TrippboOrder($this->order);
        /*        $ord->processOrder(); */
    }
}
