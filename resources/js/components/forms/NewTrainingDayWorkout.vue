<template>
    <form action="/training-calendar/date/workouts" method="POST" id="newTrainingCalendarWorkout"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()"
        class="p-4 bg-gray-100">
        <header class="text-2xl text-primary font-thin mb-2">Add a Workout</header>
        <div class="mb-2 flex flex-col">

            <div class="mb-2">
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

            <div class="mb-2">
                <div class="flex justify-between content-end">
                    <label class="form-label">Training Group</label>
                    <span id="trainingGroupHelp"
                          class="form-help"
                          v-if="form.errors.has('training_group_id')"
                          v-text="form.errors.get('training_group_id')">
                    </span>
                </div>
                <select class="form-input"
                        name="training_group_id"
                        v-model="form.training_group_id"
                        required>
                    <option v-for="trainingGroup in trainingGroups" :key="trainingGroup.id" :value="trainingGroup.id">
                        {{ trainingGroup.name }}
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
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {


        form: new Form({
            training_group_id: '',
            name: '',
        }),

            trainingGroups: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api' + location.pathname + '/workouts')

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
                        title: 'Workout Added Successfully'
                    });

                    this.$emit('created', data)
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = ''
            this.form.training_group_id = ''
            this.form.errors.clear();
        },

        close() {
            this.resetForm();
            Event.$emit('canceled')
        },
    },

    created() {
        Event.$on('cancel', () => this.resetForm());


        axios.get('/api/training-groups')
            .then(response => {
                this.trainingGroups = response.data;
            })
            .catch(errors => {
                console.log(errors)
            })
        }

    }
</script>
