<template>
    <div class="flex flex-col">
        <div class="text-xl text-gray-700 italic">
            <slot></slot>
        </div>
        <div class="table-container-no-border border-b-2 border-gray-400">
            <div class="table-header-no-border border-b-2 border-gray-400"></div>

            <div v-if="records">
                <div v-for="(meet, index) in items" :key="meet.id">
                    <cross-country-meet :data="meet" @deleted="remove(index)"></cross-country-meet>
                </div>
            </div>

            <div v-else class="flex flex-col">
                <p class="text-gray-600 p-2">No Meets Posted</p>
            </div>

        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import CrossCountryMeet from './CrossCountryMeet';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryMeet from '../forms/NewCrossCountryMeet';

    export default Collection.extend({
        mixins: [authMixin],
        props: ['data'],

        components: { CrossCountryMeet, CreateButton, NewCrossCountryMeet },

        data() {
            return {

            }
        }
    });
</script>
