<template>
    <form action="/cross-country/meets" method="POST" id="newCrossCountryMeet"
          @submit.prevent="onSubmit"
          @keydown="form.errors.clear()">

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Meet Name</label>
                <span id="meetNameHelp" class="form-help" v-if="form.errors.has('meet_name_id')"
                      v-text="form.errors.get('meet_name_id')">
                </span>
            </div>
            <select
                class="form-input"
                name="meet_name_id"
                v-model="form.meet_name_id"
                required>
                    <option
                        v-for="name in names" :key="name.id" :value="name.id">
                        {{ name.name }}
                    </option>
            </select>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.meet_date">
                    Date
                </label>
                <span id="dateHelp" class="form-help" v-if="form.errors.has('meet_date')"
                      v-text="form.errors.get('meet_date')">
                </span>
            </div>
            <input class="form-input" name="meet_date" id="form.meet_date" type="date" v-model="form.meet_date" required>
        </div>

        <div class="mb-2">
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

        <div class="mb-2">
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

        <div class="mb-2">
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

        <div class="text-right pt-2">
            <button type="submit"
                    class="submit-button"
                    :disabled="form.errors.any()">
                    Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    meet_name_id: '',
                    host_id: '',
                    meet_date: '',
                    cross_country_venue_id: '',
                    timing_method_id: ''
                }),

                names: [],
                hosts: [],
                venues: [],
                timings: [],
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/api/cross-country/meets')

                    .then(data => {

                        Event.$emit('formSubmitted');

                        const toast = Vue.swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Meet Added Successfully'
                        });

                        this.$emit('created', data),
                        this.resetForm()
                    })

                    .catch(errors => console.log(errors));
            },

            resetForm() {
                    this.form.meet_name_id = '',
                    this.form.meet_date = '',
                    this.form.cross_country_venue_id = '',
                    this.form.host_id = '',
                    this.form.timing_method_id = '',
                    this.form.errors.clear();
            },

            getAttributes() {
                function getMeetNames() {
                    return axios.get('/api/meet-names?season=cross-country')
                }

                function getHostNames() {
                    return axios.get('/api/hosts')
                }

                function getVenueNames() {
                    return axios.get('/api/cross-country/venues')
                }

                function getTimingMethods() {
                    return axios.get('/api/timing')
                }

                axios.all([
                    getMeetNames(),
                    getHostNames(),
                    getVenueNames(),
                    getTimingMethods(),
                ])
                    .then(axios.spread((
                        namesResponse,
                        hostsResponse,
                        venuesResponse,
                        timingsResponse
                    ) => {
                        this.names = namesResponse.data;
                        this.hosts = hostsResponse.data;
                        this.venues = venuesResponse.data;
                        this.timings = timingsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        },

        created() {
            Event.$on('cancel', () => this.resetForm());

            Event.$on('getNames', () => this.getAttributes());
        }
    }
</script>
