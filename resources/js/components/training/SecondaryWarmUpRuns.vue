<template>
    <div>
        <div v-if="records">
            <div v-for="(warmUp, index) in items" :key="warmUp.id" class="flex flex-col">
                <warm-up :data="warmUp" @deleted="remove(index)"></warm-up>
            </div>
        </div>
        <div v-else class="flex flex-col">
            <div class="flex">
                <div v-if="isCoach">
                    <button
                        class="py-3"
                        @click="showWarmUpForm=true"
                        type="button">
                        <i class="fas fa-plus text-base text-primary pt-1"></i>
                    </button>
                </div>
                <p class="p-3">Warm-up: <span class="text-smoke-400">None</span></p>
            </div>

            <div v-if="showWarmUpForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
                <new-secondary-warm-up @created="add"></new-secondary-warm-up>
            </div>
        </div>
    </div>

</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from "../../Collection";
    import WarmUp from "./WarmUp";
    import NewSecondaryWarmUp from "../forms/NewSecondaryWarmUp";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "SecondaryWarmUpRuns",
        mixins: [authMixin],
        components: { WarmUp, NewSecondaryWarmUp, CreateButton },
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
        }

    })
</script>

<style scoped>

</style>
