<template>
    <div class="flex flex-col">
        <div class="text-xl text-gray-700 italic">
            <slot></slot>
        </div>
        <div class="table-container-no-border border-b-2 border-gray-400">
            <div class="table-header-no-border border-b-2 border-gray-400"></div>

            <div v-if="records">
                <div v-for="(meet, index) in items" :key="meet.id">
                    <track-meet :data="meet" @deleted="remove(index)"></track-meet>
                </div>
            </div>

            <div v-else class="flex flex-col">
                <p class="text-gray-600 p-2">No Meets Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import TrackMeet from './TrackMeet';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackMeet from '../forms/NewTrackMeet';

    export default Collection.extend({
        mixins: [authMixin],
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
