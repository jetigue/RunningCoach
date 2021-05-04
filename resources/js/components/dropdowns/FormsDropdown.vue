<template>
    <div @mouseover="active = true"
         @mouseout="active = false">
        <div class="block uppercase text-gray-200 hover:text-white">
            <p>Forms</p>
        </div>

        <portal to="forms-menu">
            <div v-show="active"
                 @mouseover="active = true"
                 @mouseout="active = false"
                 class="absolute w-full z-10 bg-white h-56 max-h-100 border-b-2 border-gray-200">


                <div class="flex flex-col flex-wrap h-full lg:w-3/4 mx-auto md:p-2">

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">General Information</p>
                        <a class="text-sm" href="/forms/information/Information_Packet_2020.pdf">
                            2020 Information Packet
                        </a>
                    </div>

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">Longhorn 5k</p>
                        <a class="text-sm" href="https://runsignup.com/Race/GA/Suwanee/Longhorn5K">
                            2019 Online Registration
                        </a>
                        <a class="text-sm" href="/forms/longhorn5k/Longhorn5kRegistration2019.pdf">
                            2019 Registration Form
                        </a>
                    </div>

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">Physical Forms</p>
                        <a class="text-sm" href="/forms/physical/GHSA-PPE-4.pdf">
                            Physical Evaluation Form
                        </a>
                        <a class="text-sm" href="/forms/physical/participation_form.pdf">
                            Participation Form
                        </a>
                        <a class="text-sm" href="/forms/physical/GHSA-Concussion-Awareness-Form_Rev-2015.pdf">
                            Concussion Form
                        </a>
                    </div>

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">Schedules</p>
                        <a class="text-sm" href="/forms/schedules/MeetSchedule2019.pdf">
                            2019 Meet Schedule
                        </a>
                    </div>

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">Spirit Wear</p>
                        <a class="text-sm" href="/forms/spiritwear/SpiritWearFlyer2020.pdf">
                            2020 Spirit Wear Flyer
                        </a>
                        <a class="text-sm" href="/forms/spiritwear/OrderForm2020.pdf">
                            2020 Spirit Wear Order Form
                        </a>
                    </div>

                    <div class="flex flex-col p-2">
                        <p class="text-primary font-semibold">Sponsorships</p>
                        <a class="text-sm" href="/forms/sponsors/SponsorshipForm2019.pdf">
                            2019 Sponsorship Form
                        </a>
                    </div>

                </div>


            </div>
        </portal>
    </div>

</template>

<script>
    export default {
        name: "FormsDropdown",

        data() {
            return { active: false };
        }
    }
</script>

<style scoped>

</style>
