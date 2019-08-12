<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Cross Country Meets</header>
            <filter-button class="">
            </filter-button>
        </div>
        <div class="table-container">

            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="md:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>

                    <div class="hidden lg:flex lg:1/2">
                        <p class="text-primary font-semibold">Date</p>
                    </div>
                </div>

                <div class="">
                    <create-button title="Add a Track Meet">
                        <new-cross-country-meet @created="add"></new-cross-country-meet>
                    </create-button>
                </div>
            </div>

            <div v-if="records">
                <div v-for="(trackMeet, index) in items" :key="trackMeet.id">
                    <cross-country-meet :data="trackMeet" @deleted="remove(index)"></cross-country-meet>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Meets Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import CrossCountryMeet from './CrossCountryMeet';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryMeet from '../forms/NewCrossCountryMeet';

    export default Collection.extend({
        props: ['data'],

        components: { CrossCountryMeet, CreateButton, NewCrossCountryMeet },

        data() {
            return {

            }
        }
    });
</script>
