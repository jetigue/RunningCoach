<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Seasons</header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Season">
                        <new-season @created="add"></new-season>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(season, index) in items" :key="season.id">
                    <season :data="season" @deleted="remove(index)"></season>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Seasons Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import Season from './Season';
    import CreateButton from '../../buttons/CreateButton';
    import NewSeason from '../../forms/NewSeason';

    export default Collection.extend({
        props: ['data'],

        components: { Season, CreateButton, NewSeason },

        data() {
            return {

            }
        }
    });
</script>
