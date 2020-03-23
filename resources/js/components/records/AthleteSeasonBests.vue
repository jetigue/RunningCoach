<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline">
            <header class="text-primary font-light text-2xl lg:text-3xl">
                {{ gender }} {{ trackEvent }}
            </header>
        </div>
        <div class="table-container">
            <div class="table-header w-full"></div>
            <div v-if="records">
                <div v-for="(record, index) in items" :key="record.id">
                    <div class="flex items-center w-full border-b border-gray-400">
                        <div class="w-1/12 text-center">
                            {{ index + 1 }}
                        </div>
                        <div class="w-11/12">
                            <athlete-season-best :data="record"></athlete-season-best>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="flex flex-col">
                <p class="text-gray-600 p-2">No Records Posted</p>
            </div>
        </div>
    </div>

</template>

<script>
     import Collection from '../../Collection';
     import AthleteSeasonBest from './AthleteSeasonBest';

    export default Collection.extend({
        props: ['data'],

        components: { AthleteSeasonBest },

        data() {
            return {
                trackEvent: this.data[0].event
            }
        },

        computed: {

            gender: function () {
                let s = this.data[0].sex;

                if (s === "f") {
                    return "Girls";
                }
                return "Boys";
            },

            rank: function ordinal_suffix_of() {
                let i = index + 1;

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
        }
    })
</script>

<style scoped>

</style>
