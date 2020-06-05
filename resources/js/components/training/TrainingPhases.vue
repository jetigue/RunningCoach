<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Training Phases</header>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-11/12">
                    <div class="lg:w-1/3">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="lg:w-1/3">
                        <p class="text-primary font-semibold">Description</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Training Phase">
                        <new-training-phase @created="add"></new-training-phase>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(phase, index) in items" :key="phase.id">
                    <training-phase :data="phase" @deleted="remove(index)"></training-phase>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Training Phases Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from './../../Collection';
    import TrainingPhase from './TrainingPhase';
    import CreateButton from './../buttons/CreateButton';
    import NewTrainingPhase from './../forms/NewTrainingPhase';

    export default Collection.extend({
        props: ['data'],

        components: { TrainingPhase, CreateButton, NewTrainingPhase },

        data() {
            return {

            }
        },
    });
</script>
