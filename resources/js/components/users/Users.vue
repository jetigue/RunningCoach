<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Users</header>
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

        <div v-if="records">
            <paginator :dataSet="dataSet" @changed="fetch"></paginator>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import User from './User';

    export default Collection.extend({
        // props: ['data'],

        components: { User },

        data() {
            return {
                dataSet: false,
            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `api${location.pathname}?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;

                window.scrollTo(0,0);
            },
        }
    });
</script>
