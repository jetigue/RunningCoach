<template>
    <div class="w-full flex-col">
        <header class="hidden lg:flex text-5xl font-thin text-primary mb-4">Pace Calculator</header>
        <div class="flex w-full justify-between flex-wrap">
            <div v-if="showPaces" class="flex flex-col w-full lg:w-3/4 order-2 lg:order-1">
                <training-paces-header
                    :data="data"
                    :calculator="calculatorUsed"
                ></training-paces-header>
                <div class="flex flex-wrap md:justify-around">
                    <div class="w-full md:w-5/12">
                        <easy-paces :data="data" class="py-4"></easy-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <steady-state-paces :data="data" class="py-4"></steady-state-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <tempo-paces :data="data" class="py-4"></tempo-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <critical-velocity-paces :data="data" class="py-4"></critical-velocity-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <interval-paces :data="data" class="py-4"></interval-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <repetition-paces :data="data" class="py-4"></repetition-paces>
                    </div>
                </div>
            </div>
            <div v-else class="flex flex-col w-full lg:w-3/4 order-2 lg:order-1">
                <div class="w-full md:w-2/3 mx-auto text-center py-4">
                    Use the Pace Calculator to determine your training paces.
                </div>
            </div>
            <div class="flex lg:flex-col w-full lg:w-1/5 order-1 lg:order-2">
                <pace-calculator
                    class="w-full md:w-2/3 md:mx-auto lg:w-full"
                    @clicked="showPacesFromPaceCalculator($event)"
                    @formReset="showPaces = false"
                >
                </pace-calculator>
            </div>
        </div>
    </div>
</template>

<script>
    import {pacesMixin} from "../../mixins/pacesMixin";
    import PaceCalculator from "./PaceCalculator";
    import TrainingPacesHeader from "./TrainingPacesHeader";
    import EasyPaces from "./EasyPaces";
    import SteadyStatePaces from "./SteadyStatePaces";
    import TempoPaces from "./TempoPaces";
    import CriticalVelocityPaces from "./CriticalVelocityPaces";
    import IntervalPaces from "./IntervalPaces";
    import RepetitionPaces from "./RepetitionPaces";
    export default {
        name: "TrainingCalculatorPaces",
        mixins: [pacesMixin],
        components: {
            RepetitionPaces,
            IntervalPaces,
            CriticalVelocityPaces,
            TempoPaces,
            SteadyStatePaces,
            EasyPaces,
            TrainingPacesHeader,
            PaceCalculator},

        data() {
            return {
                data: [],
                showPaces: false,
                calculatorUsed: false
            }
        },
        methods: {
            showPacesFromPaceCalculator(data) {
                this.calculatorUsed = true
                this.data.seconds = data[0]
                this.data.meters = data[1]
                this.showPaces  = true
            },
        }
    }
</script>

<style scoped>

</style>
