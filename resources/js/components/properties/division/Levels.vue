<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Levels</header>
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
                        <new-level @created="add"></new-level>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(level, index) in items" :key="level.id">
                    <level :data="level" @deleted="remove(index)"></level>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Levels Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import Level from './Level';
    import CreateButton from '../../buttons/CreateButton';
    import NewLevel from '../../forms/NewLevel';

    export default Collection.extend({
        props: ['data'],

        components: { Level, CreateButton, NewLevel },

        data() {
            return {

            }
        },

    });
</script>