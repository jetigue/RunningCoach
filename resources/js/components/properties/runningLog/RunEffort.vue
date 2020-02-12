<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/run-efforts/id" method="POST" id="editDayTime" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-blue-lightest shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">

                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.name">
                                Name
                            </label>
                            <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                                    v-text="form.errors.get('name')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.name"
                               type="text"
                               v-model="form.name">
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.description">
                                Description
                            </label>
                            <span id="descriptionHelp" class="form-help" v-if="form.errors.has('description')"
                                  v-text="form.errors.get('description')">
                            </span>
                        </div>
                        <textarea class="form-input"
                               id="form.description"
                               type="textarea"
                                  v-model="form.description"></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <update-button class="mr-4" :disabled="form.errors.any()">
                            Update
                        </update-button>
                        <cancel-button @clicked="resetForm" @click.prevent="update"></cancel-button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-blue-lightest hover:bg-white">
                <div class="table-row flex justify-between hover:bg-white">
                    <div class="flex md:w-4/5">
                        <div class="text-grey-darker w-full md:w-1/2 lg:w-1/3" v-text="name"></div>
                    </div>
                    <expand-button @toggleRow="toggleRow"></expand-button>
                </div>
                <div v-if="isExpanded" class="px-2">
                    <div class="flex flex-col pb-4 px-4">

                        <p class="text-grey w-full py-1">Description:
                            <span class="text-tertiary">{{ description }}</span>
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

                form: new Form({
                    name: this.data.name,
                    description: this.data.description
                })
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/run-efforts/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.description = this.form.description;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.name != this.data.name ||
                            this.description != this.data.description
                        ) {

                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Run Effort Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/run-efforts/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.form.description = this.description;
                this.isExpanded = false;
            }
        }
    }
</script>
