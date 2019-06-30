<template>
    <div class="mb-4">
        <div class="flex flex-col">
            <div class="flex justify-start">
                <div class="flex flex-col justify-center items-center bg-primary rounded shadow w-10 h-10">
                    <div class="text-grey font-light text-xs">{{ event_date | moment("MMM")}}</div>
                    <div class="text-white font-semibold text-lg">{{ event_date | moment('D')}}</div>
                </div>

                <div class="flex-col text-xs font-bold text-primary ml-2">
                    <div>
                        {{ name }}
                    </div>
                    <div class="leading-tight">
                        <div class=" pl-2 text-smoke-darker">{{ location }}</div>
                        <div class=" pl-2 text-smoke-darker">{{ event_time }}</div>
                    </div>
                </div>
            </div>

            <div class="text-xs text-grey-darker py-1">
                {{ details }}
            </div>

            <div v-if="link != null" class="text-xs font-semibold">
                <p><a class="text-blue" :href="link">{{ link_text }}</a></p>
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