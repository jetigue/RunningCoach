<template>
    <div class="flex w-full flex-wrap py-6">
        <athlete-training-group
            class="w-full md:w-1/2 py-2 content-center px-3"
            :group="crimsonGroup"
        >
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Boys</p>
                <div v-if="crimsonMalesCount > 0">
                    <ul v-for="(athlete, index) in crimsonMales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Males in this Group</div>
            </div>
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Girls</p>
                <div v-if="crimsonFemalesCount > 0">

                    <ul v-for="(athlete, index) in crimsonFemales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Females in this Group</div>
            </div>
        </athlete-training-group>
        <athlete-training-group
            class="w-full md:w-1/2 py-2 content-center px-3"
            :group="blackGroup"
        >
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Boys</p>
                <div v-if="blackMalesCount > 0">
                    <ul v-for="(athlete, index) in blackMales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Males in this Group</div>
            </div>
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Girls</p>
                <div v-if="blackFemalesCount > 0">

                    <ul v-for="(athlete, index) in blackFemales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Females in this Group</div>
            </div>
        </athlete-training-group>
        <athlete-training-group
            class="w-full md:w-1/2 py-2 content-center px-3"
            :group="whiteGroup"
        >
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Boys</p>
                <div v-if="whiteMalesCount > 0">
                    <ul v-for="(athlete, index) in whiteMales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Males in this Group</div>
            </div>
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Girls</p>
                <div v-if="whiteFemalesCount > 0">

                    <ul v-for="(athlete, index) in whiteFemales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Females in this Group</div>
            </div>
        </athlete-training-group>
        <athlete-training-group
            class="w-full md:w-1/2 py-2 content-center px-3"
            :group="greenGroup"
        >
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Boys</p>
                <div v-if="greenMalesCount > 0">
                    <ul v-for="(athlete, index) in greenMales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Males in this Group</div>
            </div>
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Girls</p>
                <div v-if="greenFemalesCount > 0">

                    <ul v-for="(athlete, index) in greenFemales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
                <div v-else class="text-center mt-1">No Females in this Group</div>
            </div>
        </athlete-training-group>
        <div v-if="(noneMalesCount > 0 || noneFemalesCount > 0)"
             class="w-full md:w-1/2 py-2 content-center px-3">
            <athlete-training-group
                :group="noneGroup"
            >
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Boys</p>
                <div v-if="noneMalesCount > 0">
                    <ul v-for="(athlete, index) in noneMales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-semibold border-b">Girls</p>
                <div v-if="noneFemalesCount > 0">

                    <ul v-for="(athlete, index) in noneFemales"
                        :key="athlete.id"
                        class="flex flex-col"
                    >
                        <training-group-athlete :data="athlete"></training-group-athlete>
                    </ul>
                </div>
            </div>
            </athlete-training-group>
        </div>
    </div>

</template>

