<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Race Titles</header>
        </div>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create New Track Event">
                            <new-race-title @created="add"></new-race-title>
                        </create-button>
                    </div>
                </div>
            <div v-if="records">
                <div v-for="(title, index) in items" :key="title.id">
                    <race-title :data="title" @deleted="remove(index)"></race-title>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Events Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import RaceTitle from './RaceTitle';
    import CreateButton from '../../buttons/CreateButton';
    import NewRaceTitle from '../../forms/NewRaceTitle';

    export default Collection.extend({
        props: ['data'],

        components: { RaceTitle, CreateButton, NewRaceTitle },

        data() {
            return {
            }
        },

    });
</script>
