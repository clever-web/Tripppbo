@extends('layout')

@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/flights.css" rel="stylesheet">
    <link href="/css-r/home/hotels.css" rel="stylesheet">
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> --}}
    <style>
        /*         .invisible {
                                                                                                                                                                                                                                                                                        display: none;
                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                    .pink {
                                                                                                                                                                                                                                                                                        color: #FE2F70;
                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                    .trippbo-dropdown-active {
                                                                                                                                                                                                                                                                                        color: #FE2F70;
                                                                                                                                                                                                                                                                                        background-color: #fcbacf;
                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                    .responsive-width {
                                                                                                                                                                                                                                                                                        width: 100%
                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                    @media screen and (min-width:1400px) {
                                                                                                                                                                                                                                                                                        .responsive-width {
                                                                                                                                                                                                                                                                                            width: 75%
                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                             */

        .inputField-box span {
            position: initial;
            top: initial;
            left: initial;
            background-color: initial;
            padding: initial;
        }

        .trippbo-dropdown>div {
            right: unset !important;
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        #map {
            height: 350px;
        }

    </style>
@endsection

@section('content')
    <div id="hotels_app" class="body-content">


        <section class="pb-5">
            <div class="wrapper">
                <div class="breadcrumb_ mb-4">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Hotels</a>
                        </li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>

                <div id="container-2" class="form-group row px-2">
                    <div class="col-sm-6 px-1 mb-2">
                        <div class="flex-grow-1">
                            <div class="position-relative inputField-box w-100"><img class="icon-18px mr-1"
                                    src="/image/location.png"><input v-model="hotelDestination"
                                    v-on:input="hotelDestination = $event.target.value" type="text"
                                    class="inputField inputField-withicon add-border-radius" placeholder="Destination" />
                            </div>
                            <div style="position:absolute;z-index: 13;background-color:white;">
                                <autocomplete-by-city @autocomplete_result_selected="selectHotelResult($event)"
                                    :keyword="hotelDestination"></autocomplete-by-city>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 px-1 mb-2">
                        <div class="position-relative inputField-box">

                            <vc-date-picker v-model="selectedHotelRange" :min-date='new Date()' color="pink" is-range
                                :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                <template v-slot="{ inputValue, inputEvents }">
                                    <div class="flex justify-center items-center">
                                        <i class="fa fa-calendar" aria-hidden="true"></i><input
                                            :value="inputValue.start + ' To ' + inputValue.end" v-on="inputEvents.start"
                                            class="inputField inputField-withicon add-border-radius w-100" />


                                    </div>
                                </template>
                            </vc-date-picker>


                        </div>


                    </div>

                    <div class="col-sm-2 px-1 mb-2">
                        <button v-on:click="updateHotels" class="btn_search add-border-radius">Search</button>
                    </div>

                    <div
                        style="
                                                                                                                                                                                                                display: flex;
                                                                                                                                                                                                                justify-content: center;
                                                                                                                                                                                                                align-items: center;
                                                                                                                                                                                                            ">
                        <div @mouseover="hotels_travelers_count_display = 'block'"
                            @mouseleave="hotels_travelers_count_display = 'none'" class="trippbo-dropdown">
                            <button class="gilroy-medium text-000941 font-12">@{{ roomCount }}
                                Room(s), @{{ hotelNumberOfTravelers }}
                                Traveler(s)
                                <i class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                            <div class="d-flex flex-column justify-content-between"
                                :style="{display: hotels_travelers_count_display == 'block' ? 'flex !important' : 'none' +   ' !important'} ">
                                <div v-for="(room, roomIndex) in hotels_rooms" v-if="roomIndex < roomCount" :key="roomIndex"
                                    :style="{display: hotels_travelers_count_display}" class="w-100">
                                    <p class="gilroy-medium font-12 mb-2"
                                        v-on:click='hotels_travelers_count_display = "none"'><img class="icon-10px mr-2 hlg"
                                            src="/image/close.png" /> Room
                                        @{{ roomIndex + 1 }}</p>
                                    {{-- <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p> --}}
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="w-60"><span class="gilroy-medium font-12">Adult</span>
                                        </div>
                                        <div class="w-40">
                                            <div class="increamentor">
                                                <div
                                                    v-on:click="room.hotels_number_of_adults > 1 ? room.hotels_number_of_adults -=1 : '' ">
                                                    <i class="fa fa-minus-circle increamentor-minus"
                                                        :class="{'increamentor-not-allowed' : room.hotels_number_of_adults < 2 , 'increamentor-opacity' : room.hotels_number_of_adults < 2}"></i>
                                                </div>
                                                <div><input type="text" class="increamentor-number "
                                                        :class="{ 'increamentor-opacity' : room.hotels_number_of_adults < 1}"
                                                        :value="room.hotels_number_of_adults" readonly="readonly">
                                                </div>
                                                <div
                                                    v-on:click="room.hotels_number_of_adults < 9 ? room.hotels_number_of_adults +=1 : '' ">
                                                    <i class="fa fa-plus-circle increamentor-plus"
                                                        :class="{'increamentor-not-allowed' : room.hotels_number_of_adults == 9 , 'increamentor-opacity' : room.hotels_number_of_adults == 9}"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="w-60"><span class="gilroy-medium font-12">Children
                                                <span
                                                    style="    font-size: 10px;
                                                                                                                                                                                                                                            color: rgb(35, 36, 44);
                                                                                                                                                                                                                                            opacity: 0.7;">(Ages
                                                    0
                                                    to
                                                    11+)</span></span>
                                        </div>
                                        <div class="w-40">
                                            <div class="increamentor">
                                                <div
                                                    v-on:click="room.hotels_number_of_children > 0 ? room.hotels_number_of_children -=1 : '' ">
                                                    <i class="fa fa-minus-circle increamentor-minus"
                                                        :class="{'increamentor-not-allowed' : room.hotels_number_of_children < 1 , 'increamentor-opacity' : room.hotels_number_of_children < 1}"></i>
                                                </div>
                                                <div><input type="text" class="increamentor-number "
                                                        :class="{ 'increamentor-opacity' : room.hotels_number_of_children< 1}"
                                                        :value="room.hotels_number_of_children" readonly="readonly">
                                                </div>
                                                <div
                                                    v-on:click="room.hotels_number_of_children < 9 ? room.hotels_number_of_children +=1 : '' ">
                                                    <i class="fa fa-plus-circle increamentor-plus"
                                                        :class="{'increamentor-not-allowed' : room.hotels_number_of_children == 9 , 'increamentor-opacity' : room.hotels_number_of_children == 9}"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2"
                                        v-if="roomIndex == 0 ">
                                        <div class="w-60"><span class="gilroy-medium font-12">Rooms</span>
                                        </div>
                                        <div class="w-40">
                                            <div class="increamentor">
                                                <div v-on:click="roomCount > 1 ? roomCount -=1 : '' ">
                                                    <i class="fa fa-minus-circle increamentor-minus"
                                                        :class="{'increamentor-not-allowed' : roomCount < 2 , 'increamentor-opacity' : roomCount < 2}"></i>
                                                </div>
                                                <div><input type="text" class="increamentor-number "
                                                        :class="{ 'increamentor-opacity' : roomCount< 1}" :value="roomCount"
                                                        readonly="readonly">
                                                </div>
                                                <div v-on:click="roomCount < 3 ? roomCount +=1 : '' ">
                                                    <i class="fa fa-plus-circle increamentor-plus"
                                                        :class="{'increamentor-not-allowed' : roomCount == 3 , 'increamentor-opacity' : roomCount == 3}"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div v-for="n in room.hotels_number_of_children"
                                        class="mb-1 d-flex flex-row justify-content-between align-items-center">
                                        <div class="w-100"> Child @{{ n }} Age</div>

                                        <input v-model="room.child_ages[n - 1]" type="number" value="0" min="1" max="11"
                                            class="w-100 form-control" />

                                    </div>

                                    {{-- <div class="d-flex align-items-center justify-content-end mb-2">
                                    <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span></div>
                                </div> --}}
                                    <div v-if="roomIndex == roomCount - 1 "
                                        v-on:click="hotels_travelers_count_display = 'none'"><button type="button"
                                            class="btn btn-block btn-000941 font-12">Done</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <v-app v-if="loading">
                    <v-progress-linear indeterminate color="pink"></v-progress-linear>
                </v-app>
                <div id="container-8">
                    <div class="d-flex align-items-center justify-content-between p-3">
                        <div>
                            <button class="btn gilroy-medium font-16" onclick="close_container_8();"><i
                                    class="fa fa-times mr-1"></i> <span>United Arab Emirates</span></button>
                        </div>
                        <div>
                            <button
                                class="btn gilroy-semi font-12 text-fe2f70 d-flex align-items-center justify-content-between p-0">
                                <img class="icon-14px mr-1" src="/image/filter.png">
                                <span>Filter</span>
                            </button>
                        </div>
                    </div>
                    <div><img src="/image/full-map.png"></div>
                    <div class="hotels-grid-sm">
                        <div><img src="/image/rectangle-23.png"></div>
                        <div class="d-flex flex-column justify-content-between p-2">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="gilroy-semi font-18 mb-1">Royalton Hotel</h4>
                                        <div class="gilroy-medium font-12 mb-2"><i class="fa fa-star yellow"></i> 5.0 (8
                                            reviews)
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img class="icon-10px mr-1" src="/image/location.png">
                                            <span class="gilroy-medium font-12">Dubai</span>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="icon-24px mr-1" src="/image/save.png">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="gilroy-medium font-12 text-23242c opacity-0-6 mb-0">Free
                                            Cancelation</p>
                                    </div>
                                    <div>
                                        <span class="gilroy-medium font-14 text-fe2f70"><span>$40<span> /
                                                    <span>$Night<span></span></span></span></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <aside id="aside" class="col-sm-12 col-lg-4">
                        <div id="container-7" class="bg-white p-2 border mb-3">
                            <div>

                                <div id="map">



                                </div>
                            </div>
                        </div>
                        <div id="container-3" class="d-flex align-items-center bg-white justify-content-between py-2">
                            <div>
                                <button class="btn font-16" v-on:click="close_aside"><i class="fa fa-times mr-1"></i>
                                    <span>Sort & Filter</span></button>
                            </div>
                            <div>
                                {{-- <button class="btn gilroy-semi font-16 text-fe2f70">Clear</button> --}} </div>
                        </div>
                        <div id="container-5" class="bg-white mb-4">
                            <div>
                                <p v-if="!loading" class="gilroy-medium font-16 mb-2">Search by property name</p>
                                <v-app v-if="loading">
                                    <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                </v-app>
                            </div>
                            <div>
                                <div v-if="!loading" class="position-relative inputField-box">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input type="text" v-on:input="applyFilters()" v-model="searchKeyword"
                                        class="inputField inputField-withicon bg-fafafa add-border-radius"
                                        placeholder="Search" />
                                </div>
                            </div>
                        </div>
                        {{-- <h4 id="h4-1" class="gilroy-medium font-22 mb-1">Filter by</h4>
                        <p class="gilroy-medium font-16 mb-2">Popular filters</p>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Hotel<input
                                    type="checkbox" checked="checked" name="popular"/><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Breakfast included<input
                                    type="checkbox" name="popular"/><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">All inclusive<input
                                    type="checkbox" name="popular"/><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Hotel resort<input
                                    type="checkbox" name="popular"/><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Hotel resort<input
                                    type="checkbox" name="popular"/><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-checkbox gilroy-regular">Ocean view<input
                                    type="checkbox" name="popular"/><span></span></label></div>
                        <hr class="mb-4"/> --}}

                        <p v-if="!loading" class="gilroy-medium font-16 mb-2">Star rating</p>
                        <div v-if="!loading" id="container-star" class="container-star mb-4">
                            <div v-for="n in 5" :key="n"
                                v-on:click="selectedRating == n ? selectedRating = 0 : selectedRating = n; applyFilters()">
                                <button type="button"
                                    class="btn btn-container-star gilroy-regular font-20 add-border-radius"
                                    :class="{'star-active' : selectedRating == n}">
                                    <span>@{{ n }}</span>
                                    <i class="fa fa-star"></i></button>
                            </div>


                        </div>

                        <hr v-if="!loading" class="mb-4" />

                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Budget</h4>
                        <div v-if="!loading" v-for="(budget, key, index) in budgetFilter" v-on:click="activateBudget(index)"
                            :key="index" class="mb-1"><label
                                class="trippbo-radio gilroy-regular">@{{ index == 0 ? 'Any' : (index < 3 ? budget.min + String(' ' + currency) + ' - ' + budget.max + String(' ' + currency) : budget.min + String(' ' + currency) + ' or greater') }}<input type="radio"
                                    :checked="budget.enabled" name="budget" /><span></span></label>
                        </div>
                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Features</h4>
                        <div v-if="!loading" class="mb-1"><label class="trippbo-checkbox gilroy-regular">Free
                                cancellation<input type="checkbox"
                                    v-on:click="free_cancellation = !free_cancellation; applyFilters()"
                                    :checked="free_cancellation" name="property" /><span></span></label></div>


                        {{-- <h4 class="gilroy-medium font-22 mb-3">Guest rating</h4>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Any<input type="radio"
                                    checked="checked" name="guest" /><span></span></label>
                        </div>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Wonderful 4.5+<input
                                    type="radio" name="guest" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Very good 4+<input
                                    type="radio" name="guest" /><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-radio gilroy-regular">Good 3.5+<input type="radio"
                                    name="guest" /><span></span></label></div>
                        <hr class="mb-4" /> --}}

                        {{-- <h4 class="gilroy-medium font-22 mb-3">Cleaning and safety practices</h4>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Enhanced cleaning
                                Properties taking additional steps to clean and sanitize<input type="checkbox"
                                                                                               checked="checked"
                                                                                               name="safety"/><span></span></label>
                        </div> --}}
                        {{-- <hr class="mb-4"/> --}}
                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Property Type</h4>

                        <div v-if="!loading"
                            v-on:click="hotelAcommodationType.enabled = !hotelAcommodationType.enabled; applyFilters();"
                            v-for="(hotelAcommodationType, hotelAcommodationTypeIndex) in acommodationType"
                            :key="'acommodationType' + hotelAcommodationTypeIndex" class="mb-1"><label
                                class="trippbo-checkbox gilroy-regular">@{{ hotelAcommodationType.displayText }}<input disabled
                                    type="checkbox" :checked="hotelAcommodationType.enabled"
                                    name="payment" /><span></span></label>
                        </div>

                        <hr v-if="!loading" class="mb-4" />
                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Facilities</h4>

                        <div v-if="!loading" v-on:click="hotelFacility.enabled = !hotelFacility.enabled; applyFilters();"
                            v-for="(hotelFacility, hotelFacilityIndex) in facilities" :key="'facility' + hotelFacilityIndex"
                            class="mb-1"><label
                                class="trippbo-checkbox gilroy-regular">@{{ hotelFacility.displayText }}<input disabled
                                    type="checkbox" :checked="hotelFacility.enabled" name="payment" /><span></span></label>
                        </div>

                        <hr v-if="!loading" class="mb-4" />
                        {{-- <h4 class="gilroy-medium font-22 mb-3">Property type</h4>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Hotel<input
                                    type="checkbox" checked="checked" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Hotel resort<input
                                    type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Apartment<input
                                    type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Private vacation
                                home<input type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Chalet<input
                                    type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Pousada
                                (Portugal)<input type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Bed & breakfast<input
                                    type="checkbox" name="property" /><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-checkbox gilroy-regular">Villa<input
                                    type="checkbox" name="property" /><span></span></label></div>
                        <hr class="mb-4" />

                        <h4 class="gilroy-medium font-22 mb-3">Neighborhood</h4>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Any<input type="radio"
                                    checked="checked" name="neighborhood" /><span></span></label>
                        </div>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Margalla Hills<input
                                    type="radio" name="neighborhood" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Patriata Cable Car<input
                                    type="radio" name="neighborhood" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-radio gilroy-regular">Lok Virsa Museum<input
                                    type="radio" name="neighborhood" /><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-radio gilroy-regular">Bari Imam Cave<input
                                    type="radio" name="neighborhood" /><span></span></label></div>
                        <hr class="mb-4" />

                        <h4 class="gilroy-medium font-22 mb-3">Meal plans available</h4>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">All inclusive<input
                                    type="checkbox" checked="checked" name="meal" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Dinner included<input
                                    type="checkbox" name="meal" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Lunch included<input
                                    type="checkbox" name="meal" /><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-checkbox gilroy-regular">Breakfast
                                included<input type="checkbox" name="meal" /><span></span></label></div>
                        <hr class="mb-4" />

                        <h4 class="gilroy-medium font-22 mb-3">Amenities</h4>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Ocean view<input
                                    type="checkbox" checked="checked" name="amenities" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Free airport
                                shuttle<input type="checkbox" name="amenities" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Spa<input
                                    type="checkbox" name="amenities" /><span></span></label></div>
                        <div class="mb-3"><label class="trippbo-checkbox gilroy-regular">Water park<input
                                    type="checkbox" name="amenities" /><span></span></label></div>
                        <p class="mb-4"><a class="btn btn-link gilroy-semi font-12 text-fe2f70 p-0" href="#">See
                                more</a></p>
                        <hr class="mb-4" />

                        <h4 class="gilroy-medium font-22 mb-3">Accessibility</h4>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Accessible
                                bathroom<input type="checkbox" name="accessibility" /><span></span></label></div>
                        <div class="mb-1"><label class="trippbo-checkbox gilroy-regular">Roll-in shower<input
                                    type="checkbox" name="accessibility" /><span></span></label></div>
                        <div class="mb-4"><label class="trippbo-checkbox gilroy-regular">In-room
                                accessibility<input type="checkbox" name="accessibility" /><span></span></label></div>
                        <hr class="mb-4" />

                        <h4 class="gilroy-medium font-22 mb-3">Trip type</h4>
                        <div class="mb-1"><label class="trippbo-checkbox-title gilroy-regular">
                                <div class="font-16">Business</div>
                                friendly See properties with amenities to help
                                you work comfortably, like WiFi and breakfast.<input type="checkbox"
                                    name="trip" /><span></span>
                            </label></div>
                        <div><label class="trippbo-checkbox-title gilroy-regular">
                                <div class="font-16">Family friendly</div>
                                See properties that include family
                                essentials like in-room conveniences and activities for the kids.<input type="checkbox"
                                    name="trip" /><span></span>
                            </label></div>
                        <div id="container-6" class="bg-white p-2">
                            <div>
                                <button type="button" class="btn btn-fe2f70 btn-block">Apply</button>
                            </div>
                        </div> --}}
                    </aside>
                    <main class="col-sm-12 col-lg-8">
                        <div id="container-total-flight" class="my-3">
                            <div class="d-flex align-items-center bg-fafafa px-3 add-border-radius">
                                <div><span class="gilroy-semi text-fe2f70 font-14 mr-1 ">@{{ hotels.length }}</span>
                                    <span class="gilroy-regular font-14 ">Hotels available in this Area</span>
                                </div>
                            </div>
                            <div>
                                <div class="position-relative inputField-box">
                                    <select v-model="sortByFilter" v-on:change="sortByFilterUpdated"
                                        class="inputField inputField-withicon pl-3 add-border-radius">
                                        <option value="1" selected>Lowest Price</option>
                                        <option value="2">Highest Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="container-4" class="mb-3">
                            <div class="btn-grid">
                                <div>
                                    <button id="btn-1" v-on:click="open_aside"
                                        class="btn btn-pink btn-block gilroy-semi font-12 text-fe2f70 rounded-0 d-flex align-items-center justify-content-center py-2">
                                        <img class="icon-14px mr-1" src="/image/filter.png" />
                                        <span>Filter</span>
                                    </button>
                                </div>
                                <div>
                                    <button id="btn-2" onclick="open_container_8();"
                                        class="btn btn-pink btn-block gilroy-semi font-12 text-fe2f70 rounded-0 d-flex align-items-center justify-content-center py-2">
                                        <img class="icon-14px mr-1" src="/image/filter.png" />
                                        <span>View On A Map</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-show="loading" class="w-100">
                            <img src="/image/loading.gif" class="img-fluid w-100" />
                        </div>
                        <div v-if="loading" class="mt-4">
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                        </div>
                        <ul id="container-hotels" class="container-hotels">

                            <li v-for="(hotel, hotelIndex) in hotels.slice(0, number_of_displayed_results) "
                                :key="hotelIndex" class="add-border-radius" style="cursor: pointer;"
                                v-on:click.stop='redirectToHotel(hotel)'>
                                <div class="hotels-grid">
                                    <div><img :src="hotel.HotelPicture" class="w-100 add-border-radius" /></div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="gilroy-semi font-24 mb-1">@{{ hotel.HotelName }}</h4>
                                                    <div class="gilroy-medium font-14 mb-2"><i
                                                            v-for="n in hotel . StarRating" :key="n"
                                                            class="fa fa-star yellow"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <img class="icon-14px mr-1" src="/image/location.png" /> --}}
                                                        <span class="gilroy-medium font-14">@{{ hotel.HotelAddress }}</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <img class="icon-24px mr-1" src="/image/save.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-end">
                                                {{-- <div>
                                                    <p class="gilroy-medium font-14 text-23242c opacity-0-6 mb-0">Free
                                                        Cancelation</p>
                                                </div> --}}
                                                <div>
                                                    <span class="gilroy-medium font-16 text-fe2f70"><span>
                                                            @{{ hotel.Price }} @{{ hotel.Currency }}<span>
                                                                <span><span></span></span></span></span></span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end">
                                                {{-- <div>
                                                    <p class="gilroy-medium font-14 text-23242c opacity-0-6 mb-0">Free
                                                        Cancelation</p>
                                                </div> --}}
                                                <div>
                                                    <button
                                                        class="btn btn-block gilroy-medium btn-fe2f70 add-border-radius"
                                                        v-on:click.stop='redirectToHotel(hotel)'>View More
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>

                        <div v-if="hotels.length > number_of_displayed_results"
                            class="d-flex justify-content-center text-center">
                            <div style="width:220px;">
                                <button class="btn btn-block gilroy-medium btn-fe2f70 add-border-radius"
                                    v-on:click='showMoreResuluts'>Show More Results
                                </button>
                            </div>
                        </div>
                        {{-- <ul class="trippbo-pagination">
                               <li><a class="trippbo-pagination-disabled" href="javascript:void(0)"><i
                                           class="fa fa-angle-left"></i></a></li>
                               <li><a class="trippbo-pagination-active" href="javascript:void(0)">1</a></li>
                               <li><a href="javascript:void(0)">2</a></li>
                               <li><a href="javascript:void(0)">3</a></li>
                               <li><a href="javascript:void(0)">4</a></li>
                               <li><a href="javascript:void(0)">5</a></li>
                               <li><a class="trippbo-pagination-dots" href="javascript:void(0)">...</a></li>
                               <li><a href="javascript:void(0)">25</a></li>
                               <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
                           </ul> --}}
                    </main>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('scripts')
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-XwzBAhxColskx2M8rlMOURmaVi8E0Zg&callback=initMap&v=weekly"
        async></script> --}}
    <script src="/js/home/custom.js"></script>
    <script src="/js/home/hotels.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM">
    </script>
    <script>
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        });
        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        let cancel = function() {

        }
        const sub_activity_app = new Vue({

            el: '#hotels_app',
            vuetify: new Vuetify(),
            data: {
                isPackage: "{{ $isPackage }}",
                sortByFilter: "1",
                number_of_displayed_results: 20,
                searchKeyword: '',
                free_cancellation: false,
                budgetFilter: {
                    any: {
                        enabled: true,
                        min: 0,
                        max: 999999999,
                    },
                    first: {
                        enabled: false,
                        min: 0,
                        max: 100,
                    },
                    second: {
                        enabled: false,
                        min: 100,
                        max: 250,
                    },
                    third: {
                        enabled: false,
                        min: 250,
                        max: 999999999,

                    },

                },
                selectedRating: 0,
                isDark: false,
                loading: false,
                showHotelCalendar: false,
                hotels: [],
                allHotels: [],
                checkinDate: "{{ $checkinDate }}",
                noOfNights: "{{ $noOfNights }}",
                hotels_rooms: [{
                        enabled: true,
                        hotels_number_of_adults: {{ $adultCount0 }},
                        hotels_number_of_children: {{ $childCount0 }},
                        child_ages: @json($childAges0)

                    },
                    {
                        enabled: false,
                        hotels_number_of_adults: {{ $adultCount1 }},
                        hotels_number_of_children: {{ $childCount1 }},
                        child_ages: @json($childAges1)

                    },
                    {
                        enabled: false,
                        hotels_number_of_adults: {{ $adultCount2 }},
                        hotels_number_of_children: {{ $childCount2 }},
                        child_ages: @json($childAges2)

                    }
                ],
                roomCount: {{ $roomCount }},
                hotels_travelers_count_display: 'none',
                exchangeRate: 0,
                currency: '',
                cityId: "{{ $cityId }}",
                hotelDestination: '{{ $hotel_destination_name }}',
                hotelCityId: "{{ $cityId }}",
                starRating: 0,
                tripId: '{{ $tripId }}',
                selectedHotelRange: {
                    start: '{{ $checkinDate }}',
                    end: '{{ $checkoutDate }}'
                },
                selectedHotelRangeOrdered: {
                    start: '{{ $checkinDate }}',
                    end: '{{ $checkoutDate }}'
                },
                acommodationType: [{
                        displayText: 'Apartment',
                        code: 'APARTMENT'
                    },
                    {
                        displayText: 'Aparthotel',
                        code: 'APTHOTEL'
                    },
                    {
                        displayText: 'Villa',
                        code: 'HOMES'
                    },
                    {
                        displayText: 'Hostel',
                        code: 'HOSTEL'
                    },
                    {
                        displayText: 'Hotel',
                        code: 'HOTEL'
                    },
                    {
                        displayText: 'Resort',
                        code: 'RESORT'
                    },

                ],
                facilities: [{
                        displayText: 'All Inclusive',
                        enabled: false,
                        appliesTo: [


                            {
                                code: 257,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },
                            {
                                code: 258,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 31,
                            },
                            {
                                code: 259,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 31,
                            },
                            {
                                code: 260,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 31,
                            },
                            {
                                code: 263,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },
                            {
                                code: 254,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },
                            {
                                code: 255,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },
                            {
                                code: 256,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },
                            {
                                code: 261,
                                facilityGroupCode: 80,
                                facilityTypologyCode: 3,
                            },

                        ]
                    },
                    {

                        displayText: 'Spa',
                        enabled: false,
                        appliesTo: [{
                                code: 41,
                                facilityGroupCode: 91,
                                facilityTypologyCode: 15,
                            },
                            {
                                code: 460,
                                facilityGroupCode: 74,
                                facilityTypologyCode: 12,
                            },
                        ]
                    },
                    {

                        displayText: 'Parking',
                        enabled: false,
                        appliesTo: [{
                                code: 500,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 12,
                            },
                            {
                                code: 560,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 12,
                            },
                        ]
                    },
                    {

                        displayText: 'Pets Allowed',
                        enabled: false,
                        appliesTo: [{
                                code: 353,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 26,
                            },
                            {
                                code: 540,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 26,
                            },
                        ]
                    },
                    {

                        displayText: 'Outdoor Swimming Pool',
                        enabled: false,
                        appliesTo: [{
                                code: 306,
                                facilityGroupCode: 60,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 615,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 363,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 364,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 365,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                        ]
                    },
                    {

                        displayText: 'Indoor Swimming Pool',
                        enabled: false,
                        appliesTo: [{
                                code: 313,
                                facilityGroupCode: 60,
                                facilityTypologyCode: 29,
                            },

                            {
                                code: 360,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 361,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },
                            {
                                code: 362,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 29,
                            },

                        ]
                    },
                    {

                        displayText: 'Private Pool',
                        enabled: false,
                        appliesTo: [{
                                code: 326,
                                facilityGroupCode: 60,
                                facilityTypologyCode: 8,
                            },

                        ]
                    },
                    {

                        displayText: 'Airport Shuttle',
                        enabled: false,
                        appliesTo: [{
                                code: 562,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 5,
                            },

                        ]
                    },
                    {

                        displayText: 'Restaurant',
                        enabled: false,
                        appliesTo: [{
                                code: 200,
                                facilityGroupCode: 71,
                                facilityTypologyCode: 8,
                            },

                        ]
                    },
                    {

                        displayText: 'Only Adults',
                        enabled: false,
                        appliesTo: [{
                                code: 203,
                                facilityGroupCode: 85,
                                facilityTypologyCode: 34,
                            },

                        ]
                    },
                    {

                        displayText: 'Casino',
                        enabled: false,
                        appliesTo: [{
                                code: 180,
                                facilityGroupCode: 73,
                                facilityTypologyCode: 3,
                            },

                        ]
                    },
                    {

                        displayText: 'Non-smoking',
                        enabled: false,
                        appliesTo: [{
                                code: 562,
                                facilityGroupCode: 85,
                                facilityTypologyCode: 3,
                            },

                        ]
                    },
                    {

                        displayText: 'Gym',
                        enabled: false,
                        appliesTo: [{
                                code: 470,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 12,
                            },

                        ]
                    },
                    {

                        displayText: 'Business Center',
                        enabled: false,
                        appliesTo: [{
                                code: 605,
                                facilityGroupCode: 72,
                                facilityTypologyCode: 12,
                            },

                        ]
                    },
                    {

                        displayText: 'Beach',
                        enabled: false,
                        appliesTo: [{
                                code: 313,
                                facilityGroupCode: 40,
                                facilityTypologyCode: 18,
                            },
                            {
                                code: 328,
                                facilityGroupCode: 60,
                                facilityTypologyCode: 18,
                            },
                            {
                                code: 574,
                                facilityGroupCode: 70,
                                facilityTypologyCode: 8,
                            },

                        ]
                    },
                ]
            },
            mounted: async function() {


                let url = '/getExchangeRate';
                let resp = await axios.get(url)
                let exchange_rate = resp.data.exchangeRate;
                this.exchangeRate = exchange_rate;
                this.currency = resp.data.currency;

                for (const [key, value] of Object.entries(this.budgetFilter)) {
                    value.min = Math.round(value.min * exchange_rate);
                    value.max = Math.round(value.max * exchange_rate);

                }


                // console.log(this.budgetFilter)


                if (this.tripId == '') {
                    await this.getHotels();
                }
                this.initMap()

            },
            computed: {
                formattedHotelFromDate: function() {
                    return moment(this.selectedHotelRangeOrdered.start).format('MMM, DD');
                },
                formattedHotelToDate: function() {
                    return moment(this.selectedHotelRangeOrdered.end).format('MMM, DD');
                },

                hotelNumberOfTravelers: function() {

                    let total = 0;
                    for (let x = 0; x < this.roomCount; x++) {
                        total += this.hotels_rooms[x].hotels_number_of_adults;
                        total += this.hotels_rooms[x].hotels_number_of_children;
                    }
                    return total;
                }
            },
            watch: {
                selectedHotelRange: function(val) {
                    this.selectedHotelRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                    this.selectedHotelRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')


                },
            },
            methods: {

                initMap: function() {
                    // The location of Uluru
                    const center = {
                        lat: this.hotels[0].lat,
                        lng: this.hotels[0].lng
                    };

                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 14,
                        center: center,
                    });
                    // The marker, positioned at Uluru


                    this.hotels.forEach(el => {
                        if (!((el.lat == '') && (el.lng == ''))) {
                            const marker = new google.maps.Marker({
                                position: {
                                    lat: el.lat,
                                    lng: el.lng
                                },
                                map: map,
                            });
                        }

                    })


                },
                sortByFilterUpdated: function() {
                    this.allHotels = this.allHotels.reverse();
                    this.applyFilters();
                },
                availableDates: function(val) {

                    let date = moment(val, 'YYYY-MM-DD')
                    let today = moment()

                    if (date.diff(today, 'days') > -1) {
                        return true
                    }
                    return false




                },
                getHotels: async function() {
                    this.loading = true;
                    let error = false;
                    let url = '/hotels/get';
                    url += "?checkinDate=" + this.checkinDate
                    url += "&noOfNights=" + this.noOfNights




                    for (let x = 0; x < this.roomCount; x++) {
                        url += '&adultCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_adults
                        url += '&childCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_children
                        let ages = '';
                        for (let y = 0; y < this.hotels_rooms[x].hotels_number_of_children; y++) {
                            ages += this.hotels_rooms[x].child_ages[y] + ',';
                        }
                        url += '&childAges' + x + '=' + ages;
                    }
                    url += "&roomCount=" + this.roomCount
                    url += "&cityId=" + this.cityId
                    if (this.tripId !== '') {
                        url += "&tripId=" + this.tripId
                    }
                    if (cancel !== null) {
                        cancel();
                    }
                    this.hotels = [];
                    try {
                        let resp = await axios.get(url, {
                            cancelToken: new CancelToken(function executor(c) {
                                cancel = c;

                            })

                        })
                        this.loading = false;
                        console.log(resp.data)
                        this.allHotels = [];
                        this.allHotels.push(...resp.data)

                        this.applyFilters();
                    } catch (e) {
                        console.log(e);

                    }


                },
                updateHotels() {
                    this.checkinDate = this.selectedHotelRangeOrdered.start
                    let time1 = moment(this.selectedHotelRangeOrdered.start)
                    let time2 = moment(this.selectedHotelRangeOrdered.end)
                    this.noOfNights = time2.diff(time1, 'days')
                    this.cityId = this.hotelCityId;
                    this.getHotels();
                },
                redirectToHotel: function(hotel) {
                    let url = '';
                    console.log(hotel);

                    if (this.isPackage == '0') {
                        url = '/hotel/view?cityId=' + this.hotelCityId + '&hotelCode=' + hotel.HotelCode +
                            '&tripId=' + this.tripId + '&checkinDate=' + this.checkinDate + '&numberOfNights=' +
                            this.noOfNights
                    } else {
                        url = '/hotel/view?cityId=' + this.hotelCityId + '&hotelCode=' + hotel.HotelCode +
                            '&tripId=' + this.tripId +
                            "&isPackage=" + this.isPackage + '&checkinDate=' + this.checkinDate +
                            '&numberOfNights=' + this.noOfNights;
                    }

                    window.open(url, '_blank').focus();

                },
                selectHotelResult: function(result) {

                    this.hotelCityId = result.id;
                    this.hotelDestination = result.country + ', ' + result.name;
                },
                activateBudget(index) {
                    let index2 = 0;
                    for (const [key, value] of Object.entries(this.budgetFilter)) {
                        if (index2 == index) {
                            value.enabled = true
                        } else {
                            value.enabled = false
                        }
                        index2++;
                    }

                    this.applyFilters();
                },
                showMoreResuluts: function() {
                    this.number_of_displayed_results += 20;
                },
                open_aside() {
                    let aside = document.getElementById("aside");

                    aside.style.right = "0%";
                },
                close_aside() {
                    let aside = document.getElementById("aside");
                    aside.style.right = "-100%";
                },

                isFacilityIncluded: function(hotel, facilityOptions) {
                    let included = false;

                    facilityOptions.forEach(element => {
                        console.log(hotel.HotelFacilities);
                        hotel.HotelFacilities.forEach(x => {
                            if (x.facilityCode == element.code && x.facilityGroupCode ==
                                element.facilityGroupCode) {
                                included = true;
                            }
                        })

                    });
                    return included;
                },

                applyFilters: function() {
                    let toRemove = [];


                    let temp = this.allHotels.filter((el) => {
                        if (this.selectedRating !== 0) {
                            return el.StarRating !== this.selectedRating;
                        }

                    })

                    toRemove.push(...temp);

                    for (const [key, value] of Object.entries(this.budgetFilter)) {
                        if (value.enabled) {
                            temp = this.allHotels.filter((el) => {
                                return el.Price < value.min || el.Price > value.max
                            })
                        }
                    }
                    toRemove.push(...temp);

                    if (this.searchKeyword !== '') {
                        temp = this.allHotels.filter((el) => {
                            let lower = el.HotelName.toLowerCase();
                            let search = this.searchKeyword.toLowerCase();
                            return !lower.includes(search);
                        })
                        toRemove.push(...temp);
                    }

                    if (this.free_cancellation == true) {
                        temp = this.allHotels.filter((el) => {
                            return el.FreeCancellationAvailable == false;
                        })
                        toRemove.push(...temp);
                    }

                    for (const [key, value] of Object.entries(this.facilities)) {
                        if (value.enabled) {

                            temp = this.allHotels.filter((el) => {

                                return !this.isFacilityIncluded(el, value.appliesTo);
                            })
                            toRemove.push(...temp);
                        }
                    }
                    for (const [key, value] of Object.entries(this.acommodationType)) {
                        if (value.enabled) {

                            temp = this.allHotels.filter((el) => {

                                return value.code != el.AccommodationTypeCode
                            })
                            toRemove.push(...temp);
                        }
                    }

                    this.hotels = [];
                    this.hotels = this.allHotels.filter((el) => {
                        return toRemove.indexOf(el) < 0;
                    })


                },
            }
        });
    </script>
@endsection
