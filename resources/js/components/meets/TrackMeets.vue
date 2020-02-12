<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Track Meets</header>
            <filter-button class="">
                <track-season-filter></track-season-filter>
            </filter-button>
        </div>
        <div class="table-container">

            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="md:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="hidden lg:flex lg:1/2">
                        <p class="text-primary font-semibold">Date</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Add a Track Meet">
                        <new-track-meet @created="add"></new-track-meet>
                    </create-button>
                </div>
            </div>

            <div v-if="records">
                <div v-for="(trackMeet, index) in items" :key="trackMeet.id">
                    <track-meet :data="trackMeet" @deleted="remove(index)"></track-meet>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Meets Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import TrackMeet from './TrackMeet';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackMeet from '../forms/NewTrackMeet';

    export default Collection.extend({
        props: ['data'],

        components: { TrackMeet, CreateButton, NewTrackMeet },

        data() {
            return {

                filters: [
                    {name: 'All TimeTrial Seasons', link: '/track-meets?track=1'},
                    {name: 'Indoor TimeTrial', link: '/track-meets?season=indoor-track'},
                    {name: 'Outdoor TimeTrial', link: '/track-meets?season=outdoor-track'}
                ]
            }
        }
    });
</script>
