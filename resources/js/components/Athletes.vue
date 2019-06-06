<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Athletes</header>
            <filter-button class="hidden">
                <status-filter></status-filter>
            </filter-button>
        </div>

        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Add an Athlete">
                            <new-athlete @created="add"></new-athlete>
                        </create-button>
                    </div>
                </div>
            <div v-if="records">
                <div v-for="(athlete, index) in items" :key="athlete.id">
                    <athlete :data="athlete" @deleted="remove(index)"></athlete>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Athletes Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../Collection';
    import Athlete from './Athlete';
    import CreateButton from './buttons/CreateButton';
    import NewAthlete from './forms/NewAthlete';

    export default Collection.extend({
        props: ['data'],

        components: { Athlete, CreateButton, NewAthlete },

        data() {
            return {
            }
        },


    });
</script>