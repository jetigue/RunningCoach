<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="text-gray-800 font-light text-2xl lg:text-3xl mb-3">Time Trial Races</header>
        </div>
        <div class="table-container">
            <div class="table-header">
                <div class="flex justify-between w-full">
                    <div class="flex md:w-11/12 flex-wrap">
                        <div class="w-full md:w-2/3 lg:w-2/5">
                            <p class="text-primary font-semibold">Gender</p>
                        </div>
                        <div class="hidden md:block md:w-1/6 lg:w-1/5 pl-2 md:text-center md:pl-0">
                            <p class="text-primary font-semibold">Event</p>
                        </div>
                    </div>

                    <div v-if="isCoach" class="text-right">
                        <create-button title="Add a Team Result">
                            <new-cross-country-time-trial-race @created="add"></new-cross-country-time-trial-race>
                        </create-button>
                    </div>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(race, index) in items" :key="race.id">
                    <cross-country-time-trial-race :data="race" @deleted="remove(index)"></cross-country-time-trial-race>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-smoke-700 p-4">No Races Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin}from '../../mixins/authMixin';
    import Collection from '../../Collection';
    import CrossCountryTimeTrialRace from './CrossCountryTimeTrialRace';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryTimeTrialRace from '../forms/NewCrossCountryTimeTrialRace';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { CrossCountryTimeTrialRace, CreateButton, NewCrossCountryTimeTrialRace },

        data() {
            return {
                filters: []
            }
        }
    });
</script>
