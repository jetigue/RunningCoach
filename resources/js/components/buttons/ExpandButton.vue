<template>
    <div class="flex cursor-pointer" @click="clicked">
        <i class="fas fa-angle-double-down text-smoke-700 text-xl"
           :class="{'fas fa-angle-double-up text-smoke-400': isExpanded }">
        </i>
    </div>
</template>

<script>
    export default {
        name: 'expand-button',

        data() {
            return {
                isExpanded: false
            }

        },

        methods: {
            clicked() {
                this.$emit('toggleRow');
                this.isExpanded = !this.isExpanded;
            },

            resetExpandButton() {
                this.isExpanded = false
            }
        },

        mounted() {
            Event.$on('resetExpandButton', () => this.resetExpandButton());
        }
    };
</script>
