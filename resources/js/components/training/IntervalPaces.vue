<template>
    <section class="flex flex-wrap">
        <div class="flex-col w-full">
            <header class="text-xl text-primary">
                Interval Pace
            </header>

            <div class="">
                <div class="table-header-no-border">
                    <div class="flex w-full items-end">
                        <div class="w-1/4">
                            <p class="text-smoke-800 font-semibold text-sm">Distance</p>
                        </div>
                        <div class="px-8 w-3/4">
                            <div class="grad h-1 w-full rounded-full"></div>
                        </div>
                    </div>
                </div>
                <div class="table-body-no-border">
                    <div class="flex flex-col border-b border-gray-100">
                        <div class="flex flex-col">
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>400m</p></div>
                                <div class="w-1/4"><p>{{ lowIntervalPace400 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ intervalPace400 }}</p></div>
                                <div class="w-1/4"><p>{{ highIntervalPace400 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>800m</p></div>
                                <div class="w-1/4"><p>{{ lowIntervalPace800 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ intervalPace800 }}</p></div>
                                <div class="w-1/4"><p>{{ highIntervalPace800 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>1000m</p></div>
                                <div class="w-1/4"><p>{{ lowIntervalPace }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ intervalPace }}</p></div>
                                <div class="w-1/4"><p>{{ highIntervalPace }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>1200m</p></div>
                                <div class="w-1/4"><p>{{ lowIntervalPace1200 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ intervalPace1200 }}</p></div>
                                <div class="w-1/4"><p>{{ highIntervalPace1200 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>1600m</p></div>
                                <div class="w-1/4"><p>{{ lowIntervalPace1600 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ intervalPace1600 }}</p></div>
                                <div class="w-1/4"><p>{{ highIntervalPace1600 }}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {pacesMixin} from "../../mixins/pacesMixin";

    export default {
        mixins: [pacesMixin],
        props: ['data'],

        data() {
            return {
            }
        },

        computed: {

        }
    };
</script>

