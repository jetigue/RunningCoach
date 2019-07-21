<template>
    <div class="flex flex-col bg-white rounded p-4">
        <div>
            <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                Calendar
            </p>
        </div>
        <div class="primary-line mb-2"></div>
        <div class="my-2" v-for="(teamEvent, index) in items" :key="teamEvent.id">
            <event :data="teamEvent" @deleted="remove(index)"></event>
        </div>



    </div>

</template>

<script>

    import Event from './Event';
    import Collection from '../../Collection';

    export default Collection.extend({
        props: ['data'],

        components: { Event, Collection },

        data() {
            return {

            }
        }
    });
</script>

<style scoped>

</style>
