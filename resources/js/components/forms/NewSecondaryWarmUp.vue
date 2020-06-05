<template>
    <form action="/training-calendar/date/steady-runs" method="POST" id="newSecondaryWarmUpRun"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()"
        class="p-4 bg-gray-100">
        <header class="text-2xl text-primary font-thin mb-2">Add a Warm-up</header>
        <div class="mb-2 flex flex-col md:flex-row md:justify-between lg:justify-around">
            <div class="flex flex-col w-full md:w-1/2 md:mr-2">
                <div class="flex content-end">
                    <label class="form-label" for="form.warmUpDuration">Duration</label>
                    <span id="durationHelp" class="form-help" v-if="form.errors.has('duration')"
                          v-text="form.errors.get('duration')">
                </span>
                    </div>
                    <input class="form-input"
                           id="form.warmUpDuration"
                           type="number"
                           min="1"
                           v-model="form.duration"
                           autofocus
                           required>
            </div>

            <div class="flex flex-col md:flex-row px-4">
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Meters</p>
                    <input
                        type="radio"
                        name="duration_unit"
                        value="meters"
                        class="hidden"
                        v-model="form.duration_unit">
                        <a v-if="metersSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectMeters">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Miles</p>
                    <input
                        type="radio"
                        name="duration_unit"
                        value="miles"
                        class="hidden"
                        v-model="form.duration_unit">
                        <a v-if="milesSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectMiles">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Minutes</p>
                    <input
                        type="radio"
                        value="minutes"
                        name="duration_unit"
                        class="hidden"
                        v-model="form.duration_unit">
                        <a v-if="minutesSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectMinutes">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
            </div>

        </div>
        <div class="text-right pt-2">
            <button class="py-2 text-grey-darker text-sm focus:outline-none px-2"
                    type="button"
                    @click="close">
                Cancel
            </button>
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
            minutesSelected: true,
            metersSelected: false,
            milesSelected: false,

            form: new Form({
                steady_run_type_id: 1,
                training_intensity_id: 1,
                duration: '',
                duration_unit: 'minutes',
                workout: 'secondary'
            }),
        };
    },

    computed: {

    },

    methods: {

        selectMiles() {
            this.form.duration_unit = 'miles'
            this.milesSelected = true
            this.minutesSelected = false
            this.metersSelected = false
        },

        selectMeters() {
            this.form.duration_unit = 'meters',
            this.metersSelected = true,
            this.milesSelected = false
            this.minutesSelected = false
        },

        selectMinutes() {
            this.form.duration_unit = 'minutes'
            this.minutesSelected = true
            this.milesSelected = false
            this.metersSelected = false
        },

        onSubmit() {
            this.form
                .post('/api'+location.pathname + '/steady-runs')

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
                        title: 'Warm-Up Added Successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.steady_run_type_id = 1
            this.form.duration = ''
            this.form.training_intensity_id = 1
            this.form.duration_unit = 'minutes'
            this.form.workout = 'secondary'
            this.form.errors.clear();
        },

        close() {
            this.resetForm();
            Event.$emit('canceled')
        },
    }
}
</script>
