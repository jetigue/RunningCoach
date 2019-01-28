<template>
    <div class="flex cursor-pointer" @click="clicked">
        <i class="fas fa-angle-double-down text-tertiary text-xl"
           :class="{'fas fa-angle-double-up text-tertiary-lighter': isExpanded }">
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
        }
    };
</script>
