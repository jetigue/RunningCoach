<template>
    <div>
        <div>
            <button class="fas fa-bars text-2xl text-gray-100 py-3 px-2" @click="active=true"></button>
        </div>

        <portal to="admin-menu">
            <div v-show="active"
                 class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">

                <div class="flex flex-col text-white crimson-carbon-fiber w-full md:w-1/2 md:mx-auto h-auto">

                    <menu-header @closeMenu="close"></menu-header>

                    <div class="px-8 py-2">
                        <main-menu></main-menu>
                        <admin-menu class="py-2"></admin-menu>
                        <coach-menu></coach-menu>
                        <workouts-menu class="py-2"></workouts-menu>
                    </div>
                </div>
            </div>
        </portal>
    </div>
</template>

<script>
    import MainMenu from '../../menus/MainMenu';
    import AdminMenu from '../../menus/AdminMenu';
    import CoachMenu from "../../menus/CoachMenu";
    import MenuHeader from "./MenuHeader";
    import WorkoutsMenu from "../../menus/WorkoutsMenu";

    export default {
        name: "AdminMenuButton",

        components: {WorkoutsMenu, MenuHeader, CoachMenu, AdminMenu, MainMenu },

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
