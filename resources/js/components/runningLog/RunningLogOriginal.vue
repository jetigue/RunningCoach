<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full md:w-3/4 lg:w-1/2 mx-auto">
                <form action="/runningLogs" method="POST" id="editRunningLog" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-blue-lightest shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                            <span id="distanceHelp" class="form-help" v-if="form.errors.has('distance_id')"
                                  v-text="form.errors.get('distance_id')">
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
                                <label class="form-label" for="form.milliseconds">ms</label>
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
            <div class="flex flex-col border-b border-blue-lightest hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex p-2 items-center">
                        <div class="text-grey-darker flex flex-wrap w-9/10">
                            <div class="flex justify-between w-full md:w-2/5 lg:w-1/4">
                                <div>
                                    {{ run_date | moment('MMM DD YYYY') }}
                                </div>
                            </div>
                            <div class="flex w-full pl-3 text-primary">
                                <div class="w-1/3">
                                    {{ distance }} <span class="text-xs text-grey-darker">miles</span>
                                </div>
                                <div class="w-1/3">
                                    <span v-if="hours != null">{{ hours }}:</span>{{ minutes }}<span>:</span>{{ seconds }}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                                </div>
                                <div class="w-1/3">
                                    {{ pace }} <span class="text-xs text-grey-darker">pace</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-grow justify-end">
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-2 px-4">
                            <p class="text-grey-darker text-sm py-1">Time of Day:
                                <span class="text-tertiary">
                                    {{ time }}
                                </span>
                            </p>
                            <p class="text-grey-darker text-sm py-1">Run Type:
                                <span class="text-tertiary">
                                    {{ type }}
                                </span>
                            </p>
                            <p class="text-grey-darker text-sm py-1">Terrain:
                                <span class="text-tertiary">
                                    {{ terrain }}
                                </span>
                            </p>
                            <p class="text-grey-darker text-sm py-1">Effort:
                                <span class="text-tertiary">
                                    {{ effort }}
                                </span>
                            </p>
                            <p class="text-grey-darker text-sm py-1">Feeling:
                                <span class="text-tertiary">
                                    {{ feeling }}
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
                hours: this.data.hours,
                minutes: (this.data.minutes > 9 ? this.data.minutes : '0' + this.data.minutes),
                seconds: (this.data.seconds > 9 ? this.data.seconds : '0' + this.data.seconds),
                time: this.data.time.name,
                type: this.data.type.name,
                terrain: this.data.terrain.name,
                effort: this.data.effort.name,
                feeling: this.data.feeling.name,

                form: new Form({
                    run_date: this.data.run_date,
                    distance: this.data.distance,
                    hours: this.data.hours,
                    minutes: this.data.minutes,
                    seconds: this.data.seconds,
                    milliseconds: this.data.milliseconds,
                    day_time_id: this.data.day_time_id,
                    run_type_id: this.data.run_type_id,
                    terrain_type_id: this.data.terrain_type_id,
                    run_effort_id: this.data.run_effort_id,
                    run_feeling_id: this.data.run_feeling_id

                }),

                dayTimes: [],
                runTypes: [],
                terrainTypes: [],
                runEfforts: [],
                runFeelings: []
            }
        },

        computed: {
            pace: function() {
                var h = this.data.hours;
                var m = this.data.minutes;
                var s = this.data.seconds;
                var d = this.data.distance;

                var totalSeconds = h * 3600 + m * 60 + s;

                var pace = totalSeconds/d;

                var minutes = Math.floor(pace / 60);
                var seconds = Math.floor(pace % 60);

                var averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

                return averagePace;

            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch(location.pathname + '/' + this.data.id)
                    .then(data => {
                        this.run_type = this.runTypes.find(runType => runType.id === this.form.run_type_id).name;
                        this.terrainType = this.terrainTypes.find(terrainType => terrainType.id === this.form.terrain_type_id).name;
                        this.runEffort = this.runEfforts.find(runEffort => runEffort.id === this.form.run_effort_id).name;
                        this.runFeeling = this.runFeelings.find(runFeeling => runFeeling.id === this.form.run_feeling_id).name;
                        this.dayTime = this.dayTimes.find(dayTime => dayTime.id === this.form.day_time_id).name;
                        this.minutes = (this.form.minutes > 9 ? this.form.minutes : '0' + this.form.minutes),
                        this.run_date = this.form.run_date,
                        this.seconds = (this.form.seconds > 9 ? this.form.seconds : '0' + this.form.seconds),
                        this.milliseconds = (this.form.milliseconds > 9 ? this.form.milliseconds : '0' + this.form.milliseconds),
                        this.distance = this.form.distance;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                             this.dayTime != this.data.dayTime.name ||
                             this.run_type != this.data.runType.name ||
                             this.runEffort != this.data.run_effort.name ||
                             this.runFeeling != this.data.run_feeling.name ||
                             this.terrainType != this.data.terrain_type.name ||
                             this.hours != this.data.hours ||
                             this.minutes != this.data.minutes ||
                             this.seconds != this.data.seconds ||
                             this.milliseconds != this.data.milliseconds ||
                             this.distance != this.data.distance ||
                             this.run_date != this.data.run_date)
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
                this.form.run_date = this.run_date,
                this.form.day_time_id = this.day_time_id,
                this.form.run_type_id = this.run_type_id,
                this.form.run_effort_id = this.run_effort_id,
                this.form.run_feeling_id = this.run_feeling_id,
                this.form.terrain_type_id = this.terrain_type_id,
                this.form.minutes = this.minutes,
                this.form.seconds = this.seconds,
                this.form.milliseconds = this.milliseconds,
                this.form.hours = this.hours,
                this.form.distance = this.distance,
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
