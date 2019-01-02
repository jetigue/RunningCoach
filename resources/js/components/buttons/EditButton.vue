<template>
    <div class="px-4 text-primary" @click="editRecord">
        <span>Edit</span>
        <i class="fas fa-edit"></i>
    </div>
</template>

<script>
    export default {
        name: "EditButton",

        data() {
            return {}
        },

        methods: {
            editRecord() {
                this.$emit('clicked');
            }
        }
    }
</script>
