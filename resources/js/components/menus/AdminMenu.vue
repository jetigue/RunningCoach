<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Admin Menu</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-white text-sm"></i>
        </div>
        <ul v-show="isExpanded" class="pl-4">
            <user-menu></user-menu>
        </ul>

    </div>
</template>

<script>

import MenuItem from './MenuItem';
import UserMenu from './admin/UserMenu';

export default {
    name: "AdminMenu",

    components: { UserMenu, MenuItem },

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
