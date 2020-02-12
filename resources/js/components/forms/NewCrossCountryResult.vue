<template>
    <form action="/cross-country/meets/team-results/result" method="POST" id="newCrossCountryResult"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Athlete</label>
                <span id="athleteHelp" class="form-help" v-if="form.errors.has('athlete_id')"
                      v-text="form.errors.get('athlete_id')">
                </span>
            </div>
            <select class="form-input" name="athlete_id" v-model="form.athlete_id" required>
                <option v-for="athlete in athletes" :key="athlete.id" :value="athlete.id">
                    {{ athlete.last_name }}, {{ athlete.first_name }}
                </option>
            </select>
        </div>

        <div class="mb-2">
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

        <div class="flex mb-2 w-full">
            <div class="flex flex-col flex-grow">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.minutes">Minutes</label>
                    <span id="minutesHelp" class="form-help" v-if="form.errors.has('minutes')"
                          v-text="form.errors.get('minutes')">
                    </span>
                </div>
                <div class="flex">
                    <input class="form-input"
                           id="form.minutes"
                           type="number"
                           min="0"
                           max="59"
                           v-model="form.minutes" required>
                    <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                </div>
            </div>

            <div class="flex flex-col flex-grow">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.seconds">Seconds</label>
                    <span id="secondsHelp" class="form-help" v-if="form.errors.has('seconds')"
                          v-text="form.errors.get('seconds')">
                    </span>
                </div>
                <div class="flex">
                    <input class="form-input"
                           id="form.seconds"
                           type="number"
                           min="0"
                           max="59"
                           v-model="form.seconds" required>
                    <span class="text-grey-darker px-1 text-3xl content-end">.</span>
                </div>

            </div>
            <div class="flex flex-col flex-grow">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.milliseconds">ms</label>
                </div>

                <input class="form-input"
                       id="form.milliseconds"
                       type="number"
                       min="0"
                       max="99"
                       v-model="form.milliseconds">
            </div>
        </div>

        <div class="mb-2">
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
                   v-model="form.points">
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
                athlete_id: '',
                place: '',
                minutes: '',
                seconds: '',
                milliseconds: '',
                points: ''
            }),

            athletes: [],
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post(location.pathname + '/results')

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
                        title: 'Result Added Successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.athlete_id = '',
            this.form.minutes = '',
            this.form.seconds = '',
            this.form.milliseconds ='',
            this.form.place = '',
            this.form.points = '',
            this.form.errors.clear();
        },

        getAttributes() {
            function getAthleteNames() {
                return axios.get('/api/physicals-athletes')
            }

            axios.all([
                getAthleteNames(),
            ])
            .then(axios.spread((
                athletesResponse,

            ) => {
                this.athletes = athletesResponse.data;
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
