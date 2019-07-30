<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Our Team</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-white text-sm lg:text-sm"></i>
        </div>
        <ul class="px-2">
            <menu-item
                    v-show="isExpanded"
                    v-for="item in items"
                    :key="item.id"
                    class="flex content-start">
                <a :href="item.url">{{ item.label }}</a>
            </menu-item>
        </ul>

    </div>
</template>

<script>

import MenuItem from '../MenuItem';

export default {
    name: "OurTeamMenu",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                {
                    id: 1,
                    label: 'Coaches',
                    url: '/coaches'
                },
                {
                    id: 2,
                    label: 'Boys\' Roster',
                    url: '/boys-roster'
                },                {
                    id: 3,
                    label: 'Girls\' Roster',
                    url: '/girls-roster'
                },                {
                    id: 4,
                    label: 'Booster Club',
                    url: '/booster-club'
                },                {
                    id: 5,
                    label: 'Sponsors',
                    url: '/sponsors'
                },

            ]
        }
    },

    methods: {
        toggleMenu() {
            this.isExpanded = !this.isExpanded
        }
    }
}
</script>
