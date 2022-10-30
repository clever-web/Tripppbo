@extends("layout")
@section('head')

    <link href="{{ asset('css-n/hotel.css') }}" rel="stylesheet">

    <!-- hotel Responsive CSS -->
    <link href="{{ asset('css-n/hotel-responsive.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css-n//bootstrap-vue.min.css') }}" />
    <script src="{{ asset('js-n/bootstrap-vue.min.js') }}"></script>

    <!-- Load the following for BootstrapVueIcons support -->
    <script src="{{ asset('js-n/bootstrap-vue-icons.min.js') }}"></script>
    <style>
        [v-cloak] {
            display: none;
        }

        .invisible {
            display: none;
        }

    </style>
@endsection
@section('content')


    <!-- Hotel Start -->
    <section id="app" class="hotel-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Hotel</a></li>
                            <li><img src="{{ asset('images-n/icons/small-arrow.png') }}" alt=""></li>
                            <li><a href="#">Hotel Search</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cols">
                        <form>
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="input-group">

                                        <div class="d-flex flex-column w-100 justify-items-center justify-content-center">
                                            <div class="d-flex w-100 justify-items-center justify-content-center">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <img src="{{ asset('images-n/icons/location.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="w-100">
                                                    <input type="text" v-on:input="showSearchResults()" v-model="searchCity"
                                                        autocomplete="off" class="form-control" id="destination_hotel_city"
                                                        placeholder="Destination">
                                                </div>

                                            </div>
                                            <div v-cloak id="hotel-search-result-container"
                                                v-bind:class="{ invisible  : !isSearchResultsVisible}"
                                                style="background-color: white;position: relative">

                                                <div id="results" class="p-2"
                                                    style="position: absolute;top: 0px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">


                                                    <div v-for="result in searchResults">
                                                        <div v-on:click="selectSearchResult(result.iataCode, result.address.cityName , result.address.countryName)"
                                                            {{-- onclick="selectSearchResult('${data[key].iataCode}', '${data[key].address.countryCode}' , this)" --}}
                                                            class='autocomplete-item d-flex flex-row justify-content-start align-items-center'>
                                                            <div class='mr-3'><img
                                                                    src='{{ asset('images-n/location.svg') }}'
                                                                    width='20px' height='20px' /></div>
                                                            <div>
                                                                <div style='font-size:12px'>
                                                                    @{{ result . address . countryName }}
                                                                </div>
                                                                <div style="font-size:10px"
                                                                    style="background-color: white;border: none;font-size:15px;cursor:pointer; ">
                                                                    @{{ result . address . cityName }} -
                                                                    @{{ result . name }} </div>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">

                                    <b-form-datepicker class=" mb-3 mb-lg-0" id="check-in-date"
                                        :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
                                        v-model="checkInDate"></b-form-datepicker>
                                </div>
                                <div class="col-lg-1 d-flex justify-content-center">
                                    <img class="d-none d-lg-block" src="{{ asset('images-n/icons/small-arrow.png') }}"
                                        alt="">
                                </div>
                                <div class="col-lg-2 mb-3 mb-lg-0">

                                    <b-form-datepicker id="check-out-date"
                                        :date-format-options="{ year: 'numeric', month: 'numeric', day: 'numeric' }"
                                        v-model="checkOutDate"></b-form-datepicker>
                                </div>



                                <div class="col-lg-2">

                                    <input v-on:click="getHotelsByCityName()" class="btn btn-primary btn-lg btn-block"
                                        type="button" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hotel-cols">
                        <div class="hotel-sidebar-col">
                            <div class="map-box">


                                <iframe width="100%" height="400px" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM
                                    &q={{ urlencode($fullCityName) }}">
                                </iframe>

                                {{-- <div class="gmap_canvas">
                                        <iframe width="358" height="304" id="gmap_canvas"
                                                src="https://maps.google.com/maps?q={{urlencode($fullCityName)}}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                frameborder="0" scrolling="no" marginheight="0"
                                                marginwidth="0"></iframe>
                                        <a href="https://www.whatismyip-address.com/divi-discount/"></a><br>
                                        <style>.mapouter {
                                                position: relative;
                                                text-align: right;
                                                height: 304px;
                                                width: 358px;
                                            }</style>
                                        <a href="https://www.embedgooglemap.net"></a>
                                        <style>.gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                height: 200px;
                                                width: 200px;
                                            }</style>
                                    </div> --}}

                            </div>
                            {{-- <div class="search-box">
                                     <h4>Search by property name</h4>
                                     <form>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <a href="#" class="input-group-text">
                                                     <img src="{{asset('images-n/icons/search.png')}}" alt="">
                                                 </a>
                                             </div>
                                             <input type="text" class="form-control" placeholder="Search">
                                         </div>
                                     </form>
                                 </div> --}}
                            <div class="filter-box my-checkbox-box">
                                <h4>Filter by</h4>
                                <h5>Amenities</h5>
                                <form>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" v-model="amenities_WI_FI_IN_ROOM"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Wi-Fi in rooms</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" v-model="amenities_FITNESS_CENTER"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Fitness Center</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" v-model="amenities_SWIMMING_POOL"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" v-model="amenities_RESTAURANT"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">Restaurant</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_PARKING"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">Parking</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_SPA"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck6">
                                        <label class="custom-control-label" for="customCheck6">SPA</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_AIR_CONDITIONING"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">Air Conditioning</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_KITCHEN"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">Kitchen</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_BEACH"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">Beach</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_CASINO"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">Casino</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_JACUZZI"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">Jacuzzi</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_SAUNA"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Sauna</label>
                                    </div>

                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_SOLARIUM"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck13">
                                        <label class="custom-control-label" for="customCheck13">Solarium</label>
                                    </div>

                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_MASSAGE"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck14">
                                        <label class="custom-control-label" for="customCheck14">Massage</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_TELEVISION"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck15">
                                        <label class="custom-control-label" for="customCheck15">Television</label>
                                    </div>
                                    <div class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" v-model="amenities_ROOM_SERVICE"
                                            v-on:change="updateAmenitiesFilters()" class="custom-control-input"
                                            id="customCheck16">
                                        <label class="custom-control-label" for="customCheck16">Room service</label>
                                    </div>
                                </form>
                            </div>
                            <div class="star-box">
                                <h5>Star rating</h5>
                                <div id="myDIV">
                                    <button class="btn" v-bind:class="{active: selectedRating === 1}"
                                        v-on:click="selectRating(1)">1 <img src="{{ asset('images-n/icons/star.png') }}"
                                            alt="" class="star-img">
                                        <img src="{{ asset('images-n/icons/star-white.png') }}" alt=""
                                            class="star-img-white"></button>
                                    <button v-bind:class="{active: selectedRating === 2}" v-on:click="selectRating(2)"
                                        class="btn">2 <img src="{{ asset('images-n/icons/star.png') }}" alt=""
                                            class="star-img">
                                        <img src="{{ asset('images-n/icons/star-white.png') }}" alt=""
                                            class="star-img-white"></button>
                                    <button v-bind:class="{active: selectedRating === 3}" v-on:click="selectRating(3)"
                                        class="btn">3 <img src="{{ asset('images-n/icons/star.png') }}" alt=""
                                            class="star-img">
                                        <img src="{{ asset('images-n/icons/star-white.png') }}" alt=""
                                            class="star-img-white"></button>
                                    <button v-bind:class="{active: selectedRating === 4}" v-on:click="selectRating(4)"
                                        class="btn">4 <img src="{{ asset('images-n/icons/star.png') }}" alt=""
                                            class="star-img">
                                        <img src="{{ asset('images-n/icons/star-white.png') }}" alt=""
                                            class="star-img-white"></button>
                                    <button v-bind:class="{active: selectedRating === 5}" v-on:click="selectRating(5)"
                                        class="btn">5 <img src="{{ asset('images-n/icons/star.png') }}" alt=""
                                            class="star-img">
                                        <img src="{{ asset('images-n/icons/star-white.png') }}" alt=""
                                            class="star-img-white"></button>
                                </div>
                            </div>
                            {{-- <div class="budget-box my-checkbox-box">
                                              <h4>Your budget</h4>
                                              <form>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck-a1" checked>
                                                      <label class="custom-control-label" for="customCheck-a1">Less than $75</label>
                                                  </div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck-a2">
                                                      <label class="custom-control-label" for="customCheck-a2">$75 to $125</label>
                                                  </div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck-a3">
                                                      <label class="custom-control-label" for="customCheck-a3">$125 to $200</label>
                                                  </div>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck-a4">
                                                      <label class="custom-control-label" for="customCheck-a4">$200 to $300</label>
                                                  </div>
                                                  <div class="custom-control custom-checkbox m-0">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck-a5">
                                                      <label class="custom-control-label" for="customCheck-a5">Greater than
                                                          $300</label>
                                                  </div>
                                              </form>
                                          </div> --}}
                            {{-- <div class="my-radio-box guest-box">
                                       <h4>Guest rating</h4>
                                       <form>
                                           <div class="custom-control custom-radio">
                                               <input type="radio" id="customRadio1" name="customRadio"
                                                      class="custom-control-input" checked>
                                               <label class="custom-control-label" for="customRadio1">Any</label>
                                           </div>
                                           <div class="custom-control custom-radio">
                                               <input type="radio" id="customRadio2" name="customRadio"
                                                      class="custom-control-input">
                                               <label class="custom-control-label" for="customRadio2">Wonderful 4.5+</label>
                                           </div>
                                           <div class="custom-control custom-radio">
                                               <input type="radio" id="customRadio3" name="customRadio"
                                                      class="custom-control-input">
                                               <label class="custom-control-label" for="customRadio3">Very good 4+</label>
                                           </div>
                                           <div class="custom-control custom-radio m-0">
                                               <input type="radio" id="customRadio4" name="customRadio"
                                                      class="custom-control-input">
                                               <label class="custom-control-label" for="customRadio4">Good 3.5+</label>
                                           </div>
                                       </form>
                                   </div> --}}
                            {{-- <div class="budget-box my-checkbox-box">
                                     <h4>Cleaning and safety practices</h4>
                                     <form>
                                         <div class="custom-control custom-checkbox m-0">
                                             <input type="checkbox" class="custom-control-input" id="customCheck-b1" checked>
                                             <label class="custom-control-label" for="customCheck-b1">Enhanced cleaning<br>
                                                 Properties taking additional steps to clean and sanitize</label>
                                         </div>
                                     </form>
                                 </div> --}}
                            {{-- <div class="budget-box my-checkbox-box">
                                     <h4>Payment type</h4>
                                     <form>
                                         <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck-c1" checked>
                                             <label class="custom-control-label" for="customCheck-c1">Free
                                                 cancellation</label>
                                         </div>
                                         <div class="custom-control custom-checkbox m-0">
                                             <input type="checkbox" class="custom-control-input" id="customCheck-c2">
                                             <label class="custom-control-label" for="customCheck-c2">Reserve now, pay
                                                 later</label>
                                         </div>
                                     </form>
                                 </div> --}}
                            {{-- <div class="budget-box my-checkbox-box">
                                   <h4>Property type</h4>
                                   <form>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d1" checked>
                                           <label class="custom-control-label" for="customCheck-d1">Hotel</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d2">
                                           <label class="custom-control-label" for="customCheck-d2">Hotel resort</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d3">
                                           <label class="custom-control-label" for="customCheck-d3">Apartment</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d4">
                                           <label class="custom-control-label" for="customCheck-d4">Private vacation
                                               home</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d5">
                                           <label class="custom-control-label" for="customCheck-d5">Chalet</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d6">
                                           <label class="custom-control-label" for="customCheck-d6">Pousada
                                               (Portugal)</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d7">
                                           <label class="custom-control-label" for="customCheck-d7">Bed & breakfast</label>
                                       </div>
                                       <div class="custom-control custom-checkbox m-0">
                                           <input type="checkbox" class="custom-control-input" id="customCheck-d8">
                                           <label class="custom-control-label" for="customCheck-d8">Villa</label>
                                       </div>
                                   </form>
                               </div> --}}
                            {{-- <div class="my-radio-box guest-box">
                                     <h4>Neighborhood</h4>
                                     <form>
                                         <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio-a1" name="customRadio"
                                                    class="custom-control-input" checked>
                                             <label class="custom-control-label" for="customRadio-a1">Margalla Hills</label>
                                         </div>
                                         <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio-a2" name="customRadio"
                                                    class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio-a2">Patriata Cable
                                                 Car</label>
                                         </div>
                                         <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio-a3" name="customRadio"
                                                    class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio-a3">Lok Virsa
                                                 Museum</label>
                                         </div>
                                         <div class="custom-control custom-radio m-0">
                                             <input type="radio" id="customRadio-a4" name="customRadio"
                                                    class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio-a4">Bari Imam Cave</label>
                                         </div>
                                     </form>
                                 </div> --}}
                            {{-- <div class="budget-box my-checkbox-box">
                                    <h4>Meal plans available</h4>
                                    <form>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-e1" checked>
                                            <label class="custom-control-label" for="customCheck-e1">All inclusive</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-e2">
                                            <label class="custom-control-label" for="customCheck-e2">Dinner included</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-e3">
                                            <label class="custom-control-label" for="customCheck-e3">Lunch included</label>
                                        </div>
                                        <div class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-e4">
                                            <label class="custom-control-label" for="customCheck-e4">Breakfast
                                                included</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="budget-box my-checkbox-box">
                                    <h4>Amenities</h4>
                                    <form>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-f1" checked>
                                            <label class="custom-control-label" for="customCheck-f1">Ocean view</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-f2">
                                            <label class="custom-control-label" for="customCheck-f2">Free airport
                                                shuttle</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-f3">
                                            <label class="custom-control-label" for="customCheck-f3">Spa</label>
                                        </div>
                                        <div class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-f4">
                                            <label class="custom-control-label" for="customCheck-f4">Water park</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="budget-box my-checkbox-box">
                                    <h4>Accessibility</h4>
                                    <form>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-g1">
                                            <label class="custom-control-label" for="customCheck-g1">Accessible
                                                bathroom</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-g2">
                                            <label class="custom-control-label" for="customCheck-g2">Roll-in shower</label>
                                        </div>
                                        <div class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-g3">
                                            <label class="custom-control-label" for="customCheck-g3">In-room
                                                accessibility</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="trip-type-box my-checkbox-box p-0 m-0 border-0">
                                    <h4>Trip type</h4>
                                    <form>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-h1">
                                            <label class="custom-control-label" for="customCheck-h1">Business friendly
                                                <span>See properties with amenities to help you work comfortably, like WiFi and breakfast.</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox m-0">
                                            <input type="checkbox" class="custom-control-input" id="customCheck-h2">
                                            <label class="custom-control-label" for="customCheck-h2">Business friendly
                                                <span>See properties with amenities to help you work comfortably, like WiFi and breakfast.</span></label>
                                        </div>
                                    </form>
                                </div> --}}
                        </div>
                        <div class="hotel-items-col">
                            <div class="row topbar">
                                <div class="col-lg-8">
                                    <p><span></span> Hotels available in this Area</p>
                                </div>
                                <div class="col-lg-4">
                                    <form action="">
                                        <select v-on:change="sortedBy($event)" class="form-control">
                                            <option value="0">Recomended</option>
                                            <option value="1">Cheapest First</option>
                                        </select>
                                    </form>
                                </div>
                            </div>


                            <div v-if="loading">
                                <b-row class="w-100 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                                <b-row class="w-100 mt-4 p-4">
                                    <b-col cols="12" md="12 ">

                                        <b-card no-body img-left>
                                            <b-skeleton-img card-img="left" width="400px" height="300px"></b-skeleton-img>
                                            <b-card-body>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                                <b-skeleton></b-skeleton>
                                            </b-card-body>
                                        </b-card>
                                    </b-col>

                                </b-row>
                            </div>

                            <div v-cloak v-if="notFound">
                                No results have been found...
                            </div>

                            <div v-cloak v-on:click="redirectToHotel(hotel.hotel.hotelId)" class="row hotel-item my-5 p-3"
                                v-if="!loading" v-for="hotel in hotels" style="border: #D2D2D2 solid 1px;cursor:pointer;">


                                <div class="col-md-4 d-flex flex-row align-items-center">
                                    <div class="hotelimg" style="overflow: hidden">

                                        <img v-bind:src="hotel.hotel.media[0].uri" alt="" class="img-fluid"
                                            style="max-height: 230px;object-fit: cover;width: 100%;">

                                    </div>
                                </div>

                                <div class="col-md-8 d-flex flex-column">
                                    <h4>@{{ hotel . hotel . name }} <a href="#"><img
                                                src="{{ asset('images-n/icons/love.png') }}" alt=""></a>
                                    </h4>
                                    <p>@{{ hotel . hotel . rating }}<img
                                            src="{{ asset('images-n/icons/star-yellow.png') }}" alt=""></p>
                                    <h5><img src="{{ asset('images-n/icons/location.png') }}" alt="">
                                        @{{ hotel . hotel . address . cityName }}</h5>

                                    {{-- <div>
                                              <p>
                                                  @{{hotel.hotel.description.text}}
                                              </p>
                                          </div> --}}

                                    <div class="d-flex flex-row justify-content-between align-items-end"
                                        style="flex-flow:column;flex-grow: 1">


                                        <h6 class="d-inline-block">{{-- Free Cancelation --}}</h6>


                                        <h6 class="d-inline-block">
                                            <span>
                                                @{{ hotel . offers[0] . price . currency }}
                                                @{{ pricePerNight(hotel . offers[0] . price . total) }}

                                                <span>/ Night</span>
                                            </span>

                                        </h6>

                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 d-flex flex-row justify-content-end">
                    <div class=" my-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item  mr-5" v-bind:class="{disabled : pageOffset == 0}">
                                    <a href="#" v-on:click="switchPage('previous')" class="page-link  p-3"
                                        aria-label="Previous">

                                        <img src="{{ asset('images-n/icons/pagination-arrow-left.png') }}" alt=""
                                            class="img-fluid d-inline-block">
                                        <span>Previous</span>
                                    </a>
                                </li>
                                {{-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                                     <li class="page-item"><a class="page-link" href="#">5</a></li> --}}
                                <li class="page-item ml-5" v-bind:class="{disabled : !nextAvailable}">
                                    <a class="page-link p-3" href="#" v-on:click="switchPage('next')"
                                        aria-label="Next"><span>Next</span>
                                        <img src="{{ asset('images-n/icons/pagination-arrow-right.png') }}" alt=""
                                            class="img-fluid d-inline-block">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" id="back-to-top" title="Back to top"><img src="{{ asset('images-n/icons/top-arrow.png') }}" alt=""></a>

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


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Add active class to the current button (highlight it)
    </script>

    <script>
        Vue.use(BootstrapVue);


        CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        var cancel = function() {

        }

        var app = new Vue({
            el: '#app',

            data: {

                hotels: [],
                loading: true,
                city: '{{ $city }}',
                selectedRating: null,
                sortBy: null,
                pageOffset: 0,
                checkInDate: '{{ $checkInDate ? $checkInDate : '' }}',
                checkOutDate: '{{ $checkOutDate ? $checkOutDate : '' }}',
                tripDuration: null,
                nextAvailable: null,
                previousAvailable: null,
                priceUnavailableMessage: 'Price Unavailable',
                notFound: false,
                nextPageLink: null,
                previousPageLink: null,
                currentPageLink: null,
                currentPageType: null,
                previousPageType: null,
                currentCityFullName: null,
                amenities_FITNESS_CENTER: false,
                amenities_SWIMMING_POOL: false,
                amenities_RESTAURANT: false,
                amenities_PARKING: false,
                amenities_SPA: false,
                amenities_AIR_CONDITIONING: false,
                amenities_KITCHEN: false,
                amenities_BEACH: false,
                amenities_CASINO: false,
                amenities_JACUZZI: false,
                amenities_SAUNA: false,
                amenities_SOLARIUM: false,
                amenities_MASSAGE: false,
                amenities_TELEVISION: false,
                amenities_WI_FI_IN_ROOM: false,
                amenities_ROOM_SERVICE: false,
                hotel_adult_count: {{ $hotel_adult_count }},
                searchCity: '',
                searchCheckInDate: '',
                searchCheckOutDate: '',
                searchResults: [],
                isSearchResultsVisible: false,

            },

            mounted() {
                this.source = axios.CancelToken.source();
                startdate = Date.parse(this.checkInDate)
                enddate = Date.parse(this.checkOutDate)

                this.tripDuration = (enddate - startdate) / 60 / 60 / 24 / 1000;
                setTimeout(() => this.getHotelsByCityName(), 1000);

            },

            methods: {

                showSearchResults: async function() {

                    if (this.searchCity !== "") {

                        url = '/autocomplete/' + this.searchCity;

                        resp = await axios.get(url, {
                            cancelToken: new CancelToken(function executor(c) {
                                // An executor function receives a cancel function as a parameter
                                cancel = c;

                            })

                        }).catch(function(thrown) {
                            error = true;

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });

                        if (resp.data.length > 0) {
                            this.isSearchResultsVisible = true;
                            this.searchResults = resp.data;
                        }

                    } else {
                        this.isSearchResultsVisible = false;
                    }

                },
                selectSearchResult: function(iataCode, cityName, countryName) {

                    this.city = iataCode;
                 /*    this.getHotelsByCityName(); */
                    this.searchCity = countryName + ', ' + cityName;
                    this.isSearchResultsVisible = false;
                },
                cancelCurrentRequests: function() {

                    if (typeof cancel !== "undefined" && typeof cancel !== "null") {
                        cancel()

                    }

                },

                redirectToHotel(hotelid) {
                    window.location.href = "/hotels/view-hotel/" + hotelid + "?" + "checkInDate=" + this
                        .checkInDate + "&checkOutDate=" + this.checkOutDate + "&hotel_adult_count=" + this
                        .hotel_adult_count;
                },
                pricePerNight: function(total) {
                    if (total !== this.priceUnavailableMessage) {
                        return (total / this.tripDuration).toFixed(2);
                    } else {
                        return this.priceUnavailableMessage;
                    }

                },
                getHotelsByCityName: async function(from_link = false, link = null, baseLink = null) {

                    this.cancelCurrentRequests();
                    let firstConcat = true;

                    let queryString = "?";

                    let error = false;

                    this.previousPageAvailable(false)
                    this.nextPageAvailable(false)
                    if (this.selectedRating !== null) {

                        queryString = queryString.concat("rating=" + this.selectedRating);
                        firstConcat = false;
                    }
                    if (this.sortBy !== null) {
                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("sortBy=" + this.sortBy);
                    }
                    if (this.pageOffset !== 0) {
                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("pageOffset=" + this.pageOffset);
                    }


                    if (this.hotel_adult_count !== 0) {
                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("hotel_adult_count=" + this.hotel_adult_count);
                    }


                    if (this.checkInDate !== '') {
                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("checkInDate=" + this.checkInDate);
                    }

                    if (this.checkOutDate !== '') {
                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("checkOutDate=" + this.checkOutDate);
                    }

                    if (this.amenities_FITNESS_CENTER ||
                        this.amenities_SWIMMING_POOL ||
                        this.amenities_RESTAURANT ||
                        this.amenities_PARKING ||
                        this.amenities_SPA ||
                        this.amenities_AIR_CONDITIONING ||
                        this.amenities_KITCHEN ||
                        this.amenities_BEACH ||
                        this.amenities_CASINO ||
                        this.amenities_JACUZZI ||
                        this.amenities_SAUNA ||
                        this.amenities_SOLARIUM ||
                        this.amenities_MASSAGE ||
                        this.amenities_TELEVISION ||
                        this.amenities_WI_FI_IN_ROOM ||
                        this.amenities_ROOM_SERVICE
                    ) {

                        if (firstConcat == false) {
                            queryString = queryString.concat('&');

                        } else {
                            firstConcat = false;
                        }
                        queryString = queryString.concat("amenities=");
                    }
                    let firstAmenity = true;
                    if (this.amenities_FITNESS_CENTER) {
                        firstAmenity = false;
                        queryString = queryString.concat("FITNESS_CENTER");

                    }
                    if (this.amenities_SWIMMING_POOL) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("SWIMMING_POOL");
                        firstAmenity = false;
                    }
                    if (this.amenities_RESTAURANT) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("RESTAURANT");
                        firstAmenity = false;
                    }
                    if (this.amenities_PARKING) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("PARKING");
                        firstAmenity = false;
                    }
                    if (this.amenities_SPA) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("SPA");
                        firstAmenity = false;
                    }

                    if (this.amenities_AIR_CONDITIONING) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("AIR_CONDITIONING");
                        firstAmenity = false;
                    }

                    if (this.amenities_KITCHEN) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("KITCHEN");
                        firstAmenity = false;
                    }

                    if (this.amenities_BEACH) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("BEACH");
                        firstAmenity = false;
                    }

                    if (this.amenities_CASINO) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("CASINO");
                        firstAmenity = false;
                    }
                    if (this.amenities_JACUZZI) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("JACUZZI");
                        firstAmenity = false;
                    }

                    if (this.amenities_SAUNA) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("SAUNA");
                        firstAmenity = false;
                    }

                    if (this.amenities_SOLARIUM) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("SOLARIUM");
                        firstAmenity = false;
                    }

                    if (this.amenities_MASSAGE) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("MASSAGE");
                        firstAmenity = false;
                    }

                    if (this.amenities_TELEVISION) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("TELEVISION");
                        firstAmenity = false;
                    }
                    if (this.amenities_WI_FI_IN_ROOM) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("WI-FI_IN_ROOM");
                        firstAmenity = false;
                    }
                    if (this.amenities_ROOM_SERVICE) {
                        if (firstAmenity == false) {
                            queryString = queryString.concat(",");
                        }
                        queryString = queryString.concat("ROOM_SERVICE");
                        firstAmenity = false;
                    }
                    this.hotels.splice(0);

                    this.loading = true;
                    this.notFound = false;

                    let url = "";
                    let resp = "";
                    if (from_link == true) {
                        this.currentPageType = "link"
                        this.currentPageLink = link;
                        url = '/api/get/from-link'
                        resp = await axios.post(url, {
                                pageLink: link
                            },

                            {
                                cancelToken: new CancelToken(function executor(c) {
                                    // An executor function receives a cancel function as a parameter
                                    cancel = c;

                                })

                            }
                        ).catch(function(thrown) {
                            error = true;

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });
                    } else {
                        if (baseLink !== null) {
                            url = baseLink;
                        } else {
                            url = '/api/hotels/get/' + this.city + queryString;
                        }

                        this.currentPageType = "base";
                        this.currentPageLink = url;
                        resp = await axios.get(url, {
                            cancelToken: new CancelToken(function executor(c) {
                                // An executor function receives a cancel function as a parameter
                                cancel = c;

                            })

                        }).catch(function(thrown) {
                            error = true;

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });
                    }



                    if (error == false) {

                        this.hotels = [];
                        this.loading = false;

                        let msg = this.priceUnavailableMessage;

                        if (resp.data.hasOwnProperty('data')) {


                            let nextAvailable = false;
                            let previousAvailable = false;
                            resp.data.data.forEach(function(hotel) {


                                if (hotel.hasOwnProperty("nextAvailable") || hotel.hasOwnProperty(
                                        "previousAvailable")) {
                                    if (hotel.hasOwnProperty("nextAvailable")) {
                                        nextAvailable = true;
                                    } else {
                                        previousAvailable = true
                                    }
                                } else {
                                    if (hotel.hotel.hasOwnProperty('media')) {

                                    } else {
                                        hotel.hotel.media = []
                                        hotel.hotel.media[0] = {}
                                        hotel.hotel.media[0].uri =
                                            "{{ asset('images-n/not-available.png') }}"
                                    }

                                    if (hotel.offers[0].hasOwnProperty('price')) {

                                    } else {
                                        hotel.offers[0].price = {}
                                        hotel.offers[0].price.currency = "";
                                        hotel.offers[0].price.total = msg;
                                    }

                                    if (hotel.hotel.hasOwnProperty('description')) {
                                        if (hotel.hotel.description.text.length > 300) {
                                            hotel.hotel.description.text = hotel.hotel.description.text
                                                .slice(0, 300) + "...";

                                        }
                                    } else {
                                        hotel.hotel.description = {}
                                        hotel.hotel.description.text = "";

                                    }
                                }

                            })

                            if (resp.data.hasOwnProperty("meta")) {
                                if (resp.data.meta.hasOwnProperty("links")) {
                                    if (resp.data.meta.links.hasOwnProperty('next')) {
                                        this.nextPageAvailable(true);
                                        this.nextPageLink = resp.data.meta.links.next
                                    }
                                }
                            }
                            if (resp.data.hasOwnProperty("meta")) {
                                if (resp.data.meta.hasOwnProperty("links")) {
                                    if (resp.data.meta.links.hasOwnProperty('previous')) {
                                        this.previousPageAvailable(true);
                                    }
                                }
                            }

                            this.hotels.push(...resp.data.data)
                        } else {
                            this.notFound = true;
                        }


                    } else {
                        this.notFound = true;
                    }
                },
                selectRating: function(rating) {
                    if (this.selectedRating !== rating) {
                        this.selectedRating = rating;

                        this.getHotelsByCityName()
                    } else {
                        this.selectedRating = null;

                        this.getHotelsByCityName()
                    }

                },
                sortedBy: function(event) {
                    if (event.target.value === 0) {
                        this.sortBy = null;
                    } else {
                        this.sortBy = 'PRICE';
                    }

                    this.getHotelsByCityName()
                },
                switchPage: function(page) {
                    if (page == "next") {
                        if (this.nextAvailable) {
                            this.pageOffset += 1;
                            this.previousPageLink = this.currentPageLink
                            this.previousPageType = this.currentPageType
                            this.getHotelsByCityName(true, this.nextPageLink, null)
                        }

                    } else {
                        if (this.pageOffset > 0) {
                            this.pageOffset -= 1;
                            if (this.previousPageType == "base") {

                                this.getHotelsByCityName(false, null, this.previousPageLink)
                            } else if (this.previousPageType == "link") {
                                this.getHotelsByCityName(true, this.previousPageLink, null);
                            }

                        }
                    }

                },
                updateAmenitiesFilters() {
                    this.getHotelsByCityName();
                },
                nextPageAvailable: function(available) {
                    this.nextAvailable = available;
                },
                previousPageAvailable: function(available) {
                    this.previousAvailable = available;
                }
            }
        })
    </script>




@endsection
