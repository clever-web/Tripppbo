@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-n/sub-page-overview.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/sub-page-overview-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/new.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/newresponsive.css') }}" />


    <style>
        .invisible {
            display: none;
        }

    </style>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif







    <!-- Edit Your Trip Modal -->
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
                                        <input class="form-control" value="{{ $trip->title }}" type="text" name="title"
                                            placeholder="Title">
                                        <input id="hotel_autocomplete" type="text" class="form-control" name="destination"
                                            autocomplete="off" placeholder="Destination City"
                                            value="{{ $trip->destinationCountry->name . ', ' . $trip->destination_city_name }}" />
                                        <input name="hotel_destination" id="hotel_destination" type="hidden"
                                            value="{{ $trip->destination_city_code }}">
                                        <input name="destination_country_code" id="destination_country_code" type="hidden"
                                            value="{{ $trip->destinationCountry->code }}">
                                        <input name="destination_city_code" id="destination_city_code" type="hidden"
                                            value="{{ $trip->destination_city_code }}">
                                        <input name="destination_city_name" id="destination_city_name" type="hidden"
                                            value="{{ $trip->destination_city_name }}">
                                        <input name="trip_id" type="hidden" value="{{ $trip->id }}">
                                        <div id="hotel-search-result-container" class=" invisible"
                                            style="background-color: white;position: relative">

                                            <div id="results" class="p-2"
                                                style="position: absolute;top: 0px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                            </div>

                                        </div>
                                        <input class="datepicker form-control" id="popup-datepicker" autocomplete="off"
                                            name="startdate"
                                            value="{{ Carbon\Carbon::parse($trip->start_date)->format('m/d/Y') }}">
                                        <input class="datepicker form-control" id="popup-datepicker-two" autocomplete="off"
                                            name="enddate"
                                            value="{{ Carbon\Carbon::parse($trip->end_date)->format('m/d/Y') }}">
                                        <textarea class="form-control" rows="3" name="description"
                                            placeholder="Description">{{ $trip->description }}</textarea>
                                        <div class="form-group form-check mb-0">
                                            <input name="should_book" {{ $trip->should_book ? 'selected' : '' }}
                                                type="checkbox" class="form-check-input" id="exampleCheck1">
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
                                        <img src="{{ $trip->trip_img ? asset('storage/' . $trip->trip_img) : asset('images-n/upload.png') }}"
                                            id="preview" alt="img-fluid">
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
                                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
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
                                    <button type="submit" class="btn btn-primary">Send Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Trip Banner Start -->
    <section class="trip-banner-area overview-banner-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Fund My Trip</a></li>
                            <li><img src="{{ asset('images/icons/small-arrow.png') }}" alt=""></li>
                            <li><a href="#">{{ $trip->destination }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trip-banner-col">
                        <div class="trip-left-box">
                            <div class="trip-left-box-content" style="position: relative">
                                <h2>{{ $trip->title }} <a data-toggle="collapse" href="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <img src="{{ asset('images-n/dot.png') }}" alt="" class="img-fluid">
                                    </a>
                                </h2>
                                <div class="collapse" id="collapseExample"
                                    style="position: absolute; top: 90px; right: 50px;z-index:1000;">
                                    <div class="card card-body" style="border-radius:0px;">

                                        @if (Auth::check() && ($trip->user->id === Auth::id() || Auth::user()->isAdmin))
                                            <div>
                                                <a style="border-radius: 0px;" href="#" role="button" data-toggle="modal"
                                                    data-target="#createTripModal"> <span style="color:#23242C;"> <img
                                                            style="width: 21px;"
                                                            src="{{ asset('images-n/icons-2/edit.png') }}"> Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <hr>
                                            <div>
                                                <a href="#"> <span style="color:#23242C;"> <img style="width: 21px;"
                                                            src="{{ asset('images-n/icons-2/delete.png') }}"> Delete
                                                    </span>
                                                </a>
                                            </div>
                                            <hr>
                                        @else

                                            @if (Auth::check())

                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#reportModal"
                                                        data-violating-object="trip"
                                                        data-violating-object-id="{{ $trip->id }}"> <span
                                                            style="color:#23242C;"> <i class="far fa-flag"></i> Report
                                                        </span>
                                                    </a>
                                                </div>
                                                <hr>
                                            @endif

                                        @endif

                                        <div>
                                            <a href="#" data-toggle="modal" data-target="#socialMediaShare"
                                                data-link="{{ url()->full() }}">
                                                <span style="color: #23242C"> <i style="color: #23242C"
                                                        class="fas fa-share-alt"></i> Share </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <p>
                                    <span>Posted</span>
                                    @include('custom-components.remaining-time', ['date' => $trip->created_at ])
                                </p>
                                <div class="tourist-name">
                                    <div class="tourist-pic">
                                        <img src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                            alt="" class="img-fluid"
                                            style="width: 70px;height:70px;display:block;object-fit:cover;object-position:center;">
                                        <p>{{ $trip->user->name }}</p>
                                        <span>{{ $trip->destination }}</span>
                                    </div>
                                    {{-- <h3><img src="images/icons/link.png" alt="" class="img-fluid"> Male</h3> --}}
                                </div>
                                <div class="date-boxs">
                                    <div class="date-box">
                                        <p>From</p>
                                        <span><img src="{{ asset('images-n/icons/date-pink.png') }}" alt="">
                                            {{ \Carbon\Carbon::parse($trip->start_date)->format('Y-m-d') }}</span>
                                    </div>
                                    <div class="date-box">
                                        <img src="{{ asset('images-n/icons/right-arrow-white.png') }}" alt="">
                                    </div>
                                    <div class="date-box">
                                        <p>To</p>
                                        <span><img src="{{ asset('images-n/icons/date-pink.png') }}" alt="">
                                            {{ \Carbon\Carbon::parse($trip->end_date)->format('Y-m-d') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dis-block-991">
                            <img src="{{ asset('images-n/bg/2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview Start -->
    <section class="overview-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-col">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
                            </li>
                            @if ($owner)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Join Requests <span
                                            style="color:darkgray;">{{ $unanswered_requests->count() }}</span></a>
                                </li>
                            @endif
                            @if ($owner || $is_member)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">Trip Members
                                        <span>{{ $trip_members->count() }}</span></a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#plan-trip-2"
                                        role="tab" aria-controls="pills-plantrip2" aria-selected="false">Trip Plan</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="overview-tab-content">
                                    <div style="display: flex; justify-content:space-between;">
                                        <div class="overview-tab-text">
                                            <h4>{{ $trip->title }}</h4>
                                            <p>{{ $trip->description }}</p>
                                            @if ($owner || $is_member)
                                                <a href="{{ route('trip-status-view', $trip->id) }}"
                                                    class="btn btn-primary">You're A Member Of This Trip Now - Click Here To
                                                    Book Your Trip!</a>
                                            @elseif($user_applied)
                                                <a href="#" class="btn btn-primary">You have requested to join this
                                                    trip!</a>

                                            @else
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#{{Auth::check() ? 'exampleModal-two' : 'sign-in-required-popup'}}">Request To Join</a>
                                            @endif

                                        </div>
                                        <div class="overview-tab-map">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.9998252687506!2d34.80370561452169!3d31.879421436515305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502b76deb98ee23%3A0xde654c9bb5440708!2sRaoul+Wallenberg+St+8%2C+Rehovot%2C+Israel!5e0!3m2!1sen!2sbd!4v1534417481016"
                                                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen
                                                class="google-map"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($owner)
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="overview-tab-content">
                                        @foreach ($unanswered_requests as $r)
                                            <div class="tourist-person-box">
                                                <div class="tourist-person-info">
                                                    <div class="tourist-person-info-box">
                                                        <img src="{{ $r->user->profile->picture_url ? asset('storage/' . $r->user->profile->picture_url) : $default_profile_picture }}"
                                                            alt="" class="img-fluid person-img">
                                                        <h3>{{ $r->user->name }}</h3>
                                                        {{-- <div class="small-box">
                                                            <p>Cost of the trip</p>
                                                            <h5><img src="{{ asset('images-n/icons/amount.png') }}"
                                                                    alt="">
                                                                $1200
                                                            </h5>
                                                        </div> --}}
                                                        <div class="small-box">
                                                            <p>Origin Country</p>
                                                            <h5><img src="{{ asset('images-n/icons/map.png') }}" alt="">
                                                                {{ $r->country }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="tourist-person-buttons">

                                                        <p><span>Recevied</span>
                                                            @include('custom-components.remaining-time', ['date' =>
                                                            $r->created_at])

                                                        </p>

                                                        <button id="accept-{{ $r->id }}"
                                                            onclick="acceptJoinRequest({{ $r->id }})" type="submit"
                                                            class="btn btn-primary">Accept
                                                        </button>
                                                        <button id="decline-{{ $r->id }}"
                                                            onclick="rejectJoinRequest({{ $r->id }})" type="submit"
                                                            class="btn btn-primary reject-btn">Reject
                                                        </button>

                                                        <button id="accepted-{{ $r->id }}" type="submit"
                                                            class="btn btn-primary invisible">Accepted</button>


                                                        <button id="declined-{{ $r->id }}" type="button"
                                                            class="btn btn-primary reject-btn invisible">Rejected
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="person-discribe">
                                                    <h6>Message</h6>
                                                    <p>{{ $r->message }}</p>
                                                </div>
                                                <a style="cursor: pointer;" onclick="start_chat({{ $r->user->id }})"
                                                    class="btn  btn-primary  static-anchor custom-primary"><i
                                                        class="far fa-comment"></i> Start Chat</a>
                                            </div>
                                        @endforeach
                                        {{-- <div class="tourist-person-box">
                                              <div class="tourist-person-info">
                                                  <div class="tourist-person-info-box">
                                                      <img src="{{asset('images-n/man2.jpg')}}" alt=""
                                                           class="img-fluid person-img">
                                                      <h3>John Doe</h3>
                                                      <div class="small-box">
                                                          <p>Cost of the trip</p>
                                                          <h5><img src="{{asset('images-n/icons/amount.png')}}" alt=""> $1200
                                                          </h5>
                                                      </div>
                                                      <div class="small-box">
                                                          <p>Origin Country</p>
                                                          <h5><img src="{{asset('images-n/icons/map.png')}}" alt=""> Germany
                                                          </h5>
                                                      </div>
                                                  </div>
                                                  <div class="tourist-person-buttons">
                                                      <p><span>Recevied</span> 2 Hours Ago</p>
                                                      <button type="submit" class="btn btn-primary">Accept</button>
                                                      <button type="submit" class="btn btn-primary reject-btn">Reject</button>
                                                  </div>
                                              </div>
                                              <div class="person-discribe">
                                                  <h6>Message</h6>
                                                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                      eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                      voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                                                      clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                                      amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                      nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                                                      sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                                      rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                                                      ipsum dolor sit amet.orem ipsum dolor sit amet, consetetur sadipscing
                                                      elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                                                      aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                                      dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                                                      est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                                      sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                                      dolore magna aliquyam erat, sed di</p>
                                              </div>
                                          </div> --}}
                                    </div>
                                </div>
                            @endif

                            @if ($owner || $is_member)
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="overview-tab-content">

                                        <div class="row m-0 p-0">
                                            @foreach ($trip_members as $member)
                                                <div class="col-lg-12">

                                                    <div class="tourist-person-box">
                                                        <div class="tourist-person-info">
                                                            <div class="tourist-person-info-box">
                                                                <img src="{{ $member->user->profile->picture_url ? asset('storage/' . $member->user->profile->picture_url) : $default_profile_picture }}"
                                                                    alt="" class="img-fluid person-img">
                                                                <h3>{{ $member->user->name }}</h3>
                                                                {{-- <div class="small-box">
                                                                <p>Cost of the trip</p>
                                                                <h5><img src="{{ asset('images-n/icons/amount.png') }}"
                                                                        alt="">
                                                                  {{$member->cost}}
                                                                </h5>
                                                            </div> --}}
                                                                <div class="small-box">
                                                                    <p>Origin Country</p>
                                                                    <h5><img src="{{ asset('images-n/icons/map.png') }}"
                                                                            alt="">
                                                                        {{ $member->country }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="tourist-person-buttons tourist-person-buttons-two">

                                                                <p><span>Recevied</span>

                                                                    @include('custom-components.remaining-time', ['date' =>
                                                                    $member->created_at])


                                                                </p>

                                                                @if ($member->user->id == Auth::id())
                                                                    <a href="{{ route('trip-status-view', $trip->id) }}"
                                                                        class="btn btn-primary">Trip Status</a>
                                                                @endif
                                                                {{-- <button type="submit" class="btn btn-primary reject-btn"><img
                                                                    src="{{ asset('images-n/icons/delete.png') }}"
                                                                    alt=""></button> --}}
                                                            </div>
                                                        </div>
                                                        <div class="person-discribe">
                                                            @if ($owner && $member->user->id !== Auth::id())
                                                                <h6>Message</h6>
                                                                <p style="width: 100%;">{{ $member->message }}</p>
                                                                <a href="#" onclick="start_chat({{ $member->user->id }})"
                                                                    class="btn  btn-primary  static-anchor custom-primary"><i
                                                                        class="far fa-comment"></i> Start Chat</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>








                                            @endforeach
                                        </div>
                                    </div>




                                </div>

                                <div class="tab-pane fade" id="plan-trip-2" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div class="overview-tab-content">


                                            @foreach ($trip_members as $member)
                                            <div class="tourist-person-box tourist-person-box-two tourist-person-box-three">
                                                <div class="tourist-person-info">
                                                    <div class="tourist-person-info-box">
                                                        <img src="{{ $member->user->profile->picture_url ? asset('storage/' . $member->user->profile->picture_url) : $default_profile_picture }}" alt="" class="img-fluid person-img">
                                                        <h3>{{$member->user->name}}</h3>
                                                       {{--  <div class="small-box">
                                                            <p>Cost of the trip</p>
                                                            <h5><img src="/images-n/icons/amount.png" alt=""> $1200</h5>
                                                        </div> --}}
                                                        <div class="small-box">
                                                            <p>Origin Country</p>
                                                            <h5><img src="/images-n/icons/map.png" alt=""> {{$member->country}}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="tourist-person-buttons tourist-person-buttons-two">
                                                        <p><span>Accepted </span> {{-- @include('custom-components.remaining-time' , ['date' => $member->updated_at]) --}}</p>
                                                    @if($member->user->id == Auth::id())
                                                        <button type="submit" class="btn btn-primary"><img
                                                                src="/images-n/icons/plus.png" alt=""> Add Hotel</button>
                                                        <button type="submit" class="btn btn-primary"><img
                                                                src="/images-n/icons/plus-2.png" alt=""> Add Flight</button>
                                                                @endif
                                                    </div>
                                                </div>
                                                <div class="ticket-table">
                                                    <div class="ticket-table-top">
                                                        <div class="ticketleft">
                                                            <h5>Dubai (DXB) <img src="/images-n/icons/airplane.png" alt="">
                                                                London (LHR)</h5>
                                                            <p>Booking ID #5185454</p>
                                                        </div>
                                                        <div class="ticketright">
                                                            <h3>Etihad <a href="#"><img src="/images-n/icons/dot.png"
                                                                        alt=""></a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="ticket-table-box">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span>Passenger</span>
                                                                            <p>Andra Subagyo <span>( 2 Adult, 1 Child
                                                                                    )</span></p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Class</span>
                                                                            <p>Economy</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Flight No.</span>
                                                                            <p>VA79</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Time</span>
                                                                            <p>09.00</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Flight Date</span>
                                                                            <p>Jun, 16 2021</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="ticket-table-bottom">
                                                        <div class="ticket-table-btn">
                                                            <button type="button" class="btn btn-primary">Download E
                                                                Ticket</button>
                                                        </div>
                                                        <div class="ticket-table-price">
                                                            <h3>$300</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-table">
                                                    <div class="ticket-table-top">
                                                        <div class="ticketleft">
                                                            <h5>Dubai (DXB) <img src="/images-n/icons/airplane.png" alt="">
                                                                London (LHR)</h5>
                                                            <p>Booking ID #5185454</p>
                                                        </div>
                                                        <div class="ticketright">
                                                            <h3>Etihad <a href="#"><img src="/images-n/icons/dot.png"
                                                                        alt=""></a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="ticket-table-box">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <span>Passenger</span>
                                                                            <p>Andra Subagyo <span>( 2 Adult, 1 Child
                                                                                    )</span></p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Class</span>
                                                                            <p>Economy</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Flight No.</span>
                                                                            <p>VA79</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Time</span>
                                                                            <p>09.00</p>
                                                                        </td>
                                                                        <td>
                                                                            <span>Flight Date</span>
                                                                            <p>Jun, 16 2021</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="ticket-table-bottom">
                                                        <div class="ticket-table-btn">
                                                            <button type="button" class="btn btn-primary">Download E
                                                                Ticket</button>
                                                        </div>
                                                        <div class="ticket-table-price">
                                                            <h3>$300</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach



                                        </div>
                                        <div class="plan-activities">
                                            <h5>Plan Activities</h5>
                                            <h4>Day 1</h4>
                                            <div class="activities-cols">
                                                <div class="activities-col-1">
                                                    <p>Start & End Time</p>
                                                    <p>14:30 - 16:00</p>
                                                </div>
                                                <div class="activities-col-2">
                                                    <img src="/images-n/icons/arrow-circle.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="activities-col-3">
                                                    <div class="activities-discrib-box mb-0">
                                                        <h6>Lorem Ipousm <a href="#"><img src="/images-n/icons/dot.png"
                                                                    alt=""></a></h6>
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                            nonumy eirmod</p>
                                                        <img src="/images-n/img1.jpg" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="activities-cols">
                                                <div class="activities-col-1">
                                                    <p>Start & End Time</p>
                                                    <p>14:30 - 16:00</p>
                                                </div>
                                                <div class="activities-col-2">
                                                    <div class="withline">
                                                        <img src="/images-n/icons/arrow-circle.png" alt=""
                                                            class="img-fluid">
                                                    </div>

                                                </div>
                                                <div class="activities-col-3">
                                                    <div class="activities-discrib-box">
                                                        <h6>Lorem Ipousm <a href="#"><img src="/images-n/icons/dot.png"
                                                                    alt=""></a></h6>
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                            nonumy eirmod</p>
                                                    </div>
                                                    <div class="activities-discrib-btns">
                                                        <button type="button" class="btn btn-primary">Add New
                                                            Activity</button>
                                                        <button type="button" class="btn btn-primary">Add Day</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="plan-activities">
                                            <h4>Day 2</h4>
                                            <div class="activities-cols">
                                                <div class="activities-col-1">
                                                    <p>Start & End Time</p>
                                                    <p>14:30 - 16:00</p>
                                                </div>
                                                <div class="activities-col-2">
                                                    <img src="/images-n/icons/arrow-circle.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="activities-col-3">
                                                    <div class="activities-discrib-box">
                                                        <h6>Lorem Ipousm <a href="#"><img src="/images-n/icons/dot.png"
                                                                    alt=""></a></h6>
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                            nonumy eirmod</p>
                                                    </div>
                                                    <div class="activities-discrib-btns">
                                                        <button type="button" class="btn btn-primary">Add New
                                                            Activity</button>
                                                        <button type="button" class="btn btn-primary">Add Day</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Trips Slider Start -->
    <section class="trips-slider-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trips-slider-col">
                        <h4>Similar Trips</h4>
                        <div class="trips-slider">
                            <div class="trips-col found-trip-col">
                                <div class="trips-img">
                                    <img src="{{ asset('images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>{{ $trip->user->name }}</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                {{ $trip->start_date }}</li>
                                            <li><span>to</span></li>
                                            <li>{{ $trip->end_date }}</li>
                                        </ul>
                                    </div>
                                    <div class="trip-button-links">
                                        <a href="#" class="view-link">View More <img
                                                src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>

                                        <a href="#" class="join-btn-link" data-toggle="modal"
                                        data-target="#{{Auth::check() ? 'exampleModal-two' : 'sign-in-required-popup'}}">Request To Join</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->

    {{-- <div class="custom-responsive-margin">
            <div class="d-flex flex-column w-100">
                <div class=" ml-2 ml-lg-3 p-0 mt-4 mt-lg-3 mx-0 mb-4">
                    <a class="breadcrumb-link" href="{{route('trips-browse')}}">Fund My Trip</a>
                    <img src="{{asset('img/navbar/next.svg')}}">
                    <a class="breadcrumb-link-active" href="#">{{$trip->title}}</a>
                </div>
                <div class="p-lg-3">
                    <div class="container-fluid py-lg-2 px-lg-4" style="border: #D2D2D2 solid 1px">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 p-3 px-lg-5  py-lg-5 mr-lg-0 pr-lg-0"
                                 style="background-color: #000941;">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h1 style="color:white;font-size: 28px;font-weight: bolder">{{$trip->destination}}</h1>
                                        <span style="color: white;opacity: 0.62">Posted </span>
                                        <span style="color: white;">2 Hours Ago </span>
                                    </div>
                                    <div>
                                        <button class="c-button" style="cursor: pointer;"><img
                                                src="{{asset('img/universal/three-vertical-dots.svg')}}"/></button>
                                    </div>
                                </div>
                                <div class="py-3 d-flex flex-row">
                                    <div><img src="{{asset('img/placeholder/profile.png')}}" class="img-fluid"
                                              style="width:62px;border-style: solid;border-color:white;border-width: 5px;"/>
                                    </div>
                                    <div class="ml-2 d-flex flex-column justify-content-center align-items-left">
                                        <div><span
                                                style="color: #FE2F70;font-weight: bold;font-size:18px;">{{$trip->user->name}}</span>
                                        </div>
                                        <div><span style="color: white;font-size:18px;">{{$trip->title}}</span></div>

                                    </div>

                                </div>
                                <hr style="width: 100%;border: white solid 1px;opacity: 0.35;">
                                <div>

                                    <div class="d-flex flex-row align-items-center justify-content-around">
                                        <div>
                                            <span style="color: white">From</span> <br>
                                            <img src="{{asset('img/trips/calendar-pink.svg')}}"/> <span
                                                style="color: white">{{$trip->start_date}} </span>
                                        </div>
                                        <div>
                                            <span style="color:white;"> <img
                                                    src="{{asset('img/icons/right-arrow-white.png')}}"/> </span>
                                        </div>
                                        <div>
                                            <span style="color: white">To</span> <br>
                                            <img src="{{asset('img/trips/calendar-pink.svg')}}"/> <span
                                                style="color: white">{{$trip->end_date}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-6 m-0 p-0 img-custom2">


                            </div>


                        </div>
                    </div>

                </div>
            </div>


            <div class="p-lg-3">
                    <div class="p-2" style="border: #D2D2D2 solid 1px">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home"
                                   aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false">Join Requests </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="contact" aria-selected="false">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trip-members" data-toggle="tab" href="#tripmembers" role="tab"
                                   aria-controls="tripmembers" aria-selected="false">Trip Members</a>
                            </li>
                        </ul>
                        <div class="tab-content p-lg-5 p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div>
                                    <h1 class="trip-title">
                                        {{$trip->title}}
                                    </h1>
                                </div>

                                <div>
                                    <h2 class="trip-description">
                                        {{$trip->description}}
                                    </h2>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container-fluid ">
                                    <div class="row">


                                        @foreach ($unanswered_requests as $r)
                                            <div class="col-lg-6 p-lg-4" style="background-color: #F9F9F9">
                                                <div class="row">
                                                    <div class="col-lg-4"><img
                                                            src="{{asset('img/placeholder/placeholder3.png')}}" width="100%"
                                                            style="object-fit: cover"/></div>
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <div
                                                                class="row justify-content-lg-center align-items-lg-center">
                                                                <div class="col-lg-6">
                                                        <span
                                                            style="color:#23242C; font-size: 29px;font-family: GilroyExtraBold">{{$r->user->name}}</span>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <span
                                                                        style="color:#23242C; opacity: 0.56">Received</span>
                                                                    <span style="color:#23242C;">2 Hours Ago</span>

                                                                </div>
                                                            </div>
                                                            <div class="mt-3 d-flex flex-row justify-content-between">
                                                                <div>
                                                            <span
                                                                style="color:#23242C; opacity: 0.41">Cost&nbsp;of&nbsp;the&nbsp;trip</span>
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <img
                                                                            src="{{asset('img/universal/price-tag.svg')}}"/>&nbsp;&nbsp;<span
                                                                            style="color:#000941;font-family: GilroyExtraBold">{{$r->cost}} $</span>
                                                                    </div>
                                                                </div>

                                                                <div class="ml-4">
                                                            <span
                                                                style="color:#23242C; opacity: 0.41">Origin&nbsp;Country</span>
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <img src="{{asset('img/universal/earth.svg')}}"/>&nbsp;&nbsp;<span
                                                                            style="color:#000941;font-family: GilroyExtraBold">{{$r->country}}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="ml-4">
                                                                    <button id="accept-{{$r->id}}"
                                                                            onclick="acceptJoinRequest({{$r->id}})"
                                                                            class="btn btn-success m-2">Accept
                                                                    </button>
                                                                    <button id="decline-{{$r->id}}"
                                                                            onclick="rejectJoinRequest({{$r->id}})"
                                                                            class="btn btn-danger m-2">Decline
                                                                    </button>
                                                                    <button
                                                                        onclick="start_chat({{$r->user->id}},'{{$r->user->name}}')"
                                                                        class="btn btn-secondary m-2"><i
                                                                            class="far fa-comment"></i>&nbsp;Chat
                                                                    </button>

                                                                    <div class="invisible" id="accepted-{{$r->id}}">
                                                                        <span
                                                                            class="badge p-3 badge-success">ACCEPTED</span>
                                                                    </div>
                                                                    <div class="invisible" id="declined-{{$r->id}}">
                                                                        <span class="badge p-3 badge-danger">REJECTED</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div>
                                                    <div class="my-3" style="color: #23242C;font-size:15px;">Message</div>

                                                    <div style="font-size:12px">
                                                        {{$r->message}}  </div>
                                                </div>
                                            </div>



                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                            <div class="tab-pane fade" id="tripmembers" role="tabpanel" aria-labelledby="tripmembers">

                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <div>
                        <h1 class="trip-title my-3 mx-4">
                            Similar Trips
                        </h1>
                    </div>


                    <div class="container-fluid ">
                        <div class="py-lg-3 px-lg-4" style="border: #D2D2D2 solid 1px">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                                    <div class="card" style="height: 100%;border-radius: 20px;overflow: hidden;">
                                        <img class="card-img-top" src="{{asset('img/placeholder/placeholder.png')}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                            <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                                       href="#">{{   $trip->user->name}}</a></p>
                                            <p class="card-text"><span
                                                    style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                                        src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->start_date}} to {{$trip->end_date}}</span>
                                            </p>
                                            <div class="d-flex flex-row justify-content-around">
                                                <div>
                                                    <a href="{{route('trip-browse', $trip->id)}}"
                                                       style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                                        <span><img src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                                </div>
                                                <div>
                                                    <a href="{{route('trip-request-to-join' , $trip->id)}}" class="btn"
                                                       style="background-color: #FE2F70;color: white;border-radius: 8px;">Request
                                                        To Join</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                                    <div class="card" style="height: 100%;border-radius: 20px;overflow: hidden;">
                                        <img class="card-img-top" src="{{asset('img/placeholder/placeholder.png')}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                            <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                                       href="#">{{   $trip->user->name}}</a></p>
                                            <p class="card-text"><span
                                                    style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                                        src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->start_date}} to {{$trip->end_date}}</span>
                                            </p>
                                            <div class="d-flex flex-row justify-content-around">
                                                <div>
                                                    <a href="{{route('trip-browse', $trip->id)}}"
                                                       style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                                        <span><img src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                                </div>
                                                <div>
                                                    <a href="{{route('trip-request-to-join' , $trip->id)}}" class="btn"
                                                       style="background-color: #FE2F70;color: white;border-radius: 8px;">Request
                                                        To Join</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                                    <div class="card" style="height: 100%;border-radius: 20px;overflow: hidden;">
                                        <img class="card-img-top" src="{{asset('img/placeholder/placeholder.png')}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                            <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                                       href="#">{{   $trip->user->name}}</a></p>
                                            <p class="card-text"><span
                                                    style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                                        src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->start_date}} to {{$trip->end_date}}</span>
                                            </p>
                                            <div class="d-flex flex-row justify-content-around">
                                                <div>
                                                    <a href="{{route('trip-browse', $trip->id)}}"
                                                       style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                                        <span><img src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                                </div>
                                                <div>
                                                    <a href="{{route('trip-request-to-join' , $trip->id)}}" class="btn"
                                                       style="background-color: #FE2F70;color: white;border-radius: 8px;">Request
                                                        To Join</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                                    <div class="card" style="height: 100%;border-radius: 20px;overflow: hidden;">
                                        <img class="card-img-top" src="{{asset('img/placeholder/placeholder.png')}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="font-size: 29px;font-weight: bolder">{{$trip->title}}</h5>
                                            <p class="card-text">by <a style="color:#FE2F70;font-weight: 1000"
                                                                       href="#">{{   $trip->user->name}}</a></p>
                                            <p class="card-text"><span
                                                    style="color: #23242C;font-weight: bold;font-size:1rem;"><img
                                                        src="{{asset('img/trips/calendar.svg')}}"/> {{$trip->start_date}} to {{$trip->end_date}}</span>
                                            </p>
                                            <div class="d-flex flex-row justify-content-around">
                                                <div>
                                                    <a href="{{route('trip-browse', $trip->id)}}"
                                                       style="color: #000941;font-size: 16px;font-weight: bolder">View More
                                                        <span><img src="{{asset('img/trips/arrow.svg')}}"/> </span></a>
                                                </div>
                                                <div>
                                                    <a href="{{route('trip-request-to-join' , $trip->id)}}" class="btn"
                                                       style="background-color: #FE2F70;color: white;border-radius: 8px;">Request
                                                        To Join</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div> --}}
    {{-- <div class="jumbotron">

            <h1 class="display-4">{{$trip->title}}</h1>
            <p class="lead">Posted by <a href="#">{{$trip->user->name}}</a> - {{$trip->destination}}</p>

            <hr class="my-4">
            <p>{{$trip->description}}</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('trip-request-to-join', $trip->id)}}" role="button">Ask To Join</a>
            </p>
        </div> --}}
