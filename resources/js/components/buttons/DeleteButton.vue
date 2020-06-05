<template>
    <div class="text-gray-800 px-2 cursor-pointer flex items-center" @click="deleteRecord">
        <span class="hidden mr-1">Delete</span>
        <i class="fas fa-trash"></i>
    </div>
</template>

<script>
    export default {
        name: "DeleteButton",

        data() {
            return {}
        },

        methods: {
            deleteRecord() {
                this.$emit('clicked')
            }
        }
    }
</script>

<style scoped>

</style>
