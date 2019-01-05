<template>
    <form action="/api/hosts" method="POST" id="newMeetHost"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-6">
            <label class="form-label" for="form.name">Name</label>
            <input class="form-input"
                    id="form.name"
                    type="text"
                    v-model="form.name">
            <span id="nameHelp" class="help bg-red" v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')"></span>
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
  
                    this.$emit('created', data)
                    this.form.name = ''
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = ''
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>