@endsection
@section('scripts')

    <script>
        function acceptJoinRequest(join_request_id) {
            $.ajax({
                type: 'POST',
                url: '/acceptJoinRequest',
                data: {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'join_request_id': join_request_id
                },
                beforeSend: function() {},
                success: function() {
                    $('#accept-' + join_request_id).addClass('invisible');
                    $('#decline-' + join_request_id).addClass('invisible');
                    $('#accepted-' + join_request_id).removeClass('invisible');
                },
                error: function() {},
                complete: function() {}
            });
        }

        function rejectJoinRequest(join_request_id) {
            $.ajax({
                type: 'POST',
                url: '/rejectJoinRequest',
                data: {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'join_request_id': join_request_id
                },
                beforeSend: function() {},
                success: function() {
                    $('#accept-' + join_request_id).addClass('invisible');
                    $('#decline-' + join_request_id).addClass('invisible');
                    $('#declined-' + join_request_id).removeClass('invisible');
                },
                error: function() {},
                complete: function() {}
            });
        }
    </script>



    <script type="text/javascript">
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


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }

        // trips-slider
        if ($('.trips-slider').length) {
            $('.trips-slider').owlCarousel({
                loop: true,
                margin: 15,
                dots: true,
                nav: true,
                autoplayHoverPause: false,
                autoplay: true,
                autoplayTimeout: 4000,
                smartSpeed: 800,
                center: false,
                navText: [
                    '<img src="{{ asset('images-n/icons/left-arrow-white.png') }}" alt="">',
                    '<img src="{{ asset('images-n/icons/right-arrow-white.png') }}" alt="">'
                ],
                responsive: {
                    0: {
                        items: 1,
                        center: false
                    },
                    480: {
                        items: 1,
                        center: false
                    },
                    600: {
                        items: 1,
                        center: false
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })
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
