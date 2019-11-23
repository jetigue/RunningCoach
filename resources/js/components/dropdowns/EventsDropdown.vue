<template>
    <div @mouseover="active = true"
         @mouseout="active = false">
        <div class="block uppercase text-gray-200 hover:text-white">
            <p>Our Events</p>
        </div>

        <portal to="events-menu">
            <div v-show="active"
                 @mouseover="active = true"
                 @mouseout="active = false"
                 class="absolute w-full z-10 bg-white h-64 max-h-100 border-b-2 border-gray-200">

                <div class="flex flex-wrap h-full lg:w-3/4 mx-auto md:p-2">
                    <div class="w-1/4"></div>
                    <div class="flex flex-col w-1/4 p-2">
                        <p class="text-xl text-primary font-semibold">Our Events</p>
                        <a class="pl-2" href="/longhorn-5k">Longhorn 5k</a>
                        <a class="pl-2" href="/team-camp">Team Camp</a>
                    </div>
                    <div class="flex flex-col w-1/4 p-2">

                    </div>
                    <div class="our-events-menu flex w-1/4 h-full justify-center uppercase py-4">
                    </div>
                </div>

            </div>
        </portal>
    </div>

</template>

<script>
    export default {
        name: "EventsDropdown",

        data() {
            return { active: false };
        }
    }
</script>

<style scoped>

    .button {
        background-color: #660000;
        border: 1px solid #ffffff;
        color: #ffffff;
        padding: .2rem .5rem;
        border-radius: 9999px;
    }

    .button:hover {
        background-color: #800000;
    }

</style>
