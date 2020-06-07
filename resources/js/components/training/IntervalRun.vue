<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-200">
            <form action="api/interval-runs/id"
                  method="POST"
                  id="editIntervalRun"
                  @submit.prevent="update"
                  @keydown="form.errors.clear()"
                  class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4 w-3/4 mx-auto">

                <header class="text-2xl text-primary font-thin mb-2">Edit a Interval Run</header>
                    <div class="mb-2 flex flex-col">
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
                                    <label
                                        class="form-label"
                                        for="form.number_sets">
                                            Number of Sets
                                    </label>
                                    <span id="numberSetsHelp"
                                          class="form-help"
                                          v-if="form.errors.has('number_sets')"
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
                                    <label
                                        class="form-label"
                                        for="form.number_repetitions">
                                            Number of Reps
                                    </label>
                                    <span id="numberRepsHelp"
                                          class="form-help"
                                          v-if="form.errors.has('number_repetitions')"
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
                                    <label
                                        class="form-label"
                                        for="form.duration">
                                            Duration of Each Rep
                                    </label>
                                    <span id="durationHelp"
                                          class="form-help"
                                          v-if="form.errors.has('duration')"
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
                    </div>
                <div class="flex items-center justify-end">
                    <update-button class="mr-4" :disabled="form.errors.any()">
                        Update
                    </update-button>
                    <cancel-button @clicked="resetForm"></cancel-button>
                </div>
            </form>
        </div>

        <div v-else class="w-full py-1 flex flex-col hover:bg-gray-100">
            <div class="flex w-full">
                <div class="w-5/6 flex items-center">
                    <div class="flex md:w-3/4">
                        <p class="px-4 justify-start">
                            <span class="font-semibold">{{ numberSets }} set</span>
                            of
                            <span class="font-semibold">{{ numberReps }} set</span>
                            x
                            <span class="font-semibold">{{ length }}</span>
                            at
                            <span class="font-semibold">{{ intensity }}</span>
                            pace with a
                            <span class="font-semibold">{{ recoveryLength }} {{ recoveryType }}</span>
                            recovery
                        </p>
                    </div>

                    <div class="hidden md:flex md:w-1/4 justify-around">
                        <div class="">
                            <span v-if="confirmedVarsity" @click="unConfirmVarsity">
                                <i class="text-primary far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmVarsity">
                                <i class="text-primary far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedJuniorVarsity" @click="unConfirmJuniorVarsity">
                                <i class="text-black far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmJuniorVarsity">
                                <i class="text-black far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedOpen" @click="unConfirmOpen">
                                <i class="text-smoke-700 far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmOpen">
                                <i class="text-smoke-700 far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedBeginner" @click="unConfirmBeginner">
                                <i class="text-green-500 far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmBeginner">
                                <i class="text-green-500 far fa-square text-xl"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 flex justify-end">
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
            </div>
        </div>

        <div
            v-if="isExpanded"
            class="flex flex-col pl-4 py-2 border-b justify-start cursor-pointer pb-2 hover:bg-gray-100">
            <div class="text-smoke-400">Notes: <span class="text-smoke-800">{{notes}}</span></div>

            <div class="flex w-2/5 py-2">
                <edit-button @clicked="editing=true"></edit-button>
                <delete-button @clicked="destroy"></delete-button>
            </div>

            <div class="flex w-3/5 md:hidden justify-around">
                <div class="">
                    <span v-if="confirmedVarsity" @click="unConfirmVarsity">
                        <i class="text-primary far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmVarsity">
                        <i class="text-primary far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedJuniorVarsity" @click="unConfirmJuniorVarsity">
                        <i class="text-black far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmJuniorVarsity">
                        <i class="text-black far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedOpen" @click="unConfirmOpen">
                        <i class="text-smoke-700 far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmOpen">
                        <i class="text-smoke-700 far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedBeginner" @click="unConfirmBeginner">
                        <i class="text-green-500 far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmBeginner">
                        <i class="text-green-500 far fa-square text-xl"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import {workoutMixin} from "../../mixins/workoutMixin";

    export default {
        name: "IntervalRun",
        mixins: [authMixin, workoutMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,
                metersSelected: false,
                milesSelected: false,
                minutesSelected: false,
                recoveryMetersSelected: false,
                recoveryMilesSelected: false,
                recoveryMinutesSelected: false,
                recoverySecondsSelected: false,
                secondsSelected: false,

                beginner: this.data.beginner,
                duration: this.data.duration,
                durationUnit: this.data.duration_unit,
                intensity: this.data.intensity.name,
                intensityId: this.data.training_intensity_id,
                intervalId: this.data.interval_run_type_id,
                junior_varsity: this.data.junior_varsity,
                numberReps: this.data.number_repetitions,
                numberSets: this.data.number_sets,
                notes: this.data.notes,
                open: this.data.open,
                recovery: this.data.recovery,
                recoveryType: this.data.recovery_type,
                recoveryUnit: this.data.recovery_unit,
                runType: this.data.run_type.name,
                runTypeId: this.data.interval_run_type_id,
                url: '/api' + location.pathname + '/interval-runs/' + this.data.id,
                varsity: this.data.varsity,
                workout: this.data.workout,

                confirmedVarsity: this.data.varsity === 'yes',
                confirmedJuniorVarsity: this.data.junior_varsity === 'yes',
                confirmedOpen: this.data.open === 'yes',
                confirmedBeginner: this.data.beginner === 'yes',

                form: new Form({
                    duration: this.data.duration,
                    duration_unit: this.data.duration_unit,
                    interval_run_type_id: this.data.interval_run_type_id,
                    notes: this.data.notes,
                    number_repetitions: this.data.number_repetitions,
                    number_sets: this.data.number_sets,
                    recovery: this.data.recovery,
                    recovery_type: this.data.recovery_type,
                    recovery_unit: this.data.recovery_unit,
                    training_intensity_id: this.data.training_intensity_id,
                    workout: this.data.workout
                }),

                runTypes: [],
                intensities: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch(this.url)
                    .then(data => {
                        this.duration = this.form.duration
                        this.durationUnit = this.form.duration_unit
                        this.intensity = this.intensities.find(intensity => intensity.id === this.form.training_intensity_id).name;
                        this.notes = this.form.notes;
                        this.numberReps = this.form.number_repetitions
                        this.numberSets = this.form.number_sets
                        this.recovery = this.form.recovery
                        this.recoveryType = this.form.recovery_type
                        this.recoveryUnit = this.form.recovery_unit
                        this.runType = this.runTypes.find(runType => runType.id === this.form.interval_run_type_id).name;
                        this.workout = this.form.workout

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                             this.duration !== this.data.duration ||
                             this.durationUnit !== this.data.duration_unit ||
                             this.intensityId !== this.data.training_intensity_id ||
                             this.notes !== this.data.notes ||
                             this.numberReps !== this.data.number_repetitions ||
                             this.numberSets !== this.data.number_sets ||
                             this.recovery !== this.data.recovery ||
                             this.recoveryType !== this.data.recovery_type ||
                             this.recoveryUnit !== this.data.recovery_unit ||
                             this.runTypeId !== this.data.interval_run_type_id
                            ) {
                             const toast = Vue.swal.mixin({
                                 toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                 timer: 3000
                             });

                             toast({
                                 type: 'success',
                                 title: 'Interval Run Updated'
                             });

                             Event.$emit('toggleSync')
                         }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            resetForm() {
                this.form.duration = this.data.duration
                this.form.duration_unit = this.data.duration_unit
                this.form.interval_run_type_id = this.data.interval_run_type_id
                this.form.notes = this.data.notes
                this.form.number_repetitions = this.data.number_repetitions
                this.form.number_sets = this.data.number_sets
                this.form.recovery = this.data.recovery
                this.form.recovery_type = this.data.recovery_type
                this.form.recovery_unit = this.data.recovery_unit
                this.form.training_intensity_id = this.data.training_intensity_id
                this.form.workout = this.data.workout
                this.form.errors.clear();
            },

            destroy() {
                axios.delete('/api' + location.pathname + '/interval-runs/' + this.data.id);

                this.$emit('deleted', this.data.id);

                Event.$emit('toggleSync');
            },
        },

        created() {
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

<style scoped>

</style>
