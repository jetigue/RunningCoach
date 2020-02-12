<template>
    <div class="flex flex-col py-4">
        <div class="text-xl text-gray-600 italic">
            <slot></slot>
        </div>
        <div class="gradient-line"></div>
        <div class="table-header-no-border">
            <div class="flex w-full">
                <div class="hidden lg:block w-1/6">
                    <p class="text-primary font-semibold">Date</p>
                </div>

                <div class="hidden md:block md:w-1/2 lg:w-1/3">
                    <p class="text-primary font-semibold">Meet</p>
                </div>

                <div class="hidden lg:block lg:w-1/6">
                    <p class="text-primary font-semibold">Division</p>
                </div>

                <div class="hidden md:block md:w-1/4 lg:w-1/6 text-center">
                    <p class="text-primary font-semibold">Place</p>
                </div>
                <div class="hidden md:block md:w-1/4 lg:w-1/6 text-center">
                    <p class="text-primary font-semibold">Time</p>
                </div>
            </div>
        </div>
        <div v-if="records">
            <div v-for="(result, index) in items" :key="result.id">
                <athlete-track-result :data="result" @deleted="remove(index)"></athlete-track-result>
            </div>
        </div>

        <div v-else class="flex flex-col text-center">
            <p class="text-2xl text-gray-700 p-4">No Results Posted</p>
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
