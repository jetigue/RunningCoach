<template>
    <div class="flex flex-col py-1">
        <div class="text-lg text-gray-600 italic">
            <slot></slot>
        </div>
        <div v-if="records">
            <div v-for="(result, index) in items" :key="result.id">
                <athlete-track-result :data="result" @deleted="remove(index)"></athlete-track-result>
            </div>
        </div>

        <div v-else class="flex flex-col text-center">
            <p class="text-2xl text-gray-600 p-4">No Results Posted</p>
        </div>

    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import AthleteTrackResult from './AthleteTrackResult';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { AthleteTrackResult },

        data() {
            return {
            }
        }
    });
</script>
