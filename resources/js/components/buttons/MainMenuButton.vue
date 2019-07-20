<template>
    <div>
        <div>
            <button class="fas fa-bars text-2xl text-gray-100 py-3 px-2" @click="active=true"></button>
        </div>

        <portal to="main-menu">
            <div v-show="active"
                 class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">

                <div class="flex flex-col crimson-carbon-fiber w-full md:w-1/2 md:mx-auto h-auto">

                    <div class="flex p-4 justify-between">
                        <div class="text-white">
                            <a href="/">Home</a>
                        </div>
                        <button type="button" aria-label="close" @click="close">
                            <i class="fas fa-times text-xl text-white"></i>
                        </button>
                    </div>

                    <div class="w-full mx-auto">
                        <header class="flex items-start justify-between">
                            <p class="text-3xl font-hairline text-white pl-6 pt-1">
                                Main Menu
                            </p>
                        </header>
                        <div class="flex flex-col items-start text-white">
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
            },
        }
    }
</script>

<style scoped>

</style>
