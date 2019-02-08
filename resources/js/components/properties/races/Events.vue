<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Events</header>
            <filter-button class="hidden">

            </filter-button>
        </div>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create Meet Venue">
                            <new-event @created="add"></new-event>
                        </create-button>
                    </div>
                </div>
            <div v-for="(event, index) in items" :key="event.id">
                <event :data="event" @deleted="remove(index)"></event>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import Event from './Event';
    import CreateButton from '../../buttons/CreateButton';
    import NewEvent from '../../forms/NewEvent';

    export default Collection.extend({
        props: ['data'],

        components: { Event, CreateButton, NewEvent },

        data() {
            return {
            }
        },

    });
</script>