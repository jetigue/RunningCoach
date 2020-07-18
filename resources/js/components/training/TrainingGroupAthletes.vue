<template>
    <div class="flex flex-col">
            <div class="flex justify-center">
                <header class="font-light text-2xl text-primary"><slot></slot></header>
            </div>
        <div class="border rounded p-4">
            <div v-if="records">
                <ul v-for="(athlete, index) in items" :key="athlete.id">
                    <training-group-athlete :data="athlete"></training-group-athlete>
                </ul>
            </div>

            <div v-else class="">
                <p class="text-gray-700 p-4">No Athletes In This Group</p>
            </div>
        </div>

        </div>
</template>

<script>
    import Collection from '../../Collection';
    import TrainingGroupAthlete from "./TrainingGroupAthlete";
    export default Collection.extend({
        name: "TrainingGroupAthletes",
        components: {TrainingGroupAthlete},
        props: ['data'],

        data() {
            return {
            }
        }
    });
</script>

<style scoped>

</style>
