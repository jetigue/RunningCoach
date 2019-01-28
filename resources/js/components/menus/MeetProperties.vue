<template>
    <div class="w-full border-b border-color-grey-lighter">
        <div class="flex justify-between items-center" 
            @click="toggleMenu">
            <p class="text-primary mb-1 text-xl md:text-base lg:text-xl">Meet</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-secondary text-sm md:text-xs lg:text-sm"></i>
        </div>
        <menu-item 
            v-show="isExpanded"
            v-for="item in items" 
            :key="item.id"
            class="flex content-start"
            :class="{'text-purple': item.isActive}">
            <a :href="item.url">{{ item.label }}</a>
        </menu-item>
    </div>
</template>

<script>

import MenuItem from './MenuItem';

export default {
    name: "MeetProperties",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                { 
                    id: 1,
                    label: 'Hosts',
                    url:   '/hosts'
                },
                { 
                    id: 2,
                    label: 'Meet Names',
                    url: '/meet-names'
                },
                { 
                    id: 3,
                    label: 'Venues',
                    url: '/venues'
                },
                { 
                    id: 4,
                    label: 'Timing',
                    url: '/timing'
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