<template>
    <form action="/api/venues" method="POST" id="newMeetVenue"
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
                    v-model="form.name">
        </div>
        <div class="text-right">
            <button type="submit"
                    class="w-20 py-2 bg-white border-b-2 border-tertiary hover:bg-green-lightest text-tertiary text-sm font-bold rounded"
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
                name: ''
            })
        }
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/hosts')

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
                        title: 'Venue Added successfully'
                    });
  
                    this.$emit('created', data),
                    this.form.name = ''
                    this.form.season_id = ''
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.season_id = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>