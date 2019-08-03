<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-100">
            <div class="w-full md:w-3/4 mx-auto">
                <form action="/runningLogs" method="POST" id="editRunningLog" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-2">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Date</label>
                            <span id="run_dateHelp" class="form-help" v-if="form.errors.has('run_date')"
                                  v-text="form.errors.get('run_date')">
                            </span>
                        </div>
                        <input class="form-input bg-white"
                               id="form.run_date"
                               type="date"
                               v-model="form.run_date" required>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Distance</label>
                            <span id="distanceHelp" class="form-help" v-if="form.errors.has('distance')"
                                  v-text="form.errors.get('distance')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.distance"
                               type="number"
                               min="1"
                               max="30"
                               step=".1"
                               v-model="form.distance" required>
                    </div>

                    <div class="flex mb-2 w-full">
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.hours">Hours</label>
                                <span id="hoursHelp" class="form-help" v-if="form.errors.has('hours')"
                                      v-text="form.errors.get('hours')">
                                </span>
                            </div>
                            <div class="flex">
                                <input class="form-input"
                                       id="form.hours"
                                       type="number"
                                       min="0"
                                       max="3"
                                       v-model="form.hours">
                                <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                            </div>
                        </div>
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.minutes">Minutes</label>
                                <span id="minutesHelp" class="form-help" v-if="form.errors.has('minutes')"
                                      v-text="form.errors.get('minutes')">
                                </span>
                            </div>
                            <div class="flex">
                                <input class="form-input"
                                       id="form.minutes"
                                       type="number"
                                       min="0"
                                       max="59"
                                       v-model="form.minutes" required>
                                <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                            </div>
                        </div>

                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.seconds">Seconds</label>
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
                                       v-model="form.seconds" required>
                                <span class="text-grey-darker px-1 text-3xl content-end">.</span>
                            </div>

                        </div>
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.milliseconds">ms (opt)</label>
                            </div>

                            <input class="form-input"
                                   id="form.milliseconds"
                                   type="number"
                                   min="0"
                                   max="99"
                                   v-model="form.milliseconds">
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Time of Day</label>
                            <span id="dayTimeHelp" class="form-help" v-if="form.errors.has('day_time_id')"
                                  v-text="form.errors.get('day_time_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="day_time_id" v-model="form.day_time_id" required>
                            <option v-for="dayTime in dayTimes" :key="dayTime.id" :value="dayTime.id">
                                {{ dayTime.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Terrain Type</label>
                            <span id="terrainTypeHelp" class="form-help" v-if="form.errors.has('terrain_type_id')"
                                  v-text="form.errors.get('terrain_type_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="terrain_type_id" v-model="form.terrain_type_id" required>
                            <option v-for="terrainType in terrainTypes" :key="terrainType.id" :value="terrainType.id">
                                {{ terrainType.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Run Type</label>
                            <span id="runTypeHelp" class="form-help" v-if="form.errors.has('run_type_id')"
                                  v-text="form.errors.get('run_type_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="run_type_id" v-model="form.run_type_id" required>
                            <option v-for="runType in runTypes" :key="runType.id" :value="runType.id">
                                {{ runType.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Run Effort</label>
                            <span id="runEffortHelp" class="form-help" v-if="form.errors.has('run_effort_id')"
                                  v-text="form.errors.get('run_effort_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="run_effort_id" v-model="form.run_effort_id" required>
                            <option v-for="runEffort in runEfforts" :key="runEffort.id" :value="runEffort.id">
                                {{ runEffort.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Run Feeling</label>
                            <span id="runFeelingHelp" class="form-help" v-if="form.errors.has('run_feeling_id')"
                                  v-text="form.errors.get('run_feeling_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="run_feeling_id" v-model="form.run_feeling_id" required>
                            <option v-for="runFeeling in runFeelings" :key="runFeeling.id" :value="runFeeling.id">
                                {{ runFeeling.name }}
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

                    <div class="flex items-center justify-end">
                        <update-button class="mr-4" :disabled="form.errors.any()">
                            Update
                        </update-button>
                        <cancel-button @clicked="resetForm"></cancel-button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex p-1 items-center justify-between">
                        <div class="text-gray-700 flex-wrap w-11/12">
                            <div class="w-full text-xs font-light">
                                {{ run_date | moment("MMM DD, YYYY") }}
                            </div>
                            <div class="flex w-full pl-2 pt-1 text-primary">
                                <div class="w-1/3 ">
                                    {{ distance }} <span class="text-xs text-gray-700">miles</span>
                                </div>
                                <div class="w-1/3">
                                    {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                                </div>
                                <div class="w-1/3">
                                    {{ pace }}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-grow justify-end pr-1">
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-2 px-4 leading-normal">
                            <p class="text-smoke-700 text-sm">Time of Day:
                                <span class="text-smoke-800 font-semibold">
                                    {{ dayTime }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Run Type:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runType }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Terrain Type:
                                <span class="text-smoke-800 font-semibold">
                                    {{ terrainType }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Your Effort:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runEffort }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">How You Felt:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runFeeling }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Notes:
                                <span class="text-smoke-800 font-semibold">
                                    {{ notes }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-start cursor-pointer pb-2 lg:pt-2">
                            <edit-button @clicked="getNames"></edit-button>
                            <delete-button @clicked="destroy"></delete-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                run_date: this.data.run_date,
                distance: this.data.distance,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
                milliseconds: this.data.milliseconds,
                totalSeconds: this.data.total_seconds,
                dayTime: this.data.day_time.name,
                runType: this.data.run_type.name,
                terrainType: this.data.terrain_type.name,
                runEffort: this.data.run_effort.name,
                runFeeling: this.data.run_feeling.name,
                notes: this.data.notes,


                form: new Form({
                    run_date: this.data.run_date,
                    distance: this.data.distance,
                    hours: ~~(this.data.total_seconds / 3600),
                    minutes: ~~((this.data.total_seconds % 3600) / 60),
                    seconds: ~~(this.data.total_seconds % 60),
                    milliseconds: this.data.milliseconds,
                    day_time_id: this.data.day_time_id,
                    run_type_id: this.data.run_type_id,
                    terrain_type_id: this.data.terrain_type_id,
                    run_effort_id: this.data.run_effort_id,
                    run_feeling_id: this.data.run_feeling_id,
                    notes: this.data.notes

                }),

                dayTimes: [],
                runTypes: [],
                terrainTypes: [],
                runEfforts: [],
                runFeelings: []
            }
        },

        computed: {

            duration: function () {
                let time = this.totalSeconds;

                let hrs = ~~(time / 3600);
                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                let ret = "";

                if (hrs > 0) {
                    ret += "" + hrs + ":" + (min < 10 ? "0" : "");
                }

                ret += "" + min + ":" + (sec < 10 ? "0" : "");
                ret += "" + sec;

                return ret;
            },

            pace: function() {
                let s = this.totalSeconds;
                let d = this.distance;

                let pace = s/d;

                let minutes = Math.floor(pace / 60);
                let seconds = Math.floor(pace % 60);

                let averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

                return averagePace;
            },
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('api/running-log' + '/' + this.data.id)
                    .then(data => {
                        this.runType = this.runTypes.find(runType => runType.id === this.form.run_type_id).name;
                        this.terrainType = this.terrainTypes.find(terrainType => terrainType.id === this.form.terrain_type_id).name;
                        this.runEffort = this.runEfforts.find(runEffort => runEffort.id === this.form.run_effort_id).name;
                        this.runFeeling = this.runFeelings.find(runFeeling => runFeeling.id === this.form.run_feeling_id).name;
                        this.dayTime = this.dayTimes.find(dayTime => dayTime.id === this.form.day_time_id).name;
                        this.hours = this.form.hours;
                        this.minutes = this.form.minutes;
                        this.run_date = this.form.run_date;
                        this.seconds = this.form.seconds;
                        this.milliseconds = this.form.milliseconds;
                        this.distance = this.form.distance;
                        this.totalSeconds = this.form.hours * 3600 + this.form.minutes * 60 + this.form.seconds;
                        this.notes = this.form.notes;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                             this.dayTime != this.data.dayTime.name ||
                             this.runType != this.data.runType.name ||
                             this.runEffort != this.data.runEffort.name ||
                             this.runFeeling != this.data.runFeeling.name ||
                             this.terrainType != this.data.terrainType.name ||
                             this.hours != this.data.hours ||
                             this.minutes != this.data.minutes ||
                             this.seconds != this.data.seconds ||
                             this.milliseconds != this.data.milliseconds ||
                             this.distance != this.data.distance ||
                             this.run_date != this.data.run_date ||
                             this.notes != this.data.notes
                         )
                            {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                });

                                toast({
                                    type: 'success',
                                    title: 'Running Log Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete(location.pathname + '/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.run_date = this.data.run_date,
                this.form.distance = this.data.distance,

                this.form.day_time_id = this.data.day_time_id,
                this.form.run_type_id = this.data.run_type_id,
                this.form.run_effort_id = this.data.run_effort_id,
                this.form.run_feeling_id = this.data.run_feeling_id,
                this.form.terrain_type_id = this.data.terrain_type_id,

                this.form.hours = ~~(this.data.total_seconds / 3600),
                this.form.minutes = ~~((this.data.total_seconds % 3600) / 60),
                this.form.seconds = ~~(this.data.total_seconds % 60),
                this.form.milliseconds = this.data.milliseconds,
                this.form.notes = this.data.notes

                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getDayTimeNames() {
                    return axios.get('/api/dayTimes')
                }

                function getRunEffortNames() {
                    return axios.get('/api/runEfforts')
                }

                function getRunFeelingNames() {
                    return axios.get('/api/runFeelings')
                }

                function getRunTypeNames() {
                    return axios.get('/api/runTypes')
                }

                function getTerrainTypeNames() {
                    return axios.get('/api/terrainTypes')
                }

                axios.all([
                    getDayTimeNames(),
                    getRunEffortNames(),
                    getRunFeelingNames(),
                    getRunTypeNames(),
                    getTerrainTypeNames(),
                ])
                    .then(axios.spread((
                        dayTimesResponse,
                        runEffortsResponse,
                        runFeelingsResponse,
                        runTypesResponse,
                        terrainTypesResponse
                    ) => {
                        this.dayTimes = dayTimesResponse.data;
                        this.runEfforts = runEffortsResponse.data;
                        this.runFeelings = runFeelingsResponse.data;
                        this.runTypes = runTypesResponse.data;
                        this.terrainTypes = terrainTypesResponse.data;
                    }));
            }
        }
    }
</script>
