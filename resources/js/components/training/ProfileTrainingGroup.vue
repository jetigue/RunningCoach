<template>
    <div class="flex flex-col w-full">
        <div class="w-full text-smoke-600 text-center py-1">Training Group</div>
        <div class="flex items-center justify-center">
            <div class="flex px-2">
                {{group}}
            </div>
            <div class="w-6 h-6 border border-black" :style="{background: groupColor}"></div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ProfileTrainingGroup",
        props: ['data'],

        data() {
            return {
                group: this.data.training_group.name,
                color: this.data.training_group.color
            }
        },

        computed: {
            groupColor() {
                if (this.name === 'None') {
                    return '#'+this.color+'00'
                }
                return '#'+this.color
            }
        },

    }
</script>

<style scoped>

</style>
