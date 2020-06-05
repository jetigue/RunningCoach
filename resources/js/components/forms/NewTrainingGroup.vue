<template>
    <form action="/api/training-groups" method="POST" id="newTrainingGroup"
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

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.color">
                    Color Hex Code
                </label>
                <span id="colorHelp" class="form-help" v-if="form.errors.has('color')"
                        v-text="form.errors.get('color')">
                </span>
            </div>
            <div class="flex items-center">
                <span class="mx-1">#</span>
                <input class="form-input" id="form.color" type="text" v-model="form.color">
            </div>
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
                color: ''
            })
        }
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/training-groups')

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
                        title: 'Training Group Created successfully'
                    });

                    this.$emit('created', data)
                    this.form.name = ''
                    this.form.color = ''
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = ''
            this.form.color = ''
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>

