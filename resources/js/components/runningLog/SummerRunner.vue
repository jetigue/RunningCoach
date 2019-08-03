<template>
    <div>
        <div class="table-body">
            <div class="flex flex-col border-b border-gray-100 hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex p-1 items-center justify-between">
                        <div class="text-gray-700 flex-wrap w-full">
                            <div class="flex flex-wrap w-full pl-2 pt-1 text-primary">
                                <div class="w-full lg:w-1/3">
                                    {{ name }}
                                </div>
                                <div class="w-1/3 lg:w-1/5 text-gray-800 text-center">
                                    {{ distance }}
                                </div>
                                <div class="w-1/3 lg:w-1/5 text-gray-800 text-center">
                                    {{ average}}
                                </div>
                                <div class="w-1/3 lg:w-1/5 text-gray-800 text-center">
                                    {{ pace}}
                                </div>
                            </div>
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
                firstName: this.data.user.first_name,
                lastName: this.data.user.last_name,
                name: this.data.user.first_name + ' ' + this.data.user.last_name,
                distance: this.data.distance,

            }
        },

        computed: {

            average: function () {
                let ave = this.data.average;

                return Math.round(ave * 10) / 10;
            },

            duration: function () {
                let time = this.data.total_seconds;

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
                let s = this.data.total_seconds;
                let d = this.data.distance;

                let pace = s/d;

                let minutes = Math.floor(pace / 60);
                let seconds = Math.floor(pace % 60);

                let averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

                return averagePace;
            }
        }
    }
</script>
