<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Training Groups</header>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-11/12">
                    <div class="w-full md:w-2/5">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                    <div class="hidden md:flex md:w-2/5 justify-center">
                        <p class="text-primary font-semibold">Hex Code</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create a Training Group">
                        <new-training-group @created="add"></new-training-group>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(group, index) in items" :key="group.id">
                    <training-group :data="group" @deleted="remove(index)"></training-group>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Training Levels Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from './../../Collection';
    import TrainingGroup from './TrainingGroup';
    import CreateButton from './../buttons/CreateButton';
    import NewTrainingGroup from '../forms/NewTrainingGroup';

    export default Collection.extend({
        props: ['data'],

        components: { TrainingGroup, CreateButton, NewTrainingGroup },

        data() {
            return {

            }
        },
    });
</script>
