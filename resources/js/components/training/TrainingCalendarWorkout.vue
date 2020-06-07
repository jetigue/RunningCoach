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
                let x = this.data.name;

                if (x === 'Crimson') {
                    return "#73000a";
                } else if (x === 'Black') {
                    return "#000";
                } else if (x === 'White') {
                    return "#888";
                } else if (x === 'Green') {
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
