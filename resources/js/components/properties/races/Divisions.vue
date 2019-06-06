<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Divisions</header>
            <filter-button class="hidden">

            </filter-button>
        </div>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create New Division">
                            <new-division @created="add"></new-division>
                        </create-button>
                    </div>
                </div>
            <div v-if="records">
                <div v-for="(division, index) in items" :key="division.id">
                    <division :data="division" @deleted="remove(index)"></division>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Divisions Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import Division from './Division';
    import CreateButton from '../../buttons/CreateButton';
    import NewDivision from '../../forms/NewDivision';

    export default Collection.extend({
        props: ['data'],

        components: { Division, CreateButton, NewDivision },

        data() {
            return {
            }
        },

    });
</script>
