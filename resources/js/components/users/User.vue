<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/users/id" method="POST" id="editRole" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                      class="bg-blue-lightest shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-2">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.first_name">
                                First Name
                            </label>
                            <span id="firstNameHelp" class="form-help" v-if="form.errors.has('first_name')"
                                  v-text="form.errors.get('first_name')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.first_name"
                               type="text"
                               v-model="form.first_name">
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.last_name">
                                Last Name
                            </label>
                            <span id="lastNameHelp" class="form-help" v-if="form.errors.has('last_name')"
                                  v-text="form.errors.get('last_name')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.last_name"
                               type="text"
                               v-model="form.last_name">
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.email">
                                Email
                            </label>
                            <span id="emailHelp" class="form-help" v-if="form.errors.has('email')"
                                  v-text="form.errors.get('email')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.email"
                               type="email"
                               v-model="form.email">
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Role</label>
                            <span id="roleHelp" class="form-help" v-if="form.errors.has('user_role_id')"
                                  v-text="form.errors.get('user_role_id')">
                            </span>
                        </div>
                        <select class="form-input" name="user_role_id" v-model="form.user_role_id" required>
                            <option v-for="role in roles" :key="role.id" :value="role.id">
                                {{ role.name }}
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
            <div class="flex flex-col border-b border-primary-lightest hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-4/5 flex-wrap">
                            <div class="text-grey-darker w-full lg:w-1/2 font-semibold md:font-normal hover:text-blue">
                                <a :href="'/users/'+data.id">{{ userName }}</a>
                            </div>
                            <div class="text-grey-darker py-1 pl-4 lg:p-0">
                                {{ userRole }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-grey w-full py-1">Email:
                                <span class="text-tertiary">
                                    {{ email }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-start cursor-pointer pb-2">
                            <edit-button @clicked="getNames"></edit-button>
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
                first_name: this.data.first_name,
                last_name: this.data.last_name,
                email: this.data.email,
                userRole: this.data.role.name,
                userName: this.data.last_name + ', ' + this.data.first_name,
                user_name_id: this.data.user_name_id,

                form: new Form({
                    first_name: this.data.first_name,
                    last_name: this.data.last_name,
                    email: this.data.email,
                    user_role_id: this.data.user_role_id
                }),

                roles: [],
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/users/' + this.data.id)
                    .then(data => {
                        this.first_name = this.form.first_name;
                        this.last_name = this.form.last_name;
                        this.email = this.form.email;
                        this.user_role_id = this.form.user_role_id;
                        this.userRole = this.roles.find(role => role.id === this.form.user_role_id).name;

                        this.editing = false;
                        this.isExpanded = false;

                        if (this.name != this.data.name) {
                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Role Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/users/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.first_name = this.first_name,
                this.form.last_name = this.last_name,
                this.form.email = this.email,
                this.form.user_role_id = this.user_role_id,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                axios.get('/api/user-roles')
                    .then(response => {
                        this.roles = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        }
    }
</script>
