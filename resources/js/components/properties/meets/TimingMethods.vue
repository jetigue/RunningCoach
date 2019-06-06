<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Timing Methods</header>
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
                    <create-button title="Create Timing Method">
                        <new-timing-method @created="add"></new-timing-method>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(timing, index) in items" :key="timing.id">
                    <timing-method :data="timing" @deleted="remove(index)"></timing-method>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Timing Methods Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import TimingMethod from './TimingMethod';
    import CreateButton from '../../buttons/CreateButton';
    import NewTimingMethod from '../../forms/NewTimingMethod';

    export default Collection.extend({
        props: ['data'],

        components: { TimingMethod, CreateButton, NewTimingMethod },

        data() {
            return {
            }
        },
    });
</script>