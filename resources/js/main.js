require('./bootstrap');

import BarGraph from './components/graphs/BarGraph';
import PieChart from './components//graphs/PieChart';


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
// Vue.component('track-team-result-filter', require('./components/filters/TrackTeamResultFilter').default);
Vue.component('track-event-filter', require('./components/filters/TrackEventFilter').default);

// General Properties
Vue.component('day-times', require('./components/properties/general/DayTimes').default);
Vue.component('distances', require('./components/properties/general/Distances').default);
Vue.component('seasons', require('./components/properties/general/Seasons').default);
Vue.component('terrain-types', require('./components/properties/general/TerrainTypes').default);

// Meet Properties
Vue.component('meet-hosts', require('./components/properties/meets/MeetHosts').default);
Vue.component('meet-names', require('./components/properties/meets/MeetNames').default);
Vue.component('meet-venues', require('./components/properties/meets/MeetVenues').default);
Vue.component('timing-methods', require('./components/properties/meets/TimingMethods').default);

// Race Properties
Vue.component('levels', require('./components/properties/division/Levels').default);
Vue.component('events', require('./components/properties/races/Events').default);
Vue.component('genders', require('./components/properties/division/Genders').default);
Vue.component('divisions', require('./components/properties/races/Divisions').default);

// Running Log Properties
Vue.component('run-efforts', require('./components/properties/runningLog/RunEfforts').default);
Vue.component('run-feelings', require('./components/properties/runningLog/RunFeelings').default);
Vue.component('run-types', require('./components/properties/runningLog/RunTypes').default);

Vue.component('running-logs', require('./components/runningLog/runningLogs').default);

Vue.component('athletes', require('./components/Athletes').default);

// Meets
Vue.component('track-meets', require('./components/meets/TrackMeets').default);

// Paginator
Vue.component('paginator', require('./components/Paginator').default);

// Results
Vue.component('track-team-results', require('./components/results/TrackTeamResults').default);
Vue.component('track-results', require('./components/results/TrackResults').default);

// Team
Vue.component('team-announcements', require('./components/team/TeamAnnouncements').default);
Vue.component('team-events', require('./components/team/TeamEvents').default);

// users
Vue.component('user-roles', require('./components/users/UserRoles').default);
Vue.component('users', require('./components/users/Users').default);

new Vue({
    el: '#userContent',

    components: { BarGraph, PieChart }
});

Vue.component('user-menu', require('./components/menus/UserMenu').default);
Vue.component('general-properties', require('./components/menus/GeneralProperties').default);
Vue.component('meet-properties', require('./components/menus/MeetProperties').default);
Vue.component('race-properties', require('./components/menus/RaceProperties').default);

new Vue({
    el: '#userMenu',

});

// Vue.component('admin-menu-button', require('./components/buttons/menus/AdminMenuButton').default);
// Vue.component('athlete-menu-button', require('./components/buttons/menus/AthleteMenuButton').default);
// Vue.component('coach-menu-button', require('./components/buttons/menus/CoachMenuButton').default);
// Vue.component('main-menu-button', require('./components/buttons/menus/MainMenuButton').default);
// Vue.component('user-menu-button', require('./components/buttons/menus/UserMenuButton').default);

Vue.component('events-dropdown', require('./components/dropdowns/EventsDropdown').default);
Vue.component('forms-dropdown', require('./components/dropdowns/FormsDropdown').default);
Vue.component('team-dropdown', require('./components/dropdowns/TeamDropdown').default);
Vue.component('login-button', require('./components/buttons/LoginButton').default);
Vue.component('dropdown', require('./components/buttons/Dropdown').default);

new Vue({
    el: '#banner',

});

Vue.component('announcements', require('./components/pages/Announcements').default);
Vue.component('events', require('./components/pages/Events').default);

new Vue({
    el: '#mainContent',

});
