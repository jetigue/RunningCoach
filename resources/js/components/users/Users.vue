<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Users</header>
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
            </div>
            <div v-if="records">
                <div v-for="(user, index) in items" :key="user.id">
                    <user :data="user" @deleted="remove(index)"></user>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Users in the Database</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import User from './User';

    export default Collection.extend({
        props: ['data'],

        components: { User },

        data() {
            return {
            }
        }
    });
</script>
