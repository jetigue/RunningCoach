<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Cross Country Meet Names</header>
            <filter-button>
                <season-filter></season-filter>
            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="w-full">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Meet Venue">
                        <new-cross-country-meet-name @created="add"></new-cross-country-meet-name>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(meetName, index) in items" :key="meetName.id">
                    <cross-country-meet-name :data="meetName" @deleted="remove(index)"></cross-country-meet-name>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Meet Names Posted</p>
            </div>
        </div>

    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import CrossCountryMeetName from './CrossCountryMeetName';
    import CreateButton from '../../buttons/CreateButton';
    import NewCrossCountryMeetName from '../../forms/NewCrossCountryMeetName';

    export default Collection.extend({
        props: ['data'],

        components: {CrossCountryMeetName, CreateButton, NewCrossCountryMeetName},

        data() {
            return {

            }
        },

    });
</script>
