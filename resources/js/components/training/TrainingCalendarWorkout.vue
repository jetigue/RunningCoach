<template>
    <div class="">
        <span :style="{color: groupColor}">{{ name }}</span>
    </div>
</template>

<script>
    export default {
        name: "TrainingCalendarWorkout",
        props: ['data'],

        data() {
            return {
                name: this.data.name,
                group: this.data.training_group_id
            }
        },

        computed: {
            groupColor() {
                let x = this.group;

                if (x === 2) {
                    return "#73000a";
                } else if (x === 3) {
                    return "#000";
                } else if (x === 4) {
                    return "#888";
                } else if (x === 5) {
                    return "#008000";
                } else {
                    return "#444";
                }
            }
        },
    }
</script>

<style scoped>

</style>
