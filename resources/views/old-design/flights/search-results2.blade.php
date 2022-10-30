@extends("layout")
@section('head')

    <link href="{{ asset('css-n/fligt.css') }}" rel="stylesheet">

    <!-- hotel Responsive CSS -->
    <link href="{{ asset('css-n/fligt-responsive.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css-n//bootstrap-vue.min.css') }}" />
    <script src="{{ asset('js-n/bootstrap-vue.min.js') }}"></script>

    <!-- Load the following for BootstrapVueIcons support -->
    <script src="{{ asset('js-n/bootstrap-vue-icons.min.js') }}"></script>
    <style>
        [v-cloak] {
            display: none;
        }

    </style>
@endsection
@section('content')

    <!-- Hotel Start -->
    <section id="app" class="hotel-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Flights</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Choose a flight</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="top-row-menu">
                                    <ul>
                                        <li><a href="#">One Trip</a></li>
                                        <li><a href="#">One Way</a></li>
                                        <li><a href="#">Multi-City</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="top-row-selects">
                                    <select class="form-control select-one">
                                        <option>1 Room, 2 Travelers</option>
                                        <option>2 Room, 4 Travelers</option>
                                        <option>5 Room, 2 Travelers</option>
                                        <option>3 Room, 2 Travelers</option>
                                        <option>1 Room, 2 Travelers</option>
                                    </select>
                                    <select class="form-control select-two">
                                        <option>Economy</option>
                                        <option>Vip room</option>
                                        <option>Economy</option>
                                        <option>Vip room</option>
                                        <option>Economy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cols">
                        <form>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="/images-n/icons/location.png" alt="">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Leaving">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="/images-n/icons/location.png" alt="">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Going">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-6">
                                    <input class="datepicker" id="datepicker" value="Departing">
                                </div>
                                <div class="col-xl-2 col-lg-6">
                                    <input class="datepicker" id="datepicker-two" value="Returning">
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hotel-cols">
                        <div class="hotel-sidebar-col">
                            {{-- <div class="filter-box my-checkbox-box">
                                <h4>Filter by</h4>
                                <h5>Flexible change policies</h5>
                                <form>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        <label class="custom-control-label" for="customCheck1">No change fee</label>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="stops-box my-checkbox-box">
                                <h4>Stops <span>From</span></h4>
                                <form>
                                    <div class="custom-control custom-checkbox" v-if="directFlightsCount > 0">
                                        <input type="checkbox" v-model="directFlightFilter"
                                            v-on:change="toggleFilterByNumberOfStops('direct')" id="directFlights"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="directFlights">Direct Flights
                                            (@{{ directFlightsCount }})
                                            <span>@{{ cheapestDirectFlightPrice }}</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox" v-if="oneStopFlightsCount > 0">
                                        <input v-model="OneStopFilter" v-on:change="toggleFilterByNumberOfStops('oneStop')"
                                            type="checkbox" class="custom-control-input" id="customCheck-a1">
                                        <label class="custom-control-label" for="customCheck-a1">1 Stop
                                            (@{{ oneStopFlightsCount }})
                                            <span>@{{ cheapestOneStopFlight }}</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox" v-if="oneStopPlusFlightsCount > 0">
                                        <input v-model="OneStopPlusFilter"
                                            v-on:change="toggleFilterByNumberOfStops('TwoStopsOrMore')" type="checkbox"
                                            class="custom-control-input" id="customCheck-a2">
                                        <label class="custom-control-label" for="customCheck-a2">2+ Stops
                                            (@{{ oneStopPlusFlightsCount }})
                                            <span>@{{ cheapestOneStopPlusFlight }}</span></label>
                                    </div>
                                </form>
                            </div>
                            <div class="stops-box my-checkbox-box">
                                <h4>Airlines <span>From</span></h4>
                                <form>
                                    <div class="custom-control custom-checkbox" v-for="(airline, index) in airlinesFilters"
                                        :key="index" v-if="airline[2] > 0">
                                        <input type="checkbox" v-on:change="toggleAirlineFilter(airline[0])"
                                            class="custom-control-input" v-bind:id="airline[0]">
                                        <label class="custom-control-label" v-bind:for="airline[0]">@{{ airline[1] }}
                                            (@{{ airline[2] }})
                                            <span>@{{ airline[3] }}</span></label>
                                    </div>

                                    {{-- <div class="mt-4">
                                        <a href="#" class="see-more">See more</a>
                                    </div> --}}
                                </form>
                            </div>
                            <div class="departure-box my-checkbox-box">
                                <h4>Departure time</h4>
                                <div class="departure-items">
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-1.png" alt="">
                                        <p>Early Morning</p>
                                        <span>12:00 Am to 4:59 Am</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-2.png" alt="">
                                        <p>Early Morning</p>
                                        <span>5:00 Am to 11:59 Am</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-3.png" alt="">
                                        <p>Afternoon</p>
                                        <span>12:00 Pm to 5:59 Pm</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-4.png" alt="">
                                        <p>Evening</p>
                                        <span>6:00 Pm to 11:59 Pm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="departure-box my-checkbox-box">
                                <h4>Arrival time</h4>
                                <div class="departure-items">
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-1.png" alt="">
                                        <p>Early Morning</p>
                                        <span>12:00 Am to 4:59 Am</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-2.png" alt="">
                                        <p>Early Morning</p>
                                        <span>5:00 Am to 11:59 Am</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-3.png" alt="">
                                        <p>Afternoon</p>
                                        <span>12:00 Pm to 5:59 Pm</span>
                                    </div>
                                    <div class="departure-item">
                                        <img src="/images-n/icons/sun-4.png" alt="">
                                        <p>Evening</p>
                                        <span>6:00 Pm to 11:59 Pm</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="stops-box my-checkbox-box border-0 pb-0 mb-0">
                                <h4>Arrival airports <span>From</span></h4>
                                <form>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-c1" checked>
                                        <label class="custom-control-label" for="customCheck-c1">LHR (London) (52)
                                            <span>$695</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-c2">
                                        <label class="custom-control-label" for="customCheck-c2">LCY (London) (6)
                                            <span>$858</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-c3">
                                        <label class="custom-control-label" for="customCheck-c3">LGW (London) (2)
                                            <span>$722</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-c4">
                                        <label class="custom-control-label" for="customCheck-c4">Turkish Airlines (6)
                                            <span>$722</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck-c5">
                                        <label class="custom-control-label" for="customCheck-c5">British Airways (3)
                                            <span>$722</span></label>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <div class="hotel-items-col">
                            <div class="row topbar">
                                <div class="col-lg-12">
                                    <div class="flexible-box">
                                        <p>Flexible Dates</p>
                                        <form>
                                            <select class="form-control">
                                                <option>Compare cheapest prices for near by days</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <p><span v-if="!loading">@{{ flights . length }}</span> Flights available</p>
                                </div>
                                <div class="col-lg-4">
                                    <form>
                                        <select class="form-control">
                                            <option>Lowest price</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <!-- Fight Modal -->
                            <div class="modal fade fight-modal" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body-top">
                                                <div class="modal-body-top-content">
                                                    <h4>London to Dubai</h4>
                                                    <p>Etihad Airways • Sat, May 15</p>
                                                    <span>3:20am - 10:55am</span><br>
                                                    <span>10h 35m (1 stop)</span><br>
                                                    <span>1h 20m in Kyiv (KBP)</span>
                                                </div>
                                                <div class="modal-body-top-content">
                                                    <img src="/images-n/flight-logos/1.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="selected-box">
                                                <h4>Selected fare to London</h4>
                                                <span>Your selection applies to all flights</span>
                                                <div class="selected-box-content">
                                                    <h5>$622</h5>
                                                    <p>Roundtrip per traveler</p>
                                                    <p>Cabin: Economy</p>
                                                    <ul>
                                                        <li><img src="/images-n/icons/usd-2.png" alt=""> Seat choice
                                                        </li>
                                                        <li><img src="/images-n/icons/close.png" alt=""> Cancellation
                                                        </li>
                                                        <li><img src="/images-n/icons/checked.png" alt=""> Changes</li>
                                                    </ul>
                                                    <div class="subtexts">
                                                        <p>Show less <span>Included up to 7 kg</span></p>
                                                    </div>
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                        Check
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="fight-model-footer">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                    nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                                    erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                                                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                                    Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                                    sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                                    accusam et justo duo dolores et ea rebum. Stet</p>
                                                <p class="mt-5 mb-4">4 cleaning and safety practices for Ukraine
                                                    International Airlines</p>
                                                <ul>
                                                    <li><img src="/images-n/icons/handwash.png" alt=""> Cleaned with
                                                        disinfectants
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="loading">
                                <b-row class="w-100 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                            </div>


                            <div v-cloak v-for="flight in flights" class="fight-single-item">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <div class="fight-item">
                                        <div class="fight-item-col">
                                            <div class="fight-item-top-content">

                                                <p>@{{ flight . originCity }} (@{{ flight . originCityCode }}) -
                                                    @{{ flight . destinationCity }}
                                                    (@{{ flight . destinationCityCode }})
                                                </p>
                                                <span>@{{ flight . departureTime . format('hh:mm a') }} -
                                                    @{{ flight . arrivalTime . format('hh:mm a') }} - <span
                                                        style="font-weight: 800;">
                                                        @{{ flight . numberOfStops == 1 ? 'Direct Flight' : flight . numberOfStops - 1 + ' Stops' }}
                                                    </span></span>
                                            </div>
                                            <div class="fight-item-top-content">
                                                <img v-bind:src="'/images-n/airline_logo/' + flight.airlines[0][0] + '.gif'"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="fight-item-col fight-item-col-two">
                                            <div class="fight-item-top-content">
                                                <p v-if="flight.refundable">Refundable</p>
                                                {{-- <span>5 cleaning and safety practices for Etihad Airways</span> --}}
                                            </div>
                                            <div class="fight-item-top-content fight-item-top-content-two">
                                                <h4>@{{ flight . priceTotalCurrency }} @{{ flight . priceTotal }}</h4>
                                                <span>One Way per Traveler</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class=" my-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <img src="/images-n/icons/pagination-arrow-left.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <img src="/images-n/icons/pagination-arrow-right.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')

    <script type="text/javascript">
        // Datepicker Active Script
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
        $('#datepicker-two').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            $('#back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>
    <script>
        Vue.use(BootstrapVue);


        CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        var cancel = function() {

        }

        var app = new Vue({
                    el: '#app',

                    data: {
                        flightsOrigin: [],
                        flights: [],
                        loading: true,
                        departureCity: '{{ $origin_city }}',
                        destinationCity: '{{ $destination_city }}',
                        selectedRating: null,
                        sortBy: null,
                        pageOffset: 0,
                        departureDate: '{{ $departure_date }}',
                        returnDate: '{{ $return_date }}',
                        tripDuration: null,
                        notFound: false,
                        directFlightsCount: 0,
                        oneStopFlightsCount: 0,
                        oneStopPlusFlightsCount: 0,
                        cheapestDirectFlightPrice: -1,
                        cheapestOneStopFlight: -1,
                        cheapestOneStopPlusFlight: -1,
                        directFlightFilter: false,
                        OneStopFilter: false,
                        OneStopPlusFilter: false,
                        airlinesFilters: [],
                        appliedAirlinesFilters: [],
                        currency: 'USD',
                    },

                    async mounted() {
                        await this.getFlights();
                    },

                    methods: {

                        toggleAirlineFilter: function(airlineCode) {

                            if (this.appliedAirlinesFilters.includes(airlineCode)) {
                                this.appliedAirlinesFilters = this.appliedAirlinesFilters.filter((
                                    currentAirlineCode) => {
                                    return currentAirlineCode !== airlineCode
                                })
                                this.performFilterByNumberOfStops(1, true);

                            } else {
                                this.appliedAirlinesFilters.push(airlineCode)
                                this.performFilterByNumberOfStops(1);
                            }


                        },
                        toggleFilterByNumberOfStops: function(filter) {
                            if (filter == 'direct') {
                                if (this.directFlightFilter == false)

                                {
                                    this.performFilterByNumberOfStops(0, true);
                                } else {
                                    this.performFilterByNumberOfStops(0, false);
                                }

                            } else if (filter == 'oneStop') {
                                if (this.OneStopFilter == false)

                                {
                                    this.performFilterByNumberOfStops(0, true);
                                } else {
                                    this.performFilterByNumberOfStops(0, false);
                                }
                            } else if (filter == 'TwoStopsOrMore') {
                                if (this.OneStopPlusFilter == false)

                                {
                                    this.performFilterByNumberOfStops(0, true);
                                } else {
                                    this.performFilterByNumberOfStops(0, false);
                                }
                            }
                        },
                        filterByNumberOfStops: function(flights, noOfStops, orMore = false) {
                            let filteredList = [];


                            filteredList = flights.filter((flight) => {
                                if (orMore == false) {
                                    return flight.numberOfStops == noOfStops
                                } else {
                                    return flight.numberOfStops >= noOfStops

                                }

                            })

                            return filteredList;
                        },
                        performFilterByNumberOfStops: function(triggerer, refreshFilters = false) {
                            let flightsOrigin = [];
                            flightsOrigin.push(...this.flightsOrigin)
                            let results = []
                            results.push(...flightsOrigin)
                            results.forEach((r) => {
                                r.displayed = false;
                                r.passedPreviousFilters = true;

                            })
                            /* if (this.directFlightFilter == false && this.OneStopFilter == false && this
                                .OneStopPlusFilter == false) {
                                noFilters = true;
                                results.push(...flightsOrigin);
                            } */
                            if (this.directFlightFilter == false) {

                                results.forEach((r) => {
                                    if (r.numberOfStops == 1) {
                                        r.passedPreviousFilters == false;

                                    }

                                })

                            }

                            if (this.OneStopFilter == false) {

                                results.forEach((r) => {
                                    if (r.noOfStops == 2) {
                                        r.passedPreviousFilters = false;
                                    }
                                })

                            }
                            if (this.OneStopPlusFilter == false) {

                                results.forEach((r) => {
                                    if (r.noOfStops >= 3) {
                                        r.passedPreviousFilters = false;
                                    }
                                })


                            }

                            if (this.directFlightFilter == false && this.OneStopFilter == false && this
                                .OneStopPlusFilter == false) {
                                results.forEach((r) => {
                                    r.displayed = false;
                                    r.passedPreviousFilters = true;

                                })
                            }

                            if (this.appliedAirlinesFilters.length > 0) {


                                 
                                results.forEach((r) => {
                                        if (r.passedPreviousFilters) {
                                            if (!this.appliedAirlinesFilters.includes(r.airlines[0][0])) {
                                                    r.passedPreviousFilters = false;
                                                }
                                            }

                                        })


                                }
                                    results = results.filter((r) => r.passedPreviousFilters == true)
                                if (triggerer == 0 || refreshFilters) {

                                    this.updateAirlinesFilters(results);


                                }
                                if (triggerer == 1 || refreshFilters) {
                                    this.updateNoOfStopsFilters(results);
                                }


                                this.updateResultsAccordingToAppliedFilters(results);

                            },
                            updateAirlinesFilters: function(results) {



                                    this.airlinesFilters.forEach((filter) => {

                                        filter[2] = 0;
                                        results.forEach(result => {
                                            if (result.passedPreviousFilters == true) {
                                                if (result.airlines[0][0] == filter[0]) {

                                                    filter[2] += 1;

                                                }
                                            }

                                        });

                                    })


                                },
                                updateNoOfStopsFilters: function(results) {

                                    let direct = 0;
                                    let one = 0;
                                    let twoormore = 0;
                                    results.forEach(result => {
                                        if (result.passedPreviousFilters) {


                                            if (result.numberOfStops == 1) {

                                                direct += 1;

                                            } else if (result.numberOfStops == 2) {
                                                one += 1;
                                            } else {
                                                twoormore += 1;
                                            }
                                        }
                                    });

                                    this.directFlightsCount = direct;
                                    this.oneStopFlightsCount = one;
                                    this.oneStopPlusFlightsCount = twoormore;

                                },

                                cancelCurrentRequests: function() {

                                    if (typeof cancel !== "undefined" && typeof cancel !== "null") {
                                        cancel()

                                    }

                                },
                                updateResultsAccordingToAppliedFilters(flights) {

                                    this.flights.splice(0)
                                    this.flights.push(...flights);

                                },
                                getFlights: async function(from_link = false, link = null, baseLink = null) {

                                        this.cancelCurrentRequests();
                                        let firstConcat = true;

                                        let queryString = "?";

                                        let error = false;

                                        if (this.selectedRating !== null) {

                                            queryString = queryString.concat("rating=" + this.selectedRating);
                                            firstConcat = false;
                                        }
                                        if (this.sortBy !== null) {
                                            if (firstConcat == false) {
                                                queryString = queryString.concat('&');

                                            } else {
                                                firstConcat = false;
                                            }
                                            queryString = queryString.concat("sortBy=" + this.sortBy);
                                        }

                                        this.flights.splice(0);
                                        this.loading = true;
                                        this.notFound = false;

                                        let url = "";
                                        let resp = "";


                                        url = '/api/flights/get' + "?departure_city=" + this.departureCity +
                                            "&destination_city=" +
                                            this.destinationCity + "&departure_date=" + this.departureDate +
                                            "&return_date=" +
                                            this
                                            .returnDate;


                                        this.currentPageType = "base";
                                        this.currentPageLink = url;
                                        resp = await axios.get(url, {
                                            cancelToken: new CancelToken(function executor(c) {
                                                cancel = c;

                                            })

                                        }).catch(function(thrown) {
                                            error = true;

                                            if (axios.isCancel(thrown)) {

                                            } else {

                                            }
                                        });



                                        if (error == false) {

                                            this.flights = [];
                                            this.loading = false;
                                            let cheapestDirectFlightPrice = -1;
                                            let cheapestOneStopFlightPrice = -1;
                                            let cheapestOneStopPlusFlightPrice = -1;
                                            this.oneStopFlightsCount = 0;
                                            let oneStopConut = 0;
                                            let unfilteredFlights = resp.data;
                                            unfilteredFlights.forEach(flight => {
                                                flight.airlines = [];
                                                flight.displayed = true;

                                                if (flight.details.length > 1) {


                                                    flight.originCity = flight.details[0].Origin.CityName;
                                                    flight.destinationCity = flight.details[flight.details
                                                            .length - 1]
                                                        .Destination.CityName;
                                                    flight.originCityCode = flight.details[0].Origin
                                                        .AirportCode;
                                                    flight.destinationCityCode = flight.details[flight.details
                                                            .length -
                                                            1]
                                                        .Destination.AirportCode;
                                                    flight.departureTime = moment(flight.details[0].Origin
                                                        .DateTime);
                                                    flight.arrivalTime = moment(flight.details[flight.details
                                                            .length -
                                                            1]
                                                        .Destination.DateTime);
                                                    if (flight.details.length == 2) {
                                                        flight.numberOfStops = 2;
                                                        this.oneStopFlightsCount += 1
                                                        if (cheapestOneStopFlightPrice < 0 ||
                                                            cheapestOneStopFlightPrice >
                                                            flight.priceTotal) {
                                                            cheapestOneStopFlightPrice = flight.priceTotal
                                                        }
                                                    } else {
                                                        flight.numberOfStops = flight.details.length;
                                                        this.oneStopPlusFlightsCount += 1;
                                                        if (cheapestOneStopPlusFlightPrice < 0 ||
                                                            cheapestOneStopPlusFlightPrice > flight.priceTotal
                                                        ) {
                                                            cheapestOneStopPlusFlightPrice = flight.priceTotal
                                                        }
                                                    }

                                                    let first = true;
                                                    let passed = true;
                                                    let segmentOperatorCode = '';
                                                    let segmentOperatorName = '';

                                                    flight.details.forEach(segment => {
                                                        if (first) {
                                                            first = false;
                                                            segmentOperatorCode = segment.OperatorCode
                                                            segmentOperatorName = segment.OperatorName
                                                        } else {
                                                            if (segmentOperatorCode !== segment
                                                                .OperatorCode) {
                                                                passed = false;
                                                            }
                                                        }
                                                        flight.airlines.push([segment.OperatorCode,
                                                            segment
                                                            .OperatorName
                                                        ])





                                                    })



                                                    let alreadyExists = false;



                                                    this.airlinesFilters.forEach(filter => {


                                                        if (filter[0] == flight.details[0]
                                                            .OperatorCode) {
                                                            alreadyExists = true;
                                                            filter[2] += 1;
                                                            if (filter[3] > flight.priceTotal) {
                                                                filter[3] = flight.priceTotal
                                                            }
                                                        }

                                                    })



                                                    if (alreadyExists == false) {

                                                        if (passed) {
                                                            this.airlinesFilters.push([segmentOperatorCode,
                                                                segmentOperatorName, 1, flight
                                                                .priceTotal
                                                            ]);


                                                        } else {
                                                            this.airlinesFilters.push(['mixed',
                                                                'mixed airlines', 1, flight.priceTotal
                                                            ]);
                                                        }

                                                    }


                                                } else {

                                                    flight.originCity = flight.details[0].Origin.CityName;
                                                    flight.destinationCity = flight.details[0].Destination
                                                        .CityName;
                                                    flight.originCityCode = flight.details[0].Origin
                                                        .AirportCode;
                                                    flight.destinationCityCode = flight.details[0].Destination
                                                        .AirportCode;
                                                    flight.numberOfStops = 1;
                                                    flight.departureTime = moment(flight.details[0].Origin
                                                        .DateTime);
                                                    flight.arrivalTime = moment(flight.details[0].Destination
                                                        .DateTime);
                                                    this.directFlightsCount += 1;
                                                    if (cheapestDirectFlightPrice == -1 ||
                                                        cheapestDirectFlightPrice >
                                                        flight.priceTotal) {
                                                        cheapestDirectFlightPrice = flight.priceTotal;
                                                    }

                                                    flight.airlines.push([flight.details[0].OperatorCode, flight
                                                        .details[0]
                                                        .OperatorName
                                                    ])

                                                    let alreadyExist = false;
                                                    this.airlinesFilters.forEach(filter => {
                                                        if (filter[0] == flight.details[0]
                                                            .OperatorCode) {
                                                            alreadyExist = true;
                                                            filter[2] += 1
                                                            if (flight.priceTotal < filter[3]) {
                                                                filter[3] = flight.priceTotal
                                                            }
                                                        }
                                                    })
                                                    if (alreadyExist == false) {
                                                        this.airlinesFilters.push([flight.details[0]
                                                            .OperatorCode,
                                                            flight
                                                            .details[0].OperatorName, 1, flight
                                                            .priceTotal
                                                        ]);

                                                    }



                                                }
                                            });

                                            this.cheapestDirectFlightPrice = cheapestDirectFlightPrice;
                                            this.cheapestOneStopFlight = cheapestOneStopFlightPrice;
                                            this.cheapestOneStopPlusFlight = cheapestOneStopPlusFlightPrice
                                            /* this.flights.push(...resp.data) */
                                            this.flightsOrigin.push(...unfilteredFlights)

                                            this.updateResultsAccordingToAppliedFilters(unfilteredFlights);

                                        } else {
                                            this.notFound = true;
                                        }
                                    },


                        }
                    })
    </script>

@endsection
