<template>
    <div class="flex flex-col p-3">
        <div class="flex justify-between flex-wrap items-baseline">
            <div class="text-lg font-semibold text-primary">
                {{ title }}
            </div>

            <div class="text-xs font-semibold text-smoke-400">
                Published {{ created_at | moment("from", "now") }}
            </div>
        </div>

        <div class="text-smoke-800 pt-1">
            {{ body }}
        </div>
        <div v-if="body_2 != null" class="text-smoke-800 py-1">
            {{ body_2 }}
        </div>
        <div v-if="body_3 != null" class="text-smoke-800 pt-1">
            {{ body_3 }}
        </div>
        <div class="flex justify-start flex-wrap">
            <div v-if="link_1 != null" class="py-1 pr-2">
                <p><a class="text-blue-600 hover:text-blue-700 hover:underline text-sm font-semibold" :href="link_1">{{ link_text_1 }}</a></p>
            </div>
            <div v-if="link_2 != null" class="py-1 pl-2">
                <p><a class="text-blue-600 hover:text-blue-700 hover:underline text-sm font-semibold" :href="link_1">{{ link_text_1 }}</a></p>
            </div>
            <div v-if="link_3 != null" class="py-1 pl-2">
                <p><a class="text-blue-600 hover:text-blue-700 hover:underline text-sm font-semibold" :href="link_1">{{ link_text_1 }}</a></p>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                title: this.data.title,
                body: this.data.body,
                body_2: this.data.body_2,
                body_3: this.data.body_3,
                link_1: this.data.link_1,
                link_text_1: this.data.link_text_1,
                link_2: this.data.link_2,
                link_text_2: this.data.link_text_2,
                link_3: this.data.link_3,
                link_text_3: this.data.link_text_3,
                created_at: this.data.created_at
            }
        }
    };
</script>

<style scoped>

</style>
