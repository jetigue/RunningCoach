<template>
    <div>
        <header class="text-lg font-semibold text-secondary">Seasons</header>

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
                    {name: 'All Seasons', url: '?track=1'},
                    {name: 'Indoor TimeTrial', url: '?season=indoor-track'},
                    {name: 'Outdoor TimeTrial', url: '?season=outdoor-track'}
                ]
            }
        }
    }
</script>

<style scoped>

</style>
