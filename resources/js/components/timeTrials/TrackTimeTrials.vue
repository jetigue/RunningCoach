<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Track Time Trials</header>
            <filter-button class="">

            </filter-button>
        </div>
        <div class="table-container">

            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="text-black w-full md:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Add a Time Trial">
                        <new-track-time-trial @created="add"></new-track-time-trial>
                    </create-button>
                </div>
            </div>

            <div v-if="records">
                <div v-for="(timeTrial, index) in items" :key="timeTrial.id">
                    <track-time-trial :data="timeTrial" @deleted="remove(index)"></track-time-trial>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Time Trials Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import TrackTimeTrial from './TrackTimeTrial';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackTimeTrial from '../forms/NewTrackTimeTrial';

    export default Collection.extend({
        props: ['data'],

        components: { TrackTimeTrial, CreateButton, NewTrackTimeTrial },

        data() {
            return {

            }
        }
    });
</script>
