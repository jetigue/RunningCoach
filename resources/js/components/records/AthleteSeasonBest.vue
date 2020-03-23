<template>

<div class="table-body">
    <div class="flex flex-col hover:bg-white">
        <div class="flex flex-col hover:bg-white">
            <div class="flex flex-col p-2 items-center">

                <div class="flex justify-between w-full">
                    <div class="w-3/4 text-lg hover:text-blue-700">
                        <a :href="'/athletes/'+this.data.athlete_id">{{ athlete }}</a>
                        <span class="hidden lg:inline text-gray-400 text-sm">{{ grade }}</span>
                    </div>
                    <div class="w-1/4 text-right lg:text-lg">
                        {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                    </div>
                </div>

                <div class="w-full text-sm">
                    <a class="hover:text-blue-700" :href="'/track/meets/' + this.data.meetSlug">{{ meetName }}</a>
                    <span class="hidden lg:inline text-xs text-gray-400">{{ meetDate | moment("MMM Do") }}</span>
                    <span class="lg:hidden text-xs text-gray-400">{{ meetDate | moment("MMM d") }}</span>
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
                meetDate: this.data.meetDate,
                meetName: this.data.meetName,
                milliseconds: this.data.milliseconds,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
            }
        },

        methods: {

            toggleRow() { this.isExpanded = !this.isExpanded }

        },

        computed: {
            duration: function () {
                let time = this.data.total_seconds;

                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                let ret = "";

                ret += "" + min + ":" + (sec < 10 ? "0" : "");
                ret += "" + sec;

                return ret;
            },

            grade: function () {
                let d = new Date();
                let y = d.getFullYear();
                let g = this.data.gradClass;
                let x = (g - y);


                if (x === 0) {
                    return "Senior";
                }

                 else if (x === 1) {
                    return "Junior";
                }

                 else if (x === 2) {
                    return "Sophomore";
                }

                 else if (x === 3) {
                    return "Freshman";
                }

                 else {
                     return "";
                }
            },

            place_w_suffix: function ordinal_suffix_of() {
                let i = this.place;

                let j = i % 10,
                    k = i % 100;
                if (j === 1 && k !== 11) {
                    return i + "st";
                }
                if (j === 2 && k !== 12) {
                    return i + "nd";
                }
                if (j === 3 && k !== 13) {
                    return i + "rd";
                }
                return i + "th";
            }
        },
    }
</script>
