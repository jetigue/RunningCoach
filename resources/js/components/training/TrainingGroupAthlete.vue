<template>
    <div>
        <div class="w-full flex py-1 cursor-pointer hover:font-bold justify-between items-center"
             @click="athleteSelected"
             @mouseover="showVDOT = true"
             @mouseleave="hideVDOT"
        >
            <div>
                {{ name }}
            </div>
            <div v-show="showVDOT" class="flex">
                <athlete-vdot-tooltip>
                    <div v-if="vdotRecords">
                        <div>Latest XC VDOT: &nbsp; {{ latestVdot }}</div>
                        <span>({{ latestVdotDate | moment("from", "now") }})</span>
                    </div>
                    <div v-else>No Results</div>

                </athlete-vdot-tooltip>
            </div>
        </div>
        <div v-show="active" class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">
            <div class="relative bg-white w-full md:w-1/2 lg:w-1/3 max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                <header class="border-b-2 border-primary flex justify-between items-center">
                    <div>
                        <p class="font-thin text-2xl text-black">
                            {{ name }}
                        </p>
                    </div>
                    <button type="button" aria-label="close" @click="close">
                        <i class="fas fa-times text-xl text-gray-700"></i>
                    </button>
                </header>
                <section class="my-3 p-4 bg-gray-200 rounded-lg">
                    <training-group-form :data="data" @updated="updateAthlete"></training-group-form>
                </section>
                <footer class="border-t-2 border-primary flex justify-end">
                    <button type="button" class="py-2 text-gray-800 text-sm" @click="close">
                        Cancel
                    </button>
                </footer>
            </div>
        </div>
    </div>

</template>

<script>
    import TrainingGroupForm from "../forms/TrainingGroupForm";
    import AthleteVdotTooltip from "../toolTips/AthleteVdotTooltip";
    export default {
        name: "TrainingGroupAthlete",
        components: {AthleteVdotTooltip, TrainingGroupForm},
        props: ['data'],

        data() {
            return {
                active: false,
                showVDOT: false,
                vdotValues: [],
                vdotRecordsCount: '',

                id: this.data.id,
                name: this.data.last_name + ", " + this.data.first_name,
                training_group_id: this.data.training_group_id,
            }
        },

        computed: {
            sortedVdotValues() {
                let x = this.vdotValues

                return x.sort((a, b) =>
                    (a.date < b.date) ? 1 : (a.date === b.date) ? ((a.vdot > b.vdot) ? 1 : -1) : -1 );
            },

            vdotRecords: {
                get: function () {
                    return this.vdotRecordsCount
                },
                set: function () {
                    if (this.vdotRecordsCount !== 0) {
                        return this.vdotRecords = true;
                    }
                    return this.vdotRecords = false;
                }
            },

            latestVdot() {
                return this.sortedVdotValues[0].vdot;
            },

            latestVdotDate() {
                return this.sortedVdotValues[0].date;
            },

            // currentSeason() {
            //     let today = this.$moment();
            //     let year = this.$moment().year();
            //     let beginSummer = this.$moment('6/1/' + year, "MM-DD-YYYY");
            //     let endSummer = this.$moment('7/31/' + year, "MM-DD-YYYY");
            //     let beginXC = this.$moment('8/1/' + year, "MM-DD-YYYY");
            //     let endXC = this.$moment('11/30/' + year, "MM-DD-YYYY");
            //     let beginWinter = this.$moment('12/1/' + year, "MM-DD-YYYY");
            //     let endWinter = this.$moment('1/30/' + year, "MM-DD-YYYY");
            //     let beginTrack = this.$moment('2/1/' + year, "MM-DD-YYYY");
            //     let endTrack = this.$moment('5/30/' + year, "MM-DD-YYYY");
            //
            //     if (today >= beginSummer && today <= endSummer) {
            //         return 'Summer'
            //     } else if (today >= beginXC && today <= endXC) {
            //         return 'Cross Country';
            //     } else if (today >= beginWinter && today <= endWinter) {
            //         return 'Winter';
            //     } else {
            //         return 'Track'
            //     }
            // }
        },

        created() {
            return this.getVDOTValues();
        },

        methods: {
            athleteSelected() {
                this.active = true
            },

            close() {
                this.active = false
            },

            updateAthlete() {
                this.active = false
            },

            hideVDOT() {
                this.showVDOT = false
            },

            getVDOTValues() {
                let athlete = this.id;

                axios.get('/api/athlete-vdot/latest', {
                    params: {athlete: athlete}
                })
                    .then(response => {
                        this.vdotValues = response.data
                        this.vdotRecordsCount = response.data.length
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
        }
    }
</script>

<style scoped>

</style>
