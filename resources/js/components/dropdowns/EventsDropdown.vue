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
                 class="absolute w-full z-10 h-48 bg-white">

                <div class="flex w-full h-full justify-center text-xs lg:text-sm">
                    <div class="river-run flex md:w-1/3 lg:w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/river-run">
                            Lambert River Run
                        </a>
                    </div>
                    <div class="longhorn-5k flex md:w-1/3 lg:w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/longhorn-5k">
                            Longhorn 5k
                        </a>

                    </div>
                    <div class="team-camp flex md:w-1/3 lg:w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/team-camp">
                            Team Camp
                        </a>
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
