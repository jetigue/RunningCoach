<template>
        <div class="flex flex-col items-start">
            <h2 class="flex flex-col font-light text-2xl p-2 text-tertiary">Properties</h2>
            <general-properties class="py-2 px-4"></general-properties>
            <meet-properties class="py-2 px-4"></meet-properties>
            <race-properties class="py-2 px-4"></race-properties>
        </div>
</template>

<script>

import GeneralProperties from '../menus/GeneralProperties';
import MeetProperties from '../menus/MeetProperties';
import RaceProperties from '../menus/RaceProperties';

export default {
    name: "UserMenu",

    components: { GeneralProperties, MeetProperties, RaceProperties },

    data() {
        return {

        }
    },

    methods: {
        close() {
            this.active = false
        },
    }
}
</script>

