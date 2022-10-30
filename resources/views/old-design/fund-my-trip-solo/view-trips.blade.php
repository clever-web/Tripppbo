@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-r/home/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-r/home/fund-my-trip-solo.css') }}" />


    <style>
        @media (min-width: 768px) and (max-width: 1200px) {
            .portfolio-1 {
                grid-template-columns: auto auto;
            }

        }

        .was-validated input:invalid {
            border: 1px solid red;

        }

        .euro_sign {
            position: absolute;
            height: 20px;
            right: 8px;
            top: 58%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            color: #ef1e60 !important;
        }

        .was-validated textarea:invalid {
            border: 1px solid red;

        }

        .was-validated select:invalid {
            border: 1px solid red;

        }

        #myProgress {
            width: 100%;
            background-color: white;
            border: 0.5px solid lightgray;
            padding: 2px;
            overflow: hidden;
        }

        #myProgress>div {
            height: 10px;
            background-color: #56D18F;
        }

        .price-badge {
            padding: 6px 16px;
            color: white;
            background-color: #fe2f70;
            border-radius: 8px 0px 0px 8px;
            position: absolute;
            right: 0;

        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .portfolio-1 figure:hover {
            border: 1px solid transparent;
        }

        .btn-upload {
            display: inline-block;
            color: white;
            background-color: #ef1e60 !important;
            padding: 10px;
            font-family: sans-serif;
            cursor: pointer;
            margin: 0;
            border: 1px solid #d2d2d2;
            width: 100%;
            text-align: center;
            font-size: 14px;
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





    <div class="body-content">
        <div class="bg-hero d-flex flex-row-responsive align-items-center mb-4" style="background-size: cover;">
            <div class="hero-text">
                <h1 class="gilroy-medium text-white text-uppercase font-58">NEVER STOP EXPLORING</h1>
                <p class="text-white letter-spacing-5 font-30"><span
                        class="ink-free-regular text-capitalize font-weight-bold">enjoy</span> <span
                        class="gilroy-regular text-lowercase">YOUR SUMMER TRIP With US</span></p>
                <div><a class="btn gilroy-semi btn-56d18f text-capitalize font-18 rounded-0 px-5 py-3 add-border-radius"
                        data-toggle="modal"
                        data-target="#{{ Auth::check() ? 'myModal' : 'sign-in-required-popup' }}">Create
                        Trip</a></div>
            </div>
        </div>
        <form id="solo_create_trip" method="post" enctype="multipart/form-data" action="{{ route('solos-create') }}"
            class="needs-validation" novalidate>
            @csrf
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content  p-3 add-border-radius">
                        <!-- Modal Header -->
                        <div class="modal-header border-0">
                            <h4 class="modal-title gilroy-semi font-22"><span class="mr-3">Create Trip</span>
                                <span class="gilroy-regular solo">SOLO</span>
                            </h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body pt-0">
                            <div class="grid-2">
                                <div>
                                    <div class="position-relative inputField-box"><input required type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14 add-border-radius"
                                            name="title" placeholder="Title"></div>
                                </div>
                                <div>
                                    <div id="fund_my_trip_solo_app" class="position-relative icon-right"><input autocomplete="off" id="trip_destination" v-on:input="destination = $event.target.value"
                                        v-model="destination" required type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14 add-border-radius"
                                            name="destination" placeholder="Destination"> <img
                                            src="image/location-pink.png" />

                                            <div style="position: absolute;z-index:12;background-color:white;" class="w-100">
                                                <autocomplete-component :keyword="destination"
                                                    @autocomplete_result_selected="selectDestination($event)">
                                                </autocomplete-component>
                                            </div>
                                        </div>
                                </div>
                                <div>
                                    <div class="position-relative icon-right add-border-radius"><input pattern="[1-9][0-9]*"
                                            required type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14 add-border-radius"
                                            name="cost" placeholder="Amount to raise"> <i
                                            class="fas fa-euro-sign euro_sign"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="inputField-box">
                                        <select required name="fund_duration" style="font-size: 12px;"
                                            class="inputField add-border-radius">
                                            <option value="" disabled selected>Fund Duration</option>
                                            <option value='1'>1 week</option>
                                            <option value='2'>2 weeks</option>
                                            <option value='3'>1 month</option>
                                            <option value='4'>2 months</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    {{-- <div class="position-relative icon-right"><input type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                            placeholder="Check In"> <img src="image/expiration.png" /></div> --}}
                                </div>
                                <div>
                                    {{-- <div class="position-relative icon-right"><input type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                            placeholder="Check Out"> <img src="image/expiration.png" /></div> --}}
                                </div>
                                <div>
                                    <div class="position-relative inputField-box add-border-radius">
                                        <textarea required
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14 add-border-radius"
                                            name="description" rows="5" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div>{{-- <label class="trippbo-checkbox gilroy-regular">I want to book my trip through Trippbo
                                        (Select this if you haven't booked your trip through other providers yet)<input
                                            type="checkbox" checked="checked" name="change"><span></span></label> --}}</div>
                                <div>
                                    <div class="grid-3">
                                        <div class="d-flex align-items-center add-border-radius"><span
                                                class="upload-text gilroy-medium pl-3 add-border-radius">Upload
                                                Image</span><input name="trip_img" type="file" id="upload"
                                                onchange="showPreview(event);" hidden /></div>
                                        <div class="ml-2"><label
                                                class="btn-upload gilroy-medium add-border-radius" for="upload">Upload
                                                Image</label></div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex flex-column justify-content-center align-items-center add-border-radius">
                                        <img class="add-border-radius" id="create_trip_pic_review" src="image/63171.png" />

                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-end">
                                        <div class="mr-2"><button type="button" data-dismiss="modal"
                                                class="btn btn-outline-dark rounded-0 gilroy-medium font-12 px-4 add-border-radius">Close</button>
                                        </div>
                                        <div><button onclick="create_trip()" type="button"
                                                class="btn gilroy-medium btn-fe2f70 font-12 px-4 add-border-radius">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="wrapper">
            {{-- <div class="d-flex flex-row-responsive align-items-center justify-content-between mb-4 section-1">
                <div>
                    <h4 class="gilroy-medium font-40 mb-0">Related Trips</h4>
                </div>
                <div>
                    <h4 class="gilroy-medium font-26 text-right mb-0">Sort by</h4>
                </div>
            </div>
            <div class="grid-1 mb-3">
                <div>
                    <div class="search-filter-dropdown">
                        <button>Destination Country</button>
                        <div>
                            <input type="text" placeholder="Search">
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="image/location-blue.png"></div>
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
                                <div class="d-flex"><img src="image/location-blue.png"></div>
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
                            <input type="text" placeholder="Search">
                            <div class="search-filter-dropdown-list d-flex align-items-center">
                                <div class="d-flex"><img src="image/location-blue.png"></div>
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
                                <div class="d-flex"><img src="image/location-blue.png"></div>
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
                        <img src="image/policy.png" class="icon-18px mr-1">
                        <input type="text" id="DateFrom" class="inputField inputField-withicon"
                            placeholder="Departure Date">
                    </div>
                </div>
                <div>
                    <div class="position-relative inputField-box">
                        <img src="image/policy.png" class="icon-18px mr-1">
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
            <div class="portfolio-1 mb-3">
                @foreach ($trips as $trip)
                    <div>

                        <figure>
                            <div style="border-top-left-radius: 15px;border-top-right-radius:15px;">
                                <div role="button" data-toggle="modal" data-target="#socialMediaShare"
                                    data-link="{{ route('solo-browse', $trip->id) }}">
                                    <span><i class="fas fa-share-alt" aria-hidden="true"></i></span>
                                </div>
                                <img class="add-border-radius"
                                    src="{{ $trip->picture_url ? asset('storage/' . $trip->picture_url) : asset('images-n/trips/1.jpg') }}"
                                    alt="">
                            </div>
                            <figcaption style="border-bottom-left-radius: 15px;border-bottom-right-radius:15px;">
                                <div>
                                    <h4 class="gilroy-semi font-20 mb-1">{{ $trip->title }}</h4>
                                </div>
                                <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <a
                                        href="{{ route('profile-home', $trip->user->id) }}"> <span
                                            class="gilroy-semi text-fe2f70">{{ $trip->user->name }}</span> </a></p>
                                <div class="d-flex align-items-center mb-3">
                                    <div><img src="image/policy.png" class="icon-16px mr-1"></div>
                                    <div><span
                                            class="gilroy-medium text-000941 font-14 mr-2">@include("custom-components.remaining-time-solo"
                                            , ['date' => $trip->enddate])</span></div>
                                    {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                    <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div> --}}
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div>


                                        <a href="{{ route('solo-browse', $trip->id) }}">
                                            <span class="gilroy-semi text-000941 font-16">View More</span>
                                        </a>


                                        <img class="arrow" src="image/arrow-right.png" alt="">
                                    </div>
                                    <span class="price-badge gilroy-medium font-14">{{ $trip->goal }}€</span>

                                </div>
                                <div class="mt-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div><span class="gilroy-semi font-22">
                                                {{ $trip->totalAmountRaised() }}€</span></div>

                                    </div>
                                    <div id="myProgress" class="mb-3 add-border-radius">
                                        <div class="add-border-radius"
                                            style="width: {{ ($trip->totalAmountRaised() / $trip->goal) * 100 }}%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <div class="d-flex flex-column">
                                        <div class="text-center" style="font-weight:900">
                                            {{ ceil(($trip->totalAmountRaised() / $trip->goal) * 100) }}%</div>
                                        <div class="text-center">Funded</div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-center" style="font-weight:900">{{ $trip->goal }}€</div>
                                        <div class="text-center">To Raise</div>
                                    </div>
                                    @include("custom-components.remaining-time-solo-only-time"
                                    , ['date' => $trip->enddate])
                                </div>
                            </figcaption>
                        </figure>

                    </div>
                @endforeach
            </div>

            {!! $trips->links() !!}
            {{-- <ul class="trippbo-pagination mb-3">
                <li><a class="trippbo-pagination-disabled" href="javascript:void(0)"><i class="fa fa-angle-left"
                            aria-hidden="true"></i></a></li>
                <li><a class="trippbo-pagination-active" href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)">5</a></li>
                <li><a class="trippbo-pagination-dots" href="javascript:void(0)">...</a></li>
                <li><a href="javascript:void(0)">25</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul> --}}
        </div>


    </div>
@endsection
@section('scripts')
    <script src="/js/home/fund-my-trip-solo.js"></script>

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("create_trip_pic_review");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function create_trip() {
            $("#solo_create_trip").addClass('was-validated');
            if ($("#solo_create_trip")[0].checkValidity()) {
                $("#solo_create_trip")[0].submit();
            }
        }
    </script>
    <script>
        const fund_my_trip_solo = new Vue({
            el: "#fund_my_trip_solo_app",

            data: {

                destination: "",

            },
            methods: {
                selectDestination(result) {
                    $("#trip_destination").val(result.country_name + ', ' + result.city_name)
                },
            },


        });

        function endFunding() {
            axios.post('{{ route('solo-end-funding') }}', {
                trip_id: {{ $trip->id }}
            }).then(() => {
                $("#confirmEndFunding").modal('hide')
                location.reload();
            })
        }
    </script>
@endsection
