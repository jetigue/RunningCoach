<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-200">
            <form action="api/steady-runs/id" method="POST" id="editCoolDown" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <header class="text-2xl text-primary font-thin mb-2">Edit the Cool-down</header>
                <div class="mb-2 flex flex-col md:flex-row md:justify-between lg:justify-around">
                    <div class="flex flex-col w-full md:w-1/2 md:mr-2">
                        <div class="flex content-end">
                            <label class="form-label" for="form.coolDownDuration">Duration</label>
                            <span id="durationHelp" class="form-help" v-if="form.errors.has('duration')"
                                  v-text="form.errors.get('duration')">
                        </span>
                            </div>
                            <input class="form-input"
                                   id="form.coolDownDuration"
                                   type="number"
                                   min="1"
                                   v-model="form.duration"
                                   required>
                    </div>

                    <div class="flex flex-col md:flex-row px-4">
                        <div class="flex md:flex-col items-center justify-between md:justify-start">
                            <p class="form-label">Meters</p>
                            <input
                                type="radio"
                                name="duration_unit"
                                value="meters"
                                class="hidden"
                                v-model="form.duration_unit">
                                <a v-if="metersSelected" class="text-2xl" @click="">
                                    <span style="color:green;">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="selectMeters">
                                    <span class="text-2xl" style="color:lightgray;">
                                        <i class="bg-white far fa-square"></i>
                                    </span>
                                </a>
                        </div>
                        <div class="flex md:flex-col items-center justify-between md:justify-start">
                            <p class="form-label">Miles</p>
                            <input
                                type="radio"
                                name="duration_unit"
                                value="miles"
                                class="hidden"
                                v-model="form.duration_unit">
                                <a v-if="milesSelected" class="text-2xl" @click="">
                                    <span style="color:green;">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="selectMiles">
                                    <span class="text-2xl" style="color:lightgray;">
                                        <i class="bg-white far fa-square"></i>
                                    </span>
                                </a>
                        </div>
                        <div class="flex md:flex-col items-center justify-between md:justify-start">
                            <p class="form-label">Minutes</p>
                            <input
                                type="radio"
                                value="minutes"
                                name="duration_unit"
                                class="hidden"
                                v-model="form.duration_unit">
                                <a v-if="minutesSelected" class="text-2xl" @click="">
                                    <span style="color:green;">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="selectMinutes">
                                    <span class="text-2xl" style="color:lightgray;">
                                        <i class="bg-white far fa-square"></i>
                                    </span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <update-button class="mr-4" :disabled="form.errors.any()">
                        Update
                    </update-button>
                    <cancel-button @clicked="resetForm"></cancel-button>
                </div>
            </form>
        </div>

        <div v-else class="w-full py-1 flex flex-col hover:bg-gray-100">
            <div class="flex w-full">
                <div class="w-5/6 flex items-center">
                    <div class="flex md:w-3/4">
                        <p class="px-4  justify-start">
                            <span class="font-bold">{{ length }}</span>
                            at
                            <span class="font-bold">{{ intensity }}</span> pace
                        </p>
                    </div>

                    <div class="hidden md:flex md:w-1/4 justify-around">
                        <div class="">
                            <span v-if="confirmedVarsity" @click="unConfirmVarsity">
                                <i class="text-primary far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmVarsity">
                                <i class="text-primary far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedJuniorVarsity" @click="unConfirmJuniorVarsity">
                                <i class="text-black far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmJuniorVarsity">
                                <i class="text-black far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedOpen" @click="unConfirmOpen">
                                <i class="text-smoke-700 far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmOpen">
                                <i class="text-smoke-700 far fa-square text-xl"></i>
                            </span>
                        </div>

                        <div class="">
                            <span v-if="confirmedBeginner" @click="unConfirmBeginner">
                                <i class="text-green-500 far fa-check-square text-xl"></i>
                            </span>
                            <span v-else @click="confirmBeginner">
                                <i class="text-green-500 far fa-square text-xl"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 flex justify-end">
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
            </div>
        </div>

        <div
            v-if="isExpanded"
            class="flex pl-4 py-2 border-b justify-start cursor-pointer pb-2 hover:bg-gray-100">

            <div class="flex w-2/5">
                <edit-button @clicked="editing=true"></edit-button>
                <delete-button @clicked="destroy"></delete-button>
            </div>

            <div class="flex w-3/5 md:hidden justify-around">
                <div class="">
                    <span v-if="confirmedVarsity" @click="unConfirmVarsity">
                        <i class="text-primary far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmVarsity">
                        <i class="text-primary far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedJuniorVarsity" @click="unConfirmJuniorVarsity">
                        <i class="text-black far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmJuniorVarsity">
                        <i class="text-black far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedOpen" @click="unConfirmOpen">
                        <i class="text-smoke-700 far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmOpen">
                        <i class="text-smoke-700 far fa-square text-xl"></i>
                    </span>
                </div>

                <div class="">
                    <span v-if="confirmedBeginner" @click="unConfirmBeginner">
                        <i class="text-green-500 far fa-check-square text-xl"></i>
                    </span>
                    <span v-else @click="confirmBeginner">
                        <i class="text-green-500 far fa-square text-xl"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {authMixin} from "../../mixins/authMixin";
    import {workoutMixin} from "../../mixins/workoutMixin";

    export default {
        name: "CoolDown",
        mixins: [authMixin, workoutMixin],
        props: ['data'],

        data() {
            return {
                isExpanded: false,
                minutesSelected: false,
                metersSelected: false,
                milesSelected: false,

                editing: false,
                runType: this.data.run_type.name,
                intensity: this.data.intensity.name,
                durationUnit: this.data.duration_unit,
                steadyId: this.data.steady_run_type_id,
                duration: this.data.duration,
                workout: this.data.workout,
                varsity: this.data.varsity,
                junior_varsity: this.data.junior_varsity,
                open: this.data.open,
                beginner: this.data.beginner,
                url: '/api' + location.pathname + '/steady-runs/' + this.data.id,

                confirmedVarsity: this.data.varsity === 'yes',
                confirmedJuniorVarsity: this.data.junior_varsity === 'yes',
                confirmedOpen: this.data.open === 'yes',
                confirmedBeginner: this.data.beginner === 'yes',

                form: new Form({
                    steady_run_type_id: this.data.steady_run_type_id,
                    training_intensity_id: this.data.training_intensity_id,
                    duration: this.data.duration,
                    duration_unit: this.data.duration_unit,
                    workout: this.data.workout
                }),
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch(this.url)
                    .then(data => {
                        this.steady_run_type_id = 1;
                        this.duration = this.form.duration;
                        this.durationUnit = this.form.duration_unit;
                        this.training_intensity_id = 1;
                        this.workout = this.form.workout;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.duration !== this.data.duration ||
                            this.durationUnit !== this.data.duration_unit
                            ) {
                             const toast = Vue.swal.mixin({
                                 toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                 timer: 3000
                             });

                             toast({
                                 type: 'success',
                                 title: 'Cool-down Updated'
                             });

                             Event.$emit('toggleSync');
                         }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            resetForm() {
                this.form.steady_run_type_id = 1
                this.form.duration = this.data.duration
                this.form.training_intensity_id = 1
                this.form.duration_unit = this.data.duration_unit
                this.form.workout = this.data.workout
                this.form.errors.clear();
        },

            destroy() {
                axios.delete('/api' + location.pathname + '/steady-runs/' + this.data.id);

                this.$emit('deleted', this.data.id);

                Event.$emit('toggleSync');
            },
        },
    }

</script>

<style scoped>

</style>
