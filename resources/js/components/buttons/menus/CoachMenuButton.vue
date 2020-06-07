<template>
    <div>
        <div>
            <button class="fas fa-bars text-2xl text-gray-100 py-3 px-2" @click="active=true"></button>
        </div>

        <portal to="coach-menu">
            <div v-show="active"
                 class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">

                <div class="flex flex-col text-white crimson-carbon-fiber w-full md:w-1/2 md:mx-auto h-auto">

                    <menu-header @closeMenu="close"></menu-header>

                    <div class="px-8 py-2">
                        <main-menu></main-menu>
                        <coach-menu class="py-2"></coach-menu>
                        <running-log-menu></running-log-menu>
                        <workouts-menu class="py-2"></workouts-menu>
                    </div>
                </div>
            </div>
        </portal>
    </div>
</template>

<script>
    import MainMenu from '../../menus/MainMenu';
    import CoachMenu from '../../menus/CoachMenu';
    import RunningLogMenu from "../../menus/runningLog/RunningLogMenu";
    import MenuHeader from "./MenuHeader";
    import WorkoutsMenu from "../../menus/WorkoutsMenu";

    export default {
        name: "CoachMenuButton",

        components: {WorkoutsMenu, MenuHeader, RunningLogMenu, CoachMenu, MainMenu },

        data() {
            return {
                active: false,
                isExpanded: true,
            }
        },

        methods: {
            close() {
                this.active=false
            },

            toggleMain() {
                this.isExpanded = !this.isExpanded
            }
        }
    }
</script>

<style scoped>

</style>
