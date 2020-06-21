<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Cross Country Time Trials</header>
        </div>
        <div class="table-container">

            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="text-black w-full md:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>

                <div v-if="isCoach" class="">
                    <create-button title="Add a Time Trial">
                        <new-cross-country-time-trial @created="add"></new-cross-country-time-trial>
                    </create-button>
                </div>
            </div>

            <div v-if="records">
                <div v-for="(timeTrial, index) in items" :key="timeTrial.id">
                    <cross-country-time-trial :data="timeTrial" @deleted="remove(index)"></cross-country-time-trial>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Time Trials Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import CrossCountryTimeTrial from './CrossCountryTimeTrial';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryTimeTrial from '../forms/NewCrossCountryTimeTrial';

    export default Collection.extend({
        props: ['data'],
        mixins: [authMixin],

        components: { CrossCountryTimeTrial, CreateButton, NewCrossCountryTimeTrial },

        data() {
            return {

            }
        }
    });
</script>
