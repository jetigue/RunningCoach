<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Run Feelings</header>
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
                    <create-button title="Create New Run Feeling">
                        <new-run-feeling @created="add"></new-run-feeling>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(runFeeling, index) in items" :key="runFeeling.id">
                    <run-feeling :data="runFeeling" @deleted="remove(index)"></run-feeling>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Run Feelings Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import RunFeeling from './RunFeeling';
    import CreateButton from '../../buttons/CreateButton';
    import NewRunFeeling from '../../forms/NewRunFeeling';

    export default Collection.extend({
        props: ['data'],

        components: { RunFeeling, CreateButton, NewRunFeeling },

        data() {
            return {

            }
        }
    });
</script>
