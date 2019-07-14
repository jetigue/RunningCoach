<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white mb-1 text-2xl md:text-base lg:text-xl">Our Events</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-secondary text-sm md:text-xs lg:text-sm"></i>
        </div>
        <ul>
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

import MenuItem from './MenuItem';

export default {
    name: "OurEventsMenu",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                { 
                    id: 1,
                    label: 'Longhorn 5k',
                    url: '/longhorn-5k'
                },
                {
                    id: 2,
                    label: 'Lambert River Run',
                    url: '/river-run'
                },                {
                    id: 3,
                    label: 'Team Camp',
                    url: '/team-camp'
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