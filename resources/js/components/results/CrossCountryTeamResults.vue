<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="text-gray-800 font-light text-2xl lg:text-3xl mb-3">Team Results</header>
        </div>
        <div class="table-container">
            <div class="table-header">
                <div class="flex justify-between w-full">
                    <div class="flex md:w-11/12 flex-wrap">
                        <div class="w-1/3">
                            <p class="text-primary font-semibold">Division</p>
                        </div>
                        <div class="hidden md:flex md:w-1/6">
                            <p class="text-primary font-semibold">Event</p>
                        </div>
                        <div class="hidden md:flex md:w-1/6">
                            <p class="text-primary font-semibold">Place</p>
                        </div>

                        <div class="hidden md:flex md:w-1/6">
                            <p class="text-primary font-semibold">Points</p>
                        </div>
                    </div>

                    <div v-if="isCoach" class="text-right">
                        <create-button title="Add a Team Result">
                            <new-cross-country-team-result @created="add"></new-cross-country-team-result>
                        </create-button>
                    </div>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(teamResult, index) in items" :key="teamResult.id">
                    <cross-country-team-result :data="teamResult" @deleted="remove(index)"></cross-country-team-result>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-smoke-700 p-4">No Team Results Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin}from '../../mixins/authMixin';
    import Collection from '../../Collection';
    import CrossCountryTeamResult from './CrossCountryTeamResult';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryTeamResult from '../forms/NewCrossCountryTeamresult';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { CrossCountryTeamResult, CreateButton, NewCrossCountryTeamResult },

        data() {
            return {
                filters: []
            }
        }
    });
</script>
