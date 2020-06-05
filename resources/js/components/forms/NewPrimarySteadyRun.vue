<template>
    <form action="/training-calendar/date/steady-runs" method="POST" id="newPrimarySteadyRun"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()"
        class="p-4 bg-gray-100">
        <header class="text-2xl text-primary font-thin mb-2">Add a Steady Run</header>
        <div class="mb-2 flex flex-col">

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Run Type</label>
                <span id="steadyRunTypeHelp"
                      class="form-help"
                      v-if="form.errors.has('steady_run_type_id')"
                      v-text="form.errors.get('steady_run_type_id')">
                </span>
            </div>
            <select class="form-input"
                    name="steady_run_type_id"
                    v-model="form.steady_run_type_id"
                    required>
                <option v-for="runType in runTypes" :key="runType.id" :value="runType.id">
                    {{ runType.name }}
                </option>
            </select>
        </div>

        <div class="mb-2 flex justify-between">
            <div class="flex flex-col w-5/12">
                <div class="flex content-end">
                    <label class="form-label" for="form.duration">Duration</label>
                    <span id="durationHelp" class="form-help" v-if="form.errors.has('duration')"
                          v-text="form.errors.get('duration')">
                </span>
                    </div>
                    <input class="form-input"
                           id="form.duration"
                           type="number"
                           min="1"
                           v-model="form.duration">
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

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Intensity</label>
                <span id="trainingIntensityHelp"
                      class="form-help"
                      v-if="form.errors.has('training_intensity_id')"
                      v-text="form.errors.get('training_intensity_id')">
                </span>
            </div>
            <select class="form-input"
                    name="training_intensity_id"
                    v-model="form.training_intensity_id"
                    required>
                <option v-for="intensity in intensities" :key="intensity.id" :value="intensity.id">
                    {{ intensity.name }}
                </option>
            </select>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.notes">Notes (optional)</label>
                <span id="notesHelp" class="form-help" v-if="form.errors.has('notes')"
                      v-text="form.errors.get('notes')">
                </span>
            </div>
            <textarea class="form-input"
                      id="form.notes"
                      v-model="form.notes">
            </textarea>
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
                steady_run_type_id: '',
                training_intensity_id: '',
                duration: '',
                duration_unit: 'minutes',
                workout: 'primary',
                notes: ''
            }),

            runTypes: [],
            intensities: []
        };
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
                .post('/api' + location.pathname + '/steady-runs')

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
                        title: 'Steady Run Added Successfully'
                    });

                    this.$emit('created', data),
                        this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.steady_run_type_id = ''
            this.form.duration = ''
            this.form.training_intensity_id = ''
            this.form.duration_unit = 'minutes'
            this.form.workout = 'primary'
            this.form.notes = ''
            this.form.errors.clear();
        },

        close() {
            this.resetForm();
            Event.$emit('canceled')
        },
    },


    created() {
        Event.$on('cancel', () => this.resetForm());

        function getRunTypes() {
            return axios.get('/api/steady-run-types')
        }

        function getIntensities() {
            return axios.get('/api/training-intensities')
        }

        axios.all([
            getRunTypes(),
            getIntensities()
        ])
            .then(axios.spread((
                runTypesResponse,
                intensitiesResponse
            ) => {
                this.runTypes = runTypesResponse.data;
                this.intensities = intensitiesResponse.data;

            }))
            .catch(errors => {
                console.log(errors)
            });
        }
    }
</script>
