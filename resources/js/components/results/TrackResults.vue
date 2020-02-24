<template>
    <div>
        <div class="text-primary text-xl font-bold my-0 py-0">
            <slot></slot>
        </div>

        <div v-if="records">
            <div v-for="(result, index) in items" :key="result.id">
                <track-result :data="result" @deleted="remove(index)"></track-result>
            </div>
        </div>

        <div v-else class="flex flex-col text-center">
            <p class="text-2xl text-tertiary p-4">No Results Posted</p>
        </div>
    </div>


</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import TrackResult from './TrackResult';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackResult from '../forms/NewTrackResult';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { TrackResult, CreateButton, NewTrackResult },

        data() {
            return {
                filters: []
            }
        }
    });
</script>
