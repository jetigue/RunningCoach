<template>
    <div v-if="isCoach">
        <div class="flex py-1 items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Steady Runs</p>
                <p v-else class="font-semibold text-primary">Steady Run</p>
            </div>
            <button
                class="px-2 text-gray-500 hover:text-primary"
                @click="showSteadyRunForm=true"
                type="button">
                <i class="fas fa-plus text-base pt-1"></i>
            </button>
        </div>
        <div v-if="showSteadyRunForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
            <new-primary-steady-run @created="add"></new-primary-steady-run>
        </div>
        <div v-if="records" class="">
            <div v-for="(steady, index) in items" :key="steady.id" class="flex flex-col">
                <steady-run :data="steady" @deleted="remove(index)"></steady-run>
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
    import SteadyRun from "./SteadyRun";
    import NewPrimarySteadyRun from "../forms/NewPrimarySteadyRun";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "PrimarySteadyRuns",
        mixins: [authMixin],
        components: { SteadyRun, NewPrimarySteadyRun, CreateButton },
        props: ['data'],

        data() {
            return {
                showSteadyRunForm: false
            }
        },

        methods: {
            hideSteadyRunForm() {
                this.showSteadyRunForm = false
            },

            showForm() {
                this.showSteadyRunForm = true
            }
        },

        created() {
            Event.$on('canceled', () => this.hideSteadyRunForm())
            Event.$on('formSubmitted', () => this.hideSteadyRunForm());
        }
    })
</script>

<style scoped>

</style>
