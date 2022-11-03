    <template>
        <div class="accordion_inner_content">
            <div v-for="(segment, segmentIndex) in trip_data" :key="'trip_segment' + segmentIndex">
                <div class="accr_inner_list_wrapper">
                    <div class="accr_list_item_1">
                        <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">{{ formatTime(segment.Origin.DepTime) }}</h4>
                        <p class="txt_silver mb-0 fs_14">{{ segment.DurationTime }}</p>
                    </div>

                    <div class="accr_list_item_2">
                        <div class="accr_list_icon_wrapper">
                            <img class="accr_icon" src="/img/airplane_mode_icon.svg" alt="">
                            <img class="accr_after_icon" src="/img/after_airplane_line.svg" alt="">
                        </div>
                    </div>

                    <div class="accr_list_item_3">
                        <h4 class="txt_blue_secondary mb-0 fw_gilroy_bold h6">{{ segment.Origin.Airport.AirportName }}
                            ({{ segment.Origin.Airport.AirportCode }})</h4>
                        <p class="txt_silver mb-0 fs_14">{{ segment.Airline.AirlineName }} | {{ segment.Airline.FlightNumber
                        }}
                        </p>
                        <p class="txt_silver mb-0 fs_14">
                            <img src="/img/recliner_icon.svg" style="height:15px;">
                            {{ segment.NoOfSeatAvailable }} Seats Left
                        </p>

                    </div>
                </div>

                <div class="accr_inner_list_wrapper">
                    <div class="accr_list_item_1">
                        <h4 class="txt_blue_secondary mb-0 h6">{{ formatTime(segment.Destination.ArrTime) }} </h4>
                        <p class="txt_silver mb-0 fs_14"></p>
                    </div>

                    <div class="accr_list_item_2">
                        <div class="accr_list_icon_wrapper">
                            <img class="accr_icon" :src="getIcon(segmentIndex)" alt="">
                            <img v-if="!isLastSegment(segmentIndex)" class="accr_after_icon"
                                src="/img/after_circle_icon.svg" alt="">
                        </div>
                    </div>

                    <div class="accr_list_item_3">
                        <h4 class="txt_blue_secondary mb-0 h6">{{ segment.Destination.Airport.AirportName }}
                            ({{ segment.Destination.Airport.AirportCode }})</h4>
                        <p v-if="!isLastSegment(segmentIndex)" class="txt_silver mb-0 fs_14">{{ segment.ConnectingTime }}
                        </p>
                    </div>
                </div>





            </div>

        </div>

    </template>

    <script>
    export default {
        data: function () {
            return {

            };
        },
        props: {
            trip_data: null,

        },
        watch: {

        },

        methods: {
            isLastSegment: function (index) {

                if (index === this.trip_data.length - 1) {
                    return true;
                }
                return false;

            },

            getIcon: function (index) {
                if (this.isLastSegment(index)) {
                    return '/img/location_icon.svg'
                }
                return '/img/circle_icon.svg'
            },
            formatTime: function (time) {
                return moment(time).format('HH:mm');
            }

        },
        mounted() {

        },
    };
    </script>

    <style scoped>
    </style>
