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
Vue.component('track-surfaces', require('./components/properties/general/TrackSurfaces').default);

// Meet Properties
Vue.component('meet-hosts', require('./components/properties/meets/MeetHosts').default);
Vue.component('meet-names', require('./components/properties/meets/MeetNames').default);
Vue.component('cross-country-venues', require('./components/properties/meets/CrossCountryVenues.vue').default);
Vue.component('track-venues', require('./components/properties/meets/TrackVenues.vue').default);
Vue.component('timing-methods', require('./components/properties/meets/TimingMethods').default);

// Race Properties
Vue.component('levels', require('./components/properties/division/Levels').default);
Vue.component('cross-country-events', require('./components/properties/races/CrossCountryEvents').default);
Vue.component('genders', require('./components/properties/division/Genders').default);
Vue.component('divisions', require('./components/properties/races/Divisions').default);
Vue.component('race-titles', require('./components/properties/races/RaceTitles').default);
Vue.component('track-events', require('./components/properties/races/TrackEvents').default);

// Running Log Properties
Vue.component('run-efforts', require('./components/properties/runningLog/RunEfforts').default);
Vue.component('run-feelings', require('./components/properties/runningLog/RunFeelings').default);
Vue.component('run-types', require('./components/properties/runningLog/RunTypes').default);

Vue.component('running-logs', require('./components/runningLog/runningLogs').default);
Vue.component('team-logs', require('./components/runningLog/teamLogs').default);
Vue.component('summer-runners', require('./components/runningLog/summerRunners').default);

Vue.component('athletes', require('./components/Athletes').default);

// Meets
Vue.component('cross-country-meets-container', require('./components/meets/CrossCountryMeetsContainer').default);
Vue.component('track-meets-container', require('./components/meets/TrackMeetsContainer').default);
Vue.component('cross-country-meets', require('./components/meets/CrossCountryMeets').default);
Vue.component('track-meets', require('./components/meets/TrackMeets').default);

// Paginator
Vue.component('paginator', require('./components/Paginator').default);

// Physicals
Vue.component('physicals', require('./components/physicals/Physicals').default);

//Records
Vue.component('venue-records', require('./components/records/VenueRecords').default);
Vue.component('event-best-time', require('./components/records/EventBestTime').default);
Vue.component('athlete-season-bests', require('./components/records/AthleteSeasonBests').default);
Vue.component('season-bests', require('./components/records/SeasonBests').default);

// Results
Vue.component('track-team-results', require('./components/results/TrackTeamResults').default);
Vue.component('cross-country-team-results', require('./components/results/CrossCountryTeamResults').default);
Vue.component('track-results-container', require('./components/results/TrackResultsContainer').default);
Vue.component('track-results', require('./components/results/TrackResults').default);
Vue.component('cross-country-results', require('./components/results/CrossCountryResults').default);
Vue.component('athlete-cross-results', require('./components/results/AthleteCrossResults').default);
Vue.component('athlete-track-results', require('./components/results/AthleteTrackResults').default);
Vue.component('senior-cross-results', require('./components/results/SeniorCrossResults').default);


// Tabs
Vue.component('tabs', require('./components/tabs/Tabs').default);
Vue.component('tab', require('./components/tabs/Tab').default);

// Team
Vue.component('team-announcements', require('./components/team/TeamAnnouncements').default);
Vue.component('team-events', require('./components/team/TeamEvents').default);

// Time Trials
Vue.component('track-time-trials', require('./components/timeTrials/TrackTimeTrials').default);
Vue.component('track-time-trial-races', require('./components/timeTrials/TrackTimeTrialRaces').default);
Vue.component('track-time-trial-race-results', require('./components/timeTrials/TrackTimeTrialRaceResults').default);

// Training
Vue.component('athlete-training-paces', require('./components/training/AthleteTrainingPaces').default);


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

Vue.component('admin-menu-button', require('./components/buttons/menus/AdminMenuButton').default);
Vue.component('athlete-menu-button', require('./components/buttons/menus/AthleteMenuButton').default);
Vue.component('coach-menu-button', require('./components/buttons/menus/CoachMenuButton').default);
Vue.component('main-menu-button', require('./components/buttons/menus/MainMenuButton').default);
Vue.component('user-menu-button', require('./components/buttons/menus/UserMenuButton').default);

Vue.component('events-dropdown', require('./components/dropdowns/EventsDropdown').default);
Vue.component('forms-dropdown', require('./components/dropdowns/FormsDropdown').default);
Vue.component('results-dropdown', require('./components/dropdowns/ResultsDropdown').default);
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
