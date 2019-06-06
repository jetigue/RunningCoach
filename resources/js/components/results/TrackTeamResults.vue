<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Team Results</header>
            <filter-button class="">
              
            </filter-button>
        </div>
        <div class="table-container">

            <div class="table-header">
                <div class="flex md:w-5/6 flex-wrap justify-between">
                    <div class="hidden md:flex md:w-1/2">
                        <p class="text-primary font-semibold">Division</p>
                    </div>

                    <div class="hidden md:flex md:w-1/4">
                        <p class="text-primary font-semibold">Place</p>
                    </div>

                    <div class="hidden md:flex md:w-1/4">
                        <p class="text-primary font-semibold">Points</p>
                    </div>
                </div>

                <div class="flex md:justify-between md:flex-1 items-center">
                    <div class="hidden md:flex ">
                        <p class="text-primary font-semibold">Results</p>
                    </div>
                    <create-button title="Add a Team Result">
                        <new-track-team-result @created="add"></new-track-team-result>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(teamResult, index) in items" :key="teamResult.id">
                    <track-team-result :data="teamResult" @deleted="remove(index)"></track-team-result>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Team Results Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import TrackTeamResult from './TrackTeamResult';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackTeamResult from '../forms/NewTrackTeamresult';

    export default Collection.extend({
        props: ['data'],

        components: { TrackTeamResult, CreateButton, NewTrackTeamResult },

        data() {
            return {
                filters: []
            }
        },
    });
</script>