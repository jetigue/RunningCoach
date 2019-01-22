<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/track-meets/id" method="POST" id="editTrackMeet" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-blue-lightest shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.meet_name_id">Meet Name</label>
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

                    <div class="mb-3">
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

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.host_id">Host</label>
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

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.venue_id">Venue</label>
                            <span id="venueHelp" class="form-help" v-if="form.errors.has('venue_id')"
                                v-text="form.errors.get('venue_id')">
                            </span>
                        </div>
                        <select class="form-input" name="venue_id" v-model="form.venue_id" required>
                            <option v-for="venue in venues" :key="venue.id" :value="venue.id">
                                {{ venue.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.timing_method_id">Timing Method</label>
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
            <div class="flex flex-col border-b border-blue-lightest hover:bg-blue-lightest">
                <div class="flex flex-col hover:bg-blue-lightest">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-4/5 flex-wrap">
                            <div class="text-grey-darker w-full lg:w-1/2 font-semibold md:font-normal">
                            {{ meetName }}
                            </div>
                            <div class="text-grey-darker py-1 pl-4 lg:p-0">
                                {{ meetDate | moment("MMMM Do, YYYY") }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                            <div class="flex justify-between flex-wrap pb-4 px-4">

                                <p class="text-grey w-full lg:w-1/2 py-1">Season: 
                                    <span class="text-tertiary">
                                        {{ season }}
                                    </span>
                                </p>
                                <p class="text-grey w-full lg:w-1/2 py-1">Host: 
                                    <span class="text-tertiary">
                                        {{ host }}
                                    </span>
                                </p>
                                <p class="text-grey w-full lg:w-1/2 py-1">Venue: 
                                    <span class="text-tertiary">
                                        {{ venue }}
                                    </span>
                                </p>
                                <p class="text-grey w-full lg:w-1/2 py-1">Timing: 
                                    <span class="text-tertiary">
                                        {{ timing }}
                                    </span>
                                </p>
                            </div>
                            <div class="flex justify-end cursor-pointer pb-2">
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
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                meetName: this.data.name.name,
                meetDate: this.data.meet_date,
                season: this.data.season.name,
                host: this.data.host.name,
                venue: this.data.venue.name,
                timing: this.data.timing.name,

                meet_name_id: this.data.meet_name_id,
                season_id: this.data.season_id,
                host_id: this.data.host_id,
                venue_id: this.data.venue_id,
                timing_method_id: this.data.timing_method_id,

                form: new Form({
                    meet_name_id: this.data.meet_name_id,
                    meet_date: this.data.meet_date,
                    season_id: this.data.season_id,
                    host_id: this.data.host_id,
                    venue_id: this.data.venue_id,
                    timing_method_id: this.data.timing_method_id
                }),

                names: [],
                hosts: [],
                venues: [],
                timings: [],
                seasons: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/track-meets/' + this.data.id)
                    .then(data => {
                        this.meetName = this.names.find(name => name.id === this.form.meet_name_id).name;
                        this.meetDate = this.form.meet_date;
                        this.host = this.hosts.find(host => host.id === this.form.host_id).name;
                        this.venue = this.venues.find(venue => venue.id === this.form.venue_id).name;
                        this.timing = this.timings.find(timing => timing.id === this.form.timing_method_id).name;
                        this.season = this.seasons.find(season => season.id === this.form.season_id).name

                        this.editing = false;
                        this.isExpanded = false;

                        const toast = Vue.swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Track Meet Updated'
                        });
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/track-meets/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.meet_name_id = this.meet_name_id,
                this.form.meet_date = this.meetDate,
                this.form.season_id = this.season_id,
                this.form.host_id = this.host_id,
                this.form.venue_id = this.venue_id,
                this.form.timing_method_id = this.timing_method_id,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getHostNames() {
                    return axios.get('/api/hosts')
                }             
                
                function getMeetNames() {
                    return axios.get('/api/meet-names?season=outdoor-track&season2=indoor-track')
                }

                function getSeasonNames() {
                    return axios.get('/api/seasons')
                }

                function getTimingMethods() {
                    return axios.get('/api/timing')
                }

                function getVenueNames() {
                    return axios.get('/api/venues')
                }

                axios.all([
                    getHostNames(),
                    getMeetNames(),
                    getSeasonNames(),
                    getTimingMethods(),
                    getVenueNames(),
                ])
                    .then(axios.spread((
                        hostsResponse,
                        namesResponse,
                        seasonsResponse,
                        timingsResponse,
                        venuesResponse
                    ) => {
                        this.hosts = hostsResponse.data;
                        this.names = namesResponse.data;
                        this.seasons = seasonsResponse.data;
                        this.timings = timingsResponse.data;
                        this.venues = venuesResponse.data;
                    }));         
            }
        },
    }
</script>