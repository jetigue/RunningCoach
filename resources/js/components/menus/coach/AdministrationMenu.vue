<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex text-white text-2xl">Administration</p>
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
    name: "AdministrationMenu",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                {
                    id: 1,
                    label: 'Announcements',
                    url: '/announcements'
                },
                {
                    id: 2,
                    label: 'Team Events',
                    url: '/team-events'
                },
                {
                    id: 3,
                    label: 'Physicals',
                    url: '/physicals'
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
