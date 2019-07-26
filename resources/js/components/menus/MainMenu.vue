<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Main Menu</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-white text-sm"></i>
        </div>
        <ul v-show="isExpanded" class="pl-4">
            <our-team-menu></our-team-menu>
            <our-events-menu></our-events-menu>
            <forms-menu></forms-menu>
        </ul>

    </div>
</template>

<script>

import MenuItem from './MenuItem';
import OurTeamMenu from './main/OurTeamMenu';
import OurEventsMenu from './main/OurEventsMenu';
import FormsMenu from './main/FormsMenu';


export default {
    name: "MainMenu",

    components: {
        FormsMenu,
        OurEventsMenu,
        OurTeamMenu,
        MenuItem,

    },

    data() {
        return {
            isExpanded: true,
        }
    },

    methods: {
        toggleMenu() {
            this.isExpanded = !this.isExpanded
        }
    }
}
</script>
