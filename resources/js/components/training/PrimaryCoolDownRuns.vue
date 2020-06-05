<template>
    <div v-if="isCoach">
        <div class="flex py-1 items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Cool-downs</p>
                <p v-else class="font-semibold text-primary">Cool-down</p>
            </div>
            <button
                class="px-2 text-gray-500 hover:text-primary"
                @click="showCoolDownForm=true"
                type="button">
                <i class="fas fa-plus text-base pt-1"></i>
            </button>
        </div>
        <div v-if="showCoolDownForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
            <new-primary-cool-down @created="add"></new-primary-cool-down>
        </div>
        <div v-if="records" class="">
            <div v-for="(coolDown, index) in items" :key="coolDown.id" class="flex flex-col">
                <cool-down :data="coolDown" @deleted="remove(index)"></cool-down>
            </div>
        </div>
        <div v-else class="flex flex-col">
            <p class="pl-4 font-semibold text-smoke-400">None</p>

        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from "../../Collection";
    import CoolDown from "./CoolDown";
    import NewPrimaryCoolDown from "../forms/NewPrimaryCoolDown";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "PrimaryCoolDownRuns",
        mixins: [authMixin],
        components: { CoolDown, NewPrimaryCoolDown, CreateButton },
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
            Event.$on('formSubmitted', () => this.hideCoolDownForm());

        }

    })
</script>

<style scoped>

</style>
