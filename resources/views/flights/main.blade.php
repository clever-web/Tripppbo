    @extends('master', ['try_to_init_nice_select' => false])
    @section('css-links')
        <style>
            .flight_box_after_active {
                visibility: visible !important;
                opacity: 1;
            }

            .nice-select .nice-select-dropdown {
                z-index: 100 !important;
            }
        </style>
    @endsection
    @section('content')
        <div id="flights_search_app" class="wrap_body index_wrap_body">
            <!-- ticket details -->
            <div class="container-lg pad_lg">
                <flight-search-bar @new_search="handle_new_search" :current_view_style="2"
                    :search_data="search_data_for_search_bar"></flight-search-bar>
            </div>


            <!-- flight box -->
            <div class="container-lg pad_lg">
                <div class="flight_box">
                    <div class="flight_box_after" :class="{ flight_box_after_active: isFiltersPanelActive }"></div>

                    <!-- flight sidebar -->
                    <form class="flight_sidebar" :class="{ flight_box_after_active: isFiltersPanelActive }">
                        <span v-on:click="isFiltersPanelActive = false" class="sidebar_cross"><i
                                class="fas fa-times-circle"></i></span>
                        <!-- 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_1" aria-expanded="true"
                                    aria-controls="sidebar_collapse_1">
                                    Price
                                </button>
                            </h2>
                            <div id="sidebar_collapse_1" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_1">
                                <div class="accordion-body">

                                    <range-slider ref="range_slider_1" @min_changed="minimum_price_changed"
                                        @max_changed="maximum_price_changed" :min_value="filters.price.minPrice"
                                        :max_value="filters.price.maxPrice">
                                    </range-slider>

                                    <div class="d-flex justify-content-between px-3 mt-2">

                                        <div>@{{ api_response?.FlightResults[0].Currency }} @{{ filters.price.selectedMinPrice }} </div>
                                        <div>@{{ api_response?.FlightResults[0].Currency }} @{{ filters.price.selectedMaxPrice }}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_2" aria-expanded="true"
                                    aria-controls="sidebar_collapse_2">
                                    Stops
                                </button>
                            </h2>
                            <div id="sidebar_collapse_2" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_2">
                                <div class="accordion-body">
                                    <!-- sidebar ul 1 -->
                                    <ul class="sidebar_ul_1 mt-4">
                                        <!-- 1 -->
                                        <li v-for="stop in filters.number_of_stops" v-on:click="handle_stops_filter(stop)">
                                            <label>
                                                @{{ stop.option_name }}
                                                <input v-model="stop.enabled" disabled type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p class="mb-0 sidebar_ul_1_p_2 ms-auto"></p>
                                        </li>
                                        <!-- 2 -->

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_10">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_10" aria-expanded="true"
                                    aria-controls="sidebar_collapse_10">
                                    Other
                                </button>
                            </h2>
                            <div id="sidebar_collapse_10" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_10">
                                <div class="accordion-body">
                                    <!-- sidebar ul 1 -->
                                    <ul class="sidebar_ul_1 mt-4">
                                        <!-- 1 -->
                                        <li v-for="fare_type in filters.fareType"
                                            v-on:click="handle_fare_type_filter(fare_type)">
                                            <label>
                                                @{{ fare_type.name }}
                                                <input v-model="fare_type.enabled" disabled type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p class="mb-0 sidebar_ul_1_p_2 ms-auto"></p>
                                        </li>
                                        <!-- 2 -->

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_3">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_3" aria-expanded="true"
                                    aria-controls="sidebar_collapse_3">
                                    Take-off & landing time
                                </button>
                            </h2>
                            <div id="sidebar_collapse_3" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_3">
                                <div class="accordion-body">
                                    <div id="sidebar_toggle_button1" class="sidebar_toggle_button mt-4">
                                        <button v-on:click="departure_arrival_time_toggle = false" type="button"
                                            class="sidebar_toggle1 fs_14"
                                            :class="{ sidebar_toggle_active: !departure_arrival_time_toggle }">Take
                                            off</button>
                                        <button v-on:click="departure_arrival_time_toggle = true" type="button"
                                            class="sidebar_toggle1 fs_14"
                                            :class="{ sidebar_toggle_active: departure_arrival_time_toggle }">Landing</button>
                                    </div>


                                    <ul v-if="!departure_arrival_time_toggle" class="sidebar_ul_1 mt-4">

                                        <li v-for="departure_time in filters.departure_times"
                                            v-on:click="handle_dep_time(departure_time)">
                                            <label>
                                                @{{ departure_time.name }}
                                                <input disabled v-model="departure_time.enabled" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>


                                    </ul>




                                    <ul v-if="departure_arrival_time_toggle" class="sidebar_ul_1 mt-4">

                                        <li v-for="arrival_time in filters.arrival_times"
                                            v-on:click="handle_arr_time(arrival_time)">
                                            <label>
                                                @{{ arrival_time.name }}
                                                <input disabled v-model="arrival_time.enabled" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>


                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_4">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_4" aria-expanded="true"
                                    aria-controls="sidebar_collapse_4">
                                    Airlines
                                </button>
                            </h2>
                            <div id="sidebar_collapse_4" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_4">
                                <div class="accordion-body">
                                    <!-- sidebar ul 1 -->
                                    <ul class="sidebar_ul_1 mt-4">
                                        <!-- 1 -->
                                        <li v-for="airline in filters.airlines" v-on:click="handle_airline_filter(airline)">
                                            <label>
                                                @{{ airline.name }}
                                                <input disabled v-model="airline.enabled" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 2 -->

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- 5 -->
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_5">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_5" aria-expanded="true"
                                    aria-controls="sidebar_collapse_5">
                                    Airports
                                </button>
                            </h2>
                            <div id="sidebar_collapse_5" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_5">
                                <div class="accordion-body">
                                    <div id="sidebar_toggle_button2" class="sidebar_toggle_button mt-4">
                                        <button type="button" class="sidebar_toggle2 sidebar_toggle_active2 fs_14">Take
                                            off</button>
                                        <button type="button" class="sidebar_toggle2 fs_14">Landing</button>
                                    </div>

                                    <div class='range-slider'>

                                        <input type="range" :min="filters.price.minPrice" :max="filters.price.maxPrice" step="1"
                                            v-model="sliderMin">

                                        <input type="range" :min="filters.price.minPrice" :max="filters.price.maxPrice" step="1"
                                            v-model="sliderMax">

                                    </div>
                                    <div class="d-flex justify-content-between px-3 mt-2">

                                        <div>@{{ api_response.FlightResults[0].Currency }} @{{ sliderMin }} </div>
                                        <div>@{{ api_response.FlightResults[0].Currency }} @{{ sliderMax }}</div>
                                    </div>




                                </div>
                            </div>
                        </div> --}}
                        <button @click.prevent="clearFilters" class="sidebar_clear_filter_button mb-3">Clear
                            filters</button>
                    </form>

                    <!-- flight -->
                    <div class="flight_details">
                        <!-- flight details top -->
                        <div class="flight_details_top">
                            <!-- flight details left -->
                            <img src="/img/airplane_take_off.svg" alt="">
                            <div class="flight_details_left">
                                <h4 class="mb-1 trip_box_heading fw_gilroy_medium h6">Select Your Trip</h4>
                                {{-- <p class="mb-0 fw_gilroy_medium fs_14">2 939 kr 10h25m</p> --}}
                            </div>
                            <!-- flight details rigth -->
                            <div class="flight_details_right">
                                <div class="child_details_right">
                                    <p class="mb-0 me-2 fs_14">Sorted by:</p>
                                    <!-- select box -->
                                    <div class="select_box">
                                        <select v-model="current_sort_type" class="child_select_box flight_select_box">
                                            <option selected v-for="s in sort" v-on:click="current_sort_type = s.id"
                                                :value="s.id">
                                                @{{ s.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <button v-on:click="isFiltersPanelActive = !isFiltersPanelActive"
                                    class="flight_fillter_btn"><span>Filter</span><img src="/img/fillter.svg"
                                        alt=""></button>
                            </div>

                        </div>

                        <!-- flight details bottom -->
                        <div class="trip_selection_wrapper">


                            <flight-item :is_read_only="is_read_only" :selecting_flight_for_package="is_package" :search_key="search_key" :search_data="search_data" :is_side_bar="is_side_bar"
                                v-for="(trip, trip_index) in api_response?.FlightResults" :trip_data="trip"
                                :tripindex="'i' + trip_index"></flight-item>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection


    @section('scripts-links')
        <script>
            let CancelToken = axios.CancelToken;
            const source = CancelToken.source();
            let cancel = function() {

            }
            const flights_search_app = new Vue({
                el: "#flights_search_app",

                data: {
                    is_read_only: false,
                    is_package: false,
                    departure_arrival_time_toggle: false,
                    newSearch: true,
                    search_data: @json($search_data),
                    search_data_for_search_bar: @json($search_data),
                    search_key: @json($search_key),
                    is_side_bar: false,
                    isFiltersPanelActive: false,
                    api_response: null,
                    current_sort_type: 1,
                    trip: '',
                    sort: [{
                            id: 1,
                            name: "Lowest Price"
                        },
                        {
                            id: 2,
                            name: "Fastest"
                        },
                        {
                            id: 3,
                            name: "Highest Price"
                        }
                    ],
                    filters: {
                        number_of_stops: [{
                                id: 0,
                                option_name: 'All',
                                min_num_of_stops: 0,
                                max_num_of_stops: 9,
                                lowest_price: 0,
                                value: "any",
                                enabled: true
                            },
                            {
                                id: 1,
                                option_name: 'Direct',
                                min_num_of_stops: 0,
                                max_num_of_stops: 0,
                                lowest_price: 0,
                                value: "0",
                                enabled: false
                            },
                            {
                                id: 2,
                                option_name: '1 Stop',
                                min_num_of_stops: 1,
                                max_num_of_stops: 1,
                                lowest_price: 0,
                                value: "1",
                                enabled: false
                            },
                            {
                                id: 3,
                                option_name: '2 Stops',
                                min_num_of_stops: 2,
                                max_num_of_stops: 2,
                                lowest_price: 0,
                                value: "2",
                                enabled: false
                            }
                            /* ,
                                                    {
                                                        option_name: '2+ Stops',
                                                        min_num_of_stops: 3,
                                                        max_num_of_stops: 9,
                                                        lowest_price: 0,
                                                    }, */
                        ],
                        airlines: [],
                        fareType: [],
                        price: {
                            minPrice: 0,
                            maxPrice: 10,
                            selectedMinPrice: 0,
                            selectedMaxPrice: 0
                        },
                        departure_times: [],
                        arrival_times: []
                    }


                },

                mounted: async function() {

                    if (this.search_key) {
                        await this.searchForFlights();
                    }
                    if (this.search_data.trip)
                    {
                        this.trip = this.search_data.trip;
                    }


                },
                watch: {
                    current_sort_type: function(val) {
                        this.sort_results_by(val);
                    }
                },
                methods: {
                    handle_new_search: async function(new_search_data) {

                        this.search_key = new_search_data.search_key
                        this.search_data = new_search_data;
                        this.clearFilters();
                        await this.searchForFlights();
                    },

                    handle_dep_time: async function(t) {
                        t.enabled = !t.enabled
                        await this.updateFilters();
                    },
                    handle_arr_time: async function(t) {
                        t.enabled = !t.enabled
                        await this.updateFilters();
                    },
                    sort_results_by: function(s) {
                        let a_greater_b = 0;
                        let b_greater_a = 0;
                        let equal = 0;


                        console.log(s)
                        let flights = this.api_response.FlightResults;

                        if (s == 3) {
                            a_greater_b = -1;
                            b_greater_a = 1;
                            equal = 0;
                        } else if (s == 1) {
                            a_greater_b = 1;
                            b_greater_a = -1;
                            equal = 0;
                        }
                        if (s == 1 || s == 3) {
                            let sorted_stuff = flights.sort((a, b) => {
                                if (a.OfferedFare < b.OfferedFare) {
                                    return b_greater_a;
                                }
                                if (a.OfferedFare > b.OfferedFare) {
                                    return a_greater_b;
                                }
                                if (a.OfferedFare == b.OfferedFare) {
                                    return equal;
                                }
                            })

                            this.api_response.FlightResults = sorted_stuff;
                        }
                        if (s == 2) {
                            let sorted_stuff = flights.sort((a, b) => {
                                let dep = moment(a.DepartureTime)
                                let arr = moment(a.ArrivalTime)

                                let diff = dep.diff(arr, 'minutes');

                                let dep2 = moment(b.DepartureTime)
                                let arr2 = moment(b.ArrivalTime)

                                let diff2 = dep2.diff(arr2, 'minutes');


                                if (diff < diff2) {
                                    return 1;
                                }
                                if (diff > diff2) {
                                    return 0;
                                }
                                if (diff == diff2) {
                                    return -1;
                                }
                            })

                            this.api_response.FlightResults = sorted_stuff;
                        }

                    },
                    handle_stops_filter: async function(new_value) {
                        this.handle_stops(new_value)
                        await this.updateFilters();
                    },
                    handle_stops: function(new_value) {



                        if (new_value.enabled == true) {
                            let num_of_enabled_filters = 0;
                            for (let i = 0; i < 4; i++) {
                                if (!(new_value.id == this.filters.number_of_stops[i].id)) {
                                    if (this.filters.number_of_stops[i].enabled) {
                                        num_of_enabled_filters += 1;
                                    }
                                }
                            }

                            if (num_of_enabled_filters === 0 && new_value.id !== 0) {
                                this.filters.number_of_stops[0].enabled = true;



                            } else if (num_of_enabled_filters === 0 && new_value.id == 0) {

                                return;
                            }
                        }
                        if (new_value.id == 0 && new_value.enabled == false) {
                            this.filters.number_of_stops[0].enabled = true;
                            this.filters.number_of_stops[1].enabled = false;
                            this.filters.number_of_stops[2].enabled = false;
                            this.filters.number_of_stops[3].enabled = false;

                            return;
                        }
                        if (new_value.id !== 0 && new_value.enabled == false) {
                            this.filters.number_of_stops[0].enabled = false;
                        }

                        if (new_value.enabled == false && new_value.id !== 0) {
                            let num_of_enabled_filters = 0;
                            for (let i = 1; i < 4; i++) {

                                if (this.filters.number_of_stops[i].enabled) {
                                    num_of_enabled_filters += 1;
                                }

                            }

                            if (num_of_enabled_filters == 2) {
                                this.filters.number_of_stops[0].enabled = true;
                                this.filters.number_of_stops[1].enabled = false;
                                this.filters.number_of_stops[2].enabled = false;
                                this.filters.number_of_stops[3].enabled = false;
                                return;
                            }
                        }
                        new_value.enabled = !new_value.enabled



                    },
                    handle_airline_filter: async function(new_value) {
                        new_value.enabled = !new_value.enabled
                        await this.updateFilters();
                    },
                    handle_fare_type_filter: async function(new_value) {
                        this.handle_fare_type(new_value)
                        await this.updateFilters()
                    },
                    handle_fare_type: function(new_value) {
                        if (new_value.enabled == true) {
                            return;
                        }
                        for (let i = 0; i < this.filters.fareType.length; i++) {
                            if ((new_value.id == this.filters.fareType[i].id)) {
                                this.filters.fareType[i].enabled = true;
                            } else {
                                this.filters.fareType[i].enabled = false;
                            }
                        }
                        /*     if (new_value.enabled == true) {
                                let num_of_enabled_filters = 0;
                                for (let i = 0; i < 2; i++) {
                                    if (!(new_value.id == this.filters.fareType[i].id)) {
                                        if (this.filters.fareType[i].enabled) {
                                            num_of_enabled_filters += 1;
                                        }
                                    }
                                }

                                if (num_of_enabled_filters === 0) {
                                    this.filters.fareType[0].enabled = true;
                                    this.filters.fareType[1].enabled = false;
                                    this.filters.fareType[2].enabled = false;
                                    return;

                                }

                            }
                            if (new_value.id !== 0 && new_value.enabled == false)
                            {
                                this.filters.fareType[0].enabled = false;
                            }
                            new_value.enabled = !new_value.enabled */
                    },
                    minimum_price_changed: async function(newValue) {
                        this.filters.price.selectedMinPrice = Math.floor(newValue)
                        await this.updateFilters();
                    },
                    maximum_price_changed: async function(newValue) {
                        this.filters.price.selectedMaxPrice = Math.ceil(newValue)
                        await this.updateFilters();
                    },
                    filterResults: function() {
                        let filters = {
                            MinPrice: '',
                            MaxPrice: '',
                            Stop: '',
                            Airline: '',
                            DepartureTime: '',
                            ArrivalTime: '',
                            FareType: ''
                        };

                        filters.MinPrice = this.filters.price.selectedMinPrice;
                        filters.MaxPrice = this.filters.price.selectedMaxPrice;



                        let toRemove = [];
                        let temp = [];

                    },

                    clearFilters: function() {
                        for (let i = 0; i < this.filters.airlines.length; i++) {
                            this.filters.airlines[i].enabled = false;
                        }
                        for (let i = 0; i < this.filters.departure_times.length; i++) {
                            this.filters.departure_times[i].enabled = false
                        }
                        for (let i = 0; i < this.filters.arrival_times.length; i++) {
                            this.filters.arrival_times[i].enabled = false
                        }
                        for (let i = 0; i < this.filters.fareType.length; i++) {
                            this.filters.fareType[i].enabled = (i == 0 ? true : false);

                        }


                        this.filters.number_of_stops[0].enabled = true;
                        this.filters.number_of_stops[1].enabled = false;
                        this.filters.number_of_stops[2].enabled = false;
                        this.filters.number_of_stops[3].enabled = false;


                        this.filters.price.selectedMinPrice = this.filters.price.minPrice;
                        this.filters.price.selectedMaxPrice = this.filters.price.maxPrice;



                        this.$refs.range_slider_1.updateSelectedMinMax(this.filters.price.selectedMinPrice, this
                            .filters.price.selectedMaxPrice);
                    },
                    updateFilters: async function() {
                        let airlines = [];

                        for (let i = 0; i < this.filters.airlines.length; i++) {
                            if (this.filters.airlines[i].enabled == true) {
                                airlines.push(this.filters.airlines[i].name)
                            }
                        }
                        airlines = airlines.join("|");



                        let stops = [];
                        for (let i = 1; i < this.filters.number_of_stops.length; i++) {
                            if (this.filters.number_of_stops[i].enabled == true) {
                                stops.push(this.filters.number_of_stops[i].value)
                            }
                        }
                        stops = stops.join("|");


                        let fareType = ''
                        for (let i = 1; i < this.filters.fareType.length; i++) {
                            if (this.filters.fareType[i].enabled == true) {
                                fareType = this.filters.fareType[i].name;
                            }
                        }


                        let departure_times = [];

                        for (let i = 0; i < this.filters.departure_times.length; i++) {
                            if (this.filters.departure_times[i].enabled == true) {
                                departure_times.push(this.filters.departure_times[i].name)
                            }
                        }
                        departure_times = departure_times.join("|");



                        let arrival_times = [];

                        for (let i = 0; i < this.filters.arrival_times.length; i++) {
                            if (this.filters.arrival_times[i].enabled == true) {
                                arrival_times.push(this.filters.arrival_times[i].name)
                            }
                        }
                        arrival_times = arrival_times.join("|");


                        let filters = {
                            'MinPrice': this.filters.price.selectedMinPrice,
                            'MaxPrice': this.filters.price.selectedMaxPrice,
                            'Stop': stops,
                            'Airline': airlines,
                            'DepartureTime': departure_times,
                            'ArrivalTime': arrival_times,
                            'FareType': fareType,
                        };


                        await this.searchForFlights(filters);
                        this.sort_results_by(this.current_sort_type);


                    },

                    searchForFlights: async function(filters = null) {
                        let data = new FormData();
                        data.append('search_data', JSON.stringify(this.search_data));
                        if (filters) {
                            data.append('filters', JSON.stringify(filters));
                        }
                        if (cancel !== null) {
                            cancel();
                        }


                        let resp = await axios.post('/flights/search_for_flights', data, {
                            cancelToken: new CancelToken(function executor(c) {
                                cancel = c;

                            })

                        })




                        this.api_response = resp.data



                        if (!this.newSearch) {
                            return;
                        } else {
                            this.newSearch = false;
                        }
                        let min = Math.floor(resp.data.Filter.MinPrice)
                        let max = Math.ceil(resp.data.Filter.MaxPrice)
                        this.filters.price.minPrice = min;
                        this.filters.price.maxPrice = max
                        this.filters.price.selectedMinPrice = min
                        this.filters.price.selectedMaxPrice = max

                        this.$refs.range_slider_1.updateMinMax(min, max);
                        this.$refs.range_slider_1.updateSelectedMinMax(min, max);

                        let airlines = resp.data.Filter.Airline.split("|");
                        let updated_airlines = [];
                        for (let i = 0; i < airlines.length; i++) {
                            updated_airlines.push({
                                enabled: false,
                                name: airlines[i]
                            })
                        }

                        this.filters.airlines = updated_airlines;
                        this.filters.fareType = [{
                                id: 0,
                                name: "All",
                                enabled: true
                            },
                            {
                                id: 1,
                                name: "Refundable",
                                enabled: false
                            },
                            {
                                id: 2,
                                name: "Non-Refundable",
                                enabled: false
                            }
                        ]

                        let departure_times = resp.data.Filter.DepartureTime.split("|");
                        let updated_departure_times = [];
                        for (let i = 0; i < departure_times.length; i++) {
                            updated_departure_times.push({
                                enabled: false,
                                name: departure_times[i]
                            })
                        }

                        this.filters.departure_times = updated_departure_times;



                        let arrival_times = resp.data.Filter.ArrivalTime.split("|");
                        let updated_arrival_times = [];
                        for (let i = 0; i < arrival_times.length; i++) {
                            updated_arrival_times.push({
                                enabled: false,
                                name: arrival_times[i]
                            })
                        }

                        this.filters.arrival_times = updated_arrival_times;

                    }


                },


            });
        </script>
    @endsection
