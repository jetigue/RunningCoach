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
                 class="absolute w-full z-10 bg-white h-64 max-h-100 shadow">

                <div class="flex flex-wrap h-full lg:w-3/4 mx-auto md:p-2">
                    <div class="our-team-menu flex w-1/4 h-full justify-center uppercase py-4">
                    </div>
                    <div class="flex flex-col w-1/4 p-2">
                        <p class="text-xl text-primary font-semibold">Coaches</p>
                        <a class="pl-2" href="#">Coach Tigue</a>
                        <a class="pl-2" href="#">Coach Leonard</a>
                        <a class="pl-2" href="#">Coach McCormick</a>
                        <a class="pl-2" href="#">Coach Shroyer</a>
                        <a class="pl-2" href="#">Coach Langley</a>
                    </div>
                    <div class="flex flex-col w-1/4 p-2">
                        <p class="text-xl text-primary font-semibold">Rosters</p>
                        <a class="pl-2" href="/boys-roster">Boys' Roster</a>
                        <a class="pl-2" href="/girls-roster">Girls' Roster</a>
                    </div>
                    <div class="flex flex-col w-1/4 p-2">
                        <p class="text-xl text-primary font-semibold">Our Supporters</p>
                        <a class="pl-2" href="/booster-club">Booster Club</a>
                        <a class="pl-2" href="/sponsors">Sponsors</a>
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
