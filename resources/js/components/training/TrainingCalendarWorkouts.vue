<template>
    <div class="flex flex-col w-full overflow-hidden text-sm">
        <div class="flex w-full justify-between mb-2">
            <div class="px-1 text-sm">
                <slot></slot>
            </div>
            <div class="px-1">
                <create-button title="Create Training Calendar Workout">
                    <new-training-day-workout @created="add"></new-training-day-workout>
                </create-button>
            </div>
        </div>
        <div v-if="records" class="">
            <div v-for="(workout, index) in items" :key="workout.id">
                <training-day-workout :data="workout" @deleted="remove(index)"></training-day-workout>
            </div>
        </div>
    </div>

</template>

<script>
    import Collection from './../../Collection';
    import TrainingDayWorkout from './TrainingDayWorkout';
    import CreateButton from './../buttons/CreateButton';
    import NewTrainingDayWorkout from './../forms/NewTrainingDayWorkout';

    export default Collection.extend({
        props: ['data'],

        components: { TrainingDayWorkout, CreateButton, NewTrainingDayWorkout },

        data() {
            return {

            }
        },
    });
</script>
