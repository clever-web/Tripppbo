<template>
    <div id="main_create_trip_div">
        <form id="create_trip_form" v-on:click="hide" class="needs-validation">
            <div id="popup_create_trip" class="require_sign_in">
                <!-- row -->
                <h3 class="mt-5 mb-4 h5 text-white text-center">Create a Trip</h3>
                <div id="popup_create_trip_box" v-on:click.stop="" class="mt-1 row_sign row_create_trip">
                    <div class="row_sign_left">
                        <form ref="input_form" id="create_trip_form_2" class="row">
                            <!-- 1 -->
                            <div class="col-12 mb-3">
                                <h3 class="h6 mb-3 text-capitalize fw_gilroy_bold text_dark_blue">Type of traveler</h3>
                                <ul class="sidebar_ul_1 mt-3 mb-1 d-flex">
                                    <!-- 1 -->
                                    <li class="me-3 mb-0">
                                        <label for="na1" class="fs_16">
                                            Host
                                            <input id="na1" name="type_of_traveler" type="radio" v-model="type_of_trip"
                                                value="host">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <!-- 2 -->
                                    <li class="mb-0">
                                        <label for="na" class="fs_16">
                                            Guest
                                            <input id="na" name="type_of_traveler" type="radio" v-model="type_of_trip"
                                                value="guest">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- 2 -->
                            <div class="col-12 mb-3">
                                <label for="input__gray_title"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Trip
                                    Title</label>
                                <input v-on:input="title = $event.target.value" type="text" required
                                    class="form-control input__gray input_contact_center" id="input__gray_title">
                            </div>
                            <!-- 3 -->
                            <div class="col-12 mb-4">
                                <label for="input__gray_location"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Destination</label>
                                <div class="wrap_input_gray_icon">
                                    <i class="fas fa-map-marker-alt me-2"></i>

                                    <input v-model="destination" v-on:input="destination = $event.target.value"
                                        type="text" required placeholder="Add Your Location"
                                        class="form-control input__gray input_contact_center" id="input__gray_location">
                                    <AutocompleteComponent :type="'internal'" @autocomplete_result_selected="result_selected"
                                        :keyword="destination"></AutocompleteComponent>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="col-12 mb-4">
                                <div class="row gx-3" style="position:relative">
                                    <div style="position:absolute; top: -300px; left: 0px;z-index:1300">
                                        <date-picker ref="date_picker1" :range="isRange"></date-picker>
                                    </div>
                                    <div class="col-sm-6 mb-sm-0 mb-3">
                                        <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Start Date
                                        </h3>
                                        <div class="wrap_input_gray_icon">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="text" required v-model="selectedDate" placeholder="2020-01-01"
                                                v-on:input="selectedDate = $event.target.value"
                                                class="form-control input__gray fs_14 input_contact_center fund_my_trip_start_date"
                                                id="c_date_input">
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Fund Duration
                                        </h3>
                                        <select required v-model="duration"
                                            class="select_gray input__gray child_select_box region_p input_create_center">
                                            <option selected value="1">For 1 Week</option>
                                            <option value="2">For 2 Weeks</option>
                                            <option value="3">For 3 Weeks</option>
                                            <option value="4">A Month</option>
                                            <option value="5">Short Vacation</option>
                                            <option value="6">Long Vacation</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- 5 -->
                            <div class="col-12 mb-3">
                                <label for="input__gray_desc"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Description</label>
                                <textarea required v-on:input="description = $event.target.value"
                                    class="form-control input__gray input_review" id="special_request"
                                    rows="5"></textarea>
                            </div>
                            <!-- 6 -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="input__gray_desc"
                                            class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Image</label>
                                    </div>
                                    <div class="col-sm-6 mb-sm-0 mb-4">
                                        <div class="wrap_create_file_upload">
                                            <img src="img/upload_icon.svg" alt="">
                                            <span class="ms-2">Drag and drop here</span>
                                            <input type="file" name="upload" @change="uploadFile" ref="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="button" id="create_account" v-on:click.stop="create_trip"
                                            class="btn py-sm-2 py-3 btn_pink medium_btn d-sm-flex d-block align-items-center">Create
                                            your Trip</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row_sign_right">
                        <img id="create_bg_right" src="img/create_trip_bg.svg" alt="">
                        <img id="create_bg_right_r" src="img/create_trip_bg_r.svg" alt="">
                    </div>
                </div>
            </div>
        </form>
    </div>





