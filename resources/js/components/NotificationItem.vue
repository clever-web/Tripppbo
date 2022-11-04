    <template>

    <div v-on:click.stop="redirectToDestination" class="toast w-100" :class="{hide: hidden, show: hidden == false}" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
        <!--  <img src="..." class="rounded me-2" alt="..."> -->
        <strong class="me-auto">{{title}}</strong>
        <small>now</small>
        <button type="button" v-on:click.stop="hidden = true" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        {{text}}
        </div>
    </div>

    </template>

    <script>








    export default {

        data: function () {
            return {
                hidden: false,
                timeout: 5000, //ms


            };
        },
        props: {
            title: '',
            text: '',
            link: '',


        },

        mounted: async function () {
            setTimeout(() => {
                this.hidden = true
            }, this.timeout);




        },

        methods: {
            redirectToDestination: function()
            {
                window.location = this.link
            }

        },
    };
    </script>

    <style scoped>
    </style>

