<template>
    <div class="flex flex-col w-full">
        <header class="text-xl text-gray-700 flex justify-between">
            <p>Season Best 5k: <span class="font-semibold text-primary">{{ duration }}</span></p>
            <p>Season best VDOT: <span class="font-semibold text-primary">{{ vDot }}</span></p>
        </header>
        <section class="flex flex-wrap md:justify-between text-base py-2">
            <div class="w-full md:w-1/2 py-1 lg:flex">
                <p>Average Pace: &nbsp;</p>
                <p><span class="font-semibold text-primary">{{ avgPaceMi }}</span> per mile
                (<span class="font-semibold text-primary">{{ avgPaceKm }}</span>per km)</p>
            </div>
            <div class="w-full md:w-1/2 py-1 md:flex flex-wrap md:justify-end">
                <p>Average Speed:</p>
                <p>&#8773;<span class="font-semibold text-primary"> {{ avgVelocity }}</span> meters a minute</p>
            </div>
        </section>
        <div class="primary-line my-2"></div>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 lg:px-4">
                <easy-paces :data="data" class="py-4"></easy-paces>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4">
                <ss-paces :data="data" class="py-4"></ss-paces>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4">
                <tempo-paces :data="data" class="py-4"></tempo-paces>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4">
                <cv-paces :data="data" class="py-4"></cv-paces>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4">
                <interval-paces :data="data" class="py-4"></interval-paces>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4">
                <repetition-paces :data="data" class="py-4"></repetition-paces>
            </div>
        </div>
    </div>
</template>

<script>
    import {pacesMixin} from "../../mixins/pacesMixin";
    import Collection from '../../Collection';
    import EasyPaces from './EasyPaces';
    import TempoPaces from './TempoPaces';
    import CvPaces from './CVPaces';
    import IntervalPaces from './IntervalPaces';
    import RepetitionPaces from './RepetitionPaces';
    import SsPaces from "./SsPaces";


    export default Collection.extend({
        mixins: [pacesMixin],
        components: { EasyPaces, TempoPaces, CvPaces, IntervalPaces, RepetitionPaces, SsPaces },
        props: ['data'],

        data() {
            return {
                totals_seconds: this.data
            }
        },
    });
</script>

<style>
.grad {
  background-image: linear-gradient(to right,#040036,indigo,blue,green,yellow,orange,red);
}
</style>
