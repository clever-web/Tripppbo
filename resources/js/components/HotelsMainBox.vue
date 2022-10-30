<template>

    <div class="ticket_box_row_bottom index_ticket landing_ticket">


        <div id="l_f_row_2" class="landing_form_row_1 mb-3">
            <!-- 1 -->
            <div class="me-2 l_form_2_input">
                <label for="ticket_input_e" class="fs_14 fw_gilroy_bold mb-2">Location</label>
                <div class="ticket_input_1">
                    <input autocomplete="off" v-model="search_keyword" type="text"
                        placeholder="Where are you going?" class="basel_style">
                    <span class="clear_input_ticket" ><img
                            src="/img/clear_cross.svg" alt=""></span>

                    <AutocompleteComponent :has_initial_value="initial_autocomplete_value" @autocomplete_result_selected="select_result" :type="'hotel'"
                        :keyword="search_keyword"></AutocompleteComponent>




                </div>
            </div>
            <!-- 2 -->
            <div class="me-2 l_form_2_input l_form_2_input2 guest_box">
                <label for="input_guest" class="fs_14 fw_gilroy_bold mb-2">Guest</label>
                <div class="ticket_input_3">
                    <input class="basel_style" readonly :value="passengers_to_display" ref="input_box"  type="text"
                        placeholder="03 persons">
                    <span class="clear_input_ticket" onclick="document.querySelector('#ticket_input_f').value=''"><img
                            src="/img/clear_cross.svg" alt=""></span>
                </div>
                <div class="guest_box_body_after"></div>
                <div class="child_a_select guest_box_body guest_box_1">
                    <div v-for="(room, roomIndex) in rooms" class="mt-2">
                        <h5 class="text-capitalize mb-3 h6">room {{ roomIndex + 1 }}



                            <span> </span>

                        </h5>
                        <!-- 1 -->
                        <div v-for="passenger_type in passenger_types" class="child_a_select_row child_a_select_row_2">
                            <p class="mb-0 fs_14">{{ passenger_type.type }} <span>({{ passenger_type.description
                            }})</span>
                            </p>
                            <div class="increase_decrease_btns">
                                <div v-on:click="removePassenger(passenger_type.id, room, null, 0)"><i
                                        class="fas fa-minus"></i></div>
                                <input readonly class="fs_14" data-value type="text"
                                    :value="getNumberOfPassengers(room, passenger_type.id)">
                                <div v-on:click="addPassenger(passenger_type.id, room.id, 0)"><i
                                        class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>

                        <div>

                            <div class="d-flex flex-row mt-2 align-items-center" style="gap:5px"
                                v-for="(child, childIndex) in roomChildPassengers(room)">
                                <div>
                                    Child {{ childIndex + 1 }} Age (Years) :
                                </div>
                                <div class="increase_decrease_btns">
                                    <div v-on:click="change_child_age(child, child.passenger_age - 1)"><i
                                            class="fas fa-minus"></i></div>
                                    <input readonly class="fs_14" type="text" :value="child.passenger_age">
                                    <div v-on:click="change_child_age(child, child.passenger_age + 1)"><i
                                            class="fas fa-plus"></i>
                                    </div>


                                </div>
                                <div style="width: 14px">
                                    <span @click="removePassenger(2, room, null, child.passenger_age)">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path stroke="blue" fill="#fe2f70"
                                                d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                        </svg>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <!-- 2 -->
                        <!--    <div class="child_a_select_row child_a_select_row_2">
                        <p class="mb-0 fs_14">Students <span>(2 - 11 yrs)</span></p>
                        <div class="increase_decrease_btns">
                            <div data-decrease><i class="fas fa-minus"></i></div>
                            <input class="fs_14" data-value type="text" value="1">
                            <div data-increase><i class="fas fa-plus"></i></div>
                        </div>
                    </div> -->
                        <button v-if="roomIndex > 0" v-on:click.prevent="removeRoom(room)"
                            class="add__more_room h6">Remove Room</button>
                    </div>
                    <button v-if="rooms.length < max_nr_of_rooms" v-on:click.prevent="addRoom"
                        class="add__more_room h6">+ Add more room</button>
                </div>
            </div>
        </div>
        <!-- 4 -->
        <div class="wrap_date_input" style="position:relative">
            <div class="wrap_date_after_box"></div>
            <div class="ticket_input_4 me-2">
                <input autocomplete="off" :value="first_date" type="text"
                    class="input__date input_date_hotel basel_style" placeholder="2022-07-01">
                <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
            </div>
            <div class="ticket_input_5 me-2">
                <input autocomplete="off" :value="second_date" type="text"
                    class="input__date input_date_hotel basel_style" placeholder="2022-09-01">
                <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
            </div>


            <div style="position:absolute; top: -300px; left: 0px;z-index:1300">
                <date-picker :unique_id="unique_id" @first_date_changed="handle_first_date" @second_date_changed="handle_second_date"
                    ref="date_picker1" :range="'true'"></date-picker>
            </div>

        </div>
        <button v-on:click.prevent="search" class="form_btn fs_14">Search</button>
    </div>
</template>

  <script>




