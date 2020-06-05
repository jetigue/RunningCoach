<template>
    <a :href="url" class="hover:no-underline hover:font-bold">
    <div class="flex flex-col h-12 md:h-24 lg:h-36 bg-gray-100 border hover:bg-gray-300"
         :class="{'border-black': today}">
        <div class="px-1 text-xs">
            {{ trainingDate | moment("D") }}
        </div>
        <div class="flex flex-col h-28 justify-around items-center text-sm font-semibold">
            <div v-for="(workout, index) in workouts" :key="workout.id">
                <training-calendar-workout :data="workout"></training-calendar-workout>
            </div>
        </div>
    </div>
    </a>
</template>

<script>
    import TrainingCalendarWorkout from './TrainingCalendarWorkout';

    export default {
        name: "TrainingDay",
        components: { TrainingCalendarWorkout },

        props: ['data'],

        data() {
            return {
                workouts: this.data.workouts,
                trainingDate: this.data.calendar_date,
                url: '/training-calendar/' + this.data.calendar_date,
            }
        },

        computed: {
            today: function () {
                let d = this.$moment().format('YYYY-MM-DD');
                let x = this.trainingDate;
                let y = this.$moment(x).format('YYYY-MM-DD');

                return d === y;
            },
        }
    }
</script>

<style scoped>

</style>
