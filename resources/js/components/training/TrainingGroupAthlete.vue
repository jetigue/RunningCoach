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
                    <div v-if="latestVdot !== null">
                        <div>Latest VDOT: &nbsp; {{ latestVdot }}</div>
                        <span>({{ vdotDate | moment("from", "now") }})</span>
                    </div>
                    <div v-else>No Recent Results</div>
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
                latestVdot: this.data.vdot,
                vdotDate: this.data.date
            }
        },

        computed: {

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
        }
    }
</script>

<style scoped>

</style>
