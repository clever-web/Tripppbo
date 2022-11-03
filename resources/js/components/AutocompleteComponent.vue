    <template>


        <div v-show="isVisible" class="autocomplete-items-custom">
            <div v-for="(r, index) in results" v-on:click="selectResult(r)">
                <span v-if="type == 'internal'" class="all_airports">

                    <i class="fas fa-map-marker-alt me-2"></i> {{ r.Name }}, {{ r.country.name }}
                </span>



                <span v-if="type !== 'internal'" style="font-size:14px;">

                    <i class="fas fa-map-marker-alt me-2"></i> {{ r.Name }}
                </span>

            </div>

        </div><!--  -->



    </template>

    <script>
    export default {
        data: function () {
            return {
                results: [],
                cancelSource: null,
                isVisible: false,
                lastResult: null,
                firstSearch: true

            };
        },
        props: {
            keyword: "",
            type: null,
            has_initial_value: null,
        },
        watch: {
            keyword: async function (newKeyword, oldKeyword) {
                if (newKeyword.length < 1 || (this.type !== 'internal' && newKeyword == this.lastResult?.Name)) {


                    this.isVisible = false;
                    return;
                }

                if (this.firstSearch) {
                    if (this.has_initial_value) {
                        this.firstSearch = false;
                        return;
                    }
                }
                await this.performAutocomplete(newKeyword);
            },
        },

        methods: {
            performAutocomplete: async function (keyword) {

                let url = "";


                if (this.type == "hotel") {
                    url = "/hotel/suggest_locations"
                }
                else if (this.type == 'airport') {
                    url = "/flight/suggest_locations"
                }
                else {

                    url = "/suggest_locations"

                }

                this.cancelSource = axios.CancelToken.source();
                const resp = await axios
                    .get(url + "?keyword=" + keyword, {
                        cancelToken: this.cancelSource.token,
                    })
                    .catch(function (thrown) {
                        if (axios.isCancel(thrown)) {
                        } else {
                            // handle error
                        }
                    });
                this.results = [];
                this.results.push(...resp.data);
                if (this.results.length > 0) {
                    this.isVisible = true;
                }
            },

            cancelRequest: function () {
                this.cancelSource.cancel();
            },

            selectResult: function (result) {
                this.$emit("autocomplete_result_selected", result);
                this.lastResult = result;
                this.isVisible = false;
            },
        },
        mounted() {
            if (this.initial_value) {
                this.lastResult = {
                    'Name': this.initial_value
                }
            }
            if (this.keyword !== "") {
                this.performAutocomplete(this.keyword);
            }

        },
    };
    </script>

    <style scoped>
    .container {
        background-color: white;
        border: #00000028 solid 1px;
        box-shadow: 0px 3px 6px #00000028;
    }

    .autocomplete-items-custom {
        position: absolute;
        top: 55px;
        left: 0;
        width: 300px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        background-color: var(--white);
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.137);
        z-index: 110;
        visibility: visible;
        transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }

    .autocomplete-items-custom div {
        padding: 10px 20px;
        cursor: pointer;
        background-color: #fff;
    }
    </style>
