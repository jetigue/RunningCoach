<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Divisions</header>
            <filter-button class="hidden">

            </filter-button>
        </div>
        <div class="table-container">
                <div class="table-header">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="flex content-around">
                    <create-button title="Create Meet Host">
                        <new-division @created="add"></new-division>
                    </create-button>
                </div>
            </div>
            <div v-for="(division, index) in items" :key="division.id">
                <division :data="division" @deleted="remove(index)"></division>
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