<template>
    <div>
        <header class="text-lg font-semibold text-secondary">Status</header>

        <div v-for="filter in filters" :key="filter.name"
             class="text-gray-700 p-1">
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
                    {name: 'Active', url: '?active=1'},
                    {name: 'Inactive', url: '?inactive=1'},
                ]
            }
        }
    }
</script>

<style scoped>

</style>
