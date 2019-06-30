<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Run Efforts</header>
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
                    <create-button title="Create New Run Effort">
                        <new-run-effort @created="add"></new-run-effort>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(runEffort, index) in items" :key="runEffort.id">
                    <run-effort :data="runEffort" @deleted="remove(index)"></run-effort>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Run Efforts Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import RunEffort from './RunEffort';
    import CreateButton from '../../buttons/CreateButton';
    import NewRunEffort from '../../forms/NewRunEffort';

    export default Collection.extend({
        props: ['data'],

        components: { RunEffort, CreateButton, NewRunEffort },

        data() {
            return {

            }
        }
    });
</script>
