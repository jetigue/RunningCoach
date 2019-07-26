<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Forms</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-white text-sm"></i>
        </div>
        <ul v-show="isExpanded" class="pl-2">
            <information-menu></information-menu>
            <longhorn5k-menu></longhorn5k-menu>
            <physical-forms-menu></physical-forms-menu>
            <schedules-menu></schedules-menu>
            <spirit-wear-menu></spirit-wear-menu>
            <sponsors-menu></sponsors-menu>
        </ul>

    </div>
</template>

<script>

import MenuItem from '../MenuItem';
import PhysicalFormsMenu from '../forms/PhysicalFormsMenu';
import SchedulesMenu from '../forms/SchedulesMenu';
import SpiritWearMenu from '../forms/SpiritWearMenu';
import Longhorn5kMenu from '../forms/Longhorn5kMenu';
import SponsorsMenu from '../forms/SponsorsMenu';
import InformationMenu from '../forms/InformationMenu';

export default {
    name: "FormsMenu",

    components: {
        InformationMenu,
        SponsorsMenu,
        Longhorn5kMenu,
        SpiritWearMenu,
        MenuItem,
        PhysicalFormsMenu,
        SchedulesMenu
    },

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
