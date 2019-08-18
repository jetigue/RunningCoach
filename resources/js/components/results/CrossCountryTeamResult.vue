<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-100">
            <div class="w-full md:w-1/2 mx-auto">
                <form action="/cross-country-meets/team-results/id"
                      method="POST"
                      id="editCrossCountryTeamResult"
                      @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                      class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">

                    <div class="flex items-center mb-1">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-gray-700 px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Division</label>
                            <span id="divisionHelp" class="form-help" v-if="form.errors.has('division_id')"
                                  v-text="form.errors.get('division_id')">
                            </span>
                        </div>
                        <select class="form-input" name="division_id" v-model="form.division_id" required>
                            <option v-for="division in divisions" :key="division.id" :value="division.id">
                                {{ division.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Race Title (optional)</label>
                            <span id="titleHelp" class="form-help" v-if="form.errors.has('race_title_id')"
                                  v-text="form.errors.get('race_title_id')">
                            </span>
                        </div>
                        <select class="form-input" name="race_title_id" v-model="form.race_title_id" required>
                            <option v-for="title in titles" :key="title.id" :value="title.id">
                                {{ title.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Event</label>
                            <span id="eventsHelp" class="form-help" v-if="form.errors.has('event_id')"
                                  v-text="form.errors.get('event_id')">
                            </span>
                        </div>
                        <select class="form-input" name="event_id" v-model="form.event_id" required>
                            <option v-for="event in events" :key="event.id" :value="event.id">
                                {{ event.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.place">Place</label>
                            <span id="placeHelp" class="form-help" v-if="form.errors.has('place')"
                                  v-text="form.errors.get('place')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.place"
                               type="number"
                               min="1"
                               v-model="form.place" required>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.number_teams">Number of Teams</label>
                            <span id="numberTeamsHelp" class="form-help" v-if="form.errors.has('number_teams')"
                                  v-text="form.errors.get('number_teams')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.number_teams"
                               type="number"
                               min="2"
                               v-model="form.number_teams" required>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.points">Points</label>
                            <span id="pointsHelp" class="form-help" v-if="form.errors.has('points')"
                                  v-text="form.errors.get('points')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.points"
                               type="number"
                               min="0"
                               v-model="form.points" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <update-button class="mr-4" :disabled="form.errors.any()">
                            Update
                        </update-button>
                        <cancel-button @clicked="resetForm"></cancel-button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-gray-200 hover:bg-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex justify-between p-2 items-center">
                        <div class="text-black flex w-11/12">
                            <div v-if="hasTitle" class="w-7/12 md:w-1/3">
                                {{ division }} <span class="text-sm text-gray-500"> {{ this.data.title.name }}</span>
                            </div>
                            <div v-else class="w-7/12 md:w-1/3">
                                {{ division }}
                            </div>
                            <div class="hidden md:flex md:w-1/6 text-center">
                                {{ event }}
                            </div>
                            <div class="hidden md:flex md:w-1/6">
                                {{ place_w_suffix }}
                            </div>
                            <div class="hidden md:flex md:w-1/6">
                                {{ points }}
                            </div>
                            <div class="w-1/6 text-center">
                                <a :href="url" class="text-blue-700">
                                    Results
                                </a>
                            </div>
                        </div>
                        <div>
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-gray-600 w-full py-1">Place:
                                <span class="text-gray-800">
                                    {{ place_w_suffix }}
                                </span>
                            </p>
                            <p class="text-gray-600 w-full py-1">Number of Teams:
                                <span class="text-gray-800">
                                    {{ number_teams }}
                                </span>
                            </p>
                            <p class="text-gray-600 w-full py-1">Points:
                                <span class="text-gray-800">
                                    {{ points }}
                                </span>
                            </p>

                        </div>
                        <div v-if="isCoach" class="flex justify-start cursor-pointer pb-2">
                            <edit-button @clicked="getNames"></edit-button>
                            <delete-button @clicked="destroy"></delete-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin}from '../../mixins/authMixin';
    export default {
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                division: this.data.division.name,
                // title: this.data.title.name,
                event: this.data.event.name,
                place: this.data.place,
                number_teams: this.data.number_teams,
                points: this.data.points,
                url: location.pathname + '/team-results/' +this.data.id,

                meet_id: this.data.meet_id,
                division_id: this.data.division_id,
                race_title_id: this.data.race_title_id,

                form: new Form({
                    division_id: this.data.division_id,
                    race_title_id: this.data.race_title_id,
                    event_id: this.data.event_id,
                    place: this.data.place,
                    number_teams: this.data.number_teams,
                    points: this.data.points
                }),

                divisions: [],
                events: [],
                titles: []
            }
        },

        computed: {
            place_w_suffix: function ordinal_suffix_of() {
                let i = this.place;

                let j = i % 10,
                    k = i % 100;
                if (j == 1 && k != 11) {
                    return i + "st";
                }
                if (j == 2 && k != 12) {
                    return i + "nd";
                }
                if (j == 3 && k != 13) {
                    return i + "rd";
                }
                return i + "th";
            },

            hasTitle() {
                return this.data.title
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch(location.pathname + '/team-results/' +this.data.id)
                    .then(data => {
                        this.division = this.divisions.find(division => division.id === this.form.division_id).name;
                        this.title = this.titles.find(title => title.id === this.form.race_title_id).name;
                        this.event = this.events.find(event => event.id === this.form.event_id).name;
                        this.place = this.form.place;
                        this.number_teams = this.form.number_teams;
                        this.points = this.form.points;


                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.division != this.data.division.name ||
                            this.title != this.data.title.name ||
                            this.event != this.data.event.name ||
                            this.place != this.data.place ||
                            this.number_teams != this.data.number_teams ||
                            this.points != this.data.points)
                            {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                });

                                toast({
                                    type: 'success',
                                    title: 'Team Result Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete(location.pathname + '/team-results/' +this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.division_id = this.division_id,
                this.form.race_title_id = this.race_title_id,
                this.form.event_id = this.event_id,
                this.form.place = this.place,
                this.form.number_teams = this.number_teams,
                this.form.points = this.points,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getDivisionNames() {
                    return axios.get('/api/divisions')
                }

                function getEventNames() {
                    return axios.get('/api/events')
                }

                function getRaceTitleNames() {
                    return axios.get('/api/titles')
                }

                axios.all([
                    getDivisionNames(),
                    getEventNames(),
                    getRaceTitleNames(),
                ])
                    .then(axios.spread((
                        divisionsResponse,
                        eventsResponse,
                        titlesResponse
                    ) => {
                        this.divisions = divisionsResponse.data;
                        this.events = eventsResponse.data;
                        this.titles = titlesResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        }
    }
</script>
