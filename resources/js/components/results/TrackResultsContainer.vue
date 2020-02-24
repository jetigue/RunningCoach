<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline border-b-2 border-primary">
            <div v-if="isCoach" class="flex w-full justify-end px-2">
                <create-button title="Add a Track Result">
                    <new-track-result @created="add"></new-track-result>
                </create-button>
            </div>
        </div>
        <div class="table-container">
            <div class="table-header">
                <div class="flex w-11/12 flex-wrap">
                    <div class="w-3/4 md:w-1/3 lg:w-1/3">
                        <p class="text-primary font-semibold">Athlete</p>
                    </div>

                    <div class="w-1/4 md:w-1/5 lg:w-1/6">
                        <p class="text-primary font-semibold">Place</p>
                    </div>

                    <div class="hidden md:flex md:w-1/5 lg:w-1/6">
                        <p class="text-primary font-semibold">Time</p>
                    </div>

                    <div class="hidden md:flex md:w-1/5 lg:w-1/6">
                        <p class="text-primary font-semibold">Points</p>
                    </div>

                    <div class="hidden md:flex md:w-1/5 lg:w-1/6">
                        <p class="text-primary font-semibold">Heat</p>
                    </div>
                </div>
            </div>
        <slot></slot>
        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackResult from '../forms/NewTrackResult';
    export default Collection.extend({
        name: "TrackResultsContainer.vue",
        mixins: [authMixin],
        components: {CreateButton, NewTrackResult},
    })
</script>

<style scoped>

</style>
