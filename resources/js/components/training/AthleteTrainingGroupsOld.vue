<template>
    <div>
        <div class="flex flex-wrap">
            <div class="flex flex-col w-full md:w-1/2 lg:w-1/4 px-2">
                <header class="text-3xl font-thin text-primary text-center">Crimson</header>
                <div v-if="crimsonGroupRecords" class="text-white bg-primary p-4 rounded-md">
                    <ul v-for="(athlete, index) in crimsonGroup" :key="athlete.id" class="flex flex-col">
                        <training-group-athlete
                            :data="athlete"
                            @athleteUpdated="getAthletes"
                        ></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-white bg-primary px-4 py-5 rounded-md">None</div>
            </div>
            <div class="flex flex-col w-full md:w-1/2 lg:w-1/4 px-2">
                <header class="text-3xl font-thin text-black text-center">Black</header>
                <div v-if="blackGroupRecords" class="text-white bg-black p-4 rounded-md">
                    <ul v-for="(athlete, index) in blackGroup" :key="athlete.id" class="flex flex-col">
                        <training-group-athlete
                            :data="athlete"
                            @athleteUpdated="getAthletes"
                        >
                        </training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-white bg-black px-4 py-5 rounded-md">None</div>
            </div>
            <div class="flex flex-col w-full md:w-1/2 lg:w-1/4 px-2">
                <header class="text-3xl font-thin text-black text-center">White</header>
                <div v-if="whiteGroupRecords" class="text-black bg-white p-4 rounded-md border border-black">
                    <ul v-for="(athlete, index) in whiteGroup" :key="athlete.id" class="flex flex-col">
                        <training-group-athlete
                            :data="athlete"
                            @athleteUpdated="getAthletes"
                        ></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-black bg-white px-4 py-5 rounded-md">None</div>
            </div>
            <div class="flex flex-col w-full md:w-1/2 lg:w-1/4 px-2">
                <header class="text-3xl font-thin text-green-500 text-center">Green</header>
                <div v-if="greenGroupRecords" class="text-white bg-green-500 p-4 rounded-md">
                    <ul v-for="(athlete, index) in greenGroup" :key="athlete.id" class="flex flex-col">
                        <training-group-athlete
                            :data="athlete"
                            @athleteUpdated="getAthletes"
                        ></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-white bg-green-500 px-4 py-5 rounded-md">None</div>
            </div>
        </div>
        <div v-if="noneGroupRecords" class="flex flex-col px-2 py-4 w-full md:w-1/2 lg:w-1/ ">
            <header class="text-xl font-thin text-black border-b">Not Assigned</header>
            <div class="">
                <ul v-for="(athlete, index) in noneGroup" :key="athlete.id" class="flex flex-col">
                    <training-group-athlete
                        :data="athlete"
                        @athleteUpdated="getAthletes"
                    ></training-group-athlete>
                </ul>
            </div>
        </div>
    </div>

</template>

<script>
    import TrainingGroupAthlete from "./TrainingGroupAthlete";
    export default {
        name: "AthleteTrainingGroups",
        components: {TrainingGroupAthlete},
        data() {
            return {
                crimsonGroup: [],
                blackGroup: [],
                whiteGroup: [],
                greenGroup: [],
                noneGroup: [],

                crimsonGroupCount: '',
                blackGroupCount: '',
                whiteGroupCount: '',
                greenGroupCount: '',
                noneGroupCount: ''
            }
        },

        computed: {
            averageVdot: function() {
                let sum=0;
                this.crimsonGroup.forEach(function(athlete){
                sum += athlete.vdot;
                });
                return sum;
            },

            crimsonGroupRecords: {
                get: function () {
                    return this.crimsonGroupCount
                },
                set: function () {
                    if (this.crimsonGroupCount !== 0) {
                        return this.crimsonGroupRecords = true;
                    }
                    return this.crimsonGroupRecords = false;
                }
            },

            blackGroupRecords: {
                get: function () {
                    return this.blackGroupCount
                },
                set: function () {
                    if (this.blackGroupCount !== 0) {
                        return this.blackGroupRecords = true;
                    }
                    return this.blackGroupRecords = false;
                }
            },

            whiteGroupRecords: {
                get: function () {
                    return this.whiteGroupCount
                },
                set: function () {
                    if (this.whiteGroupCount !== 0) {
                        return this.whiteGroupRecords = true;
                    }
                    return this.whiteGroupRecords = false;
                }
            },

            greenGroupRecords: {
                get: function () {
                    return this.greenGroupCount
                },
                set: function () {
                    if (this.greenGroupCount !== 0) {
                        return this.greenGroupRecords = true;
                    }
                    return this.greenGroupRecords = false;
                }
            },

            noneGroupRecords: {
                get: function () {
                    return this.noneGroupCount
                },
                set: function () {
                    if (this.noneGroupCount !== 0) {
                        return this.noneGroupRecords = true;
                    }
                    return this.noneGroupRecords = false;
                }
            },
        },

        mounted() {
            this.getAthletes();
        },

        methods: {
            refreshAthletes() {
                function getCrimsonGroup() {
                    return axios.get('/api/training-groups/athletes?group=Crimson')
                }

                function getBlackGroup() {
                    return axios.get('/api/training-groups/athletes?group=Black')
                }

                function getWhiteGroup() {
                    return axios.get('/api/training-groups/athletes?group=White')
                }

                function getGreenGroup() {
                    return axios.get('/api/training-groups/athletes?group=Green')
                }

                function getNoneGroup() {
                    return axios.get('/api/training-groups/athletes?group=None')
                }

                axios.all([
                    getCrimsonGroup(),
                    getBlackGroup(),
                    getWhiteGroup(),
                    getGreenGroup(),
                    getNoneGroup()
                ])
                    .then(axios.spread((
                        CrimsonResponse,
                        BlackResponse,
                        WhiteResponse,
                        GreenResponse,
                        NoneResponse
                    ) => {
                        this.crimsonGroup = CrimsonResponse.data;
                        this.crimsonGroupCount = CrimsonResponse.data.length
                        this.blackGroup = BlackResponse.data;
                        this.blackGroupCount = BlackResponse.data.length
                        this.whiteGroup = WhiteResponse.data;
                        this.whiteGroupCount = WhiteResponse.data.length
                        this.greenGroup = GreenResponse.data;
                        this.greenGroupCount = GreenResponse.data.length
                        this.noneGroup = NoneResponse.data;
                        this.noneGroupCount = NoneResponse.data.length
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        }
    }
</script>

<style scoped>

</style>
