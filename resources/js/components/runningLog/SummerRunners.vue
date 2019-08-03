<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary"></header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full pl-1">
                    <div class="hidden lg:flex lg:w-1/3">

                    </div>
                    <div class="w-1/3 lg:w-1/5 text-center">
                        <p class="text-primary font-semibold">Total</p>
                    </div>
                    <div class="w-1/3 lg:w-1/5 text-center">
                        <p class="text-primary font-semibold">Avg Distance</p>
                    </div>
                    <div class="w-1/3 lg:w-1/5 text-center">
                        <p class="text-primary font-semibold">Avg Pace</p>
                    </div>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(summerRunner, index) in items" :key="summerRunner.id">
                    <summer-runner :data="summerRunner" @deleted="remove(index)"></summer-runner>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Logs Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import SummerRunner from './SummerRunner';

    export default Collection.extend({
        props: ['data'],

        components: { SummerRunner },

        data() {
            return {
                dataSet: false,
            }
        }

    });
</script>
