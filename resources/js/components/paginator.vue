<template>
    <div v-if="shouldPaginate" class="my-4">
        <ul class="flex w-auto font-sans">
            <li v-show="prevUrl">
                <a class="block text-primary hover:bg-primary hover:text-white hover:no-underline px-3 py-1 rounded-l-lg"
                   rel="prev"
                   href="#" @click.prevent="page--">
                        <i class="fas fa-backward"></i> Previous
                </a>
            </li>

            <li v-show="nextUrl">
                <a class="block text-primary hover:bg-primary hover:text-white hover:no-underline px-6 py-1 rounded-r-lg"
                   rel="next"
                   href="#" @click.prevent="page++">
                        Next <i class="fas fa-forward"></i>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "paginator",

        props: ['dataSet'],

        data() {
            return {
                page: 1,
                prevUrl: false,
                nextUrl: false
            }
        },

        watch: {
            dataSet() {
                this.page = this.dataSet.current_page;
                this.prevUrl = this.dataSet.prev_page_url;
                this.nextUrl = this.dataSet.next_page_url;
            },

            page() {
                this.broadcast().updateUrl();
            }
        },

        computed: {
            shouldPaginate() {
                return !! this.prevUrl || !! this.nextUrl;
            }
        },

        methods: {
            broadcast() {
                return this.$emit('changed', this.page);
            },

            updateUrl() {
                history.pushState(null, null, '?page=' + this.page);
            }
        }
    }
</script>

<style scoped>

</style>