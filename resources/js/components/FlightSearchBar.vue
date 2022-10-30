<template>
    <div v-on:click="passenger_panel_visible = false" style="position: relative;">
        <div v-if="current_view_style == 1" class="ticket_box_row_top">
            <!-- 1 -->
            <div class="select_box select_box_1 select_boxes text_dark_blue fw_gilroy_bold">
                <select v-model="selected_flight_type" class="child_select_box child_select_box_2 flight_select_box">
                    <option v-for="flighttype in flight_type" :value="flighttype.id" selected>{{ flighttype.type_name }}
                    </option>

                </select>
            </div>
            <!-- 2 -->
            <div v-on:click.stop="" class="select_box select_box_2 ">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne11" tabindex="1">
                        <button v-on:click.prevent="passenger_panel_visible = !passenger_panel_visible"
                            class="accordion-button text_dark_blue fw_gilroy_bold nice_text"
                            :class="{btn_collapsed : passenger_panel_visible }" type="button">
                            {{passengersCount()}} Travellers
                        </button>
                    </h2>
                    <div class="accordion_select" tabindex="1" :class="{ show_acc: passenger_panel_visible }">
                        <div class="accordion-body">
                            <div class="child_a_select">
                                <!-- 1 -->
                                <div v-for="passenger in flight_passengers" class="child_a_select_row">
                                    <p class="mb-0">{{ passenger.passenger_type }}
                                        <span>{{ passenger.passenger_age_range }}</span>
                                    </p>
                                    <div class="increase_decrease_btns">
                                        <div v-on:click="removePassenger(passenger.id)"><i class="fas fa-minus"></i>
                                        </div>
                                        <input readonly data-value type="text" :value="passenger.passengers.length">
                                        <div v-on:click="addPassenger(passenger)"><i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="select_box select_box_3 select_boxes text_dark_blue fw_gilroy_bold">
                <select v-model="selected_flight_class" class="child_select_box child_select_box_2 flight_select_box">
                    <option selected v-on:click="selected_flight_class = flightclass.id"
                        v-for="(flightclass, index) in flight_class" :value="flightclass.id">
                        {{ flightclass.class_name }}</option>

                </select>
            </div>

        </div>
        <!-- ticket_box_row_bottom -->
        <div v-if="current_view_style == 1" class="ticket_box_row_bottom index_ticket landing_ticket">
            <div id="l_f_row_1" class="landing_form_row_1 mb-3">
                <!-- 1 -->
                <div class="ticket_input_1 me-2">
                    <input v-on:input="departure_search_keyword = $event.target.value"
                        v-model="departure_search_keyword" type="text" placeholder="Departure City">
                    <span class="clear_input_ticket"><img src="/img/clear_cross.svg" alt=""></span>
                    <AutocompleteComponent :has_initial_value="initial_autocomplete_value"
                        @autocomplete_result_selected="select_departure_result" :type="'airport'"
                        :keyword="departure_search_keyword"></AutocompleteComponent>

                </div>
                <!-- 2 -->
                <div class="ticket_input_2 me-2">
                    <button id="change_direction" type="button" class="arrow_up_down"><img src="/img/arrow_up_down.svg"
                            alt=""></button>
                </div>
                <!-- 3 -->
                <div class="ticket_input_3 me-2">
                    <input v-on:input="destination_search_keyword = $event.target.value"
                        v-model="destination_search_keyword" type="text" placeholder="Destination">
                    <span class="clear_input_ticket"><img src="/img/clear_cross.svg" alt=""></span>
                    <AutocompleteComponent :has_initial_value="initial_autocomplete_value"
                        @autocomplete_result_selected="select_destination_result" :type="'airport'"
                        :keyword="destination_search_keyword"></AutocompleteComponent>

                </div>
            </div>
            <!-- 4 -->
            <div class="wrap_date_input">
                <div class="wrap_date_after_box"></div>
                <div class="ticket_input_4 me-2">
                    <input type="text" autocomplete="off" :value="first_date" class="input__date input_date_flight"
                        placeholder="2022-07-01">
                    <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                </div>
                <div v-if="selected_flight_type !== 1" class="ticket_input_5 me-2">
                    <input type="text" autocomplete="off" :value="second_date" class="input__date input_date_flight"
                        placeholder="2022-09-01">
                    <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                </div>
                <div style="position:absolute; top: -300px; left: 0px;z-index:1300">
                    <date-picker :range="selected_flight_type !== 1" :unique_id="unique_id"
                        @first_date_changed="handle_first_flight_date" @second_date_changed="handle_second_flight_date"
                        ref="date_picker_2">
                    </date-picker>
                </div>
            </div>
            <button v-on:click.prevent="search" class="form_btn fs_14">Search</button>
        </div>












        <div style="z-index:1000;" v-if="current_view_style == 2" class="ticket_box_wrap">
            <form class="ticket_box pad__x">
                <!-- ticket_box_row_top -->
                <div class="ticket_box_row_top">
                    <!-- 1 -->
                    <div class="select_box select_box_1 select_boxes text_dark_blue fw_gilroy_bold">
                        <select v-model="selected_flight_type"
                            class="child_select_box child_select_box_2 flight_select_box">
                            <option selected v-for="flighttype in flight_type"
                                v-on:click="selected_flight_type = flighttype.id" :value="flighttype.id">
                                {{ flighttype.type_name }}
                            </option>
                        </select>
                    </div>
                    <!-- 2 -->
                    <div class="select_box select_box_2">
                        <div class="accordion-item">
                            <h2 v-on:click.prevent.stop="passenger_panel_visible = !passenger_panel_visible"
                                class="accordion-header" tabindex="1">
                                <button class="accordion-button text_dark_blue fw_gilroy_bold nice_text"
                                    :class="{'btn_collapsed' : passenger_panel_visible}">
                                    {{passengersCount()}} Travellers
                                </button>
                            </h2>
                            <div v-on:click.stop="" class="accordion_select"
                                :class="{ show_acc: passenger_panel_visible }" tabindex="1">
                                <div class="accordion-body">
                                    <div class="child_a_select">
                                        <!-- 1 -->
                                        <div v-for="passenger in flight_passengers" class="child_a_select_row">
                                            <p class="mb-0">{{ passenger.passenger_type }} <span>{{
                                            passenger.passenger_age_range
                                            }}</span></p>
                                            <div class="increase_decrease_btns">
                                                <div v-on:click="removePassenger(passenger.id)"><i
                                                        class="fas fa-minus"></i></div>
                                                <input readonly type="text" :value="passenger.passengers.length">
                                                <div v-on:click="addPassenger(passenger)"><i class="fas fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="select_box select_box_3 select_boxes text_dark_blue fw_gilroy_bold">
                        <select v-model="selected_flight_class"
                            class="child_select_box child_select_box_2 flight_select_box">
                            <option selected v-for="flightclass in flight_class"
                                v-on:click="selected_flight_class = flightclass.id" :value="flightclass.id">
                                {{flightclass.class_name}}</option>

                        </select>
                    </div>

                </div>
                <!-- ticket_box_row_bottom -->
                <div class="ticket_box_row_bottom index_ticket">
                    <!-- 1 -->
                    <div class="ticket_input_1 me-2">
                        <input v-on:input="departure_search_keyword = $event.target.value"
                            v-model="departure_search_keyword" type="text" placeholder="Paris Charles de Gaulle">
                        <span class="clear_input_ticket"
                            onclick="document.querySelector('#ticket_input_a').value=''"><img src="/img/clear_cross.svg"
                                alt=""></span>

                        <AutocompleteComponent :has_initial_value="initial_autocomplete_value"
                            @autocomplete_result_selected="select_departure_result" :type="'airport'"
                            :keyword="departure_search_keyword"></AutocompleteComponent>
                    </div>
                    <!-- 2 -->
                    <div class="ticket_input_2 me-2">
                        <button id="change_direction" type="button" class="arrow_up_down"><img
                                src="/img/arrow_up_down.svg" alt=""></button>
                    </div>
                    <!-- 3 -->
                    <div class="ticket_input_3 me-2">
                        <input v-on:input="destination_search_keyword = $event.target.value"
                            v-model="destination_search_keyword" type="text" placeholder="Catania Fontanaross...">
                        <span class="clear_input_ticket"
                            onclick="document.querySelector('#ticket_input_b').value=''"><img src="/img/clear_cross.svg"
                                alt=""></span>

                        <AutocompleteComponent :has_initial_value="initial_autocomplete_value2"
                            @autocomplete_result_selected="select_destination_result" :type="'airport'"
                            :keyword="destination_search_keyword"></AutocompleteComponent>
                    </div>
                    <!-- 4 -->
                    <div class="wrap_date_input">
                        <div class="wrap_date_after_box"></div>
                        <div class="ticket_input_4 me-2">
                            <input autocomplete="off" :value="first_date" type="text"
                                class="input__date input_date_flight" placeholder="2022-07-01">
                            <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <div v-if="selected_flight_type !== 1" class="ticket_input_5 me-2">
                            <input type="text" autocomplete="off" :value="second_date"
                                class="input__date input_date_flight" placeholder="2022-09-01">
                            <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <!-- calendar box -->
                        <div style="position:absolute; top: -300px; left: 0px;z-index:1300">
                            <date-picker :range="selected_flight_type !== 1" :unique_id="unique_id"
                                @first_date_changed="handle_first_flight_date"
                                @second_date_changed="handle_second_flight_date" ref="date_picker_2">
                            </date-picker>
                        </div>
                    </div>
                    <button v-on:click.prevent="search(false)" class="form_btn fs_14">Search</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import AutocompleteComponent from "./AutocompleteComponent.vue";
export default {
    components: { AutocompleteComponent },
    data: function () {
        return {
            unique_id: 'flight_search',
            first_date: '',
            second_date: '',
            departure_search_keyword: '',
            destination_search_keyword: '',
            selected_departure_result_object: null,
            selected_destination_result_object: null,
            my_nice_selects: [],
            initial_autocomplete_value: false,
            initial_autocomplete_value2: false,
            flights_loading: true,



            passenger_panel_visible: false,

            flight_passengers: [
                {
                    id: 1,
                    passenger_type: 'Adult',
                    passenger_age_range: '18+',
                    passengers: [],
                    increments: 0,
                },
                /*         {
                            id: 2,
                            passenger_type: 'Student',
                            passenger_age_range: '18+',
                            passengers: [],
                            increments: 0,
                        },
                        {
                            id: 3,
                            passenger_type: 'Young People',
                            passenger_age_range: '12 - 17',
                            passengers: [],
                            increments: 0,
                        }, */
                {
                    id: 4,
                    passenger_type: 'Children',
                    passenger_age_range: '2 - 11',
                    passengers: [],
                    increments: 0,
                },
                /*     {
                        id: 5,
                        passenger_type: 'Small children in their own seat',
                        passenger_age_range: 'Under 2',
                        passengers: [],
                        increments: 0,
                    }, */
                {
                    id: 6,
                    passenger_type: 'Infant',
                    passenger_age_range: 'Under 2',
                    passengers: [],
                    increments: 0,
                }



            ],

            flight_class: [
                {
                    id: 1,
                    class_name: 'Economy',

                },
                /*          {
                             id: 2,
                             class_name: 'Premium Economy',

                         }, */
                {
                    id: 3,
                    class_name: 'Business',

                },
                {
                    id: 4,
                    class_name: 'First Class',

                },
                /*        {
                           id: 5,
                           class_name: 'Several Class',

                       }, */

            ],

            flight_type: [
                {
                    id: 1,
                    type_name: 'One Way',

                },
                {
                    id: 2,
                    type_name: 'Roundtrip',

                }/* ,
                {
                    id: 3,
                    type_name: 'Multiple Destinations',

                } */

            ],



            selected_flight_class: 1,
            selected_flight_type: 1,

        };
    },
    props: {
        visible: false,
        current_view_style: null,
        search_data: null


    },

    methods: {

        updateNiceSelects: function () {
            for (let i = 0; i < this.my_nice_selects.length; i++) {
                this.my_nice_selects[i].update();
            }
            console.log("updated");
        },

        hidePanel() {
            this.passenger_panel_visible = false;
        },

        checkForNiceSelect: function () {
            let x = $($(".flight_select_box")[0]).css('display');
            console.log("style is")
            console.log(x);
        },
        search: async function (should_redirect = true) {

            let d = new FormData();
            d.append('departure_date', this.first_date)
            d.append('return_date', this.second_date)
            d.append('departure_airport_id', this.selected_departure_result_object.airport_id)
            d.append('destination_airport_id', this.selected_destination_result_object.airport_id);
            d.append('flight_class', this.selected_flight_class)
            d.append('flight_type', this.selected_flight_type)
            d.append('flight_passengers', JSON.stringify(this.flight_passengers))






            let resp = await axios.post('/flight/prepare_flight_search', d)
            if (should_redirect)
            {
                window.location = "/flights/search?key=" + resp.data
            }
            else
            {
                this.$emit("new_search", {
                    departure_date: this.first_date,
                    return_date: this.second_date,
                    departure_airport_id: this.selected_departure_result_object.airport_id,
                    destination_airport_id: this.selected_destination_result_object.airport_id,
                    flight_class: this.selected_flight_class,
                    flight_type: this.selected_flight_type,
                    flight_passengers: JSON.stringify(this.flight_passengers),
                    search_key: resp.data,
                    trip: this.search_data.trip

                });
            }




        },
        handle_first_flight_date(event) {
            console.log('called_with' + event);
            this.first_date = event
        },
        handle_second_flight_date(event) {
            this.second_date = event
        },
        select_departure_result: function (data) {
            this.departure_search_keyword = data.Name;
            this.selected_departure_result_object = data;
        },
        select_destination_result: function (data) {
            this.destination_search_keyword = data.Name;
            this.selected_destination_result_object = data;
        },
        addPassenger: function (passenger_type) {
            if (this.passengersCount() > 8) {
                return;
            }
            this.flight_passengers.forEach(p => {
                if (p.id === passenger_type.id) {
                    p.increments += 1
                    p.passengers.push({
                        id: p.increments,
                    })
                }
            })
        },
        passengersCount: function () {
            let total = 0;
            this.flight_passengers.forEach(p => {
                total += p.passengers.length;
            })

            return total;
        },
        removePassenger: function (passenger_type_id, passenger = null) {

            this.flight_passengers.forEach((pt) => {
                if (pt.id === passenger_type_id) {
                    if (passenger) {
                        pt.forEach((p, index) => {
                            if (p.id === passenger.id) {
                                p.splice(index, 1)
                            }
                        })
                    }
                    else {

                        pt.passengers.splice(0, 1)
                    }

                }
            })
        },
        toggle_passengers_panel: function () {
            this.passenger_panel_visible = !this.passenger_panel_visible;
        }


    },
    async mounted() {



        let departure_date = null;
        let return_date = null;
        if (this.search_data && !(this.search_data.trip)) {

            this.selected_flight_class = parseInt(this.search_data.flight_class);
            departure_date = this.search_data.departure_date
            return_date = this.search_data.return_date

            this.first_date = departure_date;
            this.second_date = return_date;
            this.selected_flight_type = parseInt(this.search_data.flight_type)
            this.flight_passengers = JSON.parse(this.search_data.flight_passengers);

            let resp = await axios.post("/flight/suggest_airport_by_id", { airport_id: this.search_data.departure_airport_id })
            this.selected_departure_result_object = resp.data[0]
            let resp2 = await axios.post("/flight/suggest_airport_by_id", { airport_id: this.search_data.destination_airport_id })
            this.selected_destination_result_object = resp2.data[0]

            this.initial_autocomplete_value = resp.data[0].Name
            this.initial_autocomplete_value2 = resp2.data[0].Name

            this.departure_search_keyword = resp.data[0].Name

            this.destination_search_keyword = resp2.data[0].Name
        }
        else {
            this.addPassenger({ id: 1 });
        }
        let input_dates = document.querySelectorAll(".input_date_flight");
        this.$refs.date_picker_2.attach_date_picker(input_dates, departure_date, return_date);



        let select_box = document.querySelectorAll(".flight_select_box");
        for (let i = 0; i < select_box.length; i++) {
            let instance = NiceSelect.bind(select_box[i]);
            this.my_nice_selects.push(instance);
        }





    },
};
</script>

<style >
.ticket_box_row_bottom input {
    font-size: 14px !important;
}

.select_box_2 .accordion_select {
    width: 300px;
    top: 40px;
    transform: scale(.5);
    position: absolute;
    background: var(--white);
    border-radius: 12px !important;
    -webkit-border-radius: 12px !important;
    -moz-border-radius: 12px !important;
    -ms-border-radius: 12px !important;
    -o-border-radius: 12px !important;
    z-index: 100;
    background-color: var(--white);
    overflow: hidden;
    box-shadow: 0 1px 14px rgb(0 0 0 / 16%);
    visibility: hidden;
    opacity: 0;
    -webkit-transform: scale(.5);
    -moz-transform: scale(.5);
    -ms-transform: scale(.5);
    -o-transform: scale(.5);
    transition: all .1s ease-in-out;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .1s ease-in-out;
    -ms-transition: all .1s ease-in-out;
    -o-transition: all .1s ease-in-out;
}
</style>
