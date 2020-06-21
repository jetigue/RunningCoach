<template>
    <div class="flex flex-col">
        <div class="table-container">
            <div class="table-header">
                <div class="flex w-11/12 flex-wrap">
                    <div class="w-3/4 md:w-2/5 lg:w-3/5">
                        <p class="text-primary font-semibold">Athlete</p>
                    </div>

                    <div class="w-1/4 md:w-1/5 lg:w-1/5">
                        <p class="text-primary font-semibold">Place</p>
                    </div>

                    <div class="hidden md:flex md:w-1/5 lg:w-1/5">
                        <p class="text-primary font-semibold">Time</p>
                    </div>
                </div>
                <div v-if="isCoach" class="flex justify-end items-center">
                    <create-button title="Add a Result">
                        <new-cross-country-time-trial-race-result
                            @created="add"></new-cross-country-time-trial-race-result>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(result, index) in items" :key="result.id">
                    <cross-country-time-trial-race-result :data="result"
                                                          @deleted="remove(index)">
                    </cross-country-time-trial-race-result>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-gray-700 p-4">No Results Posted</p>
            </div>


        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import CrossCountryTimeTrialRaceResult from './CrossCountryTimeTrialRaceResult';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryTimeTrialRaceResult from '../forms/NewCrossCountryTimeTrialRaceResult';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { CrossCountryTimeTrialRaceResult, CreateButton, NewCrossCountryTimeTrialRaceResult },

        data() {
            return {
            }
        }
    });
</script>
