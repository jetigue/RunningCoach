<template>
    <button class="py-2 text-grey-darker text-sm" @click="cancel">
        Cancel
    </button>
</template>

<script>
    export default {
        name: "CancelButton",

        data() {
            return {}

        },

        methods: {
            cancel() {
                this.$emit('clicked');
            }
        }
    }
</script>
