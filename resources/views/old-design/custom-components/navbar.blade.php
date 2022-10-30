@php
use App\Models\User;
use Carbon\Carbon;
@endphp


<div class="topnav" id="myTopnav">
    <div class="wrapper-full">
        <div class="flex space-between vcenter flex-wrap">
            <button class="icon" onclick="myFunction()">
                <img src="/image/hamburger.svg" style="height: 16px;" />
            </button>
            <a href="/" class="brand">
                <img src="/image/trippbo-new.png">
            </a>
            <div class="menus">
                <a href="{{ route('home') }}">BOOK A TRIP</a>
                <a href="{{ route('trips-browse') }}">FUND MY TRIP</a>
                <a href="{{ route('solos-browse') }}">FUND MY TRIP <span>SOLO</span></a>
                <a href="{{ route('ticket-lottery-home') }}">TICKETS LOTTERY</a>
            </div>
            <div class="headerOpt-right">
                @guest
                    <div class="header-buttons">
                        <a class="p-0 text-center" href="{{ route('login') }}" style="border-radius: 15px;">Sign In</a>
                        <a class="p-0 text-center" href="{{ route('register') }}" style="border-radius: 15px;">Sign Up</a>
                    </div>
                @endguest
                @auth

                    <ul>
                        <li>
                            <div class="bell-dropdown">
                                <div class="bell" style="cursor: pointer">
                                    <img src="/image/bell.svg" />
                                    <div></div>
                                </div>
                                <div class="bell-dropdown-content">
                                    <div class="w-100">
                                        @if (count($user_notifications) == 0)
                                            <div class="w-100 d-flex justify-content-center align-items-center h-100">
                                                <div style="font-weight: bolder;">No new notifications!</div>

                                            </div>

                                        @else
                                            <p class="bell-dropdown-list-heading gilroy-medium font-16">Notifications</p>
                                            <ul>

                                                @foreach ($user_notifications as $notification)
                                                    <li onclick="window.location = '{{ $notification->data['link'] }}'">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex ">
                                                                    <div class="mr-2"><span
                                                                            class="bell-dropdown-badge"><img
                                                                                src="/image/64416.png" alt="" /></span>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <p class="gilroy-medium font-12 mb-0">
                                                                                {{ $notification->data['title'] }}</p>
                                                                            {{-- <p class="mb-0"><span class="gilroy-medium font-12 opacity-50">From</span> <span class="gilroy-medium font-12 opacity-50">12/05/2021 - 20/05/2021</span></p> --}}
                                                                        </div>
                                                                        <div>
                                                                            <p class="gilroy-medium font-12 mb-0">
                                                                                {{ $notification->data['text'] }}</p>
                                                                            {{-- <p class="mb-0"><span class="gilroy-medium font-12 opacity-50">From</span> <span class="gilroy-medium font-12 opacity-50">12/05/2021 - 20/05/2021</span></p> --}}
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                            @php
                                                                $notification_datetime = new Carbon($notification->created_at);
                                                                $difference = Carbon::now()
                                                                    ->subtract($notification_datetime)
                                                                    ->diffForHumans();
                                                            @endphp
                                                            <div>
                                                                <p class="gilroy-medium font-10 opacity-50 mb-0">
                                                                    {{ $difference }}</p>
                                                            </div>
                                                        </div>

                                                    </li>

                                                @endforeach

                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="messages">
                            <div class="bell-dropdown">
                                <div class="messages" style="color:white;cursor:pointer;">
                                    Messages
                                    {{-- <img src="/image/bell.svg" /> --}}
                                    <div></div>
                                </div>
                                <div class="bell-dropdown-content">
                                    <div class="w-100">

                                        @if (count($user_messages) == 0)
                                            <div class="w-100 d-flex justify-content-center align-items-center h-100">
                                                <div style="font-weight: bolder;">You have no messages yet!</div>

                                            </div>

                                        @else

                                            <p class="bell-dropdown-list-heading gilroy-medium font-16">Messages</p>
                                            <ul>
                                                @foreach ($user_messages as $message)
                                                    <?php
                                                    $last_message = $message;

                                                    $last_message_user_id = $message['sender_id'];

                                                    if ($last_message_user_id == Auth::id())
                                                    {
                                                        $last_message_user_id = $message['receiver_id'];
                                                    }

                                                    $r = User::findOrFail($last_message_user_id);
                                                    ?>
                                                    <li onclick="start_chat({{ $r->id }})">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex ">
                                                                    <div class="mr-2"><span
                                                                            class="bell-dropdown-badge"><img
                                                                                src="{{ $r->profile->picture_url ? asset('storage/' . $r->profile->picture_url) : $default_profile_picture }}"
                                                                                alt="" /></span>
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <p class="gilroy-medium font-12 mb-0">
                                                                                {{ $r->name }}</p>
                                                                            {{-- <p class="mb-0"><span class="gilroy-medium font-12 opacity-50">From</span> <span class="gilroy-medium font-12 opacity-50">12/05/2021 - 20/05/2021</span></p> --}}
                                                                        </div>
                                                                        <div>
                                                                            <p class="gilroy-medium font-12 mb-0">
                                                                                {{ $message['last_message'] }}</p>
                                                                            {{-- <p class="mb-0"><span class="gilroy-medium font-12 opacity-50">From</span> <span class="gilroy-medium font-12 opacity-50">12/05/2021 - 20/05/2021</span></p> --}}
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                            @php
                                                                $notification_datetime = new Carbon($notification->created_at);
                                                                $difference = Carbon::now()
                                                                    ->subtract($notification_datetime)
                                                                    ->diffForHumans();
                                                            @endphp
                                                            <div>
                                                                <p class="gilroy-medium font-10 opacity-50 mb-0">
                                                                    {{ $difference }}</p>
                                                            </div>
                                                        </div>

                                                    </li>

                                                @endforeach

                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="messages"><a href="javascript:void(0)">Messages</a></li> --}}
                        <li class="avatar">
                            <a data-toggle="collapse" href="#navbar-user-menu">
                                {{ $username }} <img src="/image/caret-down-white.svg" style="height:14px">
                            </a>
                            <img src="{{ $profile_picture_url ? asset('storage/' . $profile_picture_url) : $default_profile_picture }}"
                                style="width:45px;height:45px;object-fit:cover;" class="avatar_rounded ">

                            <div class="collapse" id="navbar-user-menu"
                                style="position: absolute; top: 90px; right: 50px;z-index: 1000;">
                                <div class="card card-body " style="box-shadow: 0px 0px 6px #00000029;">

                                    @if ($user_balance > 0)
                                        <div class=" text-center  mb-2">
                                            Balance
                                            <br>
                                            <a style="font-size:14px;color: #23242C;" href="#" class="text-center">
                                                €{{ number_format($user_balance, 2) }} EUR
                                            </a>
                                        </div>
                                        <hr>
                                    @endif

                                    @if ($isAdmin)
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <a class="py-0" style="font-size:14px;color: #23242C;"
						{{-- href="{{ route('admin-home') }}"> --}}
                                                href="/nova">
                                                <i class="fas fa-user-shield"></i> Admin Panel
                                            </a>
                                        </div>
                                    @endif

                                    <div class="d-flex flex-row align-items-center mb-2">
                                        <a class="py-0" style="font-size:14px;color: #23242C;"
                                            href="{{ url('/fascia') }}">
                                            <i class="fas fa-book mr-2"></i>Manage Booking
                                        </a>
                                    </div>

                                    <div class="d-flex flex-row align-items-center">
                                        <a class="py-0" style="font-size:14px;color: #23242C;"
                                            href="{{ route('profile-home', \Illuminate\Support\Facades\Auth::id()) }}">
                                            <img src="{{ asset('images-n/icons/profile.svg') }}"> Profile
                                        </a>
                                    </div>

                                    <div style="margin-top:10px;margin-bottom:10px;">
                                        <a style="font-size:14px;color: #23242C;"
                                            href="{{ route('profile-personal-information') }}">
                                            <img src="{{ asset('images-n/icons/settings.svg') }}"> Settings
                                        </a>
                                    </div>
                                    <div>
                                        <a style="font-size:14px;color: #23242C;" href="{{ route('logout') }}">
                                            <img src="{{ asset('images-n/icons/logout.svg') }}"> Log out
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>



                @endauth
            </div>
        </div>
    </div>
</div>
