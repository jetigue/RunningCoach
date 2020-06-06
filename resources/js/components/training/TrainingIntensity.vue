<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/training-intensities/id"
                      method="POST" id="editTrainingIntensity"
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
                            <label class="form-label" for="form.percentVO2Max">
                                Percent VO2Max
                            </label>
                            <span id="percentVO2MaxHelp" class="form-help" v-if="form.errors.has('percentVO2Max')"
                                    v-text="form.errors.get('percentVO2Max')">
                            </span>
                        </div>
                        <input class="form-input" id="form.percentVO2Max" type="text" v-model="form.percentVO2Max">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.percentHRMax">
                                Percent HRMax
                            </label>
                            <span id="percentHRMaxHelp" class="form-help" v-if="form.errors.has('percentHRMax')"
                                    v-text="form.errors.get('percentHRMax')">
                            </span>
                        </div>
                        <input class="form-input" id="form.percentHRMax" type="text" v-model="form.percentHRMax">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.name">Purpose</label>
                            <span id="purposeHelp" class="form-help" v-if="form.errors.has('purpose')"
                                  v-text="form.errors.get('purpose')">
                            </span>
                        </div>
                        <textarea class="form-input"
                               id="form.purpose"
                               type="textarea"
                                  v-model="form.purpose"></textarea>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.sources">
                                Source(s)
                            </label>
                            <span id="sourcesHelp" class="form-help" v-if="form.errors.has('sources')"
                                    v-text="form.errors.get('sources')">
                            </span>
                        </div>
                        <input class="form-input" id="form.sources" type="text" v-model="form.sources">
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
                            <div class="text-smoke-800 hidden lg:flex lg:w-1/3">
                                {{ purpose }}
                            </div>
                            <div class="text-smoke-800 hidden lg:flex lg:w-1/6 justify-center">
                                {{ percentVO2Max }}
                            </div>
                            <div class="text-smoke-800 hidden lg:flex lg:w-1/6 justify-center">
                                {{ percentHRMax }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4 font-semibold">

                            <p class="text-grey w-full py-1">Description:
                                <span class="text-tertiary font-normal">{{ description }}</span>
                            </p>

                            <p class="lg:hidden text-grey w-full py-1">Percent VO2Max:
                                <span class="text-tertiary font-normal">{{ percentVO2Max}}</span>
                            </p>

                            <p class="lg:hidden text-grey w-full py-1">Percent HRMax:
                                <span class="text-tertiary font-normal">{{ percentHRMax }}</span>
                            </p>

                            <p class="lg:hidden text-grey w-full py-1">Purpose:
                                <span class="text-tertiary font-normal">{{ purpose }}</span>
                            </p>

                            <p class="text-grey w-full py-1">Source(s):
                                <span class="text-tertiary font-normal">{{ sources }}</span>
                            </p>
                            <div class="flex justify-start cursor-pointer pt-4">
                                <edit-button @clicked="editing=true"></edit-button>
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
                percentVO2Max: this.data.percentVO2Max,
                percentHRMax: this.data.percentHRMax,
                purpose: this.data.purpose,
                sources: this.data.sources,

                form: new Form({
                    name: this.data.name,
                    description: this.data.description,
                    percentVO2Max: this.data.percentVO2Max,
                    percentHRMax: this.data.percentHRMax,
                    purpose: this.data.purpose,
                    sources: this.data.sources
                })
            }
        },

        methods: {

            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/training-intensities/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.description = this.form.description;
                        this.percentVO2Max = this.form.percentVO2Max;
                        this.percentHRMax = this.form.percentHRMax;
                        this.purpose = this.form.purpose;
                        this.sources = this.form.sources;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.name !== this.data.name ||
                            this.description !== this.data.description ||
                            this.percentVO2Max !== this.data.percentVO2Max ||
                            this.percentHRMax !== this.data.percentHRMax ||
                            this.purpose !== this.data.purpose ||
                            this.sources !== this.data.sources
                        ) {

                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Training Intensity Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/training-intensities/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.form.description = this.description
                this.form.percentVO2Max = this.percentVO2Max
                this.form.percentHRMax = this.percentHRMax
                this.form.purpose = this.purpose
                this.form.sources = this.sources
                this.isExpanded = false;
            }
        }
    }
</script>
