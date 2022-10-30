@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo-responsive.css') }}"/>
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
    <!-- Create Your Trip Modal -->
    <div class="modal fade creat-trip-modal" id="createSoloTrip" data-backdrop="static" data-keyboard="false"
         tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-xl">
                <form method="post" enctype="multipart/form-data" action="{{ route('solos-create') }}">
                    @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Create Trip <span>SOLO</span></h4>

                        <div class="create-trip-body">
                            <div class="create-trip-col">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <input class="form-control" name="title" type="text" placeholder="Title">
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-group">
                                            <input required type="text" class="form-control m-0"
                                                   id="inlineFormInputGroup"
                                                   name="destination" placeholder="Destination">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img
                                                        src="/images-n/icons/location-pink.png"
                                                        alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-group">
                                            <input required type="text" class="form-control m-0"
                                                   id="inlineFormInputGroup"
                                                   placeholder="How much to raise?" name="cost">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img src="/images-n/icons/usd.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <select name="fund_duration" required class="form-control">
                                            <option disabled>Select Fund Duration</option>
                                            <option value='1'>1 week</option>
                                            <option value='2'>2 weeks</option>
                                            <option value='3'>1 month</option>
                                            <option value='4'>2 months</option>

                                        </select>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                        <input class="datepicker form-control" id="popup-datepicker" value="Check In"
                                            name="startdate">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="datepicker form-control" id="popup-datepicker-two" value="Check Out"
                                            name="enddate">
                                    </div> --}}
                                    <div class="col-xl-12">
                                        <textarea class="form-control" rows="3" placeholder="Description"
                                                  name="description"></textarea>
                                    </div>
                                    {{--  <div class="col-xl-12">
                                         <div class="form-group form-check mb-0">
                                             <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                             <label class="form-check-label" for="exampleCheck1">I want to book my trip
                                                 through Trippbo (Select this if you haven't booked your trip through other
                                                 providers yet)</label>
                                         </div>
                                     </div> --}}
                                </div>
                            </div>


                            <div class="create-trip-col">
                                <div class="upload-field">
                                    <div id="msg"></div>
                                    <div id="image-form">
                                        <input type="file" name="trip_img" class="file" id="fileInput" accept="image/*">
                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled placeholder="Upload Image"
                                                   id="file">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Upload Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-box">
                                    <img src="/images-n/upload.png" id="preview" alt="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </form>
            </div>





    </div>

    <!-- Banner Start -->
    <section class="banner-area background-image" data-src="{{ asset('images-n/headers/solo.png') }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-col">
                        <div class="banner-content text-left">
                            <h1 style="letter-spacing: -1px;  font-weight: 500;
                            font-style: normal;">NEVER STOP EXPLORING</h1>
                            <h2 style="color:white;font-weight:normal;letter-spacing:5px;">Enjoy your summer trips with
                                us</h2>
                            <div class="banner-btn">
                                <a class="btn btn-primary" style="border-radius: 0px;" href="#" role="button"
                                   data-toggle="modal" data-target="#{{Auth::check() ? 'createSoloTrip' : 'sign-in-required-popup'}}" role="button">Create Your Trip</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trips Start -->
    <section class="trips-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 custom-padding">
                    <div class="trips-heading">
                        <h2>Related Trips</h2>
                    </div>
                </div>
                <div class="col-sm-4 custom-padding">
                    <div class="trips-heading">
                        <h3></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 custom-padding">
                    <div class="trips-selects">
                        {{-- <div class="trips-selects-item">
                            <select class="seluser">
                                <option value='0'>Destination Country</option>
                                <option value='1'>Germany</option>
                                <option value='2'>United State</option>
                                <option value='3'>Australia</option>
                                <option value='4'>New Zealand</option>
                                <option value='4'>Bangladesh</option>
                            </select>
                        </div>
                        <div class="trips-selects-item">
                            <select class="seluser">
                                <option value='0'>Departure Counrty</option>
                                <option value='1'>Germany</option>
                                <option value='2'>United State</option>
                                <option value='3'>Australia</option>
                                <option value='4'>New Zealand</option>
                                <option value='4'>Bangladesh</option>
                            </select>
                        </div>
                        <div class="trips-selects-item">
                            <input class="datepicker" id="datepicker" value="Departing Date">
                        </div>
                        <div class="trips-selects-item">
                            <input class="datepicker" id="datepicker-two" value="Returning Date">
                        </div>
                        <div class="trips-selects-item">
                            <select class="seluser">
                                <option value='0'>Recomended</option>
                                <option value='1'>Germany</option>
                                <option value='2'>United State</option>
                                <option value='3'>Australia</option>
                                <option value='4'>New Zealand</option>
                                <option value='4'>Bangladesh</option>
                            </select>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($trips as $trip)

                    <div class="col-xl-3 col-lg-4 col-md-6 custom-padding">
                        <div class="trips-col">
                            <div class="trips-img" style="position: relative;">

                                <img
                                    src="{{ $trip->picture_url ? asset('storage/' . $trip->picture_url) : asset('images-n/trips/1.jpg') }}"
                                    alt="" class="img-fluid"
                                    style="width: 414px;height:287px;object-fit:cover;object-position:center;">

                            </div>
                            <div class="trips-content">
                                <div class="trip-country">
                                    <h3>{{ $trip->title }} <p>by <a
                                                href="{{route('profile-home' , $trip->user->id)}}"><span>{{ $trip->user->name }}</span></a>
                                        </p>
                                    </h3>
                                    <h3><span>${{ $trip->goal }}</span></h3>
                                </div>
                                <div class="trip-date">
                                    <ul>
                                        <li>@include("custom-components.remaining-time-solo" , ['date' => $trip->enddate])</li>

                                        {{--       <li><img src="/images-n/icons/date.png" alt="" class="img-fluid">
                                                  {{\Carbon\Carbon::parse($trip->startdate)->format('Y-m-d')}}</li>
                                              <li><span>to</span></li>
                                              <li>{{\Carbon\Carbon::parse($trip->enddate)->format('Y-m-d')}}</li>
                                         --}}  </ul>
                                    <ul>
                                        <li><span style="font-weight: 900"> ${{$trip->totalAmountRaised()}}  </span> Collected
                                            ({{(int)($trip->totalAmountRaised() / $trip->goal * 100) > 100 ? '100' : (int)($trip->totalAmountRaised() / $trip->goal * 100) }}%)
                                        </li>


                                    </ul>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('solo-browse', $trip->id) }}" class="view-link">View More <img
                                                src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>


                                    </div>

                                    <div>
                                        <a href="#" data-toggle="modal" data-target="#socialMediaShare"
                                           data-link="{{ route('solo-browse', $trip->id) }}">
                                            <img src="{{ asset('images-n/share.svg') }}">
                                        </a>
                                    </div>
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

    <a href="#" id="back-to-top" title="Back to top"><img src="/images-n/icons/top-arrow.png" alt=""></a>

    {{-- <div id="main-header-body" class="m-0 p-5 w-100 d-flex flex-column align-items-center justify-content-center text-center">
          <div>
              <p class="main-header-title">Fund your SOLO Trip with Trippbo</p>
          </div>
          <div class="container">
              <div class=" d-flex flex-column align-items-center justify-content-center w-100">
                  <div class=" d-flex flex-row justify-content-center align-items-center w-100">


                      <hr class="main-header-hr w-100 mt-4">
                      <div class="main-header-text mx-3">Get&nbsp;Started</div>
                      <hr class="main-header-hr w-100">
                  </div>
                  <a class=" d-flex justify-content-center align-items-center text-center main-header-button mt-5"
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
                                  <div class="d-flex flex-row justify-content-between">
                                      <div>
                                          <h5 class="card-title"
                                              style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                      </div>
                                      <div>
                                          <h5 class="card-title"
                                              style="color:#FE2F70;font-size: 29px;font-weight: bolder">${{$trip->goal}}
                                          </h5>

                                      </div>
                                  </div>
                                  <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                             href="#">{{   $trip->user->name}}</a></p>
                                  <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                              src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->startdate}} to {{$trip->enddate}}</span>
                                  </p>
                                  <div class="d-flex flex-row justify-content-start">
                                      <div>
                                          <a href="{{route('trip-browse', $trip->id)}}"
                                             style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                              <span><img
                                                      src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                      </div>

                                  </div>

                              </div>
                          </div>

                      </div>
                  @endforeach
              </div>
          </div>
          <div class="d-flex flex-row justify-content-center justify-content-lg-end ">
              {!! $trips->links() !!}
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
        $('#popup-datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
        $('#popup-datepicker-two').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });

        // selectpicker
        $(document).ready(function () {

            // Initialize select2
            $(".seluser").select2();

            // Read selected option
            $('#but_read').click(function () {
                var username = $('.seluser option:selected').text();
                var userid = $('.seluser').val();

                $('#result').html("id : " + userid + ", name : " + username);

            });
        });


        // Upload Image
        $(document).on("click", ".browse", function () {
            var file = $('#fileInput');
            file.trigger("click");
        });
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function () {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>

@endsection
