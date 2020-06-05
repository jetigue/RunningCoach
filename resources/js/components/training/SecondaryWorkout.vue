<template>
    <div class="flex flex-col w-full">
        <div class="flex flex-row w-full justify-between items-center border-b border-smoke-300">
            <p class="text-xl text-smoke-700 font-semibold font-italic">Secondary Workout</p>
            <div v-if="isCoach" class="flex justify-end md:w-1/2">
                <div class="flex flex-row justify-between w-full">
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <secondary-warm-up-runs :data="warmUp"></secondary-warm-up-runs>
            <secondary-steady-runs :data="steady"></secondary-steady-runs>
            <secondary-cool-down-runs :data="coolDown"></secondary-cool-down-runs>
        </div>
    </div>
</template>

<script>
    import {authMixin} from '../../mixins/authMixin';
    import SecondarySteadyRuns from './SecondarySteadyRuns';
    import SecondaryWarmUpRuns from "./SecondaryWarmUpRuns";
    import SecondaryCoolDownRuns from "./SecondaryCoolDownRuns";

    export default {
        name: "SecondaryWorkout",
        mixins: [authMixin],
        components: { SecondarySteadyRuns, SecondaryWarmUpRuns, SecondaryCoolDownRuns },
        props: ['data', 'steady', 'warmUp', 'coolDown'],

        data() {
            return {
            }
        },

        methods: {
        }
    }
</script>

<style scoped>

</style>
