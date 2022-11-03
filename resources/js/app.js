    /**
     * First we will load all of this project's JavaScript dependencies which
     * includes Vue and other libraries. It is a great starting point when
     * building robust, powerful web applications using Vue and Laravel.
     */

    require('./bootstrap');

    window.Vue = require('vue').default;

    import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'



    import Vuetify from 'vuetify'
    import VCalendar from 'v-calendar';

    import Skeleton from 'vue-loading-skeleton';
    import "vue-loading-skeleton/dist/style.css"

    import Vue from 'vue';


    Vue.use(Vuetify)
    Vue.use(Skeleton)
    Vue.use(VCalendar, {
        componentPrefix: 'vc',

    });
    window.Vuetify = Vuetify
    window.VCalendar = VCalendar;

    // Make BootstrapVue available throughout your project
    Vue.use(BootstrapVue)
    // Optionally install the BootstrapVue icon components plugin
    Vue.use(IconsPlugin)


    /**
     * The following block of code may be used to automatically register your
     * Vue components. It will recursively scan this directory for the Vue
     * components and automatically register them with their "basename".
     *
     * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
     */

    // const files = require.context('./', true, /\.vue$/i)
    // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
    Vue.component('autocomplete-component', require('./components/AutocompleteComponent.vue').default);
    Vue.component('example-component', require('./components/ExampleComponent.vue').default);
    Vue.component('activities-travelers-count', require('./components/ActivitiesTravelersCount.vue').default);
    Vue.component('book-trip-travelers-count', require('./components/BookTripTravelersCount.vue').default);
    Vue.component('autocomplete-airport-component', require('./components/AutocompleteAirportComponent.vue').default);
    Vue.component('fund-my-trip-create-trip', require('./components/FundMyTripCreateTrip.vue').default);
    Vue.component('autocomplete-activity-component', require('./components/ActivitiesAutocomplete.vue').default);
    Vue.component('autocomplete-by-city', require('./components/HotelbedsHotelAutocomplete.vue').default);
    Vue.component('fund-my-trip-request-to-join-form', require('./components/FundMyTripRequestToJoinForm.vue').default);
    Vue.component('solo-trip-create-trip', require('./components/SoloTripCreateTrip.vue').default);
    Vue.component('chat-window', require('./components/chatWindow.vue').default);
    Vue.component('sign-in-modal', require('./components/SignInRequired.vue').default);
    Vue.component('flight-search-bar', require('./components/FlightSearchBar.vue').default);
    Vue.component('notification-item', require('./components/NotificationItem.vue').default);
    Vue.component('flight-ui', require('./components/FlightUI.vue').default);
    Vue.component('flight-box-item', require('./components/FlightBoxItem.vue').default);
    Vue.component('flight-item', require('./components/FlightItem.vue').default);
    Vue.component('hotel-main-box', require('./components/HotelsMainBox.vue').default);
    Vue.component('phone-number', require('./components/PhoneNumber.vue').default);
    Vue.component('date-picker', require('./components/DatePicker.vue').default);
    Vue.component('range-slider', require('./components/RangeSlider.vue').default);







    /**
     * Next, we will create a fresh Vue application instance and attach it to
     * the page. Then, you may begin adding components to this application
     * or customize the JavaScript scaffolding to fit your unique needs.
     */
    /*
    const app = new Vue({
        el: '#app',
    });
    */
