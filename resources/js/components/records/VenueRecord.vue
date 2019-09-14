<template>

<div class="table-body">
    <div class="flex flex-col hover:bg-white">
        <div class="flex flex-col hover:bg-white">
            <div class="flex flex-col p-2 items-center">
                <div class="flex flex-wrap w-full" :class="{'font-semibold': current}">
                    <div class="w-full md:w-7/12 lg:w-1/4 hover:text-blue-700 order-1 lg:order-none">
                        <a :href="'/athletes/'+this.data.athlete_id">{{ athlete }}</a>
                    </div>
                    <div class="w-5/6 md:w-1/4 lg:w-1/6 order-3 md:order-2 lg:order-none pl-2 md:pl-0">
                        {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                    </div>
                    <div class="hidden lg:block lg:w-1/3 lg:text-sm">
                        {{ meet }}
                    </div>
                    <div class="hidden lg:block lg:w-1/6 lg:text-sm">
                        {{ meetDate | moment("M.DD.YY") }}
                    </div>

                    <div class="hidden lg:block lg:w-1/12 lg:text-sm text-center">
                        {{ place_w_suffix }}
                    </div>

                    <div class="flex w-1/6 lg:hidden justify-end order-3 lg:order-none">
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                </div>
                <div v-if="isExpanded" class="">
                    <div class="flex flex-col pb-4 px-2">
                        <p class="text-gray-600 w-full py-1">Meet:
                            <span class="text-gray-800">
                                {{ meet }}
                            </span>
                        </p>
                        <p class="text-gray-600 w-full py-1">Date:
                            <span class="text-gray-800">
                                {{ meetDate | moment("M.DD.YY") }}
                            </span>
                        </p>
                        <p class="text-gray-600 w-full py-1">Place:
                            <span class="text-gray-800">
                                 {{ place_w_suffix }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>


    export default {

        props: ['data'],

        data() {
            return {
                isExpanded: false,

                athlete: this.data.firstName + ' ' + this.data.lastName,
                meet: this.data.meet,
                total_seconds: this.data.total_seconds,
                place: this.data.place,
                meetDate: this.data.date,
                milliseconds: this.data.milliseconds,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
            }
        },

        methods: {

            toggleRow() { this.isExpanded = !this.isExpanded }

        },

        computed: {
            current: function() {
                let d = new Date();
                let n = d.getFullYear();
                let x = this.meetDate;
                let y = new Date(x);
                let z = y.getFullYear();

                if(n === z) {
                    return true;
                }
            },

            duration: function () {
                let time = this.total_seconds;

                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                let ret = "";

                ret += "" + min + ":" + (sec < 10 ? "0" : "");
                ret += "" + sec;

                return ret;
            },

            place_w_suffix: function ordinal_suffix_of() {
                let i = this.place;

                let j = i % 10,
                    k = i % 100;
                if (j == 1 && k != 11) {
                    return i + "st";
                }
                if (j == 2 && k != 12) {
                    return i + "nd";
                }
                if (j == 3 && k != 13) {
                    return i + "rd";
                }
                return i + "th";
            }
        },
    }
</script>
