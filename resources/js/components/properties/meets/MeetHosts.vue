<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Meet Hosts</header>
            <filter-button class="hidden">

            </filter-button>
        </div>
        <div class="table-container">
                <div class="table-header">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="flex">
                    <create-button title="Create Meet Host">
                        <new-meet-host @created="add"></new-meet-host>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(host, index) in items" :key="host.id">
                    <meet-host :data="host" @deleted="remove(index)"></meet-host>
                </div>
            </div>
            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Hosts Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../../Collection';
    import MeetHost from './MeetHost';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetHost from '../../forms/NewMeetHost';

    export default Collection.extend ({
        props: ['data'],

        components: { MeetHost, CreateButton, NewMeetHost },

        data() {
            return {
            }
        },
    });
</script>