</template>

<script>
import AutocompleteComponent from "./AutocompleteComponent.vue";
import DatePicker from "./DatePicker.vue";

export default {
    components: { AutocompleteComponent, DatePicker },
    vuetify: new Vuetify(),
    data: function () {
        return {
            inputElement: null,
            isRange: false,
            selected_result: {},
            title: "",
            destination: "",
            description: "",
            image: null,
            destination_country_id: '',
            destination_city_id: '',
            destination_selected_result: null,

            duration: 1,
            tripDateVisible: false,
            tripDateOnFocus: false,
            tripDateCalendarOnFocus: false,

            type_of_trip: "host",
            selectedDate: '2022-01-01',
        };
    },
    props: {},
    watch: {
        month: function () {
            this.tripDateCalendarOnFocus = false;
        },
    },

    mounted: function () {
        // calendar show when focus
        let input__date = document.querySelectorAll(".fund_my_trip_start_date");

        this.inputElement = input__date;



        this.$refs.date_picker1.attach_date_picker(input__date);


        // autocomplete function in app.js file
        //  autocomplete(document.getElementById("input__gray_location"), countries);


        let popup_create_trip = document.querySelector("#popup_create_trip");
        let popup_create_trip_box = document.querySelector("#popup_create_trip_box");

        if (popup_create_trip_box) {
            popup_create_trip_box.addEventListener("click", (e) => {
                e.stopPropagation();
                popup_create_trip.classList.add("require_sign_in_active");
            });
        }

        if (popup_create_trip) {
            popup_create_trip.addEventListener("click", (e) => {
                popup_create_trip.classList.remove("require_sign_in_active");

            });
        }




    },

    methods: {
        result_selected: function (result) {
            this.destination_selected_result = result;
            this.destination = result.name + ', ' + result.country.name
            this.destination_city_id = result.id;
            this.destination_country_id = result.country.id;

        },

        uploadFile() {
            this.image = this.$refs.file.files[0];
        },
        show: function () {


            document.getElementById('popup_create_trip').classList.add('require_sign_in_active')

            this.$emit('shown')
        },
        hide: function () {
            document.getElementById('popup_create_trip').classList.remove('require_sign_in_active')

            this.$emit('hidden')
        },
        selectDestinationResult: function (event) {
            this.destination = event.city_name + ", " + event.country_name;
            this.selected_result = event;
        },

        create_trip: async function () {

            let isValid = this.$refs.input_form.checkValidity();

            if (!isValid) {
                this.$refs.input_form.classList.add('was-validated');
                return;
            }

            $("#create_trip_form").addClass("was-validated");
            let formData = new FormData();
            formData.append("title", this.title);
            formData.append("description", this.description);
            formData.append("duration", this.duration);
            if (this.image) {
                formData.append("trip_img", this.image);
            }


            formData.append("destination_city_code", this.selected_result.city_code);
            formData.append("date", this.selectedDate);
            formData.append("type_of_trip", this.type_of_trip);
            formData.append('destination_country_id', this.destination_selected_result.country.id);
            formData.append('destination_city_id', this.destination_selected_result.id);
            try {
                this.hide();
                let response = await axios.post("/trips/create", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });

                window.location = response.data;
            } catch (ex) { }
        },
    },
};
</script>

<style scoped>
.was-validated input:invalid {
    border: 1px solid red;
}

.was-validated textarea:invalid {
    border: 1px solid red;
}

.was-validated select:invalid {
    border: 1px solid red;
}
</style>
