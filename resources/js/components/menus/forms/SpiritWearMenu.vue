<template>
    <div class="">
        <div class="flex justify-between items-center" @click="toggleMenu">
            <p class="flex mb-1 md:text-base lg:text-xl text-lg pl-4">Spirit Wear</p>
            <i :class="{ 'fas fa-plus': !isExpanded, 'fas fa-minus': isExpanded }"
                class="text-secondary text-sm md:text-xs lg:text-sm"></i>
        </div>
        <ul>
            <menu-item
                    v-show="isExpanded"
                    v-for="item in items"
                    :key="item.id"
                    class="flex content-start pl-4">
                <a :href="item.url">{{ item.label }}</a>
            </menu-item>
        </ul>

    </div>
</template>

<script>

import MenuItem from '../MenuItem';

export default {
    name: "SpiritWearMenu",

    components: { MenuItem },

    data() {
        return {
            isExpanded: false,

            items: [
                {
                    id: 1,
                    label: '2019 Spirit Wear Flyer',
                    url: '/forms/spiritwear/SpiritWearFlyer2019.pdf'
                },
                {
                    id: 2,
                    label: ' 2019 Spirit Wear Order form',
                    url: '/forms/spiritwear/OrderForm2019.pdf'
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
