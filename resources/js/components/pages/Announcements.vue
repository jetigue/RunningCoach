<template>
    <div class="flex flex-col bg-white rounded p-4">
        <div>
            <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                Team Announcements
            </p>
            <div class="primary-line mb-2"></div>
        </div>

        <div v-for="(announcement, index) in items" :key="announcement.id">
            <announcement :data="announcement" @deleted="remove(index)"></announcement>
        </div>



    </div>

</template>

<script>

    import Announcement from './Announcement';
    import Collection from '../../Collection';

    export default Collection.extend({
        props: ['data'],

        components: { Announcement, Collection },

        data() {
            return {

            }
        }
    });
</script>

<style scoped>

</style>
