<template>
    <form action="/cross-country-meets/team-results" method="POST" id="newCrossCountryTeamResult"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-2">
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

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Race Title (optional)</label>
                <span id="titleHelp" class="form-help" v-if="form.errors.has('race_title_id')"
                      v-text="form.errors.get('race_title_id')">
                </span>
            </div>
            <select class="form-input" name="race_title_id" v-model="form.race_title_id">
                <option v-for="title in titles" :key="title.id" :value="title.id">
                    {{ title.name }}
                </option>
            </select>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Event</label>
                <span id="eventHelp" class="form-help" v-if="form.errors.has('event_id')"
                      v-text="form.errors.get('event_id')">
                </span>
            </div>
            <select class="form-input" name="event_id" v-model="form.event_id" required>
                <option v-for="event in events" :key="event.id" :value="event.id">
                    {{ event.name }}
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

        <div class="mb-2">
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
                   v-model="form.points" required>
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
                division_id: '',
                race_title_id: '',
                event_id: '',
                place: '',
                number_teams: '',
                points: '',
            }),

            divisions: [],
            titles: [],
            events: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post(location.pathname + '/team-results')

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
            this.form.division_id = '',
            this.form.race_title_id = '',
            this.form.event_id = '',
            this.form.place = '',
            this.form.number_teams = '',
            this.form.points = '',
            this.form.errors.clear();
        },

        getAttributes() {
            function getEventNames() {
                return axios.get('/api/events')
            }

            function getDivisionNames() {
                return axios.get('/api/divisions')
            }

            function getRaceTitleNames() {
                return axios.get('/api/titles')
            }

            axios.all([
                getEventNames(),
                getDivisionNames(),
                getRaceTitleNames()
            ])
            .then(axios.spread((
                eventsResponse,
                divisionsResponse,
                titlesResponse
            ) => {
                this.events = eventsResponse.data;
                this.divisions = divisionsResponse.data;
                this.titles = titlesResponse.data;
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
