@extends('layout')


@section('head')
    <link href="{{ asset('css-n/lottery.css') }}" rel="stylesheet">

    <!-- lottery Responsive CSS -->
    <link href="{{ asset('css-n/lottery-responsive.css') }}" rel="stylesheet">
@endsection
@section('content')


    <section class="lottery-banner-area background-image" data-src="{{ asset('images-n/headers/ticket_lottery.png') }}">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="lottery-banner-col align-items-center">
                        <div class="lottery-banner-col-content">
                            <h2>Buy Lottery<br> ticket</h2>
                            <h3>And Enjoy Free Trips</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lottery Start -->
    <section class="lottery-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-sm-8 custom-padding">
                    <div class="lottery-heading">
                        <h2>Lotteries</h2>
                    </div>
                </div>
                {{-- <div class="col-sm-4 custom-padding">
                    <div class="lottery-heading">
                        <form>
                            <select class="form-control">
                                <option>Best Selling</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                @foreach ($lotteries as $lottery)
                    <div class="col-xl-3 col-lg-6 col-sm-6 custom-padding">
                        <div class="lottery-col">
                            <div class="lottery-img">
                                <img src="{{ asset('storage/' . $lottery->picture_url) }}" alt="" class="img-fluid" style="

                                max-height: 300px;
                                object-fit: cover;
                                object-position: center;">
                                <img src="{{ asset('images-n/lottery/trippbo-logo.jpg') }}" alt=""
                                    class="img-fluid trippbo-logo">
                            </div>
                            <div class="lottery-content">
                                <span>Trip To</span>
                                <h3>{{ $lottery->city }} <span>{{ number_format($lottery->entry_fee, 2) }}$</span></h3>
                                <a href="{{ route('ticket-lottery-view', $lottery->id) }}">View More <img
                                        src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                <img src="{{ asset('images-n/icons/half-round-left.png') }}" alt="" class="half-round-left">
                                <img src="{{ asset('images-n/icons/half-round-right.png') }}" alt=""
                                    class="half-round-right">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
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
    <script type="text/javascript">
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

@endsection
