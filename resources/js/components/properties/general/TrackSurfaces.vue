<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Track Surfaces</header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Time of Day">
                        <new-track-surface @created="add"></new-track-surface>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(trackSurface, index) in items" :key="trackSurface.id">
                    <track-surface :data="trackSurface" @deleted="remove(index)"></track-surface>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Track Surfaces Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import TrackSurface from './TrackSurface';
    import CreateButton from '../../buttons/CreateButton';
    import NewTrackSurface from '../../forms/NewTrackSurface';

    export default Collection.extend({
        props: ['data'],

        components: { TrackSurface, CreateButton, NewTrackSurface },

        data() {
            return {

            }
        }
    });
</script>
