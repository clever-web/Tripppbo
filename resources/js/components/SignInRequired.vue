    <template>
        <div v-on:click="hidePanel" class="require_sign_in " :class="{ require_sign_in_active: isVisible }">
            <div v-on:click.stop="" class="require_popup_box box_shadow">
                <div class="require_popup_cross">
                    <img v-on:click="hidePanel" src="/img/popup_cross.svg" alt="">
                </div>
                <div class="require_popup_top">
                    <img src="/img/site_logo.svg" alt="">
                    <h3 class="mt-1 h5 text_dark_blue text-center">Welcome Back, Require to sign in</h3>
                </div>
                <div class="require_popup_bottom mt-4">
                    <div class="popup_bottom_grid popup_bottom_grid1">
                        <div>
                            <h4 class="h5 text-center text_dark_blue">I Already Have An Account</h4>
                            <p class="text-center text_silver">Great! Click the button below to sign in!</p>
                            <div class="d-flex justify-content-center">
                                <a href="/login" class="btn py-2 btn_pink medium_btn d-inline-block mx-auto">Sign in</a>
                            </div>
                        </div>
                    </div>
                    <div class="popup_bottom_grid">
                        <h4 class="h5 text-center text_dark_blue">Create Account</h4>
                        <p class="text-center text_silver mb-1">Let's get you started by creating a Trippbo account.</p>
                        <p class="text-center text_silver">it only take 2 minutes!</p>
                        <div class="d-flex justify-content-center mb-4">
                            <a href="/register" class="btn py-2 btn_pink medium_btn d-inline-block mx-auto">Create Account</a>
                        </div>
                        <p class="fs_14 text_silver fw_gilroy_medium text-center">Or sign in with</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="/auth/facebookredirect" class="btn_dark_outline me-2 require_btn"><i class="me-3 fab fa-facebook"></i>
                                Facebook</a>
                            <a href="/auth/googleredirect" class="btn_dark_outline require_btn"><i class="me-3 fab fa-facebook"></i> Google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        data: function () {
            return {
                isVisible: false,

            };
        },
        props: {
            keyword: "",
        },
        watch: {

        },

        methods: {
            showPanel: function () {
                this.isVisible = true;
            },
            hidePanel: function () {
                this.isVisible = false;
            },

        },
        mounted() {

        },
    };
    </script>

    <style scoped>
    .require_sign_in_active
    {
        position: fixed;
    }
    </style>
