<template>
    <div class="flex p-4 justify-between text-white">
        <div class="">
            <a href="/"><i class="text-2xl fas fa-home"></i></a>
        </div>
        <button type="button" aria-label="close" @click="close">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
</template>

<script>
    export default {
        name: "MenuHeader",

        data() {
            return {

            }
        },

        methods: {
            close() {
                this.$emit('closeMenu')
            }
        }
    }
</script>

