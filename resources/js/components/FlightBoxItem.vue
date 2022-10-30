<template>
    <div :class="{trip_box_item: is_side_bar == false, sidebar_trip_box_item: is_side_bar}">
        <div class="trip_box_header">
            <h4 class="trip_box_heading mb-1 h6">{{ flight_index == 0 ? 'Departure' : 'Return' }} Flight</h4>
            <!--  <p class="trip_box_after_heading txt_pink fs_14">Next cheapest</p> -->
        </div>

        <div :class="{trip_box_content: is_side_bar == false ,side_bar_trip_box_content: is_side_bar}">
            <h6 class="trip_box_content_txt mb-2"><img :src="'/airline_logo/' + airline_code + '.gif'" alt=""></h6>

            <div class="trip_box_content_time">
                <div class="trip_box_time_wrapper">
                    <div class="trip_box_time_item">
                        <h4 class="trip_box_time_heading h6">{{ formatTime(trip_data.DepartureTime) }}</h4>
                        <div class="trip_box_time_txt_secondary">
                            <div class="trip_box_time_baline"></div>
                            <p class="txt_silver fs_14">{{ trip_data.TotalDuraionTime }}</p>
                            <div class="trip_box_time_baline"></div>
                        </div>
                        <h4 v-if="!isNight(trip_data.ArrivalTime)" class="trip_box_time_heading h6">{{
                        formatTime(trip_data.ArrivalTime) }} <img src="/img/summer_summer.svg" alt=""></h4>

                        <h4 v-if="isNight(trip_data.ArrivalTime)" class="trip_box_time_heading h6">{{
                        formatTime(trip_data.ArrivalTime) }} <img src="/img/moon-solid.svg" style="width: 15px;"
                                alt=""></h4>

                    </div>

                    <div class="trip_box_description txt_blue_secondary">
                        <div class="trip_box_time_description fs_14">
                            {{ trip_data.DepartureAirportName }} ({{ trip_data.DepartureAirportCode }})
                        </div>

                        <div class="trip_box_time_description fs_14">
                            {{ trip_data.ArrivalAirportName }} ({{ trip_data.ArrivalAirportCode }})
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="trip_box_footer">
            <div class="trip_box_footer_bar">
                <div v-if="!selecting_flight_for_package" class="trip_box_footer_bar_item trip_box_responsive_order" id="accordionOne">
                    <button class="btn small_btn btn_pink btn_style fs_14" role="button" type="button"
                        data-bs-toggle="collapse" :data-bs-target="'#collapseOne' + tripindex" aria-expanded="true"
                        aria-controls="collapseOne">{{ trip_data.Segments.length - 1 == 0 ? 'Direct' :
                        trip_data.Segments.length - 1 + ' Stop' }} <span class="ms-1"><i
                                class="fas fa-angle-down"></i></span></button>
                </div>
                <div class="trip_box_footer_bar_item">
                    <div class="trip_box_footer_bar_item_icon trip_footer_bar_reponsive_column">
                        <div class="image_height_footer_bar_responsive">
                            <img src="/img/user_icon.svg" alt="">
                        </div>
                        <p class="txt_silver fs_14" v-html="countPassengers()"> </p>
                    </div>
                </div>
                <div class="trip_box_footer_bar_item">
                    <div class="trip_box_footer_bar_item_icon trip_footer_bar_reponsive_column">
                        <div class="image_height_footer_bar_responsive">
                            <img src="/img/recliner_icon.svg" alt="">
                        </div>
                        <p class="txt_silver fs_14 text-center"> {{ trip_data.Segments[0].NoOfSeatAvailable }}
                            Seats
                            left</p>
                    </div>
                </div>
                <div class="trip_box_footer_bar_item">
                    <div class="trip_box_footer_bar_item_icon trip_footer_bar_reponsive_column">
                        <div class="d-flex image_height_footer_bar_responsive">
                            <div class="small_luggage">
                                <span>{{ formatWeight(trip_data.Segments[0].CabinBaggage) }}</span>
                                <img src="/img/handbag.png" alt="">
                            </div>
                            <div class="large_luggage">
                                <span>{{ formatWeight(trip_data.Segments[0].Baggage) }}</span>
                                <img src="/img/large_bag.svg" alt="">
                            </div>
                        </div>
                        <p class="txt_silver fs_14">Baggage <br> {{ baggageStatus(trip_data.Segments[0].Baggage) }}</p>
                    </div>
                </div>
            </div>
            <div v-if="selecting_flight_for_package" class="trip_box_footer_bar_item trip_box_responsive_order" style="justify-content: start !important;" id="accordionOne">
                    <button class="btn small_btn btn_pink btn_style fs_14"  role="button" type="button"
                        data-bs-toggle="collapse" :data-bs-target="'#collapseOne' + tripindex" aria-expanded="true"
                        aria-controls="collapseOne">{{ trip_data.Segments.length - 1 == 0 ? 'Direct' :
                        trip_data.Segments.length - 1 + ' Stop' }} <span class="ms-1"><i
                                class="fas fa-angle-down"></i></span></button>
                </div>
            <div class="accordion_wrapper" id="accordionWrapper">
                <div :id="'collapseOne' + tripindex" class="mt-3 collapse" ref="coll" aria-labelledby="headingOne"
                    data-bs-parent="#accordionWrapper">

                    <flight-ui :trip_data="trip_data.Segments"></flight-ui>

                </div>
            </div>
        </div>

    </div>

