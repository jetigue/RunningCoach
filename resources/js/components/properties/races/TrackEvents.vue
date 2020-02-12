<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Track Events</header>
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
                            <new-track-event @created="add"></new-track-event>
                        </create-button>
                    </div>
                </div>
            <div v-if="records">
                <div v-for="(event, index) in items" :key="event.id">
                    <track-event :data="event" @deleted="remove(index)"></track-event>
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
    import TrackEvent from './TrackEvent';
    import CreateButton from '../../buttons/CreateButton';
    import NewTrackEvent from '../../forms/NewTrackEvent';

    export default Collection.extend({
        props: ['data'],

        components: { TrackEvent, CreateButton, NewTrackEvent },

        data() {
            return {
            }
        },

    });
</script>
