<template>
    <div v-if="isCoach">
        <div class="flex py-1 items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Interval Runs</p>
                <p v-else class="font-semibold text-primary">Interval Run</p>
            </div>
            <button
                class="px-2 text-gray-500 hover:text-primary"
                @click="showIntervalRunForm=true"
                type="button">
                <i class="fas fa-plus text-base pt-1"></i>
            </button>
        </div>
        <div v-if="showIntervalRunForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
            <new-primary-interval-run @created="add"></new-primary-interval-run>
        </div>
        <div v-if="records" class="">
            <div v-for="(intervalRun, index) in items" :key="intervalRun.id" class="flex flex-col">
                <interval-run :data="intervalRun" @deleted="remove(index)"></interval-run>
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
    import IntervalRun from "./IntervalRun";
    import NewPrimaryIntervalRun from "../forms/NewPrimaryIntervalRun";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "PrimaryIntervalRuns",
        mixins: [authMixin],
        components: { IntervalRun, NewPrimaryIntervalRun, CreateButton },
        props: ['data'],

        data() {
            return {
                showIntervalRunForm: false
            }
        },

        methods: {
            hideIntervalRunForm() {
                this.showIntervalRunForm = false
            },

            showForm() {
                this.showIntervalRunForm = true
            }
        },

        created() {
            Event.$on('canceled', () => this.hideIntervalRunForm())
            Event.$on('formSubmitted', () => this.hideIntervalRunForm());
        }
    })
</script>

<style scoped>

</style>
