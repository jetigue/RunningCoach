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
                 class="absolute w-full z-10 bg-white" style="height: 200px">


                <div class="flex w-full h-full justify-center text-xs lg:text-sm">
                    <div class="boys-state-2018 flex w-1/5 h-full items-end justify-center uppercase py-4">
                        <a class="button"
                           href="/cross-country-meets">
                            Cross country
                        </a>
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
