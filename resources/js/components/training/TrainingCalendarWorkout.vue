<template>
    <div>
        <div class="lg:hidden">
            <span :style="{color: groupColor}">{{ name_abbrev }}</span>
        </div>
        <div class="hidden lg:flex">
            <span :style="{color: groupColor}">{{ name }}</span>
        </div>
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
            },

            name_abbrev() {
                let x = this.name;

                return x.charAt(0).toUpperCase();
            }
        },
    }
</script>

<style scoped>

</style>
