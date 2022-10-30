@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{asset('css/trips/trips.css')}}"/>
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your join request has been sent.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



 {{--   <div class="custom-responsive-margin">
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
                                    <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
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
                                    <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
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
                                    <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
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
                                    <p class="card-text"><span style="color: #23242C;font-weight: bold;font-size:1rem;"><img
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

    </div>--}}
    {{--
        <div class="jumbotron">

            <h1 class="display-4">{{$trip->title}}</h1>
            <p class="lead">Posted by <a href="#">{{$trip->user->name}}</a> - {{$trip->destination}}</p>

            <hr class="my-4">
            <p>{{$trip->description}}</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('trip-request-to-join', $trip->id)}}" role="button">Ask To Join</a>
            </p>
        </div>--}}
@endsection
@section("scripts")


@endsection
