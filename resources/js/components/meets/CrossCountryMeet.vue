<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/cross-country/meets/id" method="POST" id="editCrossCountryMeet" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-smoke-800 px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Meet Name</label>
                            <span id="meetNameHelp" class="form-help" v-if="form.errors.has('meet_name_id')"
                                v-text="form.errors.get('meet_name_id')">
                            </span>
                        </div>
                        <select class="form-input" name="meet_name_id" v-model="form.meet_name_id" required>
                            <option v-for="name in names" :key="name.id" :value="name.id">
                                {{ name.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.meet_date">
                                Date
                            </label>
                            <span id="dateHelp" class="form-help" v-if="form.errors.has('meet_date')"
                                    v-text="form.errors.get('meet_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.meet_date" type="date" v-model="form.meet_date">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Venue</label>
                            <span id="venueHelp" class="form-help" v-if="form.errors.has('cross_country_venue_id')"
                                v-text="form.errors.get('cross_country_venue_id')">
                            </span>
                        </div>
                        <select class="form-input" name="cross_country_venue_id" v-model="form.cross_country_venue_id" required>
                            <option v-for="venue in venues" :key="venue.id" :value="venue.id">
                                {{ venue.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Host</label>
                            <span id="hostHelp" class="form-help" v-if="form.errors.has('host_id')"
                                v-text="form.errors.get('host_id')">
                            </span>
                        </div>
                        <select class="form-input" name="host_id" v-model="form.host_id" required>
                            <option v-for="host in hosts" :key="host.id" :value="host.id">
                                {{ host.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Timing Method</label>
                            <span id="timingHelp" class="form-help" v-if="form.errors.has('timing_method_id')"
                                v-text="form.errors.get('timing_method_id')">
                            </span>
                        </div>
                        <select class="form-input" name="timing_method_id" v-model="form.timing_method_id" required>
                            <option v-for="timing in timings" :key="timing.id" :value="timing.id">
                                {{ timing.name }}
                            </option>
                        </select>
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
            <div class="flex flex-col border-b border-primary-lightest hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-11/12 flex-wrap items-center">
                            <div class="text-black w-full md:w-1/2 lg:w-2/5 font-semibold md:font-normal hover:text-blue-700">
                                <a :href="'/cross-country/meets/'+this.data.slug">{{meetName }}</a>
                            </div>
                            <div class="w-1/2 md:w-1/4 text-gray-700 py-1 pl-2 lg:p-0">
                                {{ meetDate | moment("MMMM Do") }}
                            </div>
                            <div class="w-1/2 md:w-1/4 text-blue-700 font-medium">
                                <a :href="'/cross-country/meets/'+this.data.slug">Results</a>
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">
                            <p class="text-gray-600 w-full py-1">Venue:
                                <span class="text-black">
                                    {{ venue }}
                                </span>
                            </p>
                            <p class="text-gray-600 w-full py-1">Host:
                                <span class="text-black">
                                    {{ host }}
                                </span>
                            </p>
                            <p class="text-gray-600 w-full py-1">Timing:
                                <span class="text-black">
                                    {{ timing }}
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
    import {authMixin} from "../../mixins/authMixin";

    export default {
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                slug: this.data.slug,
                meetName: this.data.name.name,
                meetDate: this.data.meet_date,
                host: this.data.host.name,
                venue: this.data.venue.name,
                timing: this.data.timing.name,
                path: '/cross-country/meets/' +this.slug,

                meet_name_id: this.data.meet_name_id,
                host_id: this.data.host_id,
                cross_country_venue_id: this.data.cross_country_venue_id,
                timing_method_id: this.data.timing_method_id,

                form: new Form({
                    meet_name_id: this.data.meet_name_id,
                    meet_date: this.data.meet_date,
                    host_id: this.data.host_id,
                    cross_country_venue_id: this.data.cross_country_venue_id,
                    timing_method_id: this.data.timing_method_id

                }),

                names: [],
                hosts: [],
                venues: [],
                timings: [],
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/cross-country/meets/' + this.data.id)
                    .then(data => {
                        this.meetName = this.names.find(name => name.id === this.form.meet_name_id).name;
                        this.meetDate = this.form.meet_date;
                        this.host = this.hosts.find(host => host.id === this.form.host_id).name;
                        this.venue = this.venues.find(venue => venue.id === this.form.cross_country_venue_id).name;
                        this.timing = this.timings.find(timing => timing.id === this.form.timing_method_id).name;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.meetName != this.data.name.name ||
                            this.meetDate != this.data.meetDate ||
                            this.venue != this.data.venue.name ||
                            this.host != this.data.host.name ||
                            this.timing != this.data.timing.name)
                            {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                });

                                toast({
                                    type: 'success',
                                    title: 'Cross Country Meet Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api' + location.pathname + '/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.meet_name_id = this.meet_name_id,
                this.form.meet_date = this.meetDate,
                this.form.host_id = this.host_id,
                this.form.cross_country_venue_id = this.cross_country_venue_id,
                this.form.timing_method_id = this.timing_method_id,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getHostNames() {
                    return axios.get('/api/hosts')
                }

                function getMeetNames() {
                    return axios.get('/api/meet-names?season=cross-country')
                }

                function getTimingMethods() {
                    return axios.get('/api/timing')
                }

                function getVenueNames() {
                    return axios.get('/api/cross-country/venues')
                }

                axios.all([
                    getHostNames(),
                    getMeetNames(),
                    getTimingMethods(),
                    getVenueNames(),
                ])
                    .then(axios.spread((
                        hostsResponse,
                        namesResponse,
                        timingsResponse,
                        venuesResponse
                    ) => {
                        this.hosts = hostsResponse.data;
                        this.names = namesResponse.data;
                        this.timings = timingsResponse.data;
                        this.venues = venuesResponse.data;
                    }));
            }
        }
    }
</script>
