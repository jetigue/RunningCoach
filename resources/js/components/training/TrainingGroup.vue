<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-gray-200">
            <div class="w-full">
                <form action="api/training-levels/id"
                      method="POST" id="editTrainingLevel"
                      @submit.prevent="update"
                      @keydown="form.errors.clear()"
                      class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                            <label class="form-label" for="form.color">
                                Color Hex Code
                            </label>
                            <span id="colorHelp" class="form-help" v-if="form.errors.has('color')"
                                    v-text="form.errors.get('color')">
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class="mx-1">#</span>
                            <input class="form-input" id="form.color" type="text" v-model="form.color">
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
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-gray-200 hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex w-11/12 flex-wrap">
                            <div class="flex w-2/3 md:w-2/5">
                                {{ name }}
                            </div>
                            <div class="flex w-1/3 md:w-2/5 justify-center font-semibold">
                                <div class="text-center px-4"
                                    :style="{color: groupColor, 'background-color': background}">
                                    #{{ color }}
                                </div>
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4 font-semibold">
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
                color: this.data.color,

                form: new Form({
                    name: this.data.name,
                    color: this.data.color
                }),
            }
        },

        computed: {
            groupColor() {
                if (this.name === 'None') {
                    return '#'+this.color+'00'
                }
                return '#'+this.color
            },

            background() {
                if (this.name === 'White') {
                    return 'lightgray'
                }
            }
        },

        methods: {

            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/training-groups/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.color = this.form.color;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.name !== this.data.name ||
                            this.color !== this.data.color
                        ) {

                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Training Level Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api/training-groups/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.form.color = this.color
                this.isExpanded = false;
            },
        }
    }
</script>
