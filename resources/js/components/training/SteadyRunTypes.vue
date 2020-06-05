<template>
    <div class="flex flex-col">
        <div class="flex items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Steady Run Types</header>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Steady Run">
                        <new-steady-run-type @created="add"></new-steady-run-type>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(steadyRun, index) in items" :key="steadyRun.id">
                    <steady-run-type :data="steadyRun" @deleted="remove(index)"></steady-run-type>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Steady Runs Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import SteadyRunType from './SteadyRunType';
    import CreateButton from '../buttons/CreateButton';
    import NewSteadyRunType from '../forms/NewSteadyRunType';

    export default Collection.extend({
        props: ['data'],

        components: { SteadyRunType, CreateButton, NewSteadyRunType },

        data() {
            return {

            }
        }
    });
</script>
