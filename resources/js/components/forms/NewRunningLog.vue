<template>
    <form action="/running-log" method="POST" id="newRunningLog"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.run_date">Date</label>
                <span id="run_dateHelp" class="form-help" v-if="form.errors.has('run_date')"
                      v-text="form.errors.get('run_date')">
                </span>
            </div>
            <input class="form-input"
                   id="form.run_date"
                   type="date"
                   v-model="form.run_date">
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.distance">Distance (miles)</label>
                <span id="distanceHelp" class="form-help" v-if="form.errors.has('distance')"
                      v-text="form.errors.get('distance')">
                </span>
            </div>
            <input class="form-input"
                   id="form.distance"
                   min="1"
                   max="30"
                   step=".1"
                   v-model="form.distance">
        </div>

        <div class="flex mb-1 w-full">
            <div class="flex flex-col w-1/4">
                <div class="flex justify-between content-end">
                    <label class="form-label text-xs" for="form.hours">Hours</label>
                    <span id="hoursHelp" class="form-help" v-if="form.errors.has('hours')"
                          v-text="form.errors.get('hours')">
                    </span>
                </div>
                <div class="flex">
                    <input class="form-input"
                           id="form.hours"
                           min="0"
                           max="3"
                           step="1"
                           v-model="form.hours">
                    <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                </div>
            </div>

            <div class="flex flex-col w-1/4">
                <div class="flex justify-between content-end">
                    <label class="form-label text-xs" for="form.minutes">Minutes</label>
                    <span id="minutesHelp" class="form-help" v-if="form.errors.has('minutes')"
                          v-text="form.errors.get('minutes')">
                    </span>
                </div>
                <div class="flex">
                    <input class="form-input"
                           name="minutes"
                           id="form.minutes"
                           type="number"
                           min="0"
                           max="59"
                           v-model="form.minutes">
                    <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                </div>
            </div>

            <div class="flex flex-col w-1/4">
                <div class="flex justify-between content-end">
                    <label class="form-label text-xs" for="form.seconds">Seconds</label>
                    <span id="secondsHelp" class="form-help" v-if="form.errors.has('seconds')"
                          v-text="form.errors.get('seconds')">
                    </span>
                </div>
                <div class="flex">
                    <input class="form-input"
                           id="form.seconds"
                           type="number"
                           min="0"
                           max="59"
                           v-model="form.seconds">
                    <span class="text-grey-darker px-1 text-3xl content-end">.</span>
                </div>

            </div>
            <div class="flex flex-col w-1/4">
                <div class="flex justify-between content-end">
                    <label class="form-label text-xs" for="form.milliseconds">ms (opt)</label>
                </div>

                <input class="form-input"
                       id="form.milliseconds"
                       type="number"
                       min="0"
                       max="99"
                       v-model="form.milliseconds">
            </div>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">Time of Day</label>
                <span id="dayTimeHelp" class="form-help" v-if="form.errors.has('day_time_id')"
                      v-text="form.errors.get('day_time_id')">
                </span>
            </div>
            <select class="form-input" name="day_time_id" v-model="form.day_time_id">
                <option v-for="dayTime in dayTimes" :key="dayTime.id" :value="dayTime.id">
                    {{ dayTime.name }}
                </option>
            </select>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">Terrain</label>
                <span id="terrainTypeHelp" class="form-help" v-if="form.errors.has('terrain_type_id')"
                      v-text="form.errors.get('terrain_type_id')">
                </span>
            </div>
            <select class="form-input" name="terrain_type_id" v-model="form.terrain_type_id">
                <option v-for="terrainType in terrainTypes" :key="terrainType.id" :value="terrainType.id">
                    {{ terrainType.name }}
                </option>
            </select>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">Run Type</label>
                <span id="runTypeHelp" class="form-help" v-if="form.errors.has('run_type_id')"
                      v-text="form.errors.get('run_type_id')">
                </span>
            </div>
            <select class="form-input" name="run_type_id" v-model="form.run_type_id">
                <option v-for="runType in runTypes" :key="runType.id" :value="runType.id">
                    {{ runType.name }}
                </option>
            </select>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">Effort</label>
                <span id="runEffortHelp" class="form-help" v-if="form.errors.has('run_effort_id')"
                      v-text="form.errors.get('run_effort_id')">
                </span>
            </div>
            <select class="form-input" name="run_effort_id" v-model="form.run_effort_id">
                <option v-for="runEffort in runEfforts" :key="runEffort.id" :value="runEffort.id">
                    {{ runEffort.name }}
                </option>
            </select>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label">How did you feel?</label>
                <span id="runFeelingHelp" class="form-help" v-if="form.errors.has('run_feeling_id')"
                      v-text="form.errors.get('run_feeling_id')">
                </span>
            </div>
            <select class="form-input" name="run_feeling_id" v-model="form.run_feeling_id">
                <option v-for="runFeeling in runFeelings" :key="runFeeling.id" :value="runFeeling.id">
                    {{ runFeeling.name }}
                </option>
            </select>
        </div>

        <div class="mb-1">
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
            form: new Form({
                run_date: '',
                distance: '',
                hours: '',
                minutes: '',
                seconds: '',
                milliseconds: '',
                day_time_id: '',
                terrain_type_id: '',
                run_type_id: '',
                run_effort_id: '',
                run_feeling_id: '',
                notes: ''
            }),

            dayTimes: [],
            terrainTypes: [],
            runTypes: [],
            runEfforts: [],
            runFeelings: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/running-log')

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
                        title: 'Run Successfully Logged'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.run_date = '',
            this.form.distance = '',
            this.form.hours = '',
            this.form.minutes = '',
            this.form.seconds = '',
            this.form.milliseconds = '',
            this.form.day_time_id = '',
            this.form.terrain_type_id = '',
            this.form.run_type_id = '',
            this.form.run_effort_id = '',
            this.form.run_feeling_id = '',
            this.form.notes = '',
            this.form.errors.clear();
        },

        getAttributes() {
            function getDayTimesNames() {
                return axios.get('api/dayTimes')
            }

            function getTerrainTypeNames() {
                return axios.get('api/terrainTypes')
            }

            function getRunTypeNames() {
                return axios.get('api/runTypes')
            }

            function getRunEffortNames() {
                return axios.get('api/runEfforts')
            }

            function getRunFeelingNames() {
                return axios.get('api/runFeelings')
            }

            axios.all([
                getDayTimesNames(),
                getTerrainTypeNames(),
                getRunTypeNames(),
                getRunEffortNames(),
                getRunFeelingNames()
            ])
            .then(axios.spread((
                dayTimesResponse,
                terrainTypesResponse,
                runTypesResponse,
                runEffortsResponse,
                runFeelingsResponse
            ) => {
                this.dayTimes = dayTimesResponse.data;
                this.terrainTypes = terrainTypesResponse.data;
                this.runTypes = runTypesResponse.data;
                this.runEfforts = runEffortsResponse.data;
                this.runFeelings = runFeelingsResponse.data;
            }))
            .catch(errors => {
                console.log(errors)
            });
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

        Event.$on('getNames', () => this.getAttributes());
    }
}
</script>
