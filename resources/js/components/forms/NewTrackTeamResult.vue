<template>
    <form action="/track/meets/team-results" method="POST" id="newTrackTeamResult"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

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
                <label class="form-label" for="form.place">Place</label>
                <span id="placeHelp" class="form-help" v-if="form.errors.has('place')"
                    v-text="form.errors.get('place')">
                </span>
            </div>
            <input class="form-input"
                    id="form.place"
                    type="number"
                    min="1"
                    v-model="form.place">
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
                   v-model="form.number_teams">
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.notes">Notes (optional)</label>
                <span id="notesHelp" class="form-help" v-if="form.errors.has('notes')"
                      v-text="form.errors.get('notes')">
                </span>
            </div>
            <textarea class="form-input"
                      id="form.notes"
                      v-model="form.notes">
            </textarea>
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
                place: '',
                number_teams: '',
                points: '',
                notes: ''
            }),

            divisions: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api' + location.pathname + '/team-results')

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
                        title: 'Team Result Added Successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.division_id = '',
            this.form.place = '',
            this.form.number_teams = '',
            this.form.points = '',
                this.form.notes = '',
            this.form.errors.clear();
        },

        getAttributes() {

            function getDivisionNames() {
                return axios.get('/api/divisions')
            }

            axios.all([
                getDivisionNames()
            ])
            .then(axios.spread((
                divisionsResponse
            ) => {
                this.divisions = divisionsResponse.data;
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
