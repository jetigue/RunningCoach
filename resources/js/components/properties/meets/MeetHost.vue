<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/hosts/id" method="POST" id="editHost" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-blue-lighter shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label m-0">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="form-label" for="form.name">
                            Name
                        </label>
                        <input class="form-input"
                               id="form.name"
                               type="text"
                               v-model="form.name">
                        <span id="nameHelp" class="help bg-red" v-if="form.errors.has('name')"
                              v-text="form.errors.get('name')"></span>
                    </div>
                    <div class="flex items-center justify-end">
                        <update-button class= "mr-4" :disabled="form.errors.any()">Update</update-button>
                        <cancel-button @clicked="resetForm"></cancel-button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-primary-lightest hover:bg-primary-lightest">
                <div class="table-row flex justify-between hover:bg-primary-lightest">
                    <div class="flex">
                        <div class="md:text-base text-grey-darker flex-1 md:w-1/2 lg:w-1/3" v-text="name"></div>
                    </div>
                    <expand-button @toggleRow="toggleRow"></expand-button>
                </div>
                <div v-if="isExpanded" class="py-3 px-4">
                    <div class="flex justify-start px-2 cursor-pointer">
                        <edit-button @clicked="editing=true"></edit-button>
                        <delete-button @clicked="destroy"></delete-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CancelButton from "../../buttons/CancelButton";
    import DeleteButton from '../../buttons/DeleteButton';
    import EditButton from "../../buttons/EditButton";
    import ExpandButton from '../../buttons/ExpandButton';
    import UpdateButton from '../../buttons/UpdateButton';

    export default {
        props: ['data'],

        components: {
            'cancel-button': CancelButton,
            'delete-button': DeleteButton,
            'edit-button': EditButton,
            'expand-button': ExpandButton,
            'update-button': UpdateButton
        },

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                name: this.data.name,

                form: new Form({
                    name: this.data.name,
                })
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/hosts/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.editing = false;

                        this.isExpanded = false;
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/hosts/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.isExpanded = false;
            }
        }
    }
</script>