<template>
    <div class="dropdown relative">
        <div @click="isOpen =!isOpen">

            <slot name="trigger"></slot>

        </div>

        <div v-show="isOpen"
             class="card absolute mt-2 leading-loose text-smoke-800 font-semibold"
             :class="align === 'left' ? 'left-0' : 'right-0'"
             :style="{ width }">

            <slot></slot>

        </div>

    </div>
    
</template>

<script>
    export default {

        props: {
            width: { default: 'auto' },
            align: { default: 'left' }
        },

        data() {
            return {isOpen: false}
        },

        watch: {
            isOpen(isOpen) {
                if (isOpen) {
                    document.addEventListener('click', this.closeIfClickedOutside);
                }

            }
        },

        methods: {
            closeIfClickedOutside() {
                if (! event.target.closest('.dropdown')) {
                    this.isOpen = false;

                    document.removeEventListener('click', this.closeIfClickedOutside);
                }
            }
        }
    }
</script>

<style scoped>



</style>