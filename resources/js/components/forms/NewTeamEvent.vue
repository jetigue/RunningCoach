<template>
    <form action="/api/team-events" method="POST" id="newTeamEvent"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Name</label>
                <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')">
                </span>
            </div>
            <input class="form-input" id="form.name" type="text" v-model="form.name" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.event_date">Event Date</label>
                <span id="event_dateHelp" class="form-help" v-if="form.errors.has('event_date')"
                    v-text="form.errors.get('event_date')">
                </span>
            </div>
            <input class="form-input" id="form.event_date" type="date" v-model="form.event_date" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.event_time">Event Time</label>
                <span id="event_timeHelp" class="form-help" v-if="form.errors.has('event_time')"
                      v-text="form.errors.get('event_time')">
                </span>
            </div>
            <input class="form-input" id="form.event_time" type="text" v-model="form.event_time" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.location">Location</label>
                <span id="locationHelp" class="form-help" v-if="form.errors.has('location')"
                      v-text="form.errors.get('location')">
                </span>
            </div>
            <input class="form-input" id="form.location" type="text" v-model="form.location" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.details">Details (optional)</label>
                <span id="detailsHelp" class="form-help" v-if="form.errors.has('details')"
                      v-text="form.errors.get('details')">
                </span>
            </div>
            <input class="form-input" id="form.details" type="text" v-model="form.details">
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.link">Link (optional)</label>
                <span id="linkHelp" class="form-help" v-if="form.errors.has('link')"
                      v-text="form.errors.get('link')">
                </span>
            </div>
            <input class="form-input" id="form.link" type="url" v-model="form.link">
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.link_text">Link Text (optional)</label>
                <span id="link_textHelp" class="form-help" v-if="form.errors.has('link_text')"
                      v-text="form.errors.get('link_text')">
                </span>
            </div>
            <input class="form-input" id="form.link_text" type="text" v-model="form.link_text">
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
                event_date: '',
                event_time: '',
                location: '',
                details: '',
                link: '',
                link_text: ''
            }),
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/team-events')

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
                        title: 'Team TrackEvent Added successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.event_date = '',
            this.form.event_time = '',
            this.form.location = '',
            this.form.details = '',
            this.form.link = '',
            this.form.link_text = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>
