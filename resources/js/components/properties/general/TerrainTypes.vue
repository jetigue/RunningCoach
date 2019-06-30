<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Terrain Types</header>
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
                    <create-button title="Create New Time of Day">
                        <new-terrain-type @created="add"></new-terrain-type>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(terrainType, index) in items" :key="terrainType.id">
                    <terrain-type :data="terrainType" @deleted="remove(index)"></terrain-type>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Terrain Types Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import TerrainType from './TerrainType';
    import CreateButton from '../../buttons/CreateButton';
    import NewTerrainType from '../../forms/NewTerrainType';

    export default Collection.extend({
        props: ['data'],

        components: { TerrainType, CreateButton, NewTerrainType },

        data() {
            return {

            }
        }
    });
</script>
