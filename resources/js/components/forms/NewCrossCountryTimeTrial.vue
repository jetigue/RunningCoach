<template>
    <form action="/cross-country/time-trials" method="POST" id="newCrossCountryTimeTrial"
          @submit.prevent="onSubmit"
          @keydown="form.errors.clear()">

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
                    name: '',
                    trial_date: '',
                    cross_country_venue_id: '',
                    timing_method_id: ''
                }),

                venues: [],
                timings: [],

            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/api/cross-country/time-trials')

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
                            title: 'Time Trial Added Successfully'
                        });

                        this.$emit('created', data),
                        this.resetForm()
                    })

                    .catch(errors => console.log(errors));
            },

            resetForm() {
                    this.form.name = ''
                    this.form.trial_date = ''
                    this.form.cross_country_venue_id = ''
                    this.form.timing_method_id = ''
                    this.form.errors.clear();
            },

            getAttributes() {

                function getVenueNames() {
                    return axios.get('/api/cross-country/venues')
                }

                function getTimingMethods() {
                    return axios.get('/api/timing')
                }

                axios.all([
                    getVenueNames(),
                    getTimingMethods(),
                ])
                    .then(axios.spread((
                        venuesResponse,
                        timingsResponse,

                    ) => {
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
