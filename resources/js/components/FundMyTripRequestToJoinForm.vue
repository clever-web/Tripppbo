    <template>
        <div id="popup_create_trip" class="require_sign_in" :class="{ require_sign_in_active: is_form_visible }">
            <!-- row -->
            <h3 class="mt-5 mb-4 h5 text-white text-center">Send Trip Request</h3>
            <div id="popup_create_trip_box" v-on:click.stop="" class="mt-1 row_sign row_create_trip">
                <div class="row_sign_left">
                    <form ref="fund_my_trip_request_to_join_form" class="row">
                        <!-- 3 -->
                        <div class="col-12 mb-4">
                            <label for="input__gray_location"
                                class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Country</label>
                            <div class="wrap_input_gray_icon">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <input  v-model="origin" type="text" required placeholder="Country"
                                    class="form-control input__gray input_contact_center" id="input__gray_location">
                            </div>
                        </div>
                        <!-- 5 -->
                        <div class="col-12 mb-3">
                            <label for="input__gray_desc"
                                class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Message</label>
                            <textarea required v-model="message" class="form-control input__gray input_review" id="input__gray_desc"
                                rows="6"></textarea>
                        </div>
                        <!-- 6 -->

                        <!-- 7 -->
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <button type="button" id="create_account" v-on:click="send_join_request"
                                        class="btn py-sm-2 py-3 btn_pink medium_btn d-sm-flex d-block align-items-center">Send
                                        Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row_sign_right">
                    <img src="/img/send_trip_bg.jpg" alt="">
                </div>
            </div>
        </div>
    </template>

    <script>

    export default {

        vuetify: new Vuetify(),
        data: function () {
            return {
                is_form_visible: false,
                message: '',
                origin: ''
            };
        },
        props: {
            trip_id: null,
        },
        watch: {

        },

        mounted: function () {

        },

        methods: {
            show_form: function () {
                this.is_form_visible = true

            },
            hide_form: function () {
                this.is_form_visible = false

            },
            send_join_request: async function () {

                let isValid = this.$refs.fund_my_trip_request_to_join_form.checkValidity();
                if (!isValid) {
                    this.$refs.fund_my_trip_request_to_join_form.classList.add('was-validated');
                    return;
                }

                let formData = new FormData();
                formData.append('trip_id', this.trip_id)
                formData.append('country', this.origin)
                formData.append('message', this.message)

                let response = await axios.post('/trips/ask-to-join', formData)
                this.$emit('request_sent');
                this.hide_form();
            }
        },
    };
    </script>

