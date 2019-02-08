<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Meet Names</header>
            <filter-button>
                <season-filter></season-filter>
            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="lg:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="hidden lg:flex lg:1/2">
                        <p class="text-primary font-semibold">Season</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Create Meet Venue">
                        <new-meet-name @created="add"></new-meet-name>
                    </create-button>
                </div>
            </div>

            <div v-for="(meetName, index) in items" :key="meetName.id">
                <meet-name :data="meetName" @deleted="remove(index)"></meet-name>
            </div>
        </div>

    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import MeetName from './MeetName';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetName from '../../forms/NewMeetName';

    export default Collection.extend({
        props: ['data'],

        components: {MeetName, CreateButton, NewMeetName},

        data() {
            return {

            }
        },

    });
</script>