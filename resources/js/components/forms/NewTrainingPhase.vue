<template>
    <form action="/training-phases" method="POST" id="newTrainingPhase"
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
                    v-model="form.name"
                    required>
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
                      v-model="form.description" required></textarea>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">Training Period</label>
                <span id="periodHelp" class="form-help" v-if="form.errors.has('training_period_id')"
                      v-text="form.errors.get('training_period_id')">
                </span>
            </div>
            <select class="form-input" name="training_period_id" v-model="form.training_period_id" required>
                <option v-for="period in periods" :key="period.id" :value="period.id">
                    {{ period.name }}
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
                description: '',
                training_period_id: '',
            }),

            periods: []
        }
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/training-phases')

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
                        title: 'Training Phase Successfully Added'
                    });

                    this.$emit('created', data);
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        getPeriodNames() {
            axios.get('/api/training-periods')
                .then(response => {
                    this.periods = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                })
            }
        },

        resetForm() {
            this.form.name = '',
            this.form.description = '',
            this.form.training_period_id = ''
            this.form.errors.clear();
        },

        created() {
            Event.$on('cancel', () => this.resetForm());

            Event.$on('getNames', () => this.getPeriodNames());

        }

}
</script>
