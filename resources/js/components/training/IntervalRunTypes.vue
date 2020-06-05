<template>
    <div class="flex flex-col">
        <div class="flex items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Interval Runs</header>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Interval Type">
                        <new-interval-run-type @created="add"></new-interval-run-type>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(intervalRun, index) in items" :key="intervalRun.id">
                    <interval-run-type :data="intervalRun" @deleted="remove(index)"></interval-run-type>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Interval Runs Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import IntervalRunType from './IntervalRunType';
    import CreateButton from '../buttons/CreateButton';
    import NewIntervalRunType from '../forms/NewIntervalRunType';

    export default Collection.extend({
        props: ['data'],

        components: { IntervalRunType, CreateButton, NewIntervalRunType },

        data() {
            return {

            }
        }
    });
</script>
