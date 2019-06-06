<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Venues</header>
            <filter-button>
                <season-filter></season-filter>
            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="lg:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="hidden lg:flex lg:1/2">
                        <p class="text-primary font-semibold">Season</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Meet Venue">
                        <new-meet-venue @created="add"></new-meet-venue>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(venue, index) in items" :key="venue.id">
                    <meet-venue :data="venue" @deleted="remove(index)"></meet-venue>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Venues Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import MeetVenue from './MeetVenue';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetVenue from '../../forms/NewMeetVenue';

    export default Collection.extend({
        props: ['data'],

        components: { MeetVenue, CreateButton, NewMeetVenue },

        data() {
            return {

            }
        },
    });
</script>