<template>
    <form action="/day-times" method="POST" id="newdayTime"
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
                    v-model="form.name">
        </div>

        <div class="mb-4">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Description</label>
                <span id="descriptionHelp" class="form-help" v-if="form.errors.has('description')"
                      v-text="form.errors.get('description')">
                </span>
            </div>
            <textarea class="form-input"
                   id="form.description"
                   type="textarea"
                      v-model="form.description"></textarea>
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
                description: ''
            }),
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/day-times')

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
                        title: 'Day Time Successfully Added'
                    });

                    this.$emit('created', data);
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.description = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

    }
}
</script>
