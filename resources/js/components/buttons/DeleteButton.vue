<template>
    <div class="text-secondary px-2 cursor-pointer" @click="deleteRecord">
        <span>Delete</span>
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