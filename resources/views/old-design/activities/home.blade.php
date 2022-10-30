@extends('layout')
@section('head')
    <link href="css-r/activities/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style>
        .add-border-radius {
            border-radius: 15px !important;
        }

        .body-content {}

        .inputField {

            width: auto;
        }

        .btn-fe2f70 {
            color: #fff !important;
            background-color: #fe2f70 !important;
            border-color: #fe2f70 !important;

        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .inputField-box span {
            position: initial;

            background-color: initial;
            padding: 0px 0px;
        }

    </style>
@endsection
@section('content')
    <div id='activities_app' class="body-content">
        <section>
            <div class="wrapper">
                <div class="breadcrumb_">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Activities</a>
                        </li>
                        <li class="breadcrumb-item active">Things to do</li>
                    </ol>
                </div>
                <div class="form-group row px-2">
                    <div class="col-sm-6 px-1 mb-2">
                        <div class="position-relative inputField-box">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input v-model="activity_destination" type="text"
                                class="w-100 inputField inputField-withicon add-border-radius" placeholder="Destination" />

                            <autocomplete-activity-component @autocomplete_result_selected="selectActivityResult($event)"
                                :keyword="activity_destination"></autocomplete-activity-component>

                        </div>
                    </div>
                    <div class="col-sm-4  px-1 mb-2">
                        <div class="position-relative inputField-box w-100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <vc-date-picker v-model="range" :min-date='new Date()' color="pink" is-range
                                :masks="{ input: ['MMM, DD'] }">
                                <template v-slot="{ inputValue, inputEvents }">
                                    <div class="flex justify-center items-center">
                                        <input :value="inputValue.start + ' To ' + inputValue.end" v-on="inputEvents.start"
                                            class="inputField inputField-withicon add-border-radius w-100" />


                                    </div>
                                </template>
                            </vc-date-picker>
                            {{-- <input type="text" class="inputField inputField-withicon add-border-radius" placeholder="Date"> --}}
                            {{-- <div style="position: absolute;z-index:13;background-color:white">
                                <vc-date-picker v-model="range" is-range />
                            </div> --}}

                        </div>
                    </div>

                    <div class="col-sm-2  px-1 mb-2">
                        <button v-on:click="getActivities" class="btn_search add-border-radius">
                            Search
                        </button>
                    </div>
                </div>

                <v-app v-if="loading" class="mb-3">
                    <v-progress-linear indeterminate color="pink"></v-progress-linear>
                </v-app>
                <div class="column-holder">
                    <!-- left -->


                    <div class="column-medium-4 sidebar">

                        <v-app v-if="loading">
                            <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                        </v-app>
                        <div v-if="!loading" class="pb-4 pt-3 filter-button">
                            <button class="wv-100 btn btn-outline-secondary" data-toggle="modal" data-target="#filter"><i
                                    class="fa fa-list" aria-hidden="true"></i> Sort &
                                Filter</button>
                        </div>
                        <div class="filter-section">
                            <div v-if="!loading" class="mb-2 search-section">
                                <div class="mb-2">Search for an activity</div>
                                <div class="position-relative inputField-box mb-2">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input v-model="searchKeyword" type="text" class="inputField inputField-withicon"
                                        placeholder="Enter a keyword" v-on:input="applyFilters()"
                                        style="border-radius: 15px !important;" />
                                </div>
                            </div>

                            <div v-if="!loading" class="pb-4 pt-3 section">
                                <h3 class="title">Filter By</h3>
                                <div class="desc pb-2">Activity Category</div>
                                <div v-for="(category, index) in available_categories[0]" class="form-check">
                                    <input :id="'category_' +  category.category_id" class="form-check-input text-dark"
                                        type="checkbox" value="option1"
                                        v-on:click="toggleCategoryFilter(category.category_id)">
                                    <label :for="'category_' +  category.category_id" class="form-check-label font-13">
                                        @{{ category.category_name }}
                                    </label>
                                </div>
                            </div>

                            <div v-if="!loading" class="pb-4 pt-3 section">
                                <h3 class="title">Traveler rating</h3>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_any_radiobutton_desktop"
                                        name="rating_radiobutton_desktop" class="form-check-input text-dark" type="radio"
                                        value="any" v-on:change="applyFilters()">
                                    <label for="rating_any_radiobutton_desktop" class="form-check-label font-13">
                                        Any
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_45_radiobutton_desktop"
                                        name="rating_radiobutton_desktop" v-on:change="applyFilters()"
                                        class="form-check-input text-dark" type="radio" value="4">
                                    <label for="rating_45_radiobutton_desktop" class="form-check-label font-13">
                                        Wonderful 4+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_4_radiobutton_desktop"
                                        name="rating_radiobutton_desktop" v-on:change="applyFilters()"
                                        class="form-check-input text-dark" type="radio" value="3">
                                    <label for="rating_4_radiobutton_desktop" class="form-check-label font-13">
                                        Very good 3+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_35_radiobutton_desktop"
                                        name="rating_radiobutton_desktop" v-on:change="applyFilters()"
                                        class="form-check-input text-dark" type="radio" value="2">
                                    <label for="rating_35_radiobutton_desktop" class="form-check-label font-13">
                                        Good 2+
                                    </label>
                                </div>
                            </div>

                            <div v-if="!loading" class="pb-4 pt-3 section">
                                <h3 class="title">Recommendations</h3>
                                <div class="form-check">
                                    <input v-model="free_cancellation_enabled" class="form-check-input text-dark"
                                        type="checkbox" id="free_cancellation_checkbox" value="option1"
                                        v-on:change="applyFilters()">
                                    <label class="form-check-label font-13" for="free_cancellation_checkbox">
                                        Free cancellation
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="on_sale_enabled" class="form-check-input text-dark" type="checkbox"
                                        value="option1" id="on_sale_checkbox" v-on:change="applyFilters()">
                                    <label class="form-check-label font-13" for="on_sale_checkbox">
                                        On Sale
                                    </label>
                                </div>
                                {{-- <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Deals
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Local expert picks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Family friendly
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    New on Trippbo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Selective hotel pickup
                                </label>
                            </div> --}}
                            </div>

                            <div v-if="!loading" class="pb-4 pt-3 section">
                                <h3 class="title">Your budget</h3>

                                <div v-if="!loading" class="form-check" v-for="(budget, key, index) in budgetFilter"
                                    v-on:click.stop="activateBudget(index)" :key="index">
                                    <input :id="'budget_desktop_any' + index" class="form-check-input text-dark"
                                        type="radio" value="any" name="activity_budget" :checked="budget.enabled">
                                    <label :for="'budget_desktop_any' + index" class="form-check-label font-13">
                                        @{{ index == 0 ? 'Any' : (index < 3 ? budget.min + String(' ' + currency) + ' - ' + budget.max + String(' ' + currency) : budget.min + String(' ' + currency) + ' or greater') }}
                                    </label>
                                </div>

                            </div>

                            {{-- <div class="pb-4 pt-3 section">
                            <h3 class="title">Start time</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    6:00am - 12:00pm (morning)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    12:00pm - 5:00pm (afternoon)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    5:00pm - 12:00am (evening)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Any time
                                </label>
                            </div>
                        </div> --}}

                            {{-- <div class="pb-4 pt-3 section">
                            <h3 class="title">Duration</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Less than 1 hour
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    1 to 4 hours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    4 hours to 1 day
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    More than 1 day
                                </label>
                            </div>
                        </div> --}}

                            {{-- <div class="pb-4 pt-3 section">
                            <h3 class="title">Tours & activities</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Tours & day trips
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Private & custom tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Water activities
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Cruises & boat tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Air, helicopter & balloon tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Winter activities
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Holiday & seasonal tours
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Tickets</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Attractions
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Transportation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Theme parks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Shows & concerts
                                </label>
                            </div>
                        </div> --}}
                            {{-- <div class="pb-4 pt-3 section mb-3">
                            <h3 class="title">Interests</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Adventure & outdoor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    History & culture
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Wildlife & nature
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Food, drink & nightlife
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Shopping & fashion
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Classes & workshops
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Weddings & honeymoons
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Spa & wellness
                                </label>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <!-- right -->
                    <div class="column-medium-8 paddingleft-medium-1">
                        <div class="rightBody">








                            {{-- <div class="row px-2 mb-3">
                            <div class="col-sm-12 dubai">
                                <div class="bbb_viewed_title_container">
                                    <div class="bbb_viewed_nav_container p-3 mb-4">
                                        <span class="float-left title">Dubai</span>
                                        <span class="bbb_viewed_nav bbb_viewed_next float-right">
                                            <image src="image-r/right-arrow.svg" />
                                        </span>
                                    </div>
                                </div>
                                <div class="bbb_viewed_slider_container px-3">
                                    <div class="owl-carousel owl-theme bbb_viewed_slider me-2">
                                        <div class="owl-items">
                                            <div class="bbb_viewed_item discount">
                                                <div class="product">
                                                    <div class="title mb-3">
                                                        Tours and Day Trip
                                                    </div>
                                                    <div class="footer-letter">
                                                        20 things to do
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-items">
                                            <div class="bbb_viewed_item discount">
                                                <div class="product">
                                                    <div class="title mb-3">
                                                        Tours and Day Trip
                                                    </div>
                                                    <div class="footer-letter">
                                                        20 things to do
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}










                            {{-- <div class="row mb-3">
                            <div class="col-sm-7">

                            </div>
                            <div class="col-sm-5">
                                <div class="position-relative inputField-box">
                                    <select class="inputField recommend">
                                        <option value="1" selected>recommend</option>
                                        <option value="2"></option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                            {{-- <div v-if="loading == false" class="row product-section-title mb-2">
                            <div class="col">
                                <div class=" float-left">
                                    Top 5 things to do
                                </div>
                                <div class=" float-right">
                                    Top 5 things to do
                                </div>
                            </div>
                        </div> --}}

                            {{-- <div class="row mb-4">
                            <div class="col-12 pl-1">
                                <div class="bbb_viewed_title_container">
                                    <div class="bbb_viewed_nav_container">
                                        <span class="bbb_viewed_nav bbb_viewed_next_card float-right"><i
                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="bbb_viewed_slider_container_card">
                                    <div class="owl-carousel owl-theme bbb_viewed_slider_card">
                                        <div v-for="activity in topActivites" class="card-item">
                                            <div class="card p-1" style="min-height: 300px;">
                                                <img :src="activity.ImageUrl" class="card-img-top" alt="...">
                                                <img src="image-r/heart.png" class="card-heart" />
                                                <div class="card-body p-2">

                                                    <div class="card-text mb-1">@{{ activity.ProductName }}
                                                    </div>
                                                    <div class="card-time mb-1"><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 7 hours</div>

                                                    <div class="card-foot mb-1">
                                                        <div class="float-left cancel">Free Cancelation</div>
                                                        <div class="price float-right"><b>$40</b> / Adult</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                            <div v-if="loading == false" class="row product-section-title mb-2">
                                <div class="col">
                                    <div class="float-left">
                                        Day trips
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
                            <div class="row">
                                <div v-for="(activity, activityIndex) in displayedActivites.slice(0 , number_of_displayed_results)"
                                    :key="activityIndex" class="col-sm-12 col-md-6 col-lg-4 p-1 ">
                                    <a :href="'/activities/view?product_code=' + activity.ProductCode + '&result_token=' + activity.ResultToken + '&date_from=' + range.start + '&date_to=' + range.end"
                                        target="_blank" style="display: block;height:100%;">
                                        <div style="height: 100%;">
                                            <div class="card p-1  h-100 add-border-radius">
                                                <img :src="activity.ImageHisUrl"
                                                    style="height: 160px;width:100%;object-fit:cover;"
                                                    class="card-img-top add-border-radius" alt="...">
                                                {{-- <img src="image-r/heart.png" class="card-heart" /> --}}
                                                <div class="card-body p-2">
                                                    {{-- <div class="card-title mb-1"><img src="image-r/clean.svg" />
                                                        Enhanced
                                                        Cleaning</div> --}}
                                                    <div class="card-text mb-1">@{{ activity.ProductName }}</div>
                                                    <div class="card-time mb-1"><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> @{{ activity.Duration }}</div>
                                                    {{-- <div class="card-mark mb-1">4.7/5<span class="card-review"> (50)
                                            </span>
                                        </div> --}}
                                                    <div class="card-foot mb-1">
                                                        <div v-if='activity.Cancellation_available'
                                                            class="float-left cancel">
                                                            Free Cancelation</div>
                                                        <div class="price float-right"><b>@{{ activity.Currency }}
                                                                @{{ activity.Price }}</b> / Adult</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>




                            </div>
                            <div v-if="displayedActivites.length > number_of_displayed_results"
                                class="d-flex justify-content-center text-center mt-5">
                                <div style="width:220px;">
                                    <button class="btn btn-block gilroy-medium btn-fe2f70 add-border-radius"
                                        v-on:click='showMoreResults'>Show More Results
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>



        <!-- modal -->
        <div class="modal fade p-0 m-0" id="filter">
            <div class="modal-xl modal-dialog-filter modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sort & Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="column-medium-4 sidebar">
                            <div class="mb-2 search-section">
                                <div class="mb-2">Search for an activity</div>
                                <div class="position-relative inputField-box mb-2">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input v-model="searchKeyword" type="text" class="inputField inputField-withicon"
                                        placeholder="Enter a keyword" v-on:input="applyFilters()" />
                                </div>
                            </div>

                            <div class="pb-4 pt-3 section">
                                <h3 class="title">Filter By</h3>
                                {{-- <div class="desc pb-2">Cleaning and safety divractices</div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Enhanced cleaning <br>
                                    Activity suppliers taking additional steps to clean and sanitize
                                </label>
                            </div> --}}
                            </div>
                            <div class="pb-4 pt-3 section">
                                <h3 class="title">Filter By</h3>
                                <div class="desc pb-2">Activity Category</div>
                                <div v-for="(category, index) in available_categories[0]" class="form-check">
                                    <input :id="'category_' +  category.category_id + '_mobile'"
                                        class="form-check-input text-dark" type="checkbox" value="option1"
                                        v-on:click="toggleCategoryFilter(category.category_id)">
                                    <label :for="'category_' +  category.category_id + '_mobile'"
                                        class="form-check-label font-13">
                                        @{{ category.category_name }}
                                    </label>
                                </div>
                            </div>

                            <div class="pb-4 pt-3 section">
                                <h3 class="title">Traveler rating</h3>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_any_radiobutton" name="rating_radiobutton"
                                        class="form-check-input text-dark" type="radio" value="any"
                                        v-on:change="applyFilters()">
                                    <label for="rating_any_radiobutton" class="form-check-label font-13">
                                        Any
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_45_radiobutton" name="rating_radiobutton"
                                        v-on:change="applyFilters()" class="form-check-input text-dark" type="radio"
                                        value="4">
                                    <label for="rating_45_radiobutton" class="form-check-label font-13">
                                        Wonderful 4+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_4_radiobutton" name="rating_radiobutton"
                                        v-on:change="applyFilters()" class="form-check-input text-dark" type="radio"
                                        value="3">
                                    <label for="rating_4_radiobutton" class="form-check-label font-13">
                                        Very good 3+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="rating" id="rating_35_radiobutton" name="rating_radiobutton"
                                        v-on:change="applyFilters()" class="form-check-input text-dark" type="radio"
                                        value="2">
                                    <label for="rating_35_radiobutton" class="form-check-label font-13">
                                        Good 2+
                                    </label>
                                </div>
                            </div>

                            <div class="pb-4 pt-3 section">
                                <h3 class="title">Recommendations</h3>
                                <div class="form-check">
                                    <input v-model="free_cancellation_enabled" class="form-check-input text-dark"
                                        type="checkbox" id="free_cancellation_checkbox_mobile" value="option1"
                                        v-on:change="applyFilters()">
                                    <label class="form-check-label font-13" for="free_cancellation_checkbox_mobile">
                                        Free cancellation
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="on_sale_enabled" class="form-check-input text-dark" type="checkbox"
                                        value="option1" id="on_sale_checkbox_mobile" v-on:change="applyFilters()">
                                    <label class="form-check-label font-13" for="on_sale_checkbox_mobile">
                                        On Sale
                                    </label>
                                </div>
                                {{-- <div class="pb-4 pt-3 section">
                                    <h3 class="title">Your budget</h3>

                                    <div class="form-check">
                                        <input id="budget_any" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="any" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_any" class="form-check-label font-13">
                                            Any
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="budget_0" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="less_than_75" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_0" class="form-check-label font-13">
                                            Less than $75
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="budget_1" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="between_75_125" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_1" class="form-check-label font-13">
                                            $75 to $125
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="budget_2" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="between_125_200" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_2" class="form-check-label font-13">
                                            $125 to $200
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="budget_3" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="between_200_300" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_3" class="form-check-label font-13">
                                            $200 to $300
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="budget_4" v-model="budget" class="form-check-input text-dark"
                                            type="radio" value="more_than_300" name="activity_budget_mobile"
                                            v-on:change="applyFilters()">
                                        <label for="budget_4" class="form-check-label font-13">
                                            Greater than $300
                                        </label>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Deals
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Local expert picks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Family friendly
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    New on Trippbo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Selective hotel pickup
                                </label>
                            </div> --}}
                            </div>


                            {{-- <div class="pb-4 pt-3 section">
                            <h3 class="title">Traveler rating</h3>
                            <div class="form-check">
                                <input v-model="rating" id="rating_any_radiobutton" name="rating_radiobutton"
                                    class="form-check-input text-dark" type="radio" value="any" checked>
                                <label for="rating_any_radiobutton" class="form-check-label font-13">
                                    Any
                                </label>
                            </div>
                            <div class="form-check">
                                <input v-model="rating" id="rating_45_radiobutton" name="rating_radiobutton"
                                    class="form-check-input text-dark" type="radio" value="45">
                                <label for="rating_45_radiobutton" class="form-check-label font-13">
                                    Wonderful 4.5+
                                </label>
                            </div>
                            <div class="form-check">
                                <input v-model="rating" id="rating_4_radiobutton" name="rating_radiobutton"
                                    class="form-check-input text-dark" type="radio" value="4">
                                <label for="rating_4_radiobutton" class="form-check-label font-13">
                                    Very good 4+
                                </label>
                            </div>
                            <div class="form-check">
                                <input v-model="rating" id="rating_35_radiobutton" name="rating_radiobutton"
                                    class="form-check-input text-dark" type="radio" value="35">
                                <label for="rating_35_radiobutton" class="form-check-label font-13">
                                    Good 3.5+
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Recommendations</h3>
                            <div class="form-check">
                                <input v-model="free_cancellation_enabled" id="cancellation_checkbox_mobile"
                                    class="form-check-input text-dark" type="checkbox" value="option1">
                                <label for="cancellation_checkbox_mobile" class="form-check-label font-13">
                                    Cancellation Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input v-model="on_sale_enabled" id="on_sale_checkbox_mobile"
                                    class="form-check-input text-dark" type="checkbox" value="option1">
                                <label for="on_sale_checkbox_mobile" class="form-check-label font-13">
                                    On Sale
                                </label>
                            </div>

                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Your budget</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Less than $75
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    $75 to $125
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    $125 to $200
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    $200 to $300
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Greater than $300
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Start time</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    6:00am - 12:00pm (morning)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    12:00pm - 5:00pm (afternoon)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    5:00pm - 12:00am (evening)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Any time
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Duration</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Less than 1 hour
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    1 to 4 hours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    4 hours to 1 day
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    More than 1 day
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Tours & activities</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Tours & day trips
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Private & custom tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Water activities
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Cruises & boat tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Air, helicopter & balloon tours
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Winter activities
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Holiday & seasonal tours
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section">
                            <h3 class="title">Tickets</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Attractions
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Transportation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Theme parks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Shows & concerts
                                </label>
                            </div>
                        </div>

                        <div class="pb-4 pt-3 section mb-3">
                            <h3 class="title">Interests</h3>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1" checked>
                                <label class="form-check-label font-13">
                                    Adventure & outdoor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    History & culture
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Wildlife & nature
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Food, drink & nightlife
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Shopping & fashion
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Classes & workshops
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Weddings & honeymoons
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input text-dark" type="checkbox" value="option1">
                                <label class="form-check-label font-13">
                                    Spa & wellness
                                </label>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="filter-modal-done">
                        <button type="button" class="btn btn-primary wv-100" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <script src="js-r/custom.js"></script>
    <script>
        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        let cancel = function() {

        }
        const flights_app = new Vue({
            el: '#activities_app',
            vuetify: new Vuetify(),
            data: {
                number_of_displayed_results: 18,
                activity_destination: '{{ $activity_destination_name }}',
                city_id: '{{ $city_id }}',
                activites: [],
                displayedActivites: [],
                topActivites: [],
                loading: true,
                rating: 'any',
                free_cancellation_enabled: false,
                on_sale_enabled: false,
                budget: 'any',
                available_categories: [],
                enabled_categories: [],
                exchangeRate: 0,
                currency: '',
                searchKeyword: '',
                selectedDates: ['{{ $date_from }}', '{{ $date_to }}'],
                range: {
                    start: '{{ $date_from }}',
                    end: '{{ $date_to }}'
                },
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

            },

            async mounted() {
                let url = '/getExchangeRate';
                let resp = await axios.get(url)
                let exchange_rate = resp.data.exchangeRate;
                this.exchangeRate = exchange_rate;
                this.currency = resp.data.currency;
                for (const [key, value] of Object.entries(this.budgetFilter)) {
                    value.min = Math.round(value.min * exchange_rate);
                    value.max = Math.round(value.max * exchange_rate);

                }
                await this.getActivities();
            },

            methods: {
                getActivities: async function() {
                    let error = false;
                    let url = '/activities/get/' + this.city_id;
                    this.loading = true
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
                    console.log(resp.data)

                    this.loading = false
                    this.activites = [];
                    this.activites.push(...resp.data.activites)
                    this.available_categories = [];
                    this.available_categories.push(resp.data.categories)
                    this.topActivites.push(...this.activites.slice(0, 5))
                    this.displayedActivites = [];
                    this.applyFilters()

                },
                selectActivityResult: function(result) {

                    this.city_id = result.city_code;
                    this.activity_destination = result.city_name;
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
                showMoreResults: function() {
                    this.number_of_displayed_results += 20;
                },
                applyFilters: function() {
                    if (this.isFiltersEnabled()) {

                        let all_activites = this.activites.slice()
                        let toRemove = [];
                        let temp = [];
                        if (this.enabled_categories.length > 0) {
                            temp = all_activites.filter((el) => {
                                let included = false;
                                for (let i = 0; i < el.Categories.length; i++) {
                                    if (this.enabled_categories.includes(el.Categories[i])) {
                                        included = true;
                                    }
                                }
                                return !included;
                            })

                            toRemove.push(...temp);

                        }
                        if (this.rating == '4') {
                            temp = all_activites.filter((el) => {
                                return el.StarRating < 4;
                            })
                            toRemove.push(...temp);
                        }
                        if (this.rating == '3') {
                            temp = all_activites.filter((el) => {
                                return el.StarRating < 3;
                            })
                            toRemove.push(...temp);
                        }
                        if (this.rating == '2') {
                            temp = all_activites.filter((el) => {
                                return el.StarRating < 2;
                            })
                            toRemove.push(...temp);
                        }
                        if (this.free_cancellation_enabled == true) {
                            temp = all_activites.filter((el) => {
                                return el.Cancellation_available == false;
                            })
                            toRemove.push(...temp);
                        }
                        if (this.on_sale_enabled == true) {
                            temp = all_activites.filter((el) => {
                                return el.Promotion == false;
                            })
                            toRemove.push(...temp);
                        }

                        /*   if (this.budget == 'less_than_75') {
                              let temp = all_activites.filter((el) => {
                                  return el.Price > 75;
                              })
                              toRemove.push(...temp);
                          } else if (this.budget == 'between_75_125') {
                              let temp = all_activites.filter((el) => {
                                  return el.Price < 75 || el.Price > 125;
                              })
                              toRemove.push(...temp);
                          } else if (this.budget == 'between_125_200') {
                              let temp = all_activites.filter((el) => {
                                  return el.Price < 125 || el.Price > 200;
                              })
                              toRemove.push(...temp);
                          } else if (this.budget == 'between_200_300') {
                              let temp = all_activites.filter((el) => {
                                  return el.Price < 200 || el.Price > 300;
                              })
                              toRemove.push(...temp);
                          } else if (this.budget == 'more_than_300') {
                              let temp = all_activites.filter((el) => {
                                  return el.Price < 300;
                              })
                              toRemove.push(...temp);
                          } */

                        for (const [key, value] of Object.entries(this.budgetFilter)) {
                            if (value.enabled) {
                                temp = all_activites.filter((el) => {

                                    return el.Price < value.min || el.Price > value.max
                                })
                            }
                        }
                        toRemove.push(...temp);

                        if (this.searchKeyword !== '') {
                            let temp = all_activites.filter((el) => {
                                let lower = el.ProductName.toLowerCase();
                                let search = this.searchKeyword.toLowerCase();
                                return !lower.includes(search);
                            })
                            toRemove.push(...temp);
                        }


                        all_activites = all_activites.filter((el) => {
                            return toRemove.indexOf(el) < 0;
                        })


                        this.displayedActivites = [];
                        this.displayedActivites = all_activites;
                    } else {
                        this.displayedActivites = [];
                        this.displayedActivites.push(...this.activites)
                    }
                },
                isFiltersEnabled: function() {
                    if (this.rating == 'any' && this.free_cancellation_enabled == false &&
                        this.on_sale_enabled == false &&
                        this.budgetFilter.any.enabled == true &&
                        this.enabled_categories.length < 1 &&
                        this.searchKeyword == '') {
                        return false;

                    } else {
                        return true;
                    }
                },
                toggleCategoryFilter: function(category_id) {
                    if (this.enabled_categories.includes(category_id)) {
                        this.enabled_categories.splice(this.enabled_categories.indexOf(category_id), 1)

                    } else {
                        this.enabled_categories.push(category_id);
                    }
                    this.applyFilters();
                }
            },
            updated: function() {
                this.$nextTick(function() {
                    let viewedSlider = $('.bbb_viewed_slider_card');
                    viewedSlider.owlCarousel();
                })
            }
        })
    </script>
@endsection
