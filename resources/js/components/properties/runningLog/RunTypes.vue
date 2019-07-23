<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Run Types</header>
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
                    <create-button title="Create New Run Type">
                        <new-run-type @created="add"></new-run-type>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(runType, index) in items" :key="runType.id">
                    <run-type :data="runType" @deleted="remove(index)"></run-type>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Run Types Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import RunType from './RunType';
    import CreateButton from '../../buttons/CreateButton';
    import NewRunType from '../../forms/NewRunType';

    export default Collection.extend({
        props: ['data'],

        components: { RunType, CreateButton, NewRunType },

        data() {
            return {

            }
        }
    });
</script>
