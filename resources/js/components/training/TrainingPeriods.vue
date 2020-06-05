<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Training Periods</header>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-11/12">
                    <div class="lg:w-1/3">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="lg:w-1/3">
                        <p class="text-primary font-semibold">Purpose</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Training Intensity">
                        <new-training-period @created="add"></new-training-period>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(period, index) in items" :key="period.id">
                    <training-period :data="period" @deleted="remove(index)"></training-period>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Training Periods Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from './../../Collection';
    import TrainingPeriod from './TrainingPeriod';
    import CreateButton from './../buttons/CreateButton';
    import NewTrainingPeriod from './../forms/NewTrainingPeriod';

    export default Collection.extend({
        props: ['data'],

        components: { TrainingPeriod, CreateButton, NewTrainingPeriod },

        data() {
            return {

            }
        },
    });
</script>
