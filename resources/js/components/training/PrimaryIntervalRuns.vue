<template>
    <div v-if="isCoach">
        <div class="flex items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Interval Runs</p>
                <p v-else class="font-semibold text-primary">Interval Run</p>
            </div>
            <portal to="intervalRun-button">
                <div class="flex justify-around text-primary">
                    <button type="button" @click="active=true" class="flex">
                        Interval Run &nbsp
                        <i class="fas fa-plus text-primary pt-1"></i>
                    </button>
                    <div v-show="active" class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">
                        <div class="relative bg-white w-full md:w-1/2 lg:w-1/3 max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                            <header class="border-b-2 border-primary flex justify-between items-center">
                                <div>
                                    <p class="font-thin text-2xl text-black">
                                        Add a Interval Run
                                    </p>
                                </div>
                                <button type="button" aria-label="close" @click="close">
                                    <i class="fas fa-times text-xl text-gray-700"></i>
                                </button>
                            </header>
                            <section class="my-3 p-4 bg-gray-200 rounded-lg">
                                <new-primary-interval-run @created="add"></new-primary-interval-run>
                            </section>
                            <footer class="border-t-2 border-primary flex justify-end">
                                <button type="button" class="py-2 text-gray-800 text-sm" @click="close">
                                    Cancel
                                </button>
                            </footer>
                        </div>
                    </div>
                </div>
            </portal>
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

    export default Collection.extend({
        name: "PrimaryIntervalRuns",
        mixins: [authMixin],
        components: { IntervalRun, NewPrimaryIntervalRun },
        props: ['data'],

        data() {
            return {
                active: false
            }
        },

        created() {
            Event.$on('formSubmitted', () => this.close());
        },

        methods: {
            close() {
                Event.$emit('cancel')
                this.active = false
            },
        },
    })
</script>

<style scoped>

</style>