<script>
    import AthleteTrainingGroup from "./AthleteTrainingGroup";
    import TrainingGroupAthlete from "./TrainingGroupAthlete";
    export default {
        name: "AthleteTrainingGroups",
        components: {TrainingGroupAthlete, AthleteTrainingGroup },
        props: {
            crimsonGroup: Object,
            blackGroup: Object,
            whiteGroup: Object,
            greenGroup: Object,
            noneGroup: Object,
            crimsonGroupMaleAthletes: [Array, Object],
            blackGroupMaleAthletes: [Array, Object],
            whiteGroupMaleAthletes: [Array, Object],
            greenGroupMaleAthletes: [Array, Object],
            noneGroupMaleAthletes: [Array, Object],
            crimsonGroupFemaleAthletes: [Array, Object],
            blackGroupFemaleAthletes: [Array, Object],
            whiteGroupFemaleAthletes: [Array, Object],
            greenGroupFemaleAthletes: [Array, Object],
            noneGroupFemaleAthletes: [Array, Object],
        },

        data() {
            return {
                crimsonMales: this.crimsonGroupMaleAthletes,
                blackMales: this.blackGroupMaleAthletes,
                whiteMales: this.whiteGroupMaleAthletes,
                greenMales: this.greenGroupMaleAthletes,
                noneMales: this.noneGroupMaleAthletes,

                crimsonFemales: this.crimsonGroupFemaleAthletes,
                blackFemales: this.blackGroupFemaleAthletes,
                whiteFemales: this.whiteGroupFemaleAthletes,
                greenFemales: this.greenGroupFemaleAthletes,
                noneFemales: this.noneGroupFemaleAthletes,
            }
        },

        computed: {
            crimsonMalesCount: {
                get: function () {
                    return this.crimsonMales.length
                },
                set: function () {
                    if (this.crimsonMales.length  !== 0) {
                        return this.crimsonMales.length
                    }
                    return 0
                }
            },

            crimsonFemalesCount: {
                get: function () {
                    return this.crimsonFemales.length
                },
                set: function () {
                    if (this.crimsonFemales.length  !== 0) {
                        return this.crimsonFemales.length
                    }
                    return 0
                }
            },

            blackMalesCount: {
                get: function () {
                    return this.blackMales.length
                },
                set: function () {
                    if (this.blackMales.length  !== 0) {
                        return this.blackMales.length
                    }
                    return 0
                }

            },

            blackFemalesCount: {
                get: function () {
                    return this.blackFemales.length
                },
                set: function () {
                    if (this.blackFemales.length  !== 0) {
                        return this.blackFemales.length
                    }
                    return 0
                }
            },

            whiteMalesCount: {
                get: function () {
                    return this.whiteMales.length
                },
                set: function () {
                    if (this.whiteMales.length  !== 0) {
                        return this.whiteMales.length
                    }
                    return 0
                }

            },

            whiteFemalesCount: {
                get: function () {
                    return this.whiteFemales.length
                },
                set: function () {
                    if (this.whiteFemales.length  !== 0) {
                        return this.whiteFemales.length
                    }
                    return 0
                }
            },

            greenMalesCount: {
                get: function () {
                    return this.greenMales.length
                },
                set: function () {
                    if (this.greenMales.length  !== 0) {
                        return this.greenMales.length
                    }
                    return 0
                }

            },

            greenFemalesCount: {
                get: function () {
                    return this.greenFemales.length
                },
                set: function () {
                    if (this.greenFemales.length  !== 0) {
                        return this.greenFemales.length
                    }
                    return 0
                }
            },

            noneMalesCount: {
                get: function () {
                    return this.noneMales.length
                },
                set: function () {
                    if (this.noneMales.length  !== 0) {
                        return this.noneMales.length
                    }
                    return 0
                }

            },

            noneFemalesCount: {
                get: function () {
                    return this.noneFemales.length
                },
                set: function () {
                    if (this.noneFemales.length  !== 0) {
                        return this.noneFemales.length
                    }
                    return 0
                }
            }
        },

        created() {
            Event.$on('athleteUpdated', () => this.refreshPage());
        },

        methods: {
            refreshPage() {
                this.$forceUpdate();
            }
            // refreshAthletes() {
            //     function getCrimsonMales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Crimson', sex: 'm'}
            //         })
            //     }
            //
            //     function getCrimsonFemales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Crimson', sex: 'f'}
            //         })
            //     }
            //
            //     function getBlackMales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Black', sex: 'm'}
            //         })
            //     }
            //
            //     function getBlackFemales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Black', sex: 'f'}
            //         })
            //     }
            //
            //     function getWhiteMales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'White', sex: 'm'}
            //         })
            //     }
            //
            //     function getWhiteFemales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'White', sex: 'f'}
            //         })
            //     }
            //
            //     function getGreenMales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Green', sex: 'm'}
            //         })
            //     }
            //
            //     function getGreenFemales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'Green', sex: 'f'}
            //         })
            //     }
            //
            //     function getNoneMales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'None', sex: 'm'}
            //         })
            //     }
            //
            //     function getNoneFemales() {
            //         return axios.get('/api/training-groups/rosters', {
            //             params: { group: 'None', sex: 'f'}
            //         })
            //     }
            //
            //     axios.all([
            //         getCrimsonMales(),
            //         getCrimsonFemales(),
            //         getBlackMales(),
            //         getBlackFemales(),
            //         getWhiteMales(),
            //         getWhiteFemales(),
            //         getGreenMales(),
            //         getGreenFemales(),
            //         getNoneMales(),
            //         getNoneFemales()
            //     ])
            //         .then(axios.spread((
            //             CrimsonMalesResponse,
            //             CrimsonFemalesResponse,
            //             BlackMalesResponse,
            //             BlackFemalesResponse,
            //             WhiteMalesResponse,
            //             WhiteFemalesResponse,
            //             GreenMalesResponse,
            //             GreenFemalesResponse,
            //             NoneMalesResponse,
            //             NoneFemalesResponse
            //         ) => {
            //             this.crimsonMales = CrimsonMalesResponse.data;
            //             this.crimsonMalesCount = CrimsonMalesResponse.data.length
            //             this.crimsonFemales = CrimsonFemalesResponse.data;
            //             this.crimsonFemalesCount = CrimsonFemalesResponse.data.length
            //             this.blackMales = BlackMalesResponse.data;
            //             this.blackMalesCount = BlackMalesResponse.data.length
            //             this.blackFemales = BlackFemalesResponse.data;
            //             this.blackFemalesCount = BlackFemalesResponse.data.length
            //             this.whiteMales = WhiteMalesResponse.data;
            //             this.whiteMalesCount = WhiteMalesResponse.data.length
            //             this.whiteFemales = WhiteFemalesResponse.data;
            //             this.whiteFemalesCount = WhiteFemalesResponse.data.length
            //             this.greenMales = GreenMalesResponse.data;
            //             this.greenMalesCount = GreenMalesResponse.data.length
            //             this.greenFemales = GreenFemalesResponse.data;
            //             this.greenFemalesCount = GreenFemalesResponse.data.length
            //             this.noneMales = NoneMalesResponse.data;
            //             this.noneMalesCount = NoneMalesResponse.data.length
            //             this.noneFemales = NoneFemalesResponse.data;
            //             this.noneFemalesCount = NoneFemalesResponse.data.length
            //         }))
            //         .catch(errors => {
            //             console.log(errors)
            //         });
            // }
        }
    }
</script>

<style scoped>

</style>
