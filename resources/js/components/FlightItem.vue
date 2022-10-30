<template>

    <div :class="{ trip_main_box_wrapper: is_side_bar == false, sidebar_trip_main_box_wrapper: is_side_bar }"
        class=" pad__x">
        <flight-box-item :selecting_flight_for_package="selecting_flight_for_package" :search_data="search_data" :airline_code="trip_data.flightCode" :is_side_bar="is_side_bar"
            v-for="(trip, tripIndex) in trip_data.Segments" :flight_index="tripIndex"
            :tripindex="tripIndex + '_' + tripindex" :trip_data="trip" :key="'flightboxitem' + tripIndex">
        </flight-box-item>

        <div class="d-flex align-items-center justify-content-between trip_submit_wrapper">

            <div class="d-flex flex-column">
                <div class="trip_submit_txt">
                    <p class="txt_silver mb-0 h6" style="    font-family: 'gilroy_bold';">{{countPassengers()}}</p>
                </div>
                <div class="trip_submit_txt">
                    <p class="txt_silver mb-0 h6" style="    font-family: 'gilroy_bold';">{{trip_data.isRefundable ? 'Refundable' : 'Non-Refundable'}}</p>
                </div>
 <!--                <div class="trip_submit_txt">
                    <p class="txt_silver mb-0 h6">{{trip_data.Segments[0].Segments[0].Baggage ? 'Baggage: ' + trip_data.Segments[0].Segments[0].Baggage : 'Baggage not included'}}</p>
                </div> -->
            </div>


            <div v-if="is_side_bar == false && is_read_only == false" class="trip_submit_button">
                <h4 class="txt_blue_secondary mb-0 me-4 h6" style="font-weight: bold;">{{
                ceil_price(trip_data.PublishedFare) }}
                    {{ trip_data.Currency }}</h4>
                <a v-on:click="handleFlight" class="btn btn_pink medium_btn fs_14">Select this trip</a>
            </div>
        </div>
    </div>
</template>

<script>

import FlightBoxItem from "./FlightBoxItem.vue";

export default {
    components: { FlightBoxItem },
    data: function () {
        return {

        };
    },
    props: {
        trip_data: null,
        tripindex: null,
        is_side_bar: null,
        search_data: null,
        search_key: null,
        selecting_flight_for_package: false,
        is_read_only: false,


    },
    watch: {

    },

    methods: {
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
                type_of_flight = "One Way"
            }
            else if (this.search_data.flight_type == 2) {
                type_of_flight = "Roundtrip"
            }
            else {
                type_of_flight = "Multiple"
            }
            let passengers = ''

            if (adults > 0) {
                passengers += adults + " Adult(s)"
            }
            if (children > 0) {
                passengers += children + ", Child"
            }
            if (infants > 0) {
                passengers += infants + ", Infant"
            }
            return `${type_of_flight} total price for ${passengers}`

        },
        ceil_price: function (price) {
            return Math.ceil(price);
        },
        handleFlight: async function () {

            if (this.selecting_flight_for_package)
            {
                this.$emit("flight_selected", this.trip_data);
                return;
            }
            let formData = new FormData();
            formData.append('flight', JSON.stringify(this.trip_data));
            formData.append('search_data', JSON.stringify(this.search_data))
            let resp = await axios.post('/flights/prepare_flight', formData);
            let key = resp.data;
            let params = '?data_key=' + key + '&search_key=' + this.search_key
            if (this.search_data.trip)
            {
                params += "&trip=" + this.search_data.trip
            }
            setTimeout(() => {
                window.open('/flights/review' + params, '_blank').focus();
            })

        }

    },
    mounted() {

    },
};
</script>

<style scoped>

</style>
