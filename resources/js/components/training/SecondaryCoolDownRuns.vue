<template>
    <div>
        <div v-if="records">
            <div v-for="(coolDown, index) in items" :key="coolDown.id" class="flex flex-col">
                <cool-down :data="coolDown" @deleted="remove(index)"></cool-down>
            </div>
        </div>
        <div v-else class="flex flex-col">
            <div class="flex">
                <div v-if="isCoach">
                    <button
                        class="py-3"
                        @click="showCoolDownForm=true"
                        type="button">
                        <i class="fas fa-plus text-base text-primary pt-1"></i>
                    </button>
                </div>
                <p class="p-3">Cool-down: <span class="text-smoke-400">None</span></p>
            </div>

            <div v-if="showCoolDownForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
                <new-secondary-cool-down @created="add"></new-secondary-cool-down>
            </div>
        </div>
    </div>

</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from "../../Collection";
    import CoolDown from "./CoolDown";
    import NewSecondaryCoolDown from "../forms/NewSecondaryCoolDown";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "SecondaryCoolDownRuns",
        mixins: [authMixin],
        components: { CoolDown, NewSecondaryCoolDown, CreateButton },
        props: ['data'],

        data() {
            return {
                showCoolDownForm: false
            }
        },

        methods: {
            hideCoolDownForm() {
                this.showCoolDownForm = false

            }
        },

        created() {
            Event.$on('canceled', () =>this.hideCoolDownForm());

        }

    })
</script>

<style scoped>

</style>
