<template>
    <div class="pr-2 flex items-center text-primary cursor-pointer" @click="editRecord">
        <span class="hidden mr-1">Edit</span>
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
