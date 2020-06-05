<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/training-phases/id"
                      method="POST" id="editTrainingPhase"
                      @submit.prevent="update"
                      @keydown="form.errors.clear()"
                      class="bg-blue-lighter shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-2">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.name">
                                Name
                            </label>
                            <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                                    v-text="form.errors.get('name')">
                            </span>
                        </div>
                        <input class="form-input" id="form.name" type="text" v-model="form.name">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.name">Description</label>
                            <span id="descriptionHelp" class="form-help" v-if="form.errors.has('description')"
                                  v-text="form.errors.get('description')">
                            </span>
                        </div>
                        <textarea class="form-input"
                               id="form.description"
                               type="textarea"
                                  v-model="form.description"></textarea>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Training Period</label>
                            <span id="periodHelp" class="form-help" v-if="form.errors.has('training_period_id')"
                                  v-text="form.errors.get('training_period_id')">
                            </span>
                        </div>
                        <select class="form-input" name="training_period_id" v-model="form.training_period_id" required>
                            <option v-for="period in periods" :key="period.id" :value="period.id">
                                {{ period.name }}
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
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-blue-lightest hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-11/12 flex-wrap">
                            <div class="text-smoke-800 w-full lg:w-1/3">
                                {{ name }}
                            </div>
                            <div class="text-smoke-800 hidden lg:flex lg:w-2/3">
                                {{ description }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4 font-semibold">

                            <p class="lg:hidden text-grey w-full py-1">Description:
                                <span class="text-tertiary font-normal">{{ description }}</span>
                            </p>
                            <p class="text-grey w-full py-1">Training Period:
                                <span class="text-tertiary font-normal">{{ period }}</span>
                            </p>
                            <div class="flex justify-start cursor-pointer pt-4">
                                <edit-button @clicked="getNames"></edit-button>
                                <delete-button @clicked="destroy"></delete-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                name: this.data.name,
                description: this.data.description,
                period: this.data.training_period.name,

                form: new Form({
                    name: this.data.name,
                    description: this.data.description,
                    training_period_id: this.data.training_period_id,
                }),

                periods: []
            }
        },

        methods: {

            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/training-phases/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.description = this.form.description;
                        this.periods.find(period => period.id === this.form.training_period_id).name;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.name !== this.data.name ||
                            this.description !== this.data.description ||
                            this.training_period_id !== this.data.training_period_id
                        ) {

                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Training Period Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/training-phases/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name,
                this.form.description = this.description,
                this.form.training_period_id = this.training_period_id
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                axios.get('/api/training-periods')
                    .then(response => {
                        this.periods = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })

            }
        }
    }
</script>
