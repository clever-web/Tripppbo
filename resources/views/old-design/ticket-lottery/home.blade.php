@extends('layout')


@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/tickets-lottery.css" rel="stylesheet">
@endsection
@section('content')


<div class="body-content">
    <div class="bg-hero mb-4"></div>
    <div class="wrapper">
        {{-- <div class="d-flex flex-row-responsive align-items-center justify-content-between mb-4 section-1">
            <div><h4 class="gilroy-medium font-52 mb-0">Lotteries</h4></div>
            <div>
                <div class="inputField-box">
                    <select class="inputField">
                        <option value="1" selected="">Best Selling</option>
                        <option value="2"></option>
                    </select>
                </div>
            </div>
        </div> --}}
        <div class="portfolio-1 mb-5">
            @foreach ($lotteries as $lottery)
            <div style="max-width: 300px;">

                    <figure>
                        <div style="border-top-left-radius: 15px;border-top-right-radius:15px;">
                            <div><img src="/image/63192.png"  alt="" /></div>
                            <img src="{{ asset('storage/' . $lottery->picture_url) }}" style="object-fit:cover;border-radius:15px;" alt="" />
                            <span class="bl"></span>
                            <span class="br"></span>
                        </div>
                        <figcaption style="border-bottom-right-radius: 15px;border-bottom-left-radius:15px;">
                            <span class="tl"></span>
                            <span class="tr"></span>
                            <p class="gilroy-regular font-12 mb-1">{{$lottery->title}}</p>
                            <div class="d-flex justify-content-between">
                                <div><span class="gilroy-semi font-18 text-fe2f70">{{ $lottery->city }} </span></div>
                                <div><span class="gilroy-semi font-18 text-fe2f70">{{ number_format($lottery->entry_fee, 2) }} $</span></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                   <a href="{{ route('ticket-lottery-view', $lottery->id) }}"> <span class="gilroy-semi text-000941 font-16">View More</span></a>
                                    <img class="arrow" src="/image/arrow-right.png" alt="" />
                                </div>
                            </div>
                        </figcaption>
                    </figure>

            </div>
            @endforeach
        </div>
    </div>


</div>
    {{-- <div class="container-fluid p-0 m-0">
        @if ($lotteries->isEmpty())
            <div class="jumbotron">
                <h1 class="display-4">No Lotteries, yet!</h1>
                <p class="lead"></p>
                <hr class="my-4">
                <p>There will be a lot of lottries, very soon!</p>

            </div>

        @else
            @foreach ($lotteries as $lottery)
                <div class="card" style="background-color: #e9ecef;">
                    <div class="card-body">
                        <h5 class="card-title">{{$lottery->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">To {{$lottery->city}}</h6>
                        <p class="card-text">{{$lottery->description}}</p>
                        <div style="width: 200px;">
                            <img id="profile_img" style="width: 100%;max-height: 250px;object-fit: cover;border-radius: 10px;" src="{{Illuminate\Support\Facades\Storage::URL($lottery->picture_url)}}" />

                        </div>
            <a href="{{route('ticket-lottery-view', $lottery->id)}}" class="card-link">View</a>

                    </div>
                </div>
            @endforeach
        @endif


    </div> --}}
@endsection
@section('scripts')

    <script src="js/home/custom.js">
    </script>



@endsection
