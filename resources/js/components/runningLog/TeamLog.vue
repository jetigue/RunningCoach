<template>
    <div>
        <div class="table-body">
            <div class="flex flex-col border-b border-gray-100 bg-white">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex p-1 items-center justify-between">
                        <div class="text-gray-700 flex-wrap w-11/12">
                            <div class="flex flex-wrap w-full pl-2 pt-1 text-primary">
                                <div class="w-full lg:w-1/3">
                                    {{ name }}
                                </div>
                                <div class="w-full lg:w-1/6 text-gray-600 pl-2 lg:pl-0">
                                    {{ run_date | moment("MMM DD, YYYY") }}
                                </div>
                                <div class="w-1/3 lg:w-1/6 text-gray-800 lg:text-center">
                                    {{ distance }} <span class="text-xs text-gray-700">miles</span>
                                </div>
                                <div class="w-1/3 lg:w-1/6 text-gray-800 text-center">
                                    {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                                </div>
                                <div class="w-1/3 lg:w-1/6 text-gray-800 text-center">
                                    {{ pace }}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-grow justify-end pr-1">
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-2 px-4 leading-normal">
                            <p class="text-smoke-700 text-sm">Time of Day:
                                <span class="text-smoke-800 font-semibold">
                                    {{ dayTime }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Run Type:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runType }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Terrain Type:
                                <span class="text-smoke-800 font-semibold">
                                    {{ terrainType }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Your Effort:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runEffort }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">How You Felt:
                                <span class="text-smoke-800 font-semibold">
                                    {{ runFeeling }}
                                </span>
                            </p>
                            <p class="text-smoke-700 text-sm">Notes:
                                <span class="text-smoke-800 font-semibold">
                                    {{ notes }}
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
                editing: false,
                isExpanded: false,

                id: this.data.id,
                run_date: this.data.run_date,
                firstName: this.data.user.first_name,
                lastName: this.data.user.last_name,
                name: this.data.user.first_name + ' ' + this.data.user.last_name,
                distance: this.data.distance,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
                milliseconds: this.data.milliseconds,
                totalSeconds: this.data.total_seconds,
                dayTime: this.data.day_time.name,
                runType: this.data.run_type.name,
                terrainType: this.data.terrain_type.name,
                runEffort: this.data.run_effort.name,
                runFeeling: this.data.run_feeling.name,
                notes: this.data.notes
            }
        },

        created() {
            this.fetch();
        },

        computed: {

            duration: function () {
                let time = this.totalSeconds;

                let hrs = ~~(time / 3600);
                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                let ret = "";

                if (hrs > 0) {
                    ret += "" + hrs + ":" + (min < 10 ? "0" : "");
                }

                ret += "" + min + ":" + (sec < 10 ? "0" : "");
                ret += "" + sec;

                return ret;
            },

            pace: function() {
                let s = this.totalSeconds;
                let d = this.distance;

                let pace = s/d;

                let minutes = Math.floor(pace / 60);
                let seconds = Math.floor(pace % 60);

                let averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

                return averagePace;
            },
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `api${location.pathname}?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;
            },
        }
    }
</script>
