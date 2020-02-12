<template>
    <div class="w-full border-b border-color-grey-lighter">
        <div class="flex justify-between items-center"
            @click="toggleMenu">
            <p class="text-primary mb-1 text-xl md:text-base lg:text-xl">Race</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-secondary text-sm md:text-xs lg:text-sm"></i>
        </div>
        <menu-item
            v-show="isExpanded"
            v-for="item in items"
            :key="item.id"
            class="flex content-start">
            <a :href="item.url">{{ item.label }}</a>
        </menu-item>
    </div>
</template>

<script>

import MenuItem from './MenuItem';

export default {
    name: "GeneralProperties",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                {
                    id: 1,
                    label: 'Divisions',
                    url:   '/levels'
                },
                {
                    id: 2,
                    label: 'Genders',
                    url: '/genders'
                },
                {
                    id: 3,
                    label: 'TimeTrial Events',
                    url: '/track-events'
                },
                {
                    id: 4,
                    label: 'XC Events',
                    url: '/cross-country-events'
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
