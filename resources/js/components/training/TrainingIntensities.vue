<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Training Intensities</header>
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

                    <div class="hidden lg:flex lg:w-1/6 justify-center">
                        <p class="text-primary font-semibold">% VO2 Max</p>
                    </div>

                    <div class="hidden lg:flex lg:w-1/6 justify-center">
                        <p class="text-primary font-semibold">% HR Max</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Training Intensity">
                        <new-training-intensity @created="add"></new-training-intensity>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(intensity, index) in items" :key="intensity.id">
                    <training-intensity :data="intensity" @deleted="remove(index)"></training-intensity>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Training Intensities Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from './../../Collection';
    import TrainingIntensity from './TrainingIntensity';
    import CreateButton from './../buttons/CreateButton';
    import NewTrainingIntensity from './../forms/NewTrainingIntensity';

    export default Collection.extend({
        props: ['data'],

        components: { TrainingIntensity, CreateButton, NewTrainingIntensity },

        data() {
            return {

            }
        },
    });
</script>
