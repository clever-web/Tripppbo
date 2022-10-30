    <?php

    namespace App\Http\Controllers;

    use App\Models\ActivityPassenger;
    use App\Models\BookActivityOrder;
    use App\Services\Travelomatix\Activities;
    use App\Services\Trippbo\CurrencyManagement;
    use Illuminate\Http\Request;

    class ActivitiesController extends Controller
    {
        public function index(Request $r)
        {
            $r->validate([
                'city_id' => 'numeric',
                'date_from' => 'date',
                'date_to' => 'date',
            ]);

            return view('activities.home', ['city_id' => $r->input('city_id'), 'date_from' => $r->input('date_from'), 'date_to' => $r->input('date_to'), 'activity_destination_name' => $r->input('activity_destination_name')]);
        }

        public function subpageIndex(Request $r)
        {
            $api = new Activities();
            $product_code = $r['product_code'];
            $result_token = $r['result_token'];
            $activity_details = $api->getActivityDetails($product_code, $result_token);

            /*   return dd($activity_details); */
            return view('activities.subpage', ['details' => $activity_details, 'date_from' => $r['date_from'], 'date_to' => $r['date_to']]);
        }

        public function getActivities(Request $r, $city_code)
        {
            $activites = new Activities();

            return   $activites->getActivities($city_code);
        }

        public function getTourGrade(Request $r)
        {
            $api = new Activities();
            $tourGrades = $api->getActivityTourGrade($r->input('date'), $r->input('productCode'), $r->input('resultToken'), $r->input('adult_count'), $r->input('child_count'), $r->input('infant_count'));

            return $tourGrades;
        }

        public function reserve(Request $r)
        {
            $api = new Activities();

            $reservation = $api->reserveActivity($r->input('date'), $r->input('gradeCode'), $r->input('productCode'), $r->input('resultToken'), $r->input('adult_count'), $r->input('child_count'), $r->input('infant_count'));

            $pendingReservations = [

                'BlockTourId' => $reservation['BlockTrip']['BlockTripResult']['BlockTourId'],
                'GradeCode' => $reservation['BlockTrip']['BlockTripResult']['GradeCode'],
                'ProductCode' => $reservation['BlockTrip']['BlockTripResult']['ProductCode'],
                'BookingDate' => $reservation['BlockTrip']['BlockTripResult']['BookingDate'],

                'TotalPrice' =>     CurrencyManagement::getPrice($reservation['BlockTrip']['BlockTripResult']['Price']['Currency'], null, $reservation['BlockTrip']['BlockTripResult']['Price']['TotalDisplayFare']),

                'Currency' => CurrencyManagement::determine_user_currency(),
                'Price' => CurrencyManagement::getPrice($reservation['BlockTrip']['BlockTripResult']['Price']['Currency'], null, $reservation['BlockTrip']['BlockTripResult']['Price']['TotalDisplayFare']),
                'adult_count' => $r->input('adult_count'),
                'child_count' => $r->input('child_count'),
                'infant_count' => $r->input('infant_count'),
                'ProductImage' => $reservation['BlockTrip']['BlockTripResult']['ProductImage'],
                'ProductName' => $reservation['BlockTrip']['BlockTripResult']['ProductName'],
                'Duration' => $reservation['BlockTrip']['BlockTripResult']['Duration'],
                'Destination' => $reservation['BlockTrip']['BlockTripResult']['Destination'],

            ];

            session(['pending_activity' => $pendingReservations]);
            session(['pending_flight' => null]);
            session(['pending_hotel' => null]);
            session(['pending_review_flight_trip_id' => null]);
            session(['order_id' => null]);

            return response('', 200);
        }

        public function addPassengers(Request $r)
        {
            $order_id = session('order_id');
            $activity_order = BookActivityOrder::where('order_id', $order_id)->first();
            $passenger = new ActivityPassenger();
            $passenger->IsLeadPax = $r->input('IsLeadPax');
            $passenger->FirstName = $r->input('FirstName');
            $passenger->LastName = $r->input('LastName');

            $passenger->ContactNo = $r->input('ContactNo');

            $passenger->Email = $r->input('Email');
            $passenger->PaxType = $r->input('PaxType');

            $passenger->activity_order_id = $activity_order->id;
            $passenger->save();
        }
    }
