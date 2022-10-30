@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-n/fund-trip.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/fund-trip-responsive.css') }}" />

    <style>
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
    <!-- Trip Request Modal -->
    <div class="modal fade trip-request-modal" id="exampleModal-two" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('trip-request-to-join-post') }}">
                        @csrf
                        <div class="request-cols">
                            <div class="request-col">
                                <h4>Send Trip Request</h4>
                                <input id="trip_id" type="hidden" name="trip_id" value="">
                                <input type="text" name="country" class="form-control" placeholder="Origin Country">
                                <!--  <input class="form-control cost-input" type="text" placeholder="Cost of Trip"> -->
                                <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                                <div class="form-group form-check">
                                    <input name="fund_flight" type="checkbox" class="form-check-input" id="exampleCheck11">
                                    <label class="form-check-label" for="exampleCheck11">I want the Trip creator to fund
                                        my Flight expenses.</label>
                                </div>
                                <div class="form-group form-check">
                                    <input name="fund_hotel" type="checkbox" class="form-check-input" id="exampleCheck22">
                                    <label class="form-check-label" for="exampleCheck22">I want the Trip creator to fund
                                        my Hotel expenses.</label>
                                </div>

                            </div>
                            <div class="request-col p-0">
                                <img src="{{ asset('images-n/request-img.jpg') }}" alt="" class="img-fluid">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" >Send Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Banner Start -->
    <section class="banner-area background-image" style="background-size: cover;background-position: center;"
        data-src="{{ asset('images-n/headers/fund_my_trip.png') }}">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-col">
                        <div class="banner-content text-left">
                            <h1 style="letter-spacing: -1px;  font-weight: 500;
                                                    font-style: normal;">EXPLORE THE WORLD</h1>
                            <h2 style="color:white;font-weight:normal;letter-spacing:5px;">It's Time To Enjoy Your Dreams
                                Vacations</h2>
                            <div class="banner-btn">
                                <a class="btn btn-primary" style="border-radius: 0px;" href="#" role="button"
                                    data-toggle="modal" data-target="#{{Auth::check() ? 'createTripModal' : 'sign-in-required-popup'}}">Create Your Trip</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trips Start -->
    <section class="trips-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-sm-8 custom-padding">
                    <div class="trips-heading">
                        <h2>Related Trips</h2>
                    </div>
                </div>
                <div class="col-sm-4 custom-padding">
                    <div class="trips-heading">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 custom-padding">
                    <form id="trips_filters" method="GET" action="{{ route('trips-browse') }}">

                        <div class="trips-selects">
                            {{-- <div class="trips-selects-item">
                                <label for="trip_departure_country">
                                    Departure Country
                                    <select class="seluser"  name="departure_country"
                                        id="trip_departure_country">
                                        @foreach ($countries as $country)

                                            <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div> --}}
                            <div class="trips-selects-item">
                                <label for="trip_destination_country">
                                    Destination Country
                                    <select name="destination_country" class="seluser" id="trip_destination_country">
                                        @foreach ($countries as $country)
                                            <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            {{-- <div class="trips-selects-item">
                                <label for="datepicker">
                                    Departure Date
                                <input class="datepicker" id="datepicker" value="Departing Date">
                                </label>
                            </div>
                            <div class="trips-selects-item">
                                <label for="datepicker">
                                    Arrival Date
                                <input class="datepicker" id="datepicker-two" value="Returning Date">
                                </label>
                            </div> --}}
                            {{-- <div class="trips-selects-item">
                                <select class="seluser">
                                    @foreach ($countries as $country)
                                        <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                @foreach ($trips as $trip)

                    <div class="col-xl-3 col-lg-4 col-md-6 custom-padding">
                        <div class="trips-col found-trip-col">
                            <div class="trips-img">
                                <img src="{{ $trip->trip_img ? asset('storage/' . $trip->trip_img) : asset('images-n/trips/1.jpg') }}"
                                    alt="" style="height: 350px;width: 200px;object-fit: cover;object-position: center;"
                                    class="img-fluid">
                            </div>
                            <div class="trips-content">
                                <div class="trip-country">
                                    <h3>{{ $trip->destinationCountry->name }} <p>by
                                            <span><a style="color:inherit;font-size:inherit;" href="{{route('profile-home', $trip->user->id)}}">{{ $trip->user->name }}</a></span></p>
                                    </h3>

                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center my-2">
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="images/icons/date.png" alt="" class="img-fluid">
                                                {{ \Carbon\Carbon::parse($trip->start_date)->format('Y-m-d') }}</li>
                                            <li><span>to</span></li>
                                            <li>{{ \Carbon\Carbon::parse($trip->end_date)->format('Y-m-d') }}</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <a href="#" data-toggle="modal" data-target="#socialMediaShare"
                                            data-link="{{ route('trip-browse', $trip->id) }}">
                                            <img src="{{ asset('images-n/share.svg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="trip-button-links">
                                    <a href="{{ route('trip-browse', $trip->id) }}" class="view-link">View More <img
                                            src="images/icons/right-arrow.png" alt=""></a>
                                    <a href="#" class="join-btn-link" data-toggle="modal" data-target="#{{Auth::check() ? 'exampleModal-two' : 'sign-in-required-popup'}}"
                                        data-trip-id="{{ $trip->id }}">Request
                                        To Join</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class=" my-pagination">
                        <nav aria-label="Page navigation example">

                            {!! $trips->links() !!}
                            {{-- <ul class="pagination">
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
                              </ul> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <div id="main-header-body" class="m-0 p-5 w-100 text-center">
            <p class="main-header-title">Fund your Trip with Trippbo</p>
            <div class="container">
                <div class=" d-flex flex-column align-items-center w-100">
                    <div class=" d-flex flex-row justify-center align-items-center w-100">


                        <hr class="main-header-hr w-100 mt-4">
                        <div class="main-header-text mx-3">Get&nbsp;Started</div>
                        <hr class="main-header-hr w-100">
                    </div>
                    <a class=" d-flex justify-content-center align-items-center text-center main-header-button mt-3"
                       href="{{route('trips-create')}}">Create Your Trip</a>
                </div>
            </div>
        </div>
        <div class="custom-responsive-margin">
            <div class="container-fluid pr-5">
                <p class="relevant-trips my-4 ml-3">
                    Related Trips
                </p>

            </div>

            <div class="container-fluid">
                <div class="row m-0 p-0">
                    @foreach ($trips as $trip)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                            <div class="card" style="height: 100%;border-radius: 20px;overflow: hidden;">
                                <img class="card-img-top" src="{{asset('img/placeholder/placeholder.png')}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                    <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                               href="#">{{   $trip->user->name}}</a></p>
                                    <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                                src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->start_date}} to {{$trip->end_date}}</span>
                                    </p>
                                    <div class="d-flex flex-row justify-content-around">
                                        <div>
                                            <a href="{{route('trip-browse', $trip->id)}}"
                                               style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                                <span><img
                                                        src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                        </div>
                                        <div>
                                            <a href="{{route('trip-request-to-join' , $trip->id)}}" class="btn"
                                               style="background-color: #FE2F70;color: white;border-radius: 8px;">Request To
                                                Join</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}



    {{-- <div class="container" >
            <nav class="navbar navbar-light bg-light">


                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('trips-create')}}"><span
                                style="background-color: #00cbff;color: white;border-radius: 5px;padding: 8px;">Create a trip</span>
                        </a>


                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    -->

                </ul>


            </nav>
        </div>
        <div class="container-fluid p-0 m-0">
            @if ($trips->isEmpty())
                <div class="jumbotron">
                    <h1 class="display-4">No Trips, yet!</h1>
                    <p class="lead"></p>
                    <hr class="my-4">
                    <p>What are you waiting for? add a trip now!</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{route('trips-create')}}" role="button">Add a trip</a>
                    </p>
                </div>

            @else
                @foreach ($trips as $trip)
                    <div class="card" style="background-color: #e9ecef;">
                        <div class="card-body">
                            <h5 class="card-title">{{$trip->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Posted By {{$trip->user->name}}</h6>
                            <p class="card-text">{{$trip->description}}</p>
                            <a href="{{route('trip-browse', $trip->id)}}" class="card-link">View</a>
                            @if (\Illuminate\Support\Facades\Auth::check())
                                @if ($trip->joinRequests->contains(function ($value, $key) {
        return $value['user_id'] == \Illuminate\Support\Facades\Auth::id();
    }))
                                    <p>You've already
                                        Sent a request</p>

                                @else
                                    <a href="" class="card-link">Request To
                                        Join</a>

                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif


        </div> --}}


    <!-- Create Your Trip Modal -->
    <div class="modal fade creat-trip-modal" id="createTripModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="createTripModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form action="{{ route('trip-create') }}" enctype='multipart/form-data' id="create-trip-form"
                    method="post" onsubmit="return create_trip_submit_button_trigger()">
                    <div class="modal-body">
                        <h4>Create Trip</h4>
                        <div>
                            @csrf
                            <div class="create-trip-body">

                                <div class="create-trip-col">
                                    <div>
                                        <input class="form-control" type="text" name="title" placeholder="Title">
                                        <input id="hotel_autocomplete" type="text" class="form-control" name="destination"
                                            autocomplete="off" placeholder="Destination City" />
                                        <input name="hotel_destination" id="hotel_destination" type="hidden" value="">
                                        <input name="destination_country_code" id="destination_country_code" type="hidden"
                                            value="">
                                        <input name="destination_city_code" id="destination_city_code" type="hidden"
                                            value="">
                                        <input name="destination_city_name" id="destination_city_name" type="hidden"
                                            value="">

                                        <div id="hotel-search-result-container" class=" invisible"
                                            style="background-color: white;position: relative">

                                            <div id="results" class="p-2"
                                                style="position: absolute;top: 0px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                            </div>

                                        </div>
                                        <input class="datepicker form-control" id="popup-datepicker" autocomplete="off"
                                            name="startdate" value="Check In">
                                        <input class="datepicker form-control" id="popup-datepicker-two" autocomplete="off"
                                            name="enddate" value="Check Out">
                                        <textarea class="form-control" rows="3" name="description"
                                            placeholder="Description"></textarea>
                                        <div class="form-group form-check mb-0">
                                            <input name="should_book" type="checkbox" class="form-check-input"
                                                id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">I want to book my trip
                                                through
                                                Trippbo (Select this if you haven't booked your trip through other providers
                                                yet)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="create-trip-col">
                                    <div class="upload-field">
                                        <div id="msg"></div>
                                        <div id="image-form">
                                            <input type="file" name="trip_img" class="file" accept="image/*">
                                            <div class="input-group">
                                                <input type="text" class="form-control" disabled placeholder="Upload Image"
                                                    id="file">
                                                <div class="input-group-append">
                                                    <button type="button" class="browse btn btn-primary">Upload
                                                        Image</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-box">
                                        <img src="{{ asset('images-n/upload.png') }}" id="preview" alt="img-fluid">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="create-trip-submit-button" onclick="create_trip_submit_button_trigger()" type="button"
                            class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')


    <script>
        $('#exampleModal-two').on('show.bs.modal', function(e) {
            let trip_id = $(e.relatedTarget).data('trip-id');
            $('#trip_id').val(trip_id);
        })
    </script>
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
        $('#popup-datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
        $('#popup-datepicker-two').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });


        // Upload Image
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });


        // selectpicker
        $(document).ready(function() {
            // Initialize select2
            $(".seluser").select2();
            $('#trip_destination_country').on('select2:select', function(e) {
                updateFilters();
            });

            @if (isset($destination_country_id))

                $('#trip_destination_country').val('{{ $destination_country_id }}'); // Select the option with a value of '1'
                $('#trip_destination_country').trigger('change'); // Notify any JS components that the value changed

            @endif
            // Read selected option
            $('#but_read').click(function() {
                var username = $('.seluser option:selected').text();
                var userid = $('.seluser').val();

                $('#result').html("id : " + userid + ", name : " + username);

            });
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
        function updateFilters() {

            document.getElementById("trips_filters").submit();
        }
    </script>
    <script>
        CancelToken = axios.CancelToken;


        var cancel = function() {

        }



        $("#hotel_autocomplete").keyup(function() {
            if ($("#hotel_autocomplete").val() !== "") {
                $("#hotel_destination").val($("#hotel_autocomplete").val())

                fetchData();

            } else {
                cancelCurrentRequests()
                resetAutocomplete();


            }


        });


        function cancelCurrentRequests() {
            if (typeof cancel !== "undefined" && typeof cancel !== "null") {
                cancel()

            }
        }

        function submitHotelForm() {
            $("#hotel_submit").html("Loading Results...");
            $("#hotel_submit").prop("disabled", true)
            $("#hotel_form").submit();
        }

        async function fetchData() {

            let error = false;
            cancelCurrentRequests();
            const resp = await axios.get('/autocomplete/' + $("#hotel_autocomplete").val(), {
                cancelToken: new CancelToken(function executor(c) {
                    // An executor function receives a cancel function as a parameter
                    cancel = c;

                })

            }).catch(function(thrown) {
                error = true;

                if (axios.isCancel(thrown)) {

                } else {
                    // handle error
                }
            });
            if (error == false) {
                if (resp.data.length > 0) {
                    addResults(resp.data)
                } else {
                    resetAutocomplete()
                }


            }

        }

        function resetAutocomplete() {
            $("#results").empty();

            if ($("#hotel-search-result-container").hasClass('invisible') == false) {
                $("#hotel-search-result-container").addClass("invisible");
            }
            $("#hotel_destination").val('')
            $("#destination_country_code").val('')
            $("#destination_city_code").val('')
            $("#destination_city_name").val('')

        }

        function addResults(data) {
            if ($("#hotel-search-result-container").hasClass("invisible") == true) {
                $("#hotel-search-result-container").removeClass("invisible");
            }

            $("#results").empty();

            console.log(data)
            Object.keys(data).forEach(key => {
                $("#results").append(
                    `<div onclick="selectResult('${data[key].iataCode}', '${data[key].address.countryCode}' , this , '${data[key].address.cityCode}' , '${data[key].address.cityName}' , '${data[key].address.countryName}' )" class='autocomplete-item d-flex flex-row justify-content-start align-items-center'><div class='mr-3'><img src='{{ asset('images-n/location.svg') }}' width='20px' height='20px' /></div><div><div  style='font-size:12px'> ${ data[key].address.countryName  } </div> <div style="font-size:10px"  style="background-color: white;border: none;font-size:15px;cursor:pointer; ">  ${data[key].address.cityName} - ${data[key].name} </div></div></div> <hr> `
                )

            });
        }

        function selectResult(selectedValue, countryCode, element, cityCode, cityName, countryName) {

            $("#hotel_destination").val(selectedValue)
            $("#destination_country_code").val(countryCode)
            $("#destination_city_code").val(cityCode)
            $("#destination_city_name").val(cityName)
            $("#hotel_autocomplete").val(countryName + ", " + cityName);
            if ($("#hotel-search-result-container").hasClass('invisible') == false) {
                $("#hotel-search-result-container").addClass("invisible");
            }

        }

        function create_trip_submit_button_trigger() {
            if ($("#hotel_destination").val() !== '' && $("destination_country_code").val() !== '' && $(
                    "#hotel_autocomplete").val() !== '' && $('#destination_city_code').val() !== '' && $(
                    "#destination_city_name").val() !== '') {
                document.getElementById('create-trip-form').submit();
            } else {
                alert('you must select the destination city from the suggested menu.')
                return false;
            }
        }
    </script>
@endsection
