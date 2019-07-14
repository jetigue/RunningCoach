<template>
    <div>
        <div>
            <button class="fas fa-bars text-2xl text-gray-100 py-3 px-2" @click="active=true"></button>
        </div>



        <portal to="main-menu">
            <div v-show="active"
                 class="fixed inset-0 overflow-auto z-50 crimson-carbon-fiber flex">

                <div class="flex flex-col w-full">
                    <div class="">
                        <header class="flex items-start justify-between">
                            <p class="text-4xl font-hairline text-white pl-3 pt-1">
                                Main Menu
                            </p>
                            <div class="flex p-4">
                                <button type="button" aria-label="close" @click="close">
                                    <i class="fas fa-times text-xl text-white"></i>
                                </button>
                            </div>

                        </header>

                        <div class="flex flex-col items-start text-white mt-4">
                            <div class="flex flex-col w-3/4 mx-auto">
                                <our-team-menu class="py-2"></our-team-menu>
                                <our-events-menu class="py-2"></our-events-menu>
                                <forms-menu class="py-2"></forms-menu>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </portal>
    </div>
</template>

<script>
    import FormsMenu from '../menus/FormsMenu';
    import OurTeamMenu from '../menus/OurTeamMenu';
    import OurEventsMenu from '../menus/OurEventsMenu';

    export default {
        name: "MainMenuButton",

        components: { FormsMenu, OurEventsMenu, OurTeamMenu },

        data() {
            return { active: false }
        },

        methods: {
            close() {
                this.active=false
            }
        }
    }
</script>

<style scoped>

</style>