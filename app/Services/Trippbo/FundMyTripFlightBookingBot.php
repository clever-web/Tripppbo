<?php

namespace App\Services\Trippbo;

use App\Services\Sriggle\FlightService;
use App\Models\FundMyTripFlightOrderPlan;
use Carbon\Carbon;

class FundMyTripFlightBookingBot
{
    public function updateFlightPrice(FundMyTripFlightOrderPlan $flightPlan)
    {

        $api = new FlightService();

        $search_data = $flightPlan->search_data;
        $flight = $flightPlan->flight;

        $results = $api->searchForFlights2($search_data)['FlightResults'];

        $matching_flight = null;

        foreach ($results as $result) {
            if (
                $flight["AirlineCode"] == $result["AirlineCode"]
                && $flight["ArrivalTime"] == $result["ArrivalTime"]
                && $flight["DepartureTime"] == $result["DepartureTime"]
                && $flight["ProviderName"] == $result["ProviderName"]
                && $flight["Destination"] == $result["Destination"]
                && $flight["Origin"] == $result["Origin"]
            ) {

                $matching_flight = $result;
            }
        }

        $flightPlan->last_price_update = Carbon::now();
        $flightPlan->last_price = ceil($matching_flight['OfferedFare']);
        $flightPlan->currency = $matching_flight['Currency'];
        $flightPlan->save();



        return $flightPlan;
    }



    /*  public function getFlightOrderInformation($flightOrder)
    {
        $flights = new Flights();
        $params = [];

        $params['origin'] = $flightOrder->origin_airport_code;
        $params['destination'] = $flightOrder->destination_airport_code;
        $params['adultCount'] = 1;
        $params['childCount'] = 0;
        $params['infantCount'] = 0;
        $params['flight_class'] = 'Economy';
        $params['returnDate'] = $flightOrder->return_date;
        $params['departureDate'] = $flightOrder->departure_date;
        $params['flightType'] = 'round trip';

        $response = $flights->roundTripFlightSearch($params);

        $selected_flight = null;

        $flight_operator_codes = explode(',', $flightOrder->operator_code);
        $flight_numbers = explode(',', $flightOrder->flight_number);

        $return_flight_operator_codes = explode(',', $flightOrder->return_operator_code);
        $return_flight_numbers = explode(',', $flightOrder->return_flight_number);

        foreach ($response as $flight) {
            $matched = true;
            if (count($flight['details'][0]) == (count($flight_operator_codes) - 1)) {
                for ($x = 0; $x < count($flight['details'][0]); $x++) {
                    if ($flight['details'][0][$x]['OperatorCode'] == $flight_operator_codes[$x] && $flight['details'][0][$x]['FlightNumber'] == $flight_numbers[$x]) {
                    } else {
                        $matched = false;
                    }
                }
            } else {
                $matched = false;
            }
            if (count($flight['details'][1]) == (count($return_flight_operator_codes) - 1)) {
                for ($x = 0; $x < count($flight['details'][1]); $x++) {
                    if ($flight['details'][1][$x]['OperatorCode'] == $return_flight_operator_codes[$x] && $flight['details'][1][$x]['FlightNumber'] == $return_flight_numbers[$x]) {
                    } else {
                        $matched = false;
                    }
                }
            } else {
                $matched = false;
            }
            if ($matched) {
                $selected_flight = $flight;
            }
        }
        $result_token = $selected_flight['ResultToken'];

        $response = $flights->updateFareQuote($result_token);

        $flightOrder->updated_result_token = $response['resultToken'];
        $flightOrder->last_price = ceil(CurrencyManagement::getPrice($response['currency'], 'USD', $response['price'][0]['passengers_cost']));
        $flightOrder->last_price_currency = 'USD';
        $flightOrder->save();

        return true;
    } */
}
