<template>
    <div @mouseover="active = true"
         @mouseout="active = false">
        <div class="block uppercase text-gray-200 hover:text-white">
            <p>Our Results</p>
        </div>

        <portal to="team-results-menu">
            <div v-show="active"
                 @mouseover="active = true"
                 @mouseout="active = false"
                 class="absolute w-full z-10 bg-white h-64 max-h-100 border-b-2 border-gray-200">


                <div class="flex flex-wrap h-full lg:w-3/4 mx-auto md:p-2">
                    <div class="our-results-menu flex w-1/3 h-full justify-center uppercase py-4">
                    </div>
                    <div class="flex flex-col w-1/3 p-2">
                        <p class="text-xl text-primary font-semibold">Cross Country</p>
                        <a class="pl-2" href="/cross-country/meets">Meet Results</a>
<!--                        <a class="pl-2" href="/cross-country/venues">Venue Records</a>-->
                    </div>
                    <div class="flex flex-col w-1/3 p-2">
                        <p class="text-xl text-primary font-semibold">Track</p>
                        <a class="pl-2" href="/track/meets">Meet Results</a>
                        <a class="pl-2" href="/track/season-bests">Season Bests</a>
                        <a class="pl-2" href="#">School Records (coming soon)</a>
                    </div>
                </div>



            </div>
        </portal>
    </div>

</template>

<script>
    export default {
        name: "ResultsDropdown",

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
