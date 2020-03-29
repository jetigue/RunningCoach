<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Track Meet Names</header>
            <filter-button>
                <season-filter></season-filter>
            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="w-full">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Meet Venue">
                        <new-track-meet-name @created="add"></new-track-meet-name>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(meetName, index) in items" :key="meetName.id">
                    <track-meet-name :data="meetName" @deleted="remove(index)"></track-meet-name>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Meet Names Posted</p>
            </div>
        </div>

    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import TrackMeetName from './TrackMeetName';
    import CreateButton from '../../buttons/CreateButton';
    import NewTrackMeetName from '../../forms/NewTrackMeetName';

    export default Collection.extend({
        props: ['data'],

        components: {TrackMeetName, CreateButton, NewTrackMeetName},

        data() {
            return {

            }
        },

    });
</script>
