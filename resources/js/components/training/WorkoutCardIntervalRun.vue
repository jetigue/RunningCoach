<template>
    <div class="flex flex-col text-sm">
        <p>{{ runType }}</p>
        <p class="px-2">{{ numberSets }} set of</p>
        <p class="px-2">{{ numberIntervals }} x</p>
        <p class="px-2">
            <span class="">{{ length }}</span>
            at
            <span class="">{{ intensity }}</span> pace
        </p>
        <p class="px-4">with a</p>
        <p class="px-2">
            <span class="">{{ recoveryLength }}</span>
            <span class="">{{ recoveryType }}</span> pace recovery
        </p>
        <p class="p-2 italic">{{ notes }}</p>

    </div>

</template>

<script>
    import {workoutMixin} from "../../mixins/workoutMixin";

    export default {
        name: "WorkoutCardIntervalRun",
        mixins: [workoutMixin],
        props: ['data'],

        data() {
            return {
                beginner: this.data.beginner,
                duration: this.data.duration,
                durationUnit: this.data.duration_unit,
                intensity: this.data.intensity.name,
                intervalId: this.data.interval_run_type_id,
                junior_varsity: this.data.junior_varsity,
                numberIntervals: this.data.number_repetitions,
                numberSets: this.data.number_sets,
                open: this.data.open,
                recovery: this.data.recovery,
                recoveryType: this.data.recovery_type,
                recoveryUnit: this.data.recovery_unit,
                runType: this.data.run_type.name,
                varsity: this.data.varsity,
                workout: this.data.workout,
                notes: this.data.notes
            }
        },
    }
</script>

<style scoped>

</style>
