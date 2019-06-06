<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Team Announcements</header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Title</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Announcement">
                        <new-team-announcement @created="add"></new-team-announcement>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(announcement, index) in items" :key="announcement.id">
                    <team-announcement :data="announcement" @deleted="remove(index)"></team-announcement>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Announcements Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import TeamAnnouncement from './TeamAnnouncement';
    import CreateButton from '../buttons/CreateButton';
    import NewTeamAnnouncement from '../forms/NewTeamAnnouncement';

    export default Collection.extend({
        props: ['data'],

        components: { TeamAnnouncement, CreateButton, NewTeamAnnouncement },

        data() {
            return {

            }
        }
    });
</script>
