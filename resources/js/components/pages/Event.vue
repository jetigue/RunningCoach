<template>
    <div class="py-2">
        <div class="flex flex-col">
            <div class="flex justify-start">
                <div class="flex-none bg-primary rounded-full shadow-2xl w-10 h-10 leading-none">
                    <div class="flex flex-col justify-center items-center h-full w-full">
                        <div class="text-gray-200 font-light text-xs">{{ event_date | moment("MMM")}}</div>
                        <div class="text-white font-semibold text-lg">{{ event_date | moment('D')}}</div>
                    </div>

                </div>

                <div class="flex-col text-xs font-bold text-primary ml-2">
                    <div>
                        {{ name }}
                    </div>
                    <div class="leading-tight">
                        <div class=" pl-2 text-smoke-800">{{ location }}</div>
                        <div class=" pl-2 text-smoke-800">{{ event_time }}</div>
                    </div>
                </div>
            </div>

            <div class="text-xs text-gray-900 py-1">
                {{ details }}
            </div>

            <div v-if="link != null" class="text-xs font-semibold">
                <p><a class="text-blue-600 hover:text-blue-800 hover:underline" :href="link">{{ link_text }}</a></p>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                name: this.data.name,
                event_date: this.data.event_date,
                event_time: this.data.event_time,
                location: this.data.location,
                details: this.data.details,
                link: this.data.link,
                link_text: this.data.link_text
            }
        }
    };
</script>

<style scoped>

</style>
