<template>
    <div>
        <div class="text-primary font-bold text-xl">
            {{duration }}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
        </div>
        <div class="text-smoke-800 font-bold text-lg">
            <a :href="athleteURL">{{ athlete }}</a> <span class="text-gray-400 font-normal">{{ grade }}</span>
        </div>

        <div class="text-gray-700 text-sm">
            {{ meet }} <span class="text-gray-400 font-normal">{{ date | moment("MMM Do") }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EventBestTime",

        props: ['data'],

        data() {
            return {
                athlete: this.data.firstName + ' ' + this.data.lastName,
                total_seconds: this.data.total_seconds,
                milliseconds: this.data.milliseconds,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
                meet: this.data.meetName,
                date: this.data.meetDate,
                gradClass: this.data.gradClass,
                athleteURL: '/athletes/' + this.data.athleteID
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
            }
        },
    }


</script>

<style scoped>

</style>
