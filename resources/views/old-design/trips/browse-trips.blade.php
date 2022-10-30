@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-r/home/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-r/home/fund-my-trip.css') }}" />

    <style>
        .was-validated input:invalid {
            border: 1px solid red;

        }

        .was-validated textarea:invalid {
            border: 1px solid red;

        }

        .invisible {
            display: none;
        }

        .autocomplete-item {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-item:hover {
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .request_to_join_button {
            padding: 6px 16px;
            color: white;
            background-color: #fe2f70;
            border-radius: 8px 0px 0px 8px;
            position: absolute;
            right: 0;
            bottom: 25px;
            color: white;
        }

        .portfolio-1 {
            display: flex;
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .modal-content,
        .modal-content * {
            border-radius: 15px !important;
        }

    </style>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="body-content" id="fund_my_trip_app">
        <div class="bg-hero d-flex flex-row-responsive align-items-center mb-4">
            <div class="hero-text">
                <h1 class="gilroy-medium text-white text-uppercase font-58">Explore the world</h1>
                <p class="gilroy-regular text-white text-capitalize font-30">It's Time to Enjoy Your Dreams Vactions</p>
                <div>
                    <button v-if="guest == false" type="button"
                        class="btn gilroy-semi btn-56d18f text-capitalize font-18 px-5 py-3 add-border-radius"
                        v-on:click="showSignInRequiredModal">Create Your Trip
                    </button>
                    <button v-if="guest == true" type="button"
                        class="btn gilroy-semi btn-56d18f text-capitalize font-18  px-5 py-3 add-border-radius"
                        v-on:click="showCreateTripModal">Create Your Trip
                    </button>
                </div>
            </div>
        </div>
        <fund-my-trip-create-trip ref="create_trip"></fund-my-trip-create-trip>
        <!-- The Modal 2 -->
        <form id="request_to_join_form">
            <input id="trip_id" type="hidden" name="trip_id" value="">
            <div class="modal fade" id="myModal-2">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content rounded-0 p-3">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="grid-4" style="gap: 4px;">
                                <div>
                                    <h4 class="gilroy-semi font-22 mb-3">Send Trip Request</h4>
                                    <div class="mb-2" style="position: relative;">
                                        <input id="originCountryVue" v-on:input="originCountry = $event.target.value"
                                            required type="text" class="inputField  pl-3 gilroy-medium font-14"
                                            name="country" placeholder="Origin Country" />
                                        <div style="position: absolute; background-color:white;z-index:10;"
                                            class="w-100">
                                            <autocomplete-component :keyword="originCountry"
                                                @autocomplete_result_selected="selectOriginCountry($event)">
                                            </autocomplete-component>
                                        </div>
                                    </div>
                                    <div>
                                        {{-- <div class="position-relative icon-right"><input type="text"
                                                                                         class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                                         placeholder="Cost of Trip">
                                            <img
                                                src="/image/dollar-pink.png"/></div> --}} </div>
                                    <div class="mb-2">
                                        <div class="position-relative inputField-box">
                                            <textarea required name="message"
                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14" id=""
                                                rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-2">
                                        <label class="trippbo-checkbox gilroy-regular">I want the Trip creator to fund my Flight
                                            expenses.<input type="checkbox" checked="checked"
                                                name="change"><span></span></label>
                                    </div>
                                    <div>
                                        <label class="trippbo-checkbox gilroy-regular">I want the Trip creator to fund my Hotel
                                            expenses.<input type="checkbox" checked="checked"
                                                name="change"><span></span></label>
                                    </div> --}}
                                </div>
                                <div class="d-flex align-items-end justify-content-end p-2">
                                    <div class="mr-2">
                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-outline-light rounded-0 gilroy-medium font-12 px-4">Close
                                        </button>
                                    </div>
                                    <div>
                                        <button v-on:click="send_join_request" type="button"
                                            class="btn gilroy-medium btn-white font-12 px-4">Send
                                            Request
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="wrapper">
            <div class="d-flex flex-row-responsive align-items-center justify-content-between mb-4 section-1">
                <div>
                    <h4 class="gilroy-medium text-000941 font-40 mb-0">Recommended Trips</h4>
                </div>
                {{-- <div>
                    <h4 class="gilroy-medium font-26 text-right mb-0">Sort by</h4>
                </div> --}}
            </div>
            {{-- <div class="grid-1 mb-3">
                <div>
                    <div class="search-filter-dropdown">
                        <button>Destination Country</button>
                        <div>
                            <input type="text" placeholder="Search" />
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="/image/location-blue.png" /></div>
                                <div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <p class="gilroy-medium font-10 mb-0">Germany</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-medium font-10 opacity-0-6 mb-0">Addis Ababa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="/image/location-blue.png" /></div>
                                <div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <p class="gilroy-medium font-10 mb-0">United State</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-medium font-10 opacity-0-6 mb-0">Orlando</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="search-filter-dropdown">
                        <button>Departure Country</button>
                        <div>
                            <input type="text" placeholder="Search" />
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="/image/location-blue.png" /></div>
                                <div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <p class="gilroy-medium font-10 mb-0">Germany</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-medium font-10 opacity-0-6 mb-0">Addis Ababa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="/image/location-blue.png" /></div>
                                <div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <p class="gilroy-medium font-10 mb-0">United State</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-medium font-10 opacity-0-6 mb-0">Orlando</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="position-relative inputField-box">
                        <img src="/image/policy.png" class="icon-18px mr-1">
                        <input type="text" id="DateFrom" class="inputField inputField-withicon"
                            placeholder="Departure Date">
                    </div>
                </div>
                <div>
                    <div class="position-relative inputField-box">
                        <img src="/image/policy.png" class="icon-18px mr-1">
                        <input type="text" id="DateFrom" class="inputField inputField-withicon"
                            placeholder="Returnung Date">
                    </div>
                </div>
                <div>
                    <div class="inputField-box">
                        <select class="inputField">
                            <option value="1" selected="">Recommended</option>
                            <option value="2"></option>
                        </select>
                    </div>
                </div>
            </div> --}}
            <div class="portfolio-1 row mb-3">
                @foreach ($trips as $trip)
                    <div class="col-lg-3">

                        <figure>
                            <div style="border-top-left-radius: 15px;border-top-right-radius: 15px;">
                                <div role="button" data-toggle="modal" data-link="{{ route('trip-browse', $trip->id) }}"
                                    data-target="#socialMediaShare"><span><i class="fas fa-share-alt"></i></span></div>
                                <img src="{{ $trip->trip_img ? asset('storage/' . $trip->trip_img) : asset('images-n/trips/1.jpg') }}"
                                    alt="" class="add-border-radius ">
                            </div>
                            <figcaption style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                                <div>
                                    <h4 class="gilroy-semi font-20 mb-1"> destination country</h4>
                                </div>
                                <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span><a
                                        href="{{ route('profile-home', $trip->user->id) }}"> <span
                                            class="gilroy-semi text-fe2f70">&nbsp;{{ $trip->user->name }}</span> </a>
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                    <div><span class="gilroy-medium text-000941 font-14 mr-2"></span>On August &nbsp;
                                    </div>
                                    {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2"></span></div> --}}
                                    <div><span class="gilroy-medium text-000941 font-14">
                                            @if ($trip->duration == '1')
                                                For 1 Week
                                            @elseif($trip->duration == '2')
                                                For 2 Weeks
                                            @elseif($trip->duration == '3')
                                                For 3 Weeks
                                            @elseif($trip->duration == '4')
                                                For a month
                                            @elseif($trip->duration == '5')
                                                Short Vacation
                                            @elseif($trip->duration == '6')
                                                Long Vacation
                                            @endif
                                        </span></div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class=" ml-1"><i class="fas  fa-suitcase-rolling"></i></div>
                                    <div class="ml-1"><span
                                            class="gilroy-medium text-000941 font-14 mr-2"></span>Looking
                                        for &nbsp;
                                    </div>
                                    {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2"></span></div> --}}
                                    <div><span class="gilroy-medium text-000941 font-14">
                                            @if ($trip->user_id == $trip->host_id)
                                                Travelers
                                            @else
                                                Funding
                                            @endif
                                        </span></div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <div>
                                            <a href="{{ route('trip-browse', $trip->id) }}">
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                            </a>
                                            <img class="arrow" src="/image/arrow-right.png" alt="">
                                        </div>
                                    </div>
                                    @if (!(Auth::check() && $trip->user_id === Auth::id()))
                                        <a v-if="guest" data-trip-id="{{ $trip->id }}" href="#"
                                            class="request_to_join_button" role="button" data-toggle="modal"
                                            data-target="#myModal-2"> <span style="color:white;"
                                                class="portfolio-badge gilroy-medium font-14">
                                                {{ $trip->isMemeber(Auth::id()) ? 'Requested' : 'Join' }}</span> </a>
                                    @endif
                                    <a v-if="!guest" href="#" class="request_to_join_button" role="button"
                                        data-toggle="modal" data-target="#sign-in-required-popup"> <span
                                            style="color:white;" class="portfolio-badge gilroy-medium font-14">Login
                                        </span> </a>
                                </div>

                            </figcaption>
                        </figure>
                        <v-app v-if="snackbar">
                            <template>
                                <div class="text-center ma-2">

                                    <v-snackbar v-model="snackbar">
                                        <span class="white--text">@{{ snackbar_text }}</span>


                                        <template v-slot:action="{ attrs }">
                                            <v-btn color="pink" v-bind="attrs" @click="snackbar = false">
                                                Close
                                            </v-btn>
                                        </template>
                                    </v-snackbar>
                                </div>
                            </template>
                        </v-app>
                    </div>
                @endforeach
            </div>

        </div>


    </div>










@endsection
@section('scripts')


    <script>

    </script>
    <script type="text/javascript">

    </script>

    <script>
        function updateFilters() {

            document.getElementById("trips_filters").submit();
        }
    </script>
    <script>
        CancelToken = axios.CancelToken;


        var cancel = function() {

        }





        const fund_my_trip_app = new Vue({
            el: "#fund_my_trip_app",
            vuetify: new Vuetify(),
            data: {
                guest: {{ Auth::check() ? 'true' : 'false' }},
                snackbar: false,
                snackbar_text: 'Your Request Has Been Sent!',
                originCountry: '',
            },
            methods: {
                selectOriginCountry(result) {
                    $("#originCountryVue").val(result.country_name + ', ' + result.city_name)
                },
                showCreateTripModal() {
                    this.$refs.create_trip.show();
                },
                showSignInRequiredModal() {
                    $("#sign-in-required-popup").modal('show')
                },
                async send_join_request() {


                    $("#request_to_join_form").addClass('was-validated')
                    if ($("#request_to_join_form")[0].checkValidity() === false) {
                        return;
                    }
                    let data = new FormData(document.getElementById('request_to_join_form'))

                    try {
                        $('#myModal-2').modal('hide');

                        let response = await axios.post('/trips/ask-to-join', data)

                        this.snackbar = true;
                    } catch (e) {

                    }



                }
            },

            mounted() {
                $('#myModal-2').on('show.bs.modal', function(e) {
                    let trip_id = $(e.relatedTarget).data('trip-id');
                    $('#trip_id').val(trip_id);
                })

                $('#myModal-2').on('hidden.bs.modal', function(e) {
                    $("#myModal-2 :input").val('')
                });
            }
        })
    </script>
@endsection
