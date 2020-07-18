<template>
    <form action="/training-calendar/date/interval-runs" method="POST" id="newPrimaryIntervalRun"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Run Type</label>
                <span id="intervalRunTypeHelp"
                      class="form-help"
                      v-if="form.errors.has('interval_run_type_id')"
                      v-text="form.errors.get('interval_run_type_id')">
                </span>
            </div>
            <select class="form-input"
                    name="interval_run_type_id"
                    v-model="form.interval_run_type_id"
                    required>
                <option v-for="runType in runTypes" :key="runType.id" :value="runType.id">
                    {{ runType.name }}
                </option>
            </select>
        </div>

        <div class="mb-2 flex justify-between">
            <div class="flex flex-col w-5/12">
                <div class="flex content-end">
                    <label class="form-label" for="form.number_sets">Number of Sets</label>
                    <span id="numberSetsHelp" class="form-help" v-if="form.errors.has('number_sets')"
                          v-text="form.errors.get('number_sets')">
                </span>
                    </div>
                    <input class="form-input"
                           id="form.number_sets"
                           type="number"
                           min="1"
                           max="20"
                           v-model="form.number_sets">
            </div>
            <div class="flex flex-col w-1/2">
                <div class="flex content-end">
                    <label class="form-label" for="form.number_repetitions">Number of Reps</label>
                    <span id="numberRepsHelp" class="form-help" v-if="form.errors.has('number_repetitions')"
                          v-text="form.errors.get('number_repetitions')">
                </span>
                    </div>
                    <input class="form-input"
                           id="form.number_repetitions"
                           type="number"
                           min="1"
                           max="50"
                           v-model="form.number_repetitions">
            </div>
        </div>

        <div class="mb-2 flex justify-between">
            <div class="flex flex-col w-5/12">
                <div class="flex content-end">
                    <label class="form-label" for="form.duration">Duration of Each Rep</label>
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

            <div class="flex flex-col md:flex-row md:w-1/2 px-4 md:justify-between">
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
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Seconds</p>
                    <input
                        type="radio"
                        value="seconds"
                        name="duration_unit"
                        class="hidden"
                        v-model="form.duration_unit">
                        <a v-if="secondsSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectSeconds">
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
        <div class="mb-2 flex justify-between">
            <div class="flex flex-col w-5/12">
                <div class="flex content-end">
                    <label class="form-label" for="form.duration">Recovery Duration</label>
                    <span id="recoveryHelp" class="form-help" v-if="form.errors.has('recovery')"
                          v-text="form.errors.get('recovery')">
                </span>
                    </div>
                    <input class="form-input"
                           id="form.recovery"
                           type="number"
                           min="1"
                           v-model="form.recovery">
            </div>

            <div class="flex flex-col md:flex-row md:w-1/2 px-4 md:justify-between">
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Meters</p>
                    <input
                        type="radio"
                        name="duration_unit"
                        value="meters"
                        class="hidden"
                        v-model="form.recovery_unit">
                        <a v-if="recoveryMetersSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectRecoveryMeters">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Miles</p>
                    <input
                        type="radio"
                        name="recovery_unit"
                        value="miles"
                        class="hidden"
                        v-model="form.recovery_unit">
                        <a v-if="recoveryMilesSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectRecoveryMiles">
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
                        name="recovery_unit"
                        class="hidden"
                        v-model="form.recovery_unit">
                        <a v-if="recoveryMinutesSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectRecoveryMinutes">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
                <div class="flex md:flex-col items-center justify-between md:justify-start">
                    <p class="form-label">Seconds</p>
                    <input
                        type="radio"
                        value="seconds"
                        name="recovery_unit"
                        class="hidden"
                        v-model="form.recovery_unit">
                        <a v-if="recoverySecondsSelected" class="text-2xl" @click="">
                            <span style="color:green;">
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else
                           @click="selectRecoverySeconds">
                            <span class="text-2xl" style="color:lightgray;">
                                <i class="bg-white far fa-square"></i>
                            </span>
                        </a>
                </div>
            </div>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Recovery Type</label>
                <span id="recoveryTypeHelp"
                      class="form-help"
                      v-if="form.errors.has('recovery_type')"
                      v-text="form.errors.get('recovery_type')">
                </span>
            </div>
            <select class="form-input"
                    name="recovery_type"
                    v-model="form.recovery_type"
                    required>
                    <option value="Easy">Easy</option>
                    <option value="jog">Jog</option>
                    <option value="walk">Walk</option>
                    <option value="rest">Rest</option>
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

            minutesSelected: true,
            metersSelected: false,
            milesSelected: false,
            secondsSelected: false,
            recoveryMinutesSelected: false,
            recoveryMetersSelected: false,
            recoveryMilesSelected: false,
            recoverySecondsSelected: false,

            form: new Form({
                duration: '',
                duration_unit: 'minutes',
                interval_run_type_id: '',
                notes: '',
                number_repetitions: '',
                number_sets: '',
                recovery: '',
                recovery_type: '',
                recovery_unit: '',
                training_intensity_id: '',
                workout: 'primary',
            }),

            runTypes: [],
            intensities: []
        };
    },

    methods: {
        selectMiles() {
            this.form.duration_unit = 'miles'
            this.metersSelected = false
            this.milesSelected = true
            this.minutesSelected = false
            this.secondsSelected = false
        },

        selectMeters() {
            this.form.duration_unit = 'meters'
            this.metersSelected = true
            this.milesSelected = false
            this.minutesSelected = false
            this.secondsSelected = false
        },

        selectMinutes() {
            this.form.duration_unit = 'minutes'
            this.metersSelected = false
            this.milesSelected = false
            this.minutesSelected = true
            this.secondsSelected = false
        },

        selectSeconds() {
            this.form.duration_unit = 'seconds'
            this.metersSelected = false
            this.milesSelected = false
            this.minutesSelected = false
            this.secondsSelected = true
        },

        selectRecoveryMiles() {
            this.form.recovery_unit = 'miles'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = true
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = false
        },

        selectRecoveryMeters() {
            this.form.recovery_unit = 'meters'
            this.recoveryMetersSelected = true
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = false
        },

        selectRecoveryMinutes() {
            this.form.recovery_unit = 'minutes'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = true
            this.recoverySecondsSelected = false
        },

        selectRecoverySeconds() {
            this.form.recovery_unit = 'seconds'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = true
        },

        onSubmit() {
            this.form
                .post('/api' + location.pathname + '/interval-runs')

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
                        title: 'Interval Run Added Successfully'
                    });

                    this.$emit('created', data),
                        this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.duration = ''
            this.form.duration_unit = 'minutes'
            this.form.interval_run_type_id = ''
            this.form.notes = ''
            this.form.number_repetitions = ''
            this.form.number_sets = ''
            this.form.recovery = ''
            this.form.recovery_type = ''
            this.form.recovery_unit = ''
            this.form.training_intensity_id = ''
            this.form.workout = 'primary'
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
            return axios.get('/api/interval-run-types')
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
