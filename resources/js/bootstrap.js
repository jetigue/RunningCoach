import Vue from 'vue';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';
import Form from './utilities/Form';
import Errors from './utilities/Errors';
import PortalVue from 'portal-vue';

Vue.use(PortalVue);
Vue.use(VueSweetalert2);
Vue.use(require('vue-moment'));

window.Vue = require('vue');
window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Event = new Vue();
window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level});
};

window.Form = Form;
window.Errors = Errors;
