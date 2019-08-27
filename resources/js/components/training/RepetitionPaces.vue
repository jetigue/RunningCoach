<template>
    <section class="flex flex-wrap">
        <div class="flex-col w-full">
            <header class="text-xl text-primary">
                Repetition Pace
            </header>

            <div class="">
                <div class="table-header-no-border">
                    <div class="flex w-full">
                        <div class="w-1/4">
                            <p class="text-primary font-semibold text-center">Distance</p>
                        </div>
                        <div class="px-4 md:px-12 w-3/4 py-1">
                            <div class="grad py-1 w-full rounded-full"></div>
                        </div>
                    </div>
                </div>
                <div class="table-body-no-border">
                    <div class="flex flex-col border-b border-gray-100">
                        <div class="flex flex-col">
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>200m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace200 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace200 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace200 }}</p></div>
                            </div>
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>300m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace300 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace300 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace300 }}</p></div>
                            </div>
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>400m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace400 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace400 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace400 }}</p></div>
                            </div>
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>500m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace500 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace500 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace500 }}</p></div>
                            </div>
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>600m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace600 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace600 }}</p></div>
                                <div class="w-1/4"><p>{{ highRepPace600 }}</p></div>
                            </div>
                            <div class="flex p-2 items-center hover:bg-gray-100 text-center">
                                <div class="w-1/4"><p>800m</p></div>
                                <div class="w-1/4"><p>{{ lowRepPace800 }}</p></div>
                                <div class="w-1/4"><p>{{ repPace800 }}</p></div>
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
    import Collection from '../../Collection';

    export default Collection.extend({
        mixins: [pacesMixin],
        props: ['data'],

        data() {
            return {
                totals_seconds: this.data
            }
        },

        computed: {

        }
    });
</script>

