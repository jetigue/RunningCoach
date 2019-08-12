<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Race Events</header>
        </div>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create New Track Event">
                            <new-race-event @created="add"></new-race-event>
                        </create-button>
                    </div>
                </div>
            <div v-if="records">
                <div v-for="(event, index) in items" :key="event.id">
                    <race-event :data="event" @deleted="remove(index)"></race-event>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Events Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import RaceEvent from './RaceEvent';
    import CreateButton from '../../buttons/CreateButton';
    import NewRaceEvent from '../../forms/NewRaceEvent';

    export default Collection.extend({
        props: ['data'],

        components: { RaceEvent, CreateButton, NewRaceEvent },

        data() {
            return {
            }
        },

    });
</script>
