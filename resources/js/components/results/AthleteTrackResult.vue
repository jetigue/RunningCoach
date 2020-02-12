<template>
    <div>
        <div class="table-body">
            <div class="flex flex-col border-b border-gray-100 hover:bg-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex p-2 items-center">
                        <div class="text-black flex flex-wrap w-full text-sm md:text-base">
                            <div class="w-full text-gray-600 lg:w-1/6 lg:text-black">
                                {{ meet_date | moment("MMM DD, YYYY")}}
                            </div>
                            <div class="w-full md:w-1/2 lg:w-1/3">
                                <a :href="meetUrl">
                                    {{ meet_name }}
                                </a>
                            </div>
                            <div class="w-full lg:w-1/6 md:order-last lg:order-none">
                                <span class="pl-2 text-gray-600 lg:hidden">Division: </span>
                                <a :href="meetUrl+'/races/'+this.raceId">
                                    {{ level }}
                                    <span class="text-gray-600">{{ event }} </span>
                                </a>

                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/6 md:text-center">
                                <span class="pl-2 text-gray-600 md:hidden">Place: </span>
                                {{ place_w_suffix }}
                            </div>

                            <div class="w-full md:w-1/4 lg:w-1/6 md:text-center">
                                <span class="pl-2 text-gray-600 md:hidden">Time: </span>
                                {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";

    export default {
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,
                id: this.data.id,
                meet_date: this.data.date,
                meet_name: this.data.name,
                level: this.data.level,
                event: this.data.event,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
                milliseconds: this.data.milliseconds,
                place: this.data.place,
                total_seconds: this.data.total_seconds,
                meetUrl: '/track/meets/' + this.data.slug,
                raceId: this.data.raceId

            }
        },

        computed: {
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

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },
        }
    }
</script>
