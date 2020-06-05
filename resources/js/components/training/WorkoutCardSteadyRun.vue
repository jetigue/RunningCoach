<template>
    <div class="flex flex-col text-sm">
        <div v-if="mainWorkout" class="flex flex-col  py-2">
            <p>{{ runType }}</p>
            <p class="px-4">
                <span class="">{{ length }}</span>
                at
                <span class="">{{ intensity }}</span> pace
            </p>
        </div>
        <div v-else>
            <p class="px-4">
                <span class="">{{ length }}</span>
                at
                <span class="">{{ intensity }}</span> pace
            </p>
        </div>
    </div>

</template>

<script>
    import {workoutMixin} from "../../mixins/workoutMixin";

    export default {
        name: "WorkoutCardSteadyRun",
        mixins: [workoutMixin],
        props: ['data'],

        data() {
            return {
                runType: this.data.run_type.name,
                intensity: this.data.intensity.name,
                durationUnit: this.data.duration_unit,
                steadyId: this.data.steady_run_type_id,
                duration: this.data.duration,
                workout: this.data.workout,
                varsity: this.data.varsity,
                junior_varsity: this.data.junior_varsity,
                open: this.data.open,
                beginner: this.data.beginner,
            }
        },

        computed: {
            mainWorkout() {
                return !(this.steadyId === 1 || this.steadyId === 4);
            }
        }
    }
</script>

<style scoped>

</style>
