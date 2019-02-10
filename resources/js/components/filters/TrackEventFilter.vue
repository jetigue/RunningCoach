<template>
    <div>
        <header class="text-lg font-semibold text-secondary">Events</header>

        <div v-for="filter in filters" :key="filter.name"
             class="text-grey-darker p-1">
            <a :href="filter.url">{{ filter.name }}</a>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                items: this.data,

                filters: [
                    {name: 'All Events', url: '?event=1'},
                    {name: '1600 Meter', url: '?event=1600-meters'},
                    {name: '1 Mile', url: '?event=1-mile'}
                ]
            }
        }
    }
</script>

<style scoped>

</style>