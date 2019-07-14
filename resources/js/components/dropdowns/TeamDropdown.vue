<template>
    <div @mouseover="active = true"
         @mouseout="active = false">
        <div class="block uppercase text-gray-200 hover:text-white">
            <p>Our Team</p>
        </div>

        <portal to="team-menu">
            <div v-show="active"
                 @mouseover="active = true"
                 @mouseout="active = false"
                 class="absolute w-full z-10 bg-white" style="height: 200px">


                <div class="flex w-full h-full md:text-xs lg:text-sm">
                    <div class="coaches flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/coaches">
                            Our Coaches
                        </a>
                    </div>
                    <div class="boys-roster flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/boys-roster">
                            Boys' Roster
                        </a>

                    </div>
                    <div class="girls-roster flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/girls-roster">
                            Girls' Roster
                        </a>
                    </div>
                    <div class="booster-club flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/booster-club">
                            Booster Club
                        </a>
                    </div>
                    <div class="sponsors flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/sponsors">
                            Our Sponsors
                        </a>
                    </div>

                </div>


            </div>
        </portal>
    </div>

</template>

<script>
    export default {
        name: "TeamDropdown",

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