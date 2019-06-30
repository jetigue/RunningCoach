<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Team Events</header>
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
                    <create-button title="Create New Event">
                        <new-team-event @created="add"></new-team-event>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(teamEvent, index) in items" :key="teamEvent.id">
                    <team-event :data="teamEvent" @deleted="remove(index)"></team-event>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Team Events Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import TeamEvent from './TeamEvent';
    import CreateButton from '../buttons/CreateButton';
    import NewTeamEvent from '../forms/NewTeamEvent';

    export default Collection.extend({
        props: ['data'],

        components: { TeamEvent, CreateButton, NewTeamEvent },

        data() {
            return {

            }
        }
    });
</script>
