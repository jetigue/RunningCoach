<template>
    <div class="w-full md:w-1/2 lg:w-1/4 p-1 min-h-36">
        <div class="flex flex-col border rounded-lg h-full p-2"
             :style="{backgroundColor, color: textColor}">
            <div class="flex flex-col">
                <header class="flex self-center">{{ groupTitle }}</header>
                    <div v-if="noRecords" class="flex m-auto py-4 text-gray-500">
                        No Workout Provided
                    </div>
                    <div v-if="warmUpsCount !== null" class="">
                        <p class="text-sm text-gray-500">Warm-up</p>
                        <div v-for="(warmUp, index) in warmUps" :key="warmUp.id" class="flex flex-col">
                            <workout-card-steady-run :data="warmUp"></workout-card-steady-run>
                        </div>
                    </div>
                    <div v-if="steadyRunsCount !== null" class="">
                        <p class="text-sm text-gray-500"></p>
                        <div v-for="(steady, index) in steadyRuns" :key="steady.id" class="flex flex-col">
                            <workout-card-steady-run :data="steady"></workout-card-steady-run>
                        </div>
                    </div>
                    <div v-if="intervalRunsCount !== null" class="">
                        <p class="text-sm text-gray-500"></p>
                        <div v-for="(intervalRun, index) in intervalRuns" :key="intervalRun.id" class="flex flex-col">
                            <workout-card-interval-run :data="intervalRun"></workout-card-interval-run>
                        </div>
                    </div>
                    <div v-if="coolDownsCount !== null" class="">
                        <p class="text-sm text-gray-500">Cool Down</p>
                        <div v-for="(coolDown, index) in coolDowns" :key="coolDown.id" class="flex flex-col">
                            <workout-card-steady-run :data="coolDown"></workout-card-steady-run>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import WorkoutCardSteadyRun from "./WorkoutCardSteadyRun";
    import WorkoutCardIntervalRun from "./WorkoutCardIntervalRun";

    export default {
        name: "WorkoutCard",
        components: { WorkoutCardSteadyRun, WorkoutCardIntervalRun },
        props: {
            group: {},
            workout: {}
        },

        data() {
            return {
                noRecords: true,
                warmUps: [],
                steadyRuns: [],
                intervalRuns: [],
                coolDowns: [],
                backgroundColor: '',
                textColor: '',
            }
        },

        computed: {

            warmUpsCount() {
                if (!this.warmUps || !this.warmUps.length) {
                    return null
                }
                this.noRecords = false
                return this.warmUps.length;
            },

            steadyRunsCount() {
                if (!this.steadyRuns || !this.steadyRuns.length) {
                    return null
                }
                this.noRecords = false
                return this.steadyRuns.length;
            },

            intervalRunsCount() {
                if (!this.intervalRuns || !this.intervalRuns.length) {
                    return null
                }
                this.noRecords = false
                return this.intervalRuns.length;
            },

            coolDownsCount() {
                if (!this.coolDowns || !this.coolDowns.length) {
                    return null
                }
                this.noRecords = false
                return this.coolDowns.length;
            },

            groupTitle() {
                if (this.group === 'crimson') {
                    this.backgroundColor = '#73000A'
                    this.textColor = '#fff'
                    this.getVarsityPrimaryRuns();
                    return 'Crimson'
                } else if (this.group === 'black') {
                    this.backgroundColor = '#000'
                    this.textColor = '#fff'
                    this.getJuniorVarsityPrimaryRuns();
                    return 'Black'
                } else if (this.group === 'white') {
                    this.backgroundColor = '#fff'
                    this.textColor = '#000'
                    this.getOpenPrimaryRuns();
                    return 'White'
                } else {
                    this.backgroundColor = '#008000'
                    this.textColor = '#fff'
                    this.getBeginnerPrimaryRuns();
                    return 'Green'
                }
            }
        },

        methods: {
            getVarsityPrimaryRuns() {
                function getWarmUps() {
                    return axios.get('/api' + location.pathname + '/warm-ups', {
                        params: {
                            varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getSteadyRuns() {
                    return axios.get('/api' + location.pathname + '/steady-runs', {
                        params: {
                            varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getIntervalRuns() {
                    return axios.get('/api' + location.pathname + '/interval-runs', {
                        params: {
                            varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getCoolDowns() {
                    return axios.get('/api' + location.pathname + '/cool-downs', {
                        params: {
                            varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                axios.all([
                    getWarmUps(),
                    getSteadyRuns(),
                    getIntervalRuns(),
                    getCoolDowns(),
                ])
                    .then(axios.spread((
                        warmUpsResponse,
                        steadyRunsResponse,
                        intervalRunsResponse,
                        coolDownsResponse
                    ) => {
                        this.warmUps = warmUpsResponse.data;
                        this.steadyRuns = steadyRunsResponse.data;
                        this.intervalRuns = intervalRunsResponse.data;
                        this.coolDowns = coolDownsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });

            },

            getJuniorVarsityPrimaryRuns() {
                function getWarmUps() {
                    return axios.get('/api' + location.pathname + '/warm-ups', {
                        params: {
                            junior_varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getSteadyRuns() {
                    return axios.get('/api' + location.pathname + '/steady-runs', {
                        params: {
                            junior_varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getIntervalRuns() {
                    return axios.get('/api' + location.pathname + '/interval-runs', {
                        params: {
                            junior_varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getCoolDowns() {
                    return axios.get('/api' + location.pathname + '/cool-downs', {
                        params: {
                            junior_varsity: 'yes',
                            workout: 'primary'
                        }
                    })
                }

                axios.all([
                    getWarmUps(),
                    getSteadyRuns(),
                    getIntervalRuns(),
                    getCoolDowns(),
                ])
                    .then(axios.spread((
                        warmUpsResponse,
                        steadyRunsResponse,
                        intervalRunsResponse,
                        coolDownsResponse
                    ) => {
                        this.warmUps = warmUpsResponse.data;
                        this.steadyRuns = steadyRunsResponse.data;
                        this.intervalRuns = intervalRunsResponse.data;
                        this.coolDowns = coolDownsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });

            },

            getOpenPrimaryRuns() {
                function getWarmUps() {
                    return axios.get('/api' + location.pathname + '/warm-ups', {
                        params: {
                            open: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getSteadyRuns() {
                    return axios.get('/api' + location.pathname + '/steady-runs', {
                        params: {
                            open: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getIntervalRuns() {
                    return axios.get('/api' + location.pathname + '/interval-runs', {
                        params: {
                            open: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getCoolDowns() {
                    return axios.get('/api' + location.pathname + '/cool-downs', {
                        params: {
                            open: 'yes',
                            workout: 'primary'
                        }
                    })
                }

                axios.all([
                    getWarmUps(),
                    getSteadyRuns(),
                    getIntervalRuns(),
                    getCoolDowns(),
                ])
                    .then(axios.spread((
                        warmUpsResponse,
                        steadyRunsResponse,
                        intervalRunsResponse,
                        coolDownsResponse
                    ) => {
                        this.warmUps = warmUpsResponse.data;
                        this.steadyRuns = steadyRunsResponse.data;
                        this.intervalRuns = intervalRunsResponse.data;
                        this.coolDowns = coolDownsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });

            },

            getBeginnerPrimaryRuns() {
                function getWarmUps() {
                    return axios.get('/api' + location.pathname + '/warm-ups', {
                        params: {
                            beginner: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getSteadyRuns() {
                    return axios.get('/api' + location.pathname + '/steady-runs', {
                        params: {
                            beginner: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getIntervalRuns() {
                    return axios.get('/api' + location.pathname + '/interval-runs', {
                        params: {
                            beginner: 'yes',
                            workout: 'primary'
                        }
                    })
                }
                function getCoolDowns() {
                    return axios.get('/api' + location.pathname + '/cool-downs', {
                        params: {
                            beginner: 'yes',
                            workout: 'primary'
                        }
                    })
                }

                axios.all([
                    getWarmUps(),
                    getSteadyRuns(),
                    getIntervalRuns(),
                    getCoolDowns(),
                ])
                    .then(axios.spread((
                        warmUpsResponse,
                        steadyRunsResponse,
                        intervalRunsResponse,
                        coolDownsResponse
                    ) => {
                        this.warmUps = warmUpsResponse.data;
                        this.steadyRuns = steadyRunsResponse.data;
                        this.intervalRuns = intervalRunsResponse.data;
                        this.coolDowns = coolDownsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });

            },
        },
    }
</script>

<style scoped>

</style>
