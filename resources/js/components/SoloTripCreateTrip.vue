<template>
    <div id="popup_create_trip" v-on:click="hidePopup" class="require_sign_in"
        :class="{ require_sign_in_active: popup_visible }">
        <!-- row -->
        <h3 @click.stop="" class="mt-5 mb-4 h5 text-white text-center">Create a Trip Solo</h3>
        <div @click.stop="" id="popup_create_trip_box" class="mt-1 row_sign row_create_trip">
            <div class="row_sign_left">
                <form ref="solo_create_new_form" class="row">
                    <!-- 1 -->
                    <div class="col-12 mb-3">
                        <label for="input__gray_title" class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Trip
                            Title</label>
                        <input v-model="title" type="text" required
                            class="form-control input__gray input_contact_center" id="input__gray_title">
                    </div>
                    <!-- 3 -->
                    <div class="col-12 mb-4">
                        <label for="input__gray_location"
                            class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Destination</label>
                        <div class="wrap_input_gray_icon">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <input autocomplete="off" v-model="destination" type="text" required placeholder="Add Your Location"
                                class="form-control input__gray input_contact_center" id="input__gray_location">
                            <AutocompleteComponent :type="'internal'" @autocomplete_result_selected="result_selected"
                                :keyword="destination"></AutocompleteComponent>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="col-12 mb-4">
                        <div class="row gx-3">
                            <div class="col-sm-6 mb-sm-0 mb-3">
                                <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Fund Duration</h3>
                                <select v-model="fund_duration"
                                    class="select_gray input__gray child_select_box region_p input_create_center">

                                    <option selected value="1">1 month</option>
                                    <option value="2">2 months</option>
                                    <option value="3">3 months</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="about_raise"
                                    class="h6 mb-1 text-capitalize fw_gilroy_bold text_dark_blue">Amount to
                                    raise</label>
                                <div class="wrap_input_gray_icon">
                                    <input required v-model="amount_to_raise" type="text"
                                        class="form-control input__gray fs_14 input_contact_center" id="about_raise">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 5 -->
                    <div class="col-12 mb-3">
                        <label for="input__gray_desc"
                            class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Description</label>
                        <textarea required v-model="description" class="form-control input__gray input_review"
                            id="special_request" rows="5"></textarea>
                    </div>
                    <!-- 6 -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label for="input__gray_desc"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Picture</label>
                            </div>
                            <div class="col-sm-6 mb-sm-0 mb-4">
                                <div class="wrap_create_file_upload">
                                    <img src="/img/upload_icon.svg" alt="">
                                    <span class="ms-2">Click to upload</span>
                                    <input @change="onChangeNewTripImage" type="file">
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button v-on:click.prevent="createTrip" id="create_account"
                                    class="btn py-sm-2 py-3 btn_pink medium_btn d-sm-flex d-block align-items-center">Create
                                    your Trip</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row_sign_right">
                <img src="/img/c_trip_solor.svg" alt="">
            </div>
        </div>
    </div>
</template>

<script>

import AutocompleteComponent from "./AutocompleteComponent.vue";

export default {
    components: { AutocompleteComponent },
    vuetify: new Vuetify(),
    data: function () {
        return {
            title: '',
            destination: '',
            fund_duration: '',
            amount_to_raise: '',
            description: '',
            image: '',
            newTripImage: null,
            destination_country_id: '',
            destination_city_id: '',
            destination_selected_result: null,


        };
    },
    props: {
        popup_visible: false,
    },
    watch: {

    },

    mounted: function () {




    },

    methods: {
        result_selected: function (result) {
            this.destination_selected_result = result;
            this.destination = result.name + ', ' + result.country.name
            this.destination_city_id = result.id;
            this.destination_country_id = result.country.id;
        },
        showPopup: function () {
            this.popup_visible = true;
        },
        hidePopup: function () {
            this.$emit('hide_popup');
        },


        createTrip: async function () {

            let isValid = this.$refs.solo_create_new_form.checkValidity();

            if (!isValid) {
                this.$refs.solo_create_new_form.classList.add('was-validated');

                return;
            }

            let mydata = new FormData();
            mydata.append('title', this.title);
            mydata.append('description', this.description);
            mydata.append('cost', this.amount_to_raise);
            mydata.append('fund_duration', this.fund_duration);
            mydata.append('destination', this.destination);
            mydata.append('destination_country_id', this.destination_selected_result.country.id);
            mydata.append('destination_city_id', this.destination_selected_result.id);
            if (this.newTripImage) {
                for (const i of Object.keys(this.newTripImage)) {
                    mydata.append('trip_img', this.newTripImage[i]);
                }
            }


            try {
                let resp = await axios.post('/solo/create', mydata, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })


                window.location = resp.data
            }
            catch (ex) {

            }







        },
        onChangeNewTripImage(event) {
            this.newTripImage = event.target.files
            //      await this.uploadProfilePicture();

        },
    },
};
</script>

<style scoped>
</style>
