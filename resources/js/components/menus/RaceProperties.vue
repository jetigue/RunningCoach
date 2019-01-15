<template>
    <div class="w-full border-b border-color-grey-lighter">
        <div class="flex justify-between items-center" 
            @click="toggleMenu">
            <p class="text-grey-darker mb-1 text-xl">Race</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-grey-dark"></i>
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
                    url:   '/divisions'
                },
                { 
                    id: 2,
                    label: 'Events',
                    url: '/events'
                },
                { 
                    id: 3,
                    label: 'Genders',
                    url: '/genders'
                }
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