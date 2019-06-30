<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Day Times</header>
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
                        <new-day-time @created="add"></new-day-time>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(dayTime, index) in items" :key="dayTime.id">
                    <day-time :data="dayTime" @deleted="remove(index)"></day-time>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Day Times Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import DayTime from './DayTime';
    import CreateButton from '../../buttons/CreateButton';
    import NewDayTime from '../../forms/NewDayTime';

    export default Collection.extend({
        props: ['data'],

        components: { DayTime, CreateButton, NewDayTime },

        data() {
            return {

            }
        }
    });
</script>
