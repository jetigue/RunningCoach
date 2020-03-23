<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="text-gray-800 font-light text-2xl lg:text-3xl mb-3">Fastest 50 Longhorns</header>
        </div>
        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full">
                    <div class="flex w-full">
                        <div class="hidden md:block md:w-1/6 lg:w-1/12">
                            <p class="text-primary font-semibold">Rank</p>
                        </div>
                        <div class="flex w-11/12">
                            <div class="hidden md:block md:w-7/12 lg:w-1/4">
                                <p class="text-primary font-semibold">Athlete</p>
                            </div>
                            <div class="hidden md:block md:w-1/4 lg:w-1/6">
                                <p class="text-primary font-semibold">Time</p>
                            </div>
                            <div class="hidden lg:block lg:w-1/3">
                                <p class="text-primary font-semibold">Meet</p>
                            </div>
                            <div class="hidden lg:block lg:w-1/6">
                                <p class="text-primary font-semibold">Date</p>
                            </div>

                            <div class="hidden lg:block lg:w-1/12 text-center">
                                <p class="text-primary font-semibold">Place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="records">
                <div v-for="(record, index) in items" :key="record.id">
                    <div class="flex items-center w-full border-b border-gray-400">
                        <div class="w-1/6 lg:w-1/12 pl-5">
                            {{ index + 1 }}
                        </div>
                        <div class="w-11/12">
                            <venue-record :data="record"></venue-record>
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
    import VenueRecord from './VenueRecord';

    export default Collection.extend({
        props: ['data'],

        components: { VenueRecord },

        data() {
            return {

            }
        },
        computed: {
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
        },


    });
</script>