import AutocompleteComponent from "./AutocompleteComponent.vue";
import DatePicker from "./DatePicker.vue";
export default {
    components: { AutocompleteComponent, DatePicker },

    data: function () {
        return {
            input_elements_test: null,
            first_date: '',
            second_date: '',
            search_keyword: '',
            max_nr_of_rooms: 5,
            passenger_current_index: 1,
            room_current_index: 1,
            selected_result_object: null,
            initial_autocomplete_value: true,
            unique_id: "hotel_search_datepicker",

            passengers_to_display: '',

            passenger_types: [
                {
                    id: 1,
                    type: 'Adult',
                    description: '18+',

                },
                {
                    id: 2,
                    type: 'Child',
                    description: 'under 12',

                }
            ],



            rooms: [{
                id: 1,

                passengers: [
                    {
                        id: 1,
                        passenger_type_id: 1,
                        passenger_age: 0,



                    },
                    {
                        id: 1,
                        passenger_type_id: 1,
                        passenger_age: 0,



                    }
                ],

            }]

        };
    },
    methods: {
        passengers_breakup: function () {
            let adults = 0;
            let children = 0;

            let rooms = this.rooms;

            for (let c = 0; c < rooms.length; c++) {
                for (let p = 0; p < rooms[c]['passengers'].length; p++) {
                    if (rooms[c]['passengers'][p]['passenger_type_id'] == 1) {
                        adults += 1;
                    } else if (rooms[c]['passengers'][p]['passenger_type_id'] == 2) {
                        children += 1;
                    }
                }
            }
            if (children == 0) {
                this.passengers_to_display = `${adults} Adults`
            } else {
                this.passengers_to_display = `${adults} Adults, ${children} Child`
            }


        },
        search: async function () {

            let d = new FormData();
            d.append('city_id', this.selected_result_object.city_id)
            d.append('check_in_date', this.first_date)
            d.append('check_out_date', this.second_date)
            d.append('rooms', JSON.stringify(this.rooms));
            let resp = await axios.post('/hotels/prepare_search', d)

            window.location = "/hotels/search?key=" + resp.data



        },
        handle_first_date(event) {
            this.first_date = event
        },
        handle_second_date(event) {
            this.second_date = event
        },
        removeRoom(room) {
            this.rooms = this.rooms.filter(r => {
                return !(room.id == r.id)
            })
            this.passengers_breakup();

        },
        change_child_age: function (child, new_value) {
            if (new_value > -1 && new_value < 18) {
                child.passenger_age = new_value
            }
        },
        addPassenger(passenger_type_id, room_id, age = 0) {
            this.rooms.forEach(r => {
                if (r.id == room_id) {
                    if (r.passengers.length > 4) {
                        return;
                    }
                    this.passenger_current_index += 1;
                    r.passengers.push({
                        passenger_type_id,
                        passenger_age: age,
                        id: this.passenger_current_index,

                    })
                    this.passengers_breakup();




                }

            })




        },
        checkForInit() {
            let select_box = document.querySelectorAll(".not_init_yet");
            for (let i = 0; i < select_box.length; i++) {
                NiceSelect.bind(select_box[i]);

            }
            for (let r = 0; r < this.rooms.length; r++) {

                for (let p = 0; p < this.rooms[r].passengers.length; p++) {
                    if (this.rooms[r].passengers[p].nice_select_init == false) {
                        this.rooms[r].passengers[p].nice_select_init = true
                    }
                }
            }


        },
        removePassenger(passenger_type_id, room, passenger_id, age = 0) {
            let passenger_deleted = false;


            for (let c = 0; c < room.passengers.length; c++) {
                if (room.passengers[c].passenger_type_id == passenger_type_id && room.passengers[c].passenger_age == age) {

                    room.passengers.splice(c, 1);
                    this.passengers_breakup();
                    break;
                }

            }




        },
        addRoom() {
            if (this.rooms.length > this.max_nr_of_rooms) {
                return;
            }
            this.room_current_index += 1;
            this.rooms.push({
                id: this.room_current_index,

                passengers: [
                    {
                        id: 1,
                        passenger_type_id: 1,
                        passenger_age: 0,



                    },
                    {
                        id: 1,
                        passenger_type_id: 1,
                        passenger_age: 0,


                    },
                ],

            })
            this.passengers_breakup();

        },
        getNumberOfPassengers(room, passenger_type_id) {
            let count = 0;
            let pax = room.passengers.forEach(p => {
                if (p.passenger_type_id == passenger_type_id) {
                    count += 1;

                }
            })
            console.log(count)
            return count;
        },
        roomChildPassengers: function (room) {
            let childs = room.passengers.filter(c => {
                return c.passenger_type_id == 2;
            })
            return childs;

        },
        select_result: function (data) {
            this.search_keyword = data.Name;
            this.selected_result_object = data;

        }
    },
    props: {

        initial_search_data: null,

    },
    watch: {

    },


    async mounted() {
        let input__date = document.querySelectorAll(".input_date_hotel");

        if (this.initial_search_data) {
            this.rooms = JSON.parse(this.initial_search_data.rooms)
            this.$refs.date_picker1?.attach_date_picker(input__date, this.initial_search_data.check_in_date, this.initial_search_data.check_out_date);
            let resp = await axios.post('/hotel/suggest_location_by_city_id', {city_id : this.initial_search_data.city_id})

            this.search_keyword = resp.data[0].Name

        }
        else {
            this.$refs.date_picker1?.attach_date_picker(input__date);
        }

        this.passengers_breakup();
        let input_guest = this.$refs.input_box
        let guest_box_body = document.querySelector(".guest_box_body");
        let guest_box_body_after = document.querySelector(".guest_box_body_after");

        input_guest.addEventListener("focus", (e) => {
            guest_box_body.classList.add("guest_box_body_active");
            guest_box_body_after.classList.add("guest_box_body_after_active");
        });

        guest_box_body_after.addEventListener("click", (e) => {
            guest_box_body.classList.remove("guest_box_body_active");
            e.target.classList.remove("guest_box_body_after_active");
        })



    },
};
</script>

  <style>
  .basel_style {
      font-size: 14px !important;
      font-family: 'gilroy_medium';
      color: #000941 !important;
  }
  .guest_box_body
  {
    right: auto;
  }
  </style>
