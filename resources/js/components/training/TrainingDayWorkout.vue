<template>
    <div>
        <div v-if="editing" class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">
            <div class="relative bg-white w-full md:w-1/2 lg:w-1/3 max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                <header class="border-b-2 border-primary flex justify-between items-center">
                    <div>
                        <p class="font-thin text-2xl text-black">
                            Edit the Workout
                        </p>
                    </div>
                    <button type="button" aria-label="close" @click="close">
                        <i class="fas fa-times text-xl text-gray-700"></i>
                    </button>
                </header>
                <section class="my-3 p-4 bg-gray-200 rounded-lg">
                    <form action="api/training-calendar/data/workouts/id"
                          method="POST"
                          id="editWorkout"
                          @submit.prevent="update"
                          @keydown="form.errors.clear()"
                          class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">

                        <div class="mb-2">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.name">Name</label>
                                <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                                    v-text="form.errors.get('name')">
                                </span>
                            </div>
                            <input class="form-input"
                                    id="form.name"
                                    type="text"
                                    v-model="form.name">
                        </div>

                        <div class="mb-2">
                            <div class="flex justify-between content-end">
                                <label class="form-label">Training Group</label>
                                <span id="trainingGroupHelp"
                                      class="form-help"
                                      v-if="form.errors.has('training_group_id')"
                                      v-text="form.errors.get('training_group_id')">
                                </span>
                            </div>
                            <select class="form-input"
                                    name="training_group_id"
                                    v-model="form.training_group_id"
                                    required>
                                <option v-for="trainingGroup in trainingGroups" :key="trainingGroup.id" :value="trainingGroup.id">
                                    {{ trainingGroup.name }}
                                </option>
                            </select>
                        </div>
                            <div class="flex items-center justify-end">
                                <update-button class="mr-4" :disabled="form.errors.any()">
                                    Update
                                </update-button>
                                <cancel-button @clicked="resetForm"></cancel-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div v-else class="text-center font-semibold py-1">
                <div v-if="isCoach">
                    <div :style="{color: groupColor}">
                        <div class="w-full cursor-pointer"
                             @click="toggleRow">
                            {{ name }}
                        </div>
                    </div>
                </div>
                <div v-else class="flex w-full">
                    <p class="w-full" :style="{color: groupColor}">{{ name }}</p>
                </div>
                <div v-if="isExpanded"
                    class="flex pl-4 py-2 border-b justify-end cursor-pointer pb-2 hover:bg-gray-100">
                    <div class="flex text-sm">
                        <edit-button @clicked="getNames"></edit-button>
                        <delete-button @clicked="destroy"></delete-button>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";

    export default {
        name: "TrainingDayWorkout",
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                isExpanded: false,
                editing: false,

                name: this.data.name,
                trainingGroup: this.data.training_group.name,
                groupId: this.data.training_group_id,

                form: new Form({
                    training_group_id: this.data.training_group_id,
                    name: this.data.name,
                }),

                trainingGroups: []
            }
        },

        computed: {
            groupColor() {
                let x = this.data.trainingGroup;

                if (x === 'Crimson') {
                    return "#73000a";
                } else if (x === 'Black') {
                    return "#000";
                } else if (x === 'White') {
                    return "#888";
                } else if (x === 'Green') {
                    return "#008000";
                } else {
                    return "#444";
                }
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            close() {
                this.resetForm();
                this.editing = false
            },

            update() {
                this.form
                    .patch('/api' + location.pathname + '/workouts/' + this.data.id)
                    .then(data => {
                        this.trainingGroup = this.trainingGroups.find(trainingGroups => trainingGroups.id === this.form.training_group_id).name;
                        this.name = this.form.name

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.name !== this.data.name ||
                            this.groupId !== this.data.training_group_id
                            ) {
                             const toast = Vue.swal.mixin({
                                 toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                 timer: 3000
                             });

                             toast({
                                 type: 'success',
                                 title: 'Workout Updated'
                             });
                         }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },

            resetForm() {
                this.form.training_group_id = this.data.training_group_id
                this.form.name = this.data.name
                this.isExpanded = false
                this.form.errors.clear();

            },

            destroy() {
                axios.delete('/api' + location.pathname + '/workouts/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            getNames() {
                this.editing = true;

                axios.get('/api/training-groups')
                    .then(response => {
                        this.trainingGroups = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        }
    }

</script>

<style scoped>

</style>
