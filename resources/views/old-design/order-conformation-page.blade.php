@extends('layout')

@section('head')
    <link href="/css-r/activities/style.css" rel="stylesheet">
    <link href="/css-r/confirm-booking.css" rel="stylesheet">
@endsection

@section('content')
    <div class="body-content">
        <section>
            <div class="wrapper">
                <div class="bg-fafafa border p-3 mb-3">
                    <ul class="list-1">
                        <li>
                            <div class="list-container">
                                <div class="d-flex justify-content-center align-items-center"></div>
                                <div>
                                    <h4 class="gilroy-extra font-16 text-23242c mb-0">{{ $hotel['hotelName'] }}</h4>
                                    @for($x = 0; $x < $hotel['rating'] ; $x++)

                                        <i class="fa fa-star yellow"></i>
                                    @endfor

                                    <div class="container-1">
                                        <div>
                                            <ul class="list-2">
                                                <li>
                                                    <div><b>Address:</b></div>
                                                    <div>{{ $hotel['address'] }}</div>
                                                </li>
                                                {{-- <li>
                                                    <div><b>Phone:</b></div>
                                                    <div>+90 242 514 01 04</div>
                                                </li>
                                                <li>
                                                    <div><b>GPS Coordinates:</b></div>
                                                    <div>N 036° 32.093, E 32° 2.228</div>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <p class="gilroy-medium font-16 text-right mb-0">Booking Confirmation
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-end mb-1">
                                                    <div class="gilroy-medium font-12 text-uppercase mr-2">CONFIRMATION
                                                        NUMBER:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">{{$hotel_order_id}}</div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                              {{--       <div class="gilroy-medium font-12 text-uppercase mr-2">PIN CODE:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">23424</div>
                                               --}}  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr />
                    <div class="grid-1">
                        <div>
                            <h4 class="gilroy-extra font-16 text-23242c text-uppercase mb-2">PRICE</h4>
                            <div class="container-2">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c mb-1">{{$hotel_room_count}} room(s) </p>
                                    <p class="gilroy-regular font-12 text-23242c mb-3">VAT</p>
                                    <p class="gilroy-semi font-12 text-23242c mb-1">Price</p>

                                </div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-1"> {{$hotel['Price']}} {{$hotel['Currency']}}</p>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-3">Included</p>
                                    <p class="gilroy-semi font-12 text-23242c text-right mb-1">{{$hotel['Price']}} {{$hotel['Currency']}}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-IN</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">{{$checkin_date->format('d')}}<br />{{$checkin_date->format('F')}}</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">{{$checkin_date->format('l')}}</p>
                          {{--   <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">14:00 - 00:0</time></p> --}}
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-OUT</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">{{$checkout_date->format('d')}}<br />{{$checkout_date->format('F')}}</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">{{$checkout_date->format('l')}}</p>
                          {{--   <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">14:00 - 00:0</time></p> --}}
                        </div>
                        <div>
                            <div class="grid-2 mb-1">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase text-right mb-0">ROOMS</p>
                                </div>
                                <div></div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase mb-0">NIGHT</p>
                                </div>
                            </div>
                            <div class="grid-2">
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">{{$hotel_room_count}}</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">/</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">{{$hotel['noOfNights']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />

                </div>
                <div class="bg-fafafa border p-3 mb-3">
                    <ul class="list-1">
                        <li>
                            <div class="list-container">
                                <div><img src="/image/rectangle-23.png"></div>
                                <div>
                                    <h4 class="gilroy-extra font-16 text-23242c mb-3">Ozgur Bey Spa Hote</h4>
                                    <div class="container-1">
                                        <div>
                                            <ul class="list-2">
                                                <li>
                                                    <div><b>Address:</b></div>
                                                    <div>Oba Mah. 14.Sok. No:5 Alanya, 07460 Alanya, Turke</div>
                                                </li>
                                                <li>
                                                    <div><b>Phone:</b></div>
                                                    <div>+90 242 514 01 04</div>
                                                </li>
                                                <li>
                                                    <div><b>GPS Coordinates:</b></div>
                                                    <div>N 036° 32.093, E 32° 2.228</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <p class="gilroy-medium font-16 text-right mb-0">Booking Confirmation
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-end mb-1">
                                                    <div class="gilroy-medium font-12 text-uppercase mr-2">CONFIRMATION
                                                        NUMBER:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">2781.502.127</div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="gilroy-medium font-12 text-uppercase mr-2">PIN CODE:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">23424</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr />
                    <div class="grid-1">
                        <div>
                            <h4 class="gilroy-extra font-16 text-23242c text-uppercase mb-2">PRICE</h4>
                            <div class="container-2">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c mb-1">1 room SEK 729</p>
                                    <p class="gilroy-regular font-12 text-23242c mb-3">8 % VAT</p>
                                    <p class="gilroy-semi font-12 text-23242c mb-1">Price</p>
                                    <p class="gilroy-regular font-12 text-23242c mb-0">(for 1 guest )</p>
                                </div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-1">SEK 729</p>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-3">SEK 59</p>
                                    <p class="gilroy-semi font-12 text-23242c text-right mb-1">approx. SEK 788</p>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-0">€ 78.96</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-IN</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">3<br />NOVEMBER</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">Wednesday</p>
                            <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">14:00 - 00:0</time></p>
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-OUT</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">6<br />NOVEMBER</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">Saturday</p>
                            <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">00:00 - 00:0</time></p>
                        </div>
                        <div>
                            <div class="grid-2 mb-1">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase text-right mb-0">ROOMS</p>
                                </div>
                                <div></div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase mb-0">NIGHT</p>
                                </div>
                            </div>
                            <div class="grid-2">
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">1</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">/</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">6</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />

                </div>

                <div class="bg-fafafa border p-3 mb-3">
                    <ul class="list-1">
                        <li>
                            <div class="list-container">
                                <div><img src="/image/rectangle-23.png"></div>
                                <div>
                                    <h4 class="gilroy-extra font-16 text-23242c mb-3">Ozgur Bey Spa Hote</h4>
                                    <div class="container-1">
                                        <div>
                                            <ul class="list-2">
                                                <li>
                                                    <div><b>Address:</b></div>
                                                    <div>Oba Mah. 14.Sok. No:5 Alanya, 07460 Alanya, Turke</div>
                                                </li>
                                                <li>
                                                    <div><b>Phone:</b></div>
                                                    <div>+90 242 514 01 04</div>
                                                </li>
                                                <li>
                                                    <div><b>GPS Coordinates:</b></div>
                                                    <div>N 036° 32.093, E 32° 2.228</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <div class="mb-1">
                                                    <p class="gilroy-medium font-16 text-right mb-0">Booking Confirmation
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-end mb-1">
                                                    <div class="gilroy-medium font-12 text-uppercase mr-2">CONFIRMATION
                                                        NUMBER:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">2781.502.127</div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="gilroy-medium font-12 text-uppercase mr-2">PIN CODE:</div>
                                                    <div class="gilroy-semi text-fe2f70 font-12">23424</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr />
                    <div class="grid-1">
                        <div>
                            <h4 class="gilroy-extra font-16 text-23242c text-uppercase mb-2">PRICE</h4>
                            <div class="container-2">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c mb-1">1 room SEK 729</p>
                                    <p class="gilroy-regular font-12 text-23242c mb-3">8 % VAT</p>
                                    <p class="gilroy-semi font-12 text-23242c mb-1">Price</p>
                                    <p class="gilroy-regular font-12 text-23242c mb-0">(for 1 guest )</p>
                                </div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-1">SEK 729</p>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-3">SEK 59</p>
                                    <p class="gilroy-semi font-12 text-23242c text-right mb-1">approx. SEK 788</p>
                                    <p class="gilroy-regular font-12 text-23242c text-right mb-0">€ 78.96</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-IN</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">3<br />NOVEMBER</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">Wednesday</p>
                            <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">14:00 - 00:0</time></p>
                        </div>
                        <div>
                            <p class="gilroy-regular font-12 text-23242c text-center text-uppercase mb-1">CHECK-OUT</p>
                            <p class="gilroy-extra font-14 text-23242c text-center mb-1">6<br />NOVEMBER</p>
                            <p class="gilroy-regular font-12 text-23242c text-center opacity-60 mb-1">Saturday</p>
                            <p class="d-flex align-items-center justify-content-center mb-0"><img class="icon-12px mr-1"
                                    src="/image/64405.png" alt="" /> <time
                                    class="gilroy-regular font-12 opacity-60 text-23242c">00:00 - 00:0</time></p>
                        </div>
                        <div>
                            <div class="grid-2 mb-1">
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase text-right mb-0">ROOMS</p>
                                </div>
                                <div></div>
                                <div>
                                    <p class="gilroy-regular font-12 text-23242c text-uppercase mb-0">NIGHT</p>
                                </div>
                            </div>
                            <div class="grid-2">
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">1</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">/</p>
                                </div>
                                <div>
                                    <p class="gilroy-extra font-14 text-23242c text-center mb-0">6</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />

                </div>
                <p class="d-flex gilroy-regular font-12 text-23242c mb-0"><img class="icon-20px mr-2"
                        src="/image/64413.png" alt="" /> This print version of your confirmation contains the most important
                    information about your
                    booking. It can be used to check in when you arrive at Ozgur Bey Spa Hotel. For further details, please
                    refer to your confirmation email sent to baselhijazi@live.com.</p>
            </div>
        </section>
    </div>
@endsection
