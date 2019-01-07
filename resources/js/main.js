require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('create-button', require('./components/buttons/CreateButton').default);

/** General Properties */
Vue.component('seasons', require('./components/properties/general/Seasons').default);

/** Meet Properties */
Vue.component('meet-hosts', require('./components/properties/meets/MeetHosts').default);
Vue.component('meet-venues', require('./components/properties/meets/MeetVenues').default);
Vue.component('timing-methods', require('./components/properties/meets/TimingMethods').default);

new Vue({
    el: '#userContent',

    data() {
        return {
    
        }
    },

    methods : {
 
        
    }
});