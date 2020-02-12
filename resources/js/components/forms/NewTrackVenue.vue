<template>
    <form action="/track/venues" method="POST" id="newTrackVenue"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-4">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Name</label>
                <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')">
                </span>
            </div>
            <input class="form-input"
                    id="form.name"
                    type="text"
                    v-model="form.name" required>
        </div>

        <div class="mb-4">
            <div class="flex justify-between content-end">
                <label class="form-label">Track Surface</label>
                <span id="surfaceHelp" class="form-help" v-if="form.errors.has('track_surface_id')"
                    v-text="form.errors.get('track_surface_id')">
                </span>
            </div>
            <select class="form-input" name="track_surface_id" v-model="form.track_surface_id" required>
                <option v-for="surface in surfaces" :value="surface.id" :key="surface.id">
                    {{ surface.name }}
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
                track_surface_id: ''
            }),

            surfaces: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/track/venues')

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
                        title: 'Track Venue Added successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()

                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.track_surface_id = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

        Event.$on('getNames', () =>

            axios.get('/api/track-surfaces')
                .then(response => {
                    this.surfaces = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                })
        );
    }
}
</script>
