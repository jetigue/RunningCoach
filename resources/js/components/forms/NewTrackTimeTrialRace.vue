<template>
    <form action="/track/time-trials/races" method="POST" id="newTrackTimeTrialRace"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Gender</label>
                <span id="genderHelp" class="form-help" v-if="form.errors.has('gender_id')"
                      v-text="form.errors.get('gender_id')">
                </span>
            </div>
            <select class="form-input" name="gender_id" v-model="form.gender_id" required>
                <option v-for="gender in genders" :key="gender.id" :value="gender.id">
                    {{ gender.name }}
                </option>
            </select>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Track Event</label>
                <span id="eventHelp" class="form-help" v-if="form.errors.has('track_event_id')"
                      v-text="form.errors.get('track_event_id')">
                </span>
            </div>
            <select class="form-input" name="track_event_id" v-model="form.track_event_id">
                <option v-for="event in events" :key="event.id" :value="event.id">
                    {{ event.name }}
                </option>
            </select>
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
                gender_id: '',
                track_event_id: '',
                notes: ''
            }),

            genders: [],
            events: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api'+location.pathname + '/races')

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
                        title: 'Race Added Successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.gender_id = '',
            this.form.track_event_id = '',
            this.form.notes = '',
            this.form.errors.clear();
        },

        getAttributes() {
            function getEventNames() {
                return axios.get('/api/track/events')
            }

            function getGenderNames() {
                return axios.get('/api/genders')
            }

            axios.all([
                getEventNames(),
                getGenderNames(),
            ])
            .then(axios.spread((
                eventsResponse,
                gendersResponse,
            ) => {
                this.events = eventsResponse.data;
                this.genders = gendersResponse.data;
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
