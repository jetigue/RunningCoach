<template>
    <div role="tabPanel" v-show="isActive"
         class="px-2 md:px-4 md:border md:border-gray-400 md:border-t-0 min-h-screen py-6">
        <slot></slot>
    </div>

</template>

<script>
    export default {
        name: "Tab",
        props: {
            title: {},
            active: {
                type: Boolean,
                default: false
            }
        },

        data() {
            return {
                isActive: this.active
            }
        }
    }
</script>

<style scoped>

</style>
