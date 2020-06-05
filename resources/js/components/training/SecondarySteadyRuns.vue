<template>
    <div>
        <div class="flex flex-col">
            <div class="flex">
                <div v-if="records" class="w-full pl-3">
                    <div v-for="(steady, index) in items" :key="steady.id" class="flex flex-col">
                        <steady-run :data="steady" @deleted="remove(index)"></steady-run>
                    </div>
                    <button
                        v-if="isCoach"
                        class="pl-4 text-xs"
                        @click="showSteadyRunForm=true"
                        type="button">
                        <i class="fas fa-plus text-primary"></i>
                        <span class="text-smoke-400">Add another Steady Run</span>
                    </button>


                </div>
                <div v-else class="flex items-center">
                    <button
                        v-if="isCoach"
                        class="py-3 flex-initial"
                        @click="showSteadyRunForm=true"
                        type="button">
                        <i class="fas fa-plus text-base text-primary pt-1"></i>
                    </button>
                    <p class="p-3">Steady Run: <span class="text-smoke-400">None</span></p>
                </div>

            </div>
            <div v-if="showSteadyRunForm" class="card w-full md:w-2/3 md:p-2 mx-auto">
                <new-secondary-steady-run @created="add"></new-secondary-steady-run>
            </div>
        </div>


    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from "../../Collection";
    import SteadyRun from "./SteadyRun";
    import NewSecondarySteadyRun from "../forms/NewSecondarySteadyRun";
    import CreateButton from "../buttons/CreateButton";

    export default Collection.extend({
        name: "SecondarySteadyRuns",
        mixins: [authMixin],
        components: { SteadyRun, NewSecondarySteadyRun, CreateButton },
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