</template>

<script>

import FlightUI from "./FlightUI.vue";

export default {
    components: { FlightUI },
    data: function () {
        return {
            expanded: false,

        };
    },
    props: {
        trip_data: null,
        tripindex: null,
        flight_index: null,
        is_side_bar: null,
        airline_code: '',
        search_data: null,
        selecting_flight_for_package: false

    },
    watch: {

    },

    methods: {

        isNight: function (time) {
            let t = moment(time).format('HH');
            let hour = parseInt(t);
            console.log(hour)

            if (hour > 18 || hour <= 3) {
                return true;
            }
            else {
                return false;
            }
        },
        countPassengers() {
            return 1;
            let pax = JSON.parse(this.search_data.flight_passengers);
            let adults = 0;
            let children = 0;
            let infants = 0;

            for (let i = 0; i < pax.length; i++) {
                if (pax[i].id == 1) {
                    adults = pax[i].passengers.length;
                }
                if (pax[i].id == 4) {
                    children = pax[i].passengers.length;
                }
                if (pax[i].id == 6) {
                    infants = pax[i].passengers.length;
                }
            }
            let total = adults + children + infants
            let type_of_flight = ''
            if (this.search_data.flight_type == 1) {
                /*    type_of_flight = "One Way" */
            }
            else if (this.search_data.flight_type == 1) {
                /*        type_of_flight = "Roundtrip" */
            }
            else {
                /* type_of_flight = "Multiple" */
            }
            return `${total} <br> ${type_of_flight}`

        },
        formatTime: function (time) {
            return moment(time, 'YYYY-MM-DD hh:mm:ss A').format('HH:mm');
        },
        togglePanel: function () {

            let co = this.$refs.coll;
            console.log(co);
            let element = bootstrap.Collapse.getInstance(co)
            console.log(element)
            return;

        },
        formatWeight: function (weight) {
            if (weight) {
                let w = weight?.replace('KG', '')
                w = w.replace('Piece(s)', '')

                return w;
            }
            else {
                return '';
            }

            return weight;

            if (weight?.substring(0, 1) == 0) {
                return '0'
            }
            else {
                let w = weight?.replace('KG', '')
                return w;
            }



        },
        baggageStatus: function (weight) {

            if (weight?.substring(0, 1) == 0) {
                return 'Excluded'
            }
            else {
                return 'Included'
            }
        }

    },
    mounted() {


    },
};
</script>

<style scoped>

</style>
