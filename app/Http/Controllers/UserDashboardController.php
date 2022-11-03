    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class UserDashboardController extends Controller
    {
        public function index() {
            $bookingData = [
                'upcomingFlightBookings' => [
                    [
                        'bookingNumber' => 'GHF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
                'pastFlightBookings' => [
                    [
                        'bookingNumber' => 'PFF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
                'upcomingHotelBookings' => [
                    [
                        'bookingNumber' => 'UHF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
                'pastHotelBookings' => [
                    [
                        'bookingNumber' => 'PHF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
                'upcomingActivityBookings' => [
                    [
                        'bookingNumber' => 'UAF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
                'pastActivityBookings' => [
                    [
                        'bookingNumber' => 'PAF8392',
                        'pnr' => '',
                        'timeToGo' => 'In 4 Days',
                        'airlineReference' => 'DSS232134',
                        'origin' => [
                            'cityName' => 'Los Angeles',
                            'airportCode' => 'LAX',
                            'date' => 'Mon, 3 May 2022'
                        ],
                        'paxNum' => '2',
                        'class' => 'Economy',
                        'destination' => [
                            'cityName' => 'Newark',
                            'airportCode' => 'EWR',
                            'date' => 'Thu, 6 May 2022'
                        ],
                        'duration' => ''
                    ]
                ],
            ];

            return view('user-dashboard/dashboard', ["data" => $bookingData]);
        }

        public function booking() {
            $bookingInfoStr = '{ "Status": "1", "Message": "", "CommitBooking": { "BookingDetails": { "PNR": "VIQRFY", "Attr": "", "Price": { "Currency": "USD", "PriceBreakup": { "Tax": 419.919, "BasicFare": 441.932, "AgentCommission": 0, "AgentTdsOnCommision": 0 }, "PassengerBreakup": { "ADT": { "Tax": 209.959, "BasePrice": 255.342, "TotalPrice": 465.302, "PassengerCount": "1" }, "CHD": { "Tax": 209.959, "BasePrice": 186.59, "TotalPrice": 396.549, "PassengerCount": "1" } }, "TotalDisplayFare": 861.851 }, "BookingId": "MF629225022", "JourneyList": { "FlightDetails": { "Details": [ [ { "Attr": "", "Origin": { "FDTV": 1652418900, "CityName": "Copenhagen", "DateTime": "2022-05-13 10:45:00", "Terminal": "", "AirportCode": "CPH", "AirportName": "Copenhagen" }, "AirlinePNR": "VIQRFY", "CabinClass": "Y", "Destination": { "FATV": 1652434200, "CityName": "Istanbul", "DateTime": "2022-05-13 15:00:00", "Terminal": "", "AirportCode": "IST", "AirportName": "Istanbul" }, "FlightNumber": "1784", "OperatorCode": "TK", "OperatorName": "Turkish airlines", "DisplayOperatorCode": "TK" }, { "Attr": "", "Origin": { "FDTV": 1652440800, "CityName": "Istanbul", "DateTime": "2022-05-13 16:50:00", "Terminal": "", "AirportCode": "IST", "AirportName": "Istanbul" }, "AirlinePNR": "VIQRFY", "CabinClass": "Y", "Destination": { "FATV": 1652446200, "CityName": "Adana", "DateTime": "2022-05-13 18:20:00", "Terminal": "", "AirportCode": "ADA", "AirportName": "Adana" }, "FlightNumber": "2466", "OperatorCode": "TK", "OperatorName": "Turkish airlines", "DisplayOperatorCode": "TK" }, { "Attr": "", "Origin": { "FDTV": 1653546000, "CityName": "Adana", "DateTime": "2022-05-26 11:50:00", "Terminal": "", "AirportCode": "ADA", "AirportName": "Adana" }, "AirlinePNR": "VIQRFY", "CabinClass": "Y", "Destination": { "FATV": 1653552000, "CityName": "Istanbul", "DateTime": "2022-05-26 13:30:00", "Terminal": "", "AirportCode": "IST", "AirportName": "Istanbul" }, "FlightNumber": "2455", "OperatorCode": "TK", "OperatorName": "Turkish airlines", "DisplayOperatorCode": "TK" }, { "Attr": "", "Origin": { "FDTV": 1653560400, "CityName": "Istanbul", "DateTime": "2022-05-26 15:50:00", "Terminal": "", "AirportCode": "IST", "AirportName": "Istanbul" }, "AirlinePNR": "VIQRFY", "CabinClass": "Y", "Destination": { "FATV": 1653568500, "CityName": "Copenhagen", "DateTime": "2022-05-26 18:05:00", "Terminal": "", "AirportCode": "CPH", "AirportName": "Copenhagen" }, "FlightNumber": "1785", "OperatorCode": "TK", "OperatorName": "Turkish airlines", "DisplayOperatorCode": "TK" } ] ] } }, "PassengerDetails": [ { "Title": "Mr", "LastName": "Hijazi", "TicketId": "", "FirstName": "Basel", "PassengerId": "93573", "TicketNumber": "", "PassengerType": "ADT" }, { "Title": "Mr", "LastName": "Hijazi", "TicketId": "", "FirstName": "Malik Leo", "PassengerId": "93574", "TicketNumber": "", "PassengerType": "CHD" } ] } } }';
            $flightBookingDetail = json_decode($bookingInfoStr)->CommitBooking;

            $passengerDetails = $flightBookingDetail->BookingDetails->PassengerDetails;
            $segmentDetails = $flightBookingDetail->BookingDetails->JourneyList->FlightDetails->Details;
            $priceDetails = $flightBookingDetail->BookingDetails->Price;

            $lastLeg = $segmentDetails[count($segmentDetails) - 1];
            $lastSegment = $lastLeg[count($lastLeg) - 1];
            $flightBookingDetail->BookingDetails->OriginAirport = $segmentDetails[0][0]->Origin->AirportName;
            $flightBookingDetail->BookingDetails->OriginAirportCode = $segmentDetails[0][0]->Origin->AirportCode;
            $flightBookingDetail->BookingDetails->OriginBoardingTime = $segmentDetails[0][0]->Origin->DateTime;
            $flightBookingDetail->BookingDetails->BookingClass = "Economy";
            $flightBookingDetail->BookingDetails->DestinationAirport = $lastSegment->Destination->AirportName;
            $flightBookingDetail->BookingDetails->DestinationAirportCode = $lastSegment->Destination->AirportCode;
            $flightBookingDetail->BookingDetails->DestinationBoardingTime = $lastSegment->Destination->DateTime;
            $flightBookingDetail->BookingDetails->OriginTerminal = trim($segmentDetails[0][0]->Origin->Terminal);
            $flightBookingDetail->BookingDetails->OriginGate = '';

            $paxAndDocInfo = [
                [
                    'title' => 'Visa For Turkey',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
                ],
                [
                    'title' => 'Passport & Visa',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
                ],
                [
                    'title' => 'Covid 19',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
                ],
                [
                    'title' => 'No E ticket',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
                ]
            ];

            $flightSummaryInfo = [
                [
                    'title' => 'COVID - 19 Travel Advice',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
                ],
                [
                    'title' => 'Changes To Schedules',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.'
                ]
            ];

            $flightInfo = [
                [
                    'title' => 'Changes To Schedule',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.'
            ]
            ];

            $data = [
                'flightBookingDetail' => $flightBookingDetail,
                'paxAndDocInfo' => $paxAndDocInfo,
                'flightSummaryInfo' => $flightSummaryInfo,
                'flightInfo' => $flightInfo,
                'timelineInfo' => $segmentDetails[0]
            ];

            return view('user-dashboard/booking', $data);
        }
    }
