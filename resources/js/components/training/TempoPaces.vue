<template>
    <section class="flex flex-wrap">
        <div class="flex-col w-full">
            <header class="text-xl text-primary">
                Tempo Pace
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
                                <div class="w-1/4"><p>{{ lowTempoPace400 }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ tempoPace400 }}</p></div>
                                <div class="w-1/4"><p>{{ highTempoPace400 }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>1000m</p></div>
                                <div class="w-1/4"><p>{{ lowTempoPace }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ tempoPace }}</p></div>
                                <div class="w-1/4"><p>{{ highTempoPace }}</p></div>
                            </div>
                            <div class="flex p-1 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>1 Mile</p></div>
                                <div class="w-1/4"><p>{{ lowTempoPace1mile }}</p></div>
                                <div class="w-1/4 font-semibold"><p>{{ tempoPace1mile }}</p></div>
                                <div class="w-1/4"><p>{{ highTempoPace1mile }}</p></div>
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
