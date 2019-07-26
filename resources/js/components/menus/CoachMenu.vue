<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Coach Menu</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-white text-sm"></i>
        </div>
        <ul v-show="isExpanded" class="pl-4">
            <administration-menu></administration-menu>
            <athlete-menu class="py-2"></athlete-menu>
            <running-log-menu></running-log-menu>
        </ul>

    </div>
</template>

<script>

import MenuItem from './MenuItem';
import AdministrationMenu from "./coach/AdministrationMenu";
import RunningLogMenu from "./runningLog/RunningLogMenu";
import AthleteMenu from "./coach/AthleteMenu";

export default {
    name: "CoachMenu",

    components: {AthleteMenu, RunningLogMenu, AdministrationMenu, MenuItem },

    data() {
        return {
            isExpanded: false,
        }
    },

    methods: {
        toggleMenu() {
            this.isExpanded = !this.isExpanded
        }
    }
}
</script>
