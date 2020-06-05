<template>
    <div v-if="isCoach">
        <div class="flex py-1 items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Warm-ups</p>
                <p v-else class="font-semibold text-primary">Warm-up</p>
            </div>
            <button
                class="px-2 text-gray-500 hover:text-primary"
                @click="showWarmUpForm=true"
                type="button">
                <i class="fas fa-plus text-base pt-1"></i>
            </button>
        </div>
        <div v-if="showWarmUpForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
            <new-primary-warm-up @created="add"></new-primary-warm-up>
        </div>
        <div v-if="records" class="">
            <div v-for="(warmUp, index) in items" :key="warmUp.id" class="flex flex-col">
                <warm-up :data="warmUp" @deleted="remove(index)"></warm-up>
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
    import WarmUp from "./WarmUp";
    import NewPrimaryWarmUp from "../forms/NewPrimaryWarmUp";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "PrimaryWarmUpRuns",
        mixins: [authMixin],
        components: { WarmUp, NewPrimaryWarmUp, CreateButton },
        props: ['data'],

        data() {
            return {
                showWarmUpForm: false
            }
        },

        methods: {
            hideWarmUpForm() {
                this.showWarmUpForm = false

            }
        },

        created() {
            Event.$on('canceled', () => this.hideWarmUpForm());
            Event.$on('formSubmitted', () => this.hideWarmUpForm());
        }

    })
</script>

<style scoped>

</style>
