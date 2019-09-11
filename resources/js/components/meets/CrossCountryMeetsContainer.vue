<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between items-baseline border-b-2 border-primary">
            <header class="font-light text-2xl lg:text-3xl pb-1 text-primary">Cross Country Meets</header>
            <div v-if="isCoach" class="flex px-2">
                <create-button title="Add a Cross Country Meet">
                    <new-cross-country-meet @created="add"></new-cross-country-meet>
                </create-button>
            </div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import Collection from '../../Collection';
    import CreateButton from '../buttons/CreateButton';
    import NewCrossCountryMeet from '../forms/NewCrossCountryMeet';
    export default Collection.extend({
        name: "CrossCountryMeetsContainer",
        mixins: [authMixin],
        components: { CreateButton, NewCrossCountryMeet },
    });
</script>

<style scoped>

</style>
