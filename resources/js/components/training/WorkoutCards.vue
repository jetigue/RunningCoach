<template>
     <div class="flex justify-between flex-wrap py-4">
         <slot></slot>
     </div>
</template>

<script>
    export default {
        name: "WorkoutCards",
        data() {
            return {
                workoutCards: []
            }
        },

        mounted() {
            this.workoutCards = this.$children
        }
    }
</script>

<style scoped>

</style>
