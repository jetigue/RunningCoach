<template>
    <div v-if="isCoach">
        <div class="flex items-center">
            <div class="flex">
                <p v-if="records>1" class="font-semibold text-primary">Warm-ups</p>
                <p v-else class="font-semibold text-primary">Warm-up</p>
            </div>
            <portal to="warmUp-button">
                <div class="flex justify-around text-primary">
                    <button type="button" @click="active=true" class="flex">
                        Warm-up &nbsp
                        <i class="fas fa-plus text-primary pt-1"></i>
                    </button>
                    <div v-show="active" class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">
                        <div class="relative bg-white w-full md:w-1/2 lg:w-1/3 max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                            <header class="border-b-2 border-primary flex justify-between items-center">
                                <div>
                                    <p class="font-thin text-2xl text-black">
                                        Add a Warm-up
                                    </p>
                                </div>
                                <button type="button" aria-label="close" @click="close">
                                    <i class="fas fa-times text-xl text-gray-700"></i>
                                </button>
                            </header>
                            <section class="my-3 p-4 bg-gray-200 rounded-lg">
                                <new-primary-warm-up @created="add"></new-primary-warm-up>
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

    export default Collection.extend({
        name: "PrimaryWarmUpRuns",
        mixins: [authMixin],
        components: { WarmUp, NewPrimaryWarmUp},
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
