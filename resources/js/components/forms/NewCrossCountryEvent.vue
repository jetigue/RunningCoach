<template>
    <form action="/api/cross-country/events" method="POST" id="newCrossCountryEvent"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

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
                <label class="form-label" for="form.meters">Meters</label>
                <span id="metersHelp" class="form-help" v-if="form.errors.has('meters')"
                    v-text="form.errors.get('meters')">
                </span>
            </div>
            <input class="form-input"
                    id="form.meters"
                    type="number"
                    v-model="form.meters" required>
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
                meters: ''
            })
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/cross-country/events')

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
                        title: 'Cross Country Event Added Successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.meters = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>
