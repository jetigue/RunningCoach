<template>
    <div>
        <div v-for="(host, index) in items" :key="host.id">
            <meet-host :data="host" @deleted="remove(index)"></meet-host>
        </div>
    </div>
</template>

<script>
    import MeetHost from './MeetHost';

    export default {
        props: ['data'],

        components: { MeetHost },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            remove(index) {
                this.items.splice(index, 1);
            }
        }
    }
</script>
