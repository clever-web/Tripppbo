@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">

    <style>
        .invisible {
            display: none;
        }

        .activity-available-dates-buttons:hover {
            border: #FE2F70 solid 2px;
            cursor: pointer;
        }

        .activity-available-dates-buttons-active {
            border: #FE2F70 solid 2px;
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .loading_visible {
            position: fixed;
            display: none;

        }

        .image {
            width: 25%;
            padding: 5px;
            cursor: pointer;
            object-fit: cover;
        }

        .image_main {
            width: 100%;
            height: 300px;
            cursor: pointer;
            object-fit: cover;
        }

        @keyframes loading {
            from {
                bottom: -100px;
            }

            to {
                bottom: 50px;
                ;
            }
        }

        .loading_visible_active {
            display: block;

            animation: loading 0.5s;
            -moz-animation: loading 0.5s;
            -webkit-animation: loading 0.5s;
            bottom: 50px;

        }

    </style>
    <script src="/js/vue-gallery-slideshow.js"></script>
@endsection
@section('content')
    <div id="activity_sub_vue_app" class="body-content px-1">
        <div class="modal fade" id="picturesModal" tabindex="-1" role="dialog" aria-labelledby="picturesModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="picturesModalTitle">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-y: scroll;max-height:90vh;">
                        <div class="row">
                            <img class="image add-border-radius" v-for="(image, i) in images" :src="image" :key="i"
                                @click="index = i">
                            <vue-gallery-slideshow :images="images" :index="index" @close="index = null">
                            </vue-gallery-slideshow>
                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
                </div>
            </div>
        </div>
        <section class="mb-5 pb-5">
            <div class="wrapper">
                <div class="breadcrumb_">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Activities</a>
                        </li>
                        <li class="breadcrumb-item active">Activity Details</li>
                    </ol>
                    <div class="row section-2 mb-3 add-border-radius">

                        <div id="lightGallery" class="trippbo-grid-data mb-3 mx-0" style="border:none;">





                            <img class="image_main add-border-radius" v-for="(image, i) in images.slice(0,8)" :src="image"
                                :key="i" @click="index = i">
                            <vue-gallery-slideshow :images="images" :index="index" @close="index = null">
                            </vue-gallery-slideshow>

                            <div class="trippbo-btn"><button style="border-radius: 15px !important;" role="button"
                                    data-target="#picturesModal" data-toggle="modal"
                                    class="btn gilroy-semi rounded-0 px-4 py-2"> <span class="text-white font-14">View All
                                        @{{ images.length }} images</span></button></div>
                            {{-- <button class="btn"><i class="fa fa-file-image-o"></i> &nbsp;&nbsp;&nbsp;View All Images</button> --}}
                        </div>
                        {{-- <div class="col-md-6 col-sm-12 pl-2 pr-0 right-image">
                        <div class="row px-2">
                            <div class="col-sm-6 px-2 pb-1">
                                <img src="/image/images2.png"/>
                            </div>
                            <div class="col-sm-6 px-2 pb-1">
                                <img src="/image/images2.png"/>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-sm-6 px-2 pt-1">
                                <img src="/image/images2.png"/>
                            </div>
                            <div class="col-sm-6 px-2 pt-1">
                                <img src="/image/images2.png"/>
                            </div>

                        </div>
                    </div> --}}
                    </div>
                    <div class="row section-2 p-0 mb-3 add-border-radius">
                        <div class="col p-0">
                            <div class="nav-title">
                                <ul class="nav nav-tabs pl-3 gilroy-semi">
                                    <li class="nav-item">
                                        <a class="nav-link active px-2" data-toggle="tab" href="#menu1">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-2" {{-- data-toggle="tab" --}} href="#check_availability">Check
                                            Availability</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-2" {{-- data-toggle="tab" --}} href="#location">
                                            Location</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-2" {{-- data-toggle="tab" --}} href="#reviews">
                                            Reviews</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                    <a class="nav-link px-2" data-toggle="tab" href="#menu3">About this activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" data-toggle="tab" href="#menu4">Cleanliness And Safety</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" data-toggle="tab" href="#menu5">Location and Review</a>
                                </li> --}}
                                </ul>
                            </div>

                            <div class="nav-body">
                                <div class="tab-content">
                                    <div id="menu1" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <div class="d-flex justify-content-start">
                                                    <h4 class="tab-title gilroy-semi">
                                                        {{ $details['ProductName'] }}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5  d-flex justify-content-end ">
                                                <div class="tab-review row  ">
                                                    <div class="col-12 d-flex justify-content-end gilroy-medium">
                                                        @for ($counter = 0; $counter < $details['StarRating']; $counter++)
                                                            <i aria-hidden="true" class="fa fa-star yellow"></i>
                                                        @endfor
                                                        <span class="grey">&nbsp;
                                                            ({{ $details['ReviewCount'] }})</span>
                                                    </div>
                                                    {{-- <div class="col-12 pink gilroy-semi  d-flex justify-content-end">See all review</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                        <div class="col tab-author gilroy-medium">
                                            By <b> ABC Tourism LLC </b>
                                        </div>
                                    </div> --}}
                                        <div class="row">
                                            <div class="col tab-price pink">
                                                <div><b class="gilroy-semi">{{ $details['Price']['TotalDisplayFare'] }}
                                                        {{ $details['Price']['Currency'] }}</b>
                                                    / Adult</div>
                                            </div>
                                        </div>
                                        <div class="row tab-ticket mb-1">
                                            <div class="col">
                                                <a href="#tickets" class="btn add-border-radius">see Tickets</a>
                                            </div>
                                        </div>
                                        <div class="row tab-body p-1">
                                            <div class="col-md-6 col-sm-12 p-2">
                                                <div class=" p-3 part add-border-radius">
                                                    <div class="row ">
                                                        <div class="col gilroy-medium ">
                                                            <b>Features</b>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 ">
                                                            <div>
                                                                <img src="/image/clock.svg" width="20" /><span
                                                                    class="grey font-12">
                                                                    {{ $details['Duration'] }}</span>
                                                            </div>

                                                            <div>
                                                                <img src="/image/double-check.svg" width="20" /><span
                                                                    class="grey font-12">Free cancellation is available
                                                                    until {{ $details['Cancellation_day'] }} days before
                                                                    activity start date.</span>
                                                            </div>
                                                            <div>
                                                                <img src="/image/instant.svg" width="20" /><span
                                                                    class="grey font-12"> Instant confirmation</span>
                                                            </div>
                                                            <div>
                                                                <img src="/image/print.svg" width="20" /><span
                                                                    class="grey font-12">
                                                                    {{ $details['VoucherOption'] }}</span>
                                                            </div>
                                                            {{-- <div>
                                                            <img src="/image/clean.svg" width="20"/><span class="grey font-12"> Cleanliness and safety</span>
                                                        </div> --}}
                                                        </div>
                                                        {{-- <div class="col-sm-12 col-md-5">
                                                        <div>
                                                            <img src="/image/clock.svg" width="20"/><span class="grey font-12"> 1h 30m</span>
                                                        </div>
                                                    </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4 col-sm-12 p-2">
                                            <div class=" p-3 part">
                                                <div class="row">
                                                    <div class="col gilroy-medium">
                                                        <b>Cleaning and safety practices</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div>
                                                            <img src="/image/mask.svg" width="20"/><span class="grey font-12"> Free Cancelation Available</span>
                                                        </div>
                                                        <div>
                                                            <img src="/image/disinfect.svg" width="20"/><span class="grey font-12"> Instant confirmation</span>
                                                        </div>
                                                        <div>
                                                            <img src="/image/ticket.svg" width="20"/><span class="grey font-12"> Print Voucher</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                            <div class="col-md-6 col-sm-12 p-2">
                                                <div class=" p-3 part add-border-radius">
                                                    <div class="row">
                                                        <div class="col gilroy-medium">
                                                            <b>What's Included</b>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <ul class="pl-3 pt-1 line-height-1-5">
                                                                @foreach ($details['Inclusions'] as $additional_info)
                                                                    <li style="list-style-type: disc">
                                                                        <span
                                                                            class="grey font-12">{{ $additional_info }}</span>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu2" class="container tab-pane fade"><br>
                                        <h3>Menu 2</h3>
                                    </div>
                                    <div id="menu3" class="container tab-pane fade"><br>
                                        <h3>Menu 3</h3>
                                    </div>
                                    <div id="menu4" class="container tab-pane fade"><br>
                                        <h3>Menu 4</h3>
                                    </div>
                                    <div id="menu5" class="container tab-pane fade"><br>
                                        <h3>Menu 5</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="check_availability" class="row mb-3 pt-3">
                        <div class="col-sm-12 font-15 d-flex justify-content-between p-0">
                            <div class="font-weight-bold">Availability</div>

                            <vc-date-picker v-model="selectedRange" :min-date='new Date()' color="pink" is-range
                                :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                <template v-slot="{ inputValue, inputEvents }">
                                    <div class="flex justify-center items-center">
                                        <div v-on="inputEvents.start" style="cursor: pointer;position:relative;"
                                            class="pink gilroy-semi"><img src="/image/red-date.svg" width="23">&nbsp;
                                            Change Date




                                        </div>

                                    </div>
                                </template>
                            </vc-date-picker>





                        </div>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3 col-md-2 col-lg-2 col-xl-1 pr-1 pl-0 mb-3" v-for="(day, index) in availableDays">
                        <div class="check-item activity-available-dates-buttons add-border-radius"
                            v-on:click="selectDate(day)"
                            v-bind:class="{'activity-available-dates-buttons-active': selectedDate == day}">
                            <div class="px-2 pt-2 pb-2 ">
                                <div class="check-date font-12 text-center gilroy-medium check-color">
                                    @{{ day }}</div>
                                <div class="check-price font-10 grey text-center gilroy-medium">
                                    @{{ price_at_selected_date }} @{{ currency }}</div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-3 col-md-2 col-lg-2 col-xl-1 pr-1 pl-0 mb-3 ">
                            <div class="check-item activity-available-dates-buttons">
                                <div class="px-2 pt-2 pb-2">
                                    <div class="check-date font-12 text-center gilroy-medium check-color">Tue, 13 Oct</div>
                                    <div class="check-price font-10 grey text-center gilroy-medium">$41</div>
                                </div>
                            </div>
                        </div> --}}

                </div>
                <div v-if="tourGradesLoaded" id="tickets" class="row mb-3 px-0">
                    <div class="col-sm-12 col-lg-6 gilroy-medium pr-1 pl-0 mb-3 " v-for="(grade , index) in tripGrades">
                        <div class="section-2 add-border-radius" style="min-height: 100%;">
                            <div class="row px-2 pt-3 pb-3">
                                <div class="col-sm-12 col-md-7 line-height-3">
                                    <div class="" v-html="grade.gradeDescription">
                                        <br>
                                        <span v-html="grade.gradeDepartureTime">

                                        </span>
                                    </div>
                                    <div class="grey font-12">{{ $details['Location'] }}</div>
                                    <div class="font-12 grey"><img src="/image/clock.svg" width="13">
                                        {{ $details['Duration'] }}</div>
                                    <div class="font-12 line-height-1-5 pt-3">
                                        You
                                        will receive confirmation of your exact timed-ticket entry time after your
                                        booking is confirmed.
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 line-height-3">
                                    <div style="cursor: pointer;" class="d-flex justify-content-end font-12 pt-1"
                                        v-on:click="toggleTravelersCount(index)">@{{ grade.travelersCount }}
                                        Travelers
                                        &nbsp; <i class="fa fa-angle-down font-18  pt-2"></i></div>
                                    <activities-travelers-count :infant_visible="isInfantsAllowed"
                                        :child_visible="isChildsAllowed" :visible="grade.showTravelersCountPopup"
                                        @hide="hideTravelersCount(index, grade)"
                                        @update_adult_count="update_adult_count(index, $event)"
                                        @update_child_count="update_child_count(index, $event)"
                                        @update_infant_count="update_infant_count(index, $event)">
                                    </activities-travelers-count>
                                    <div class="font-weight-bold d-flex justify-content-end font-15">
                                        @{{ grade.Price }} @{{ grade.Currency }}
                                        x @{{ grade.adult_count }} Adults
                                    </div>
                                    <div class="d-flex flex-row justify-content-end">
                                        <button :disabled="grade.book_button_disabled || loadingCheckout"
                                            v-on:click="reserve(index)"
                                            class="btn btn-back add-border-radius">Book</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row section-2 mb-3 pt-3 add-border-radius">
                    <div class="col-12 p-2">
                        <h5 class="gilroy-semi font-weight-bold">What's included, what's not</h5>
                        <ul class="font-12 line-height-2 pl-4">
                            <p>Included</p>
                            @foreach ($details['Inclusions'] as $info)
                                <li>{{ $info }}</li>
                            @endforeach

                            @foreach ($details['Exclusions'] as $info)
                                <li>(Not Included) - {{ $info }}</li>
                            @endforeach


                        </ul>
                    </div>
                    {{-- <div class="col-12 p-2">
                            <h5 class="gilroy-semi font-weight-bold">Know Before You Book</h5>
                            <ul class="font-12 line-height-2 pl-4">
                                <li>Children 2 and younger are complimentary.</li>
                                <li>You will receive an electronic copy of your tickets to print along with your exact
                                    timed-entry time after your booking is confirmed.</li>
                                <li>Check-in is 30 minutes prior to the booked tour start time.</li>
                                <li>Entry time is subject to availability</li>
                            </ul>
                        </div>
                        <div class="col-12 p-2">
                            <h5 class="gilroy-semi font-weight-bold">What you can expect</h5>
                            <p class="font-12 line-height-1-5 pl-1">{{ $details['ShortDescription'] }}</p>

                        </div> --}}
                </div>
                <div id="location" class="row section-2 mb-3 pt-3 add-border-radius">
                    <div class="col-sm-12 col-md-6">
                        <div class="row line-height-3">
                            <div class="col-12">
                                <h5 class="gilroy-semi font-weight-bold">What to expect</h5>
                                {{-- <div class="gilroy-bold font-weight-bold font-15"><img src="/image/clean.svg"> Enhance
                                        Cleaning</div> --}}
                            </div>
                            {{-- <div class="col-12">
                                    <ul class="font-12 line-height-2 pl-3">
                                        <li>High-touch surfaces cleaned and disinfected</li>
                                        <li>Vehicles and venues cleaned with disinfectants</li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <div class="gilroy-bold font-weight-bold font-15"><img src="/image/user-plus.svg">
                                        Social distancing</div>
                                </div>
                                <div class="col-12">
                                    <ul class="font-12 line-height-2 pl-3">
                                        <li>Contactless ticket redemption</li>
                                        <li>Social distancing measures in place</li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <div class="gilroy-bold font-weight-bold font-15"><img src="/image/double-check.svg">
                                        Safety measures</div>
                                </div> --}}
                            <div class="col-12">
                                <ul class="font-12 line-height-2 pl-3">
                                    @foreach ($details['AdditionalInfo'] as $info)
                                        <li>{{ $info }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            {{-- <h5 class="gilroy-semi font-weight-bold">What's included, what's not</h5> --}}
                        </div>
                        <div class="row pt-3">
                            <div style="height: 500px;width:100%;"><iframe width="100%" height="100%" style="border:0"
                                    loading="lazy" allowfullscreen
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM&q={{ $details['Location'] }}">
                                </iframe></div>

                        </div>
                    </div>
                </div>
                <div id="reviews" class="row section-2 mb-3 pt-3 add-border-radius">
                    <div class="col-12 line-height-1-5">
                        <div class="font-weight-bold font-16">Reviews</div>
                        <div class="font-14">
                            @for ($counter = 0; $counter < $details['StarRating']; $counter++)
                                <i aria-hidden="true" class="fa fa-star yellow"></i>
                            @endfor
                            ({{ $details['ReviewCount'] }} review{{ $details['ReviewCount'] > 1 ? 's' : '' }})
                        </div>
                    </div>
                    @if ($details['ReviewCount'] > 1)
                        <div class="col-12 line-height-2 ">
                            <div class="row pt-3">

                                <div class="col-md-6"
                                    v-for="(review, reviewIndex) in productReviews.slice(0, number_of_displayed_reviews)"
                                    :key="reviewIndex">
                                    <div class="row reivew-block">
                                        <div class="col-6 d-flex flex-row">
                                            <div>
                                                {{-- <img src="/image/avatar1.png" width="55" height="55" /> --}} </div>
                                            <div class="pl-3 line-height-1-5 pt-2">
                                                <div class="font-weight-bold blue gilroy-semi">
                                                    @{{ review.UserName }}</div>
                                                <div class="grey font-10 gilroy-medium">
                                                    @{{ review.Published_Date }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12 line-height-1-2 font-11 pt-2">


                                            <div class="m-0 p-0">
                                                @{{ showReview(review) }}
                                                <span v-if="review.show_full_description == false"
                                                    style="color: #FE2F70; cursor:pointer;"
                                                    v-on:click="review.show_full_description = true">... Read
                                                    More</span>
                                                <span v-if="review.show_full_description == true"
                                                    style="color: #FE2F70; cursor:pointer;"
                                                    v-on:click="review.show_full_description = false">Read Less</span>

                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex justify-content-center align-items-center"
                                    v-if="productReviews.length > number_of_displayed_reviews">
                                    <button class="btn btn-back add-border-radius"
                                        v-on:click="number_of_displayed_reviews += 12;">Show More Reviews</button>
                                </div>
                                <div class="col-sm-12 col-md-4 pb-4 pr-5">
                                    {{-- <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">Cleanliness</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">align-middle</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">Check-in</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div> --}}



                                    {{-- <div class="row reivew-block">
                                    <div class="col">
                                        <button class="btn">View All</button>
                                    </div>
                                </div> --}}
                                </div>
                                <div class="col-sm-12 col-md-4 pb-4 pr-5">
                                    {{-- <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">Cleanliness</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">align-middle</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-13 gilroy-medium pr-1">Check-in</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-13 px-1">5.0</div>
                                </div> --}}
                                    {{-- <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55"/>
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="font-weight-bold blue gilroy-semi">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-11 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd clita kasd kasd
                                    </div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55"/>
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="font-weight-bold blue gilroy-semi">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-11 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    </div>
    </section>

    {{-- <footer>
        <div class="wrapper">
            <div class="column-holder">
                <div class="column-medium-6">
                    <div class="footer-logo">
                        <img src="/image/trippbo-white.svg" />
                    </div>

                    <div class="social-links margintop-3">
                        <a href="javascript:void(0)">
                            <img src="/image/fb-white.svg" style="height: 40px;" />
                        </a>
                        <a href="javascript:void(0)" class="marginhor-3">
                            <img src="/image/insta-white.svg" style="height: 40px;" />
                        </a>
                        <a href="javascript:void(0)">
                            <img src="/image/linkedin-white.svg" style="height: 40px;" />
                        </a>
                    </div>
                </div>
                <div class="column-medium-3">
                    <h4>
                        Menu
                    </h4>
                    <ul>
                        <li>
                            Conditions
                        </li>
                        <li>
                            Privacy Policy
                        </li>
                        <li>
                            About Us
                        </li>
                    </ul>
                </div>
                <div class="column-medium-3">
                    <h4>
                        Popular Cities
                    </h4>
                    <ul>
                        <li class="inline-block half-width">
                            Thailand
                        </li>
                        <li class="inline-block half-width">
                            Thailand
                        </li>
                        <li class="inline-block half-width">
                            Norway
                        </li>
                        <li class="inline-block half-width">
                            Norway
                        </li>
                        <li class="inline-block half-width">
                            Pakistan
                        </li>
                        <li class="inline-block half-width">
                            Pakistan
                        </li>
                        <li class="inline-block half-width">
                            Dubai
                        </li>
                        <li class="inline-block half-width">
                            Dubai
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="wrapper">
                <div class="column-holder">
                    <div class="column-medium-6">
                        <p>
                            Subscribe our Newsletter
                        </p>
                        <div class="position-relative newsletter">
                            <input type="email" placeholder="Email" />
                            <button>
                                Subscribe
                            </button>
                        </div>
                    </div>
                    <div class="column-medium-6 margintop-3 margintop-medium-0" style="align-self: flex-end;">
                        © trippbo.com, Inc. All rights reserved 2021.
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
    <div style="background: transparent" class="loading_visible w-100"
        :class="{'loading_visible_active' : loadingCheckout}">
        <div style="background: transparent" class="d-flex flex-row justify-content-center  p-1">
            <v-app style="background: transparent" style="border-radius: 25px;">
                <v-progress-circular indeterminate color="red"></v-progress-circular>
            </v-app>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
    <script>
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        })

        function read_more(index) {
            $("#read_less_" + index).removeClass('invisible');
            $("#read_more_" + index).addClass('invisible');


        }
        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        let cancel = function() {

        }

        const sub_activity_app = new Vue({
            el: '#activity_sub_vue_app',
            components: {
                VueGallerySlideshow
            },
            vuetify: new Vuetify(),
            data: {
                images: @json($details['photos']),
                number_of_displayed_reviews: 12,
                productReviews: @json($details['Product_Reviews']),
                tripGrades: [],
                refreshedTripGrades: [],
                bookingPending: false,
                available_dates: @json($details['Product_available_date']),
                available_ages: @json($details['Product_AgeBands']),
                selectedDate: '',
                resultToken: '{{ $details['ResultToken'] }}',
                productCode: '{{ $details['ProductCode'] }}',
                travelers_count_visible: false,
                adult_travelers_count: 1,
                price_at_selected_date: '{{ $details['Price']['TotalDisplayFare'] }}',
                currency: '{{ $details['Price']['Currency'] }}',
                showCalendar: false,
                selectedRange: {
                    start: "{{ $date_from }}",
                    end: "{{ $date_to }}"
                },
                availableDays: [],
                booked: false,
                isDark: false,
                tourGradesLoaded: false,
                childsAllowed: false,
                infantsAllowed: false,
                loadingCheckout: false,
                index: null,

            },

            async mounted() {
                this.productReviews.forEach(el => {
                    this.$set(el, 'show_full_description', false);
                })

                /*  let newRange = [moment().add(2, 'days').format('YYYY-MM-DD'), moment().add(9, 'days').format(
                     'YYYY-MM-DD')]
                 this.selectedRange = newRange; */
                this.selectDate(this.selectedRange.start)



                let dates = this.selectedRange;
                let date1 = moment(dates.start, 'YYYY-MM-DD');
                let date2 = moment(dates.end, 'YYYY-MM-DD');
                this.availableDays.splice(0);

                while (date2.diff(date1, 'days') > -1) {

                    if (this.availableDates(date1.format('YYYY-MM-DD'))) {

                        this.availableDays.push(date1.format('YYYY-MM-DD'))
                    }


                    date1.add(1, 'days')

                }
               await this.getActivityTourGrade()

            },
            computed: {
                isInfantsAllowed() {
                    let temp = this.available_ages;
                    let allowed = false;
                    temp.forEach((age) => {


                        if (age.bandId === 3) {
                            allowed = true;

                        }
                    })

                    return allowed;

                },
                isChildsAllowed() {
                    let temp = this.available_ages;
                    let allowed = false;
                    temp.forEach((age) => {
                        if (age.bandId === 2) {
                            allowed = true;
                        }
                    })


                    return allowed;
                },

            },
            watch: {

                selectedRange: function(val) {
                    let dates = val;

                    let date1 = moment(dates.start, 'YYYY-MM-DD');
                    let date2 = moment(dates.end, 'YYYY-MM-DD');
                    this.availableDays.splice(0);






                    while (date2.diff(date1, 'days') > -1) {

                        if (this.availableDates(date1.format('YYYY-MM-DD'))) {

                            this.availableDays.push(date1.format('YYYY-MM-DD'))
                        }


                        date1.add(1, 'days')

                    }



                }
            },

            methods: {

                showReview: function(review) {
                    if (review.show_full_description) {
                        return review.Review;
                    } else {
                        return review.Review.substr(0, 160);
                    }
                },
                selectDate: function(date) {
                    this.selectedDate = date;
                    this.getActivityTourGrade();

                },


                availableDates: function(val) {
                    let dates = [];
                    for (const [key, value] of Object.entries(this.available_dates)) {
                        for (const [key2, value2] of Object.entries(value)) {
                            dates.push(key + '-' + value2);
                        }
                    }

                    if (dates.includes(val)) {
                        return true
                    }
                    return false


                },

                getActivityTourGrade: async function() {
                    this.tourGradesLoaded = false;
                    let error = false;
                    let url = '/activities/getTourGrade?date=' + this.selectedDate + '&resultToken=' + this
                        .resultToken + '&productCode=' + this.productCode + '&adult_count=' + 1 +
                        '&child_count=' + 0 + '&infant_count=' + 0;
                    let resp = await axios.get(url, {
                        cancelToken: new CancelToken(function executor(c) {
                            cancel = c;

                        })

                    }).catch(function(thrown) {
                        error = true;

                        if (axios.isCancel(thrown)) {

                        } else {

                        }
                    });

                    console.log(resp.data);
                    this.tripGrades = [];
                    this.tripGrades.push(...resp.data)
                    this.tripGrades.forEach((entry) => {
                        entry.showTravelersCountPopup = false;
                        entry.adult_count = 1;
                        entry.child_count = 0;
                        entry.infant_count = 0;
                        entry.book_button_disabled = false;

                    })
                    this.tourGradesLoaded = true


                },
                refreshActivityTourGrade: async function(index, grade) {

                    let temp = grade;

                    temp.book_button_disabled = true;

                    this.$set(this.tripGrades, index, temp)


                    let error = false;
                    let url = '/activities/getTourGrade?date=' + this.selectedDate + '&resultToken=' + this
                        .resultToken + '&productCode=' + this.productCode + '&adult_count=' + grade
                        .adult_count + '&child_count=' + grade.child_count + '&infant_count=' + grade
                        .infant_count;
                    let resp = await axios.get(url, {
                        cancelToken: new CancelToken(function executor(c) {
                            cancel = c;

                        })

                    }).catch(function(thrown) {
                        error = true;

                        if (axios.isCancel(thrown)) {

                        } else {

                        }
                    });


                    this.refreshedTripGrades = [];
                    this.refreshedTripGrades.push(...resp.data)
                    this.refreshedTripGrades.forEach((entry) => {
                        if (entry.gradeCode == grade.gradeCode) {
                            grade.TourUniqueId = entry.TourUniqueId;
                        }

                    })
                    temp = grade;

                    temp.book_button_disabled = false;

                    this.$set(this.tripGrades, index, temp)





                },
                reserve: async function(gradeIndex) {
                    let grade = this.tripGrades[gradeIndex];
                    this.bookingPending = true;
                    this.loadingCheckout = true;
                    let url = '/activities/reserve?date=' + this.selectedDate + '&resultToken=' + grade
                        .TourUniqueId + '&productCode=' + this.productCode + '&gradeCode=' + grade.gradeCode +
                        "&adult_count=" + grade.adult_count + "&child_count=" + grade.child_count +
                        "&infant_count=" + grade.infant_count;

                    let resp = await axios.get(url, {
                        cancelToken: new CancelToken(function executor(c) {
                            cancel = c;

                        })

                    }).catch(function(thrown) {
                        this.loadingCheckout = false;

                        /*    alert("not available");
                           return; */

                        if (axios.isCancel(thrown)) {

                        } else {

                        }
                    });

                    window.location = '/checkout'
                },
                toggleTravelersCount: function(index) {

                    if (this.tripGrades[index].showTravelersCountPopup == false) {
                        let temp = this.tripGrades[index];
                        temp.showTravelersCountPopup = true;

                        this.$set(this.tripGrades, index, temp)

                    } else {
                        let temp = this.tripGrades[index];
                        temp.showTravelersCountPopup = false;

                        this.$set(this.tripGrades, index, temp)
                    }
                },
                hideTravelersCount: function(index, grade) {
                    let temp = this.tripGrades[index];
                    temp.showTravelersCountPopup = false;

                    this.$set(this.tripGrades, index, temp)
                    this.refreshActivityTourGrade(index, grade);
                },

                update_adult_count: function(index, new_value) {

                    let temp = this.tripGrades[index];
                    temp.adult_count = new_value;

                    this.$set(this.tripGrades, index, temp)

                },
                update_child_count: function(index, new_value) {

                    let temp = this.tripGrades[index];
                    temp.child_count = new_value;

                    this.$set(this.tripGrades, index, temp)

                },
                update_infant_count: function(index, new_value) {

                    let temp = this.tripGrades[index];
                    temp.infant_count = new_value;

                    this.$set(this.tripGrades, index, temp)

                },

            }
        })
    </script>
@endsection
