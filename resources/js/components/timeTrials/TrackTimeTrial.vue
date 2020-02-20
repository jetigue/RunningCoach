<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/track/time-trials/id" method="POST" id="editTrackMeet" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.name">
                                Name
                            </label>
                            <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                                    v-text="form.errors.get('name')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.name"
                               type="text"
                               v-model="form.name" required>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.trial_date">
                                Date
                            </label>
                            <span id="dateHelp" class="form-help" v-if="form.errors.has('trial_date')"
                                    v-text="form.errors.get('trial_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.trial_date" type="date" v-model="form.trial_date">
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Venue</label>
                            <span id="venueHelp" class="form-help" v-if="form.errors.has('track_venue_id')"
                                v-text="form.errors.get('track_venue_id')">
                            </span>
                        </div>
                        <select class="form-input" name="season_id" v-model="form.track_venue_id" required>
                            <option v-for="venue in venues" :key="venue.id" :value="venue.id">
                                {{ venue.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
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
                        <div class="text-black w-full md:w-1/2 lg:w-2/5 font-semibold md:font-normal hover:text-blue-700">
                                <a :href="'/track/time-trials/'+this.data.id">{{ name }}</a>
                            </div>
                            <div class="w-1/2 md:w-1/4 text-gray-700 py-1 pl-2 lg:p-0">
                                {{ trialDate | moment("MMMM Do") }}
                            </div>
                            <div class="w-1/2 md:w-1/4 text-blue-700 font-medium">
                                <a :href="'/track/time-trials/'+this.data.id">Results</a>
                            </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-grey w-full py-1">Venue:
                                <span class="text-tertiary">
                                    {{ venue }}
                                </span>
                            </p>

                            <p class="text-grey w-full py-1">Timing:
                                <span class="text-tertiary">
                                    {{ timing }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-start cursor-pointer pb-2">
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
                name: this.data.name,
                trialDate: this.data.trial_date,

                venue: this.data.venue.name,
                timing: this.data.timing.name,
                path: '/track/time-trials/' +this.id,

                track_venue_id: this.data.track_venue_id,
                timing_method_id: this.data.timing_method_id,

                form: new Form({
                    name: this.data.name,
                    trial_date: this.data.trial_date,
                    track_venue_id: this.data.track_venue_id,
                    timing_method_id: this.data.timing_method_id

                }),

                venues: [],
                timings: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/track/time-trials/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.trialDate = this.form.trial_date
                        this.venue = this.venues.find(venue => venue.id === this.form.track_venue_id).name;
                        this.timing = this.timings.find(timing => timing.id === this.form.timing_method_id).name;


                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.name != this.data.name ||
                            this.trialDate != this.data.trialDate ||
                            this.venue != this.data.venue.name ||
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
                                    title: 'Time Trial Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api'+ location.pathname + '/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name,
                this.form.trial_date = this.trialDate,
                this.form.track_venue_id = this.track_venue_id,
                this.form.timing_method_id = this.timing_method_id,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;


                function getTimingMethods() {
                    return axios.get('/api/timing')
                }

                function getVenueNames() {
                    return axios.get('/api/track/venues')
                }

                axios.all([
                    getTimingMethods(),
                    getVenueNames(),
                ])
                    .then(axios.spread((
                        timingsResponse,
                        venuesResponse
                    ) => {
                        this.timings = timingsResponse.data;
                        this.venues = venuesResponse.data;
                    }));
            }
        }
    }
</script>
