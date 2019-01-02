require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('expand-button', require('./components/buttons/ExpandButton').default);

Vue.component('meet-hosts', require('./components/properties/meets/MeetHosts').default);


new Vue({
    el: '#userContent',

    data: {
    },

    methods : {
        
    }
});