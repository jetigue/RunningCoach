<template>
    <div class="flex flex-col w-full">
        <div class="flex flex-row items-center border-b border-smoke-300">
            <div class="flex w-5/6">
                <p class="text-xl text-smoke-700 font-semibold font-italic md:w-3/4">
                    Primary Workout
                </p>
                <div v-if="isCoach" class="hidden md:flex justify-around md:w-1/4">
                    <div class="p-1 w-10">
                        <div class="flex flex-col border bg-primary rounded-lg text-white">
                            <header class="flex self-center">C</header>
                        </div>
                    </div>
                    <div class="p-1 w-10">
                        <div class="flex flex-col border bg-black rounded-lg text-white">
                            <header class="flex self-center">B</header>
                        </div>
                    </div>
                    <div class="p-1 w-10">
                        <div class="flex flex-col border bg-white rounded-lg text-black">
                            <header class="flex self-center">W</header>
                        </div>
                    </div>
                    <div class="p-1 w-10">
                        <div class="flex flex-col border bg-green-500 rounded-lg text-white">
                            <header class="flex self-center">G</header>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/6 flex justify-end">
                <div class="text-sm font-semibold items-center cursor-pointer p-1 rounded-lg"
                     @click="sync"
                     style="color:blue;"
                     :style="{display: visibility}">
                    <span class="mr-1">Sync</span>
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>

            </div>

        <div class="flex flex-col">
            <primary-warm-up-runs :data="warmUp"></primary-warm-up-runs>
            <primary-steady-runs :data="steady" class="py-2"></primary-steady-runs>
            <primary-interval-runs :data="intervalRun" class="py-2"></primary-interval-runs>
            <primary-cool-down-runs :data="coolDown"></primary-cool-down-runs>
        </div>

        <workout-cards>
            <workout-card group="crimson" workout="primary"></workout-card>
            <workout-card group="black" workout="primary"></workout-card>
            <workout-card group="white" workout="primary"></workout-card>
            <workout-card group="green" workout="primary"></workout-card>
        </workout-cards>
    </div>
</template>

<script>
    import PrimaryCoolDownRuns from "./PrimaryCoolDownRuns";
    import PrimaryIntervalRuns from "./PrimaryIntervalRuns";
    import PrimarySteadyRuns from './PrimarySteadyRuns';
    import PrimaryWarmUpRuns from "./PrimaryWarmUpRuns";
    import WorkoutCard from "./WorkoutCard";
    import WorkoutCards from "./WorkoutCards";
    import {authMixin} from '../../mixins/authMixin';

    export default {
        name: "PrimaryWorkout",
        mixins: [authMixin],
        components: {
            PrimaryCoolDownRuns,
            PrimaryIntervalRuns,
            PrimarySteadyRuns,
            PrimaryWarmUpRuns,
            WorkoutCard,
            WorkoutCards,
        },
        props: [
            'coolDown',
            'data',
            'intervalRun',
            'steady',
            'warmUp'
        ],

        data() {
            return {
                visibility: 'none',
                color: '',
            }
        },

        methods: {
            highlightSync() {
                this.visibility = 'flex'
                this.color = 'blue'
            },

            sync() {
                location.reload()
            }
        },

        created() {
            Event.$on('toggleSync', () => this.highlightSync());
        }
    }
</script>

<style scoped>

</style>
