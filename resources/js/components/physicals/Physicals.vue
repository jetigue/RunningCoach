<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Physicals</header>
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
                    <create-button title="Add a Physical">
                        <new-physical @created="add"></new-physical>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(physical, index) in items" :key="physical.id">
                    <physical :data="physical" @deleted="remove(index)"></physical>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Physicals Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import Physical from './Physical';
    import CreateButton from '../buttons/CreateButton';
    import NewPhysical from '../forms/NewPhysical';

    export default Collection.extend({
        props: ['data'],

        components: { Physical, CreateButton, NewPhysical },

        data() {
            return {}
        },

        methods: {}
    });
</script>
