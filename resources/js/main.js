require('./bootstrap');


// Buttons
Vue.component('cancel-button', require('./components/buttons/CancelButton').default);
Vue.component('create-button', require('./components/buttons/CreateButton').default);
Vue.component('delete-button', require('./components/buttons/DeleteButton').default);
Vue.component('edit-button', require('./components/buttons/EditButton').default);
Vue.component('expand-button', require('./components/buttons/ExpandButton').default);
Vue.component('filter-button', require('./components/buttons/FilterButton').default);
Vue.component('update-button', require('./components/buttons/UpdateButton').default);

// Filters
Vue.component('filters', require('./components/filters/Filters').default);
Vue.component('season-filter', require('./components/filters/SeasonFilter').default);
Vue.component('status-filter', require('./components/filters/StatusFilter').default);
Vue.component('track-season-filter', require('./components/filters/TrackSeasonFilter').default);

// General Properties
Vue.component('seasons', require('./components/properties/general/Seasons').default);
Vue.component('distances', require('./components/properties/general/Distances').default);

// Meet Properties
Vue.component('meet-hosts', require('./components/properties/meets/MeetHosts').default);
Vue.component('meet-names', require('./components/properties/meets/MeetNames').default);
Vue.component('meet-venues', require('./components/properties/meets/MeetVenues').default);
Vue.component('timing-methods', require('./components/properties/meets/TimingMethods').default);

// Race Properties
Vue.component('divisions', require('./components/properties/races/Divisions').default);
Vue.component('events', require('./components/properties/races/Events').default);
Vue.component('genders', require('./components/properties/races/Genders').default);

Vue.component('athletes', require('./components/Athletes').default);

// Meets
Vue.component('track-meets', require('./components/meets/TrackMeets').default);

// Results
Vue.component('track-team-results', require('./components/results/TrackTeamResults').default);
Vue.component('track-results', require('./components/results/TrackResults').default);

// Users
Vue.component('user-roles', require('./components/users/UserRoles').default);

new Vue({
    el: '#userContent',

});

Vue.component('menu-button', require('./components/buttons/MenuButton').default);
Vue.component('user-menu', require('./components/menus/UserMenu').default);
Vue.component('general-properties', require('./components/menus/GeneralProperties').default);
Vue.component('meet-properties', require('./components/menus/MeetProperties').default);
Vue.component('race-properties', require('./components/menus/RaceProperties').default);

new Vue({
    el: '#userMenu',

});

Vue.component('login-button', require('./components/buttons/LoginButton').default);

new Vue({
    el: '#banner',

});