<template>
    <section class="flex flex-wrap">
        <div class="flex-col w-full">
            <header class="text-xl text-primary">
                Repetition Pace
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
                                <div class="w-1/4"><p>200m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace200 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace200 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace200 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>300m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace300 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace300 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace300 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>400m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace400 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace400 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace400 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>500m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace500 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace500 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace500 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>600m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace600 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace600 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace600 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>800m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace800 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ repPace800 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace800 }}</p></div>
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

