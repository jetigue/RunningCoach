<template>
    <header class="py-2 text-center lg:text-left">
        <div class="mb-2">
            <p v-if="calculator === true">
                Training Paces based on your input distance of
                <span class="font-semibold text-primary">{{ meters}}m</span>
            </p>
            <p v-else>
                Training Paces based on your
                <span class="font-bold text-primary">{{ raceEvent }}</span>
            </p>
            <p class="italic text-xs text-gray-600">{{ meetName }} on {{ meetDate }} </p>
        </div>
        <div class="flex w-full flex-wrap border-t border-b py-2 md:justify-center items-center">
            <div class="w-1/2 md:w-1/3 lg:w-1/5 flex flex-col items-center order-2 md:order-1">
                <div class="text-xs font-semibold text-gray-800">VDOT</div>
                <div class="text-lg font-bold text-primary">{{ vDot }}</div>
            </div>
            <div class="w-1/2 md:w-1/3 lg:w-1/5 flex flex-col items-center order-3">
                <div class="text-xs font-semibold text-gray-800">Speed
                    <span class="text-gray-500 font-light">m/min</span>
                </div>
                <div class="text-lg font-bold text-primary">{{ avgVelocity }}</div>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/5 flex flex-col items-center lg:border-r lg:border-l order-1 lg:order-3 md:order-2">
                <div class="text-sm font-semibold text-gray-800">Time</div>
                <div class="text-2xl font-bold text-primary">{{ duration }}</div>
            </div>
            <div class="w-1/2 md:w-1/3 lg:w-1/5 flex flex-col items-center order-4">
                <div class="text-xs font-semibold text-gray-800">Pace
                    <span class="text-gray-500 font-light">per mi</span>
                </div>
                <div class="text-lg font-bold text-primary">{{ avgPaceMi }}</div>
            </div>
            <div class="w-1/2 md:w-1/3 lg:w-1/5 flex flex-col items-center order-5">
                <div class="text-xs font-semibold text-gray-800">Pace
                    <span class="text-gray-500 font-light">per km</span>
                </div>
                <div class="text-lg font-bold text-primary">{{ avgPaceKm }}</div>
            </div>
        </div>
    </header>
</template>

<script>
    import {pacesMixin} from "../../mixins/pacesMixin";

    export default {
        name: "TrainingPacesHeader",
        mixins: [pacesMixin],
        props: {
            data: [Object, Array],
            calculator: Boolean,
        },

        data() {
            return {
                meters: this.data.meters
            }
        },
    }
</script>

<style scoped>

</style>
