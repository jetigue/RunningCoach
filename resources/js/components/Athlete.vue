<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/athletes/id" method="POST" id="editAthlete" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-blue-lighter shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.first_name">
                                First Name
                            </label>
                            <span id="first_nameHelp" class="form-help" v-if="form.errors.has('first_name')"
                                    v-text="form.errors.get('first_name')">
                            </span>
                        </div>
                        <input class="form-input" id="form.first_name" type="text" v-model="form.first_name">
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.last_name">
                                Last Name
                            </label>
                            <span id="last_nameHelp" class="form-help" v-if="form.errors.has('last_name')"
                                    v-text="form.errors.get('last_name')">
                            </span>
                        </div>
                        <input class="form-input" id="form.last_name" type="text" v-model="form.last_name">
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.sex">Sex</label>
                            <span id="sexHelp" class="form-help" v-if="form.errors.has('sex')"
                                v-text="form.errors.get('sex')">
                            </span>
                        </div>
                        <select class="form-input" name="sex" v-model="form.sex" required>
                            <option value="f">Female</option>
                            <option value="m">Male</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.dob">Date of Birth</label>
                            <span id="dobHelp" class="form-help" v-if="form.errors.has('dob')"
                                v-text="form.errors.get('dob')">
                            </span>
                        </div>
                        <input class="form-input" id="form.dob" type="date" v-model="form.dob">
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.grad_year">Graduation Year</label>
                            <span id="grad_yearHelp" class="form-help" v-if="form.errors.has('grad_year')"
                                v-text="form.errors.get('grad_year')">
                            </span>
                        </div>
                        <input class="form-input" id="form.grad_year" type="number" min="2009" max="2025" v-model="form.grad_year" required>
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
            <div class="flex flex-col border-b border-blue-lightest hover:bg-blue-lightest">
                <div class="table-row flex justify-between hover:bg-blue-lightest">
                    <div class="flex md:w-4/5 flex-wrap">
                        <div class="text-grey-darker w-full md:w-1/2 font-semibold md:font-normal" v-text="name"></div>
                    <div>
                        <a v-if="active" class="" @click="inactivate">
                            <span class="icon is-medium" style="color:green;"> 
                                <i class="fas fa-check-square"></i>
                            </span>
                        </a>
                        <a v-else class="" @click="activate"> <span class="icon is-medium" style="color:gray;"> <i class="far fa-square"></i> </span> </a> </div> </div> <!-- <div class="text-grey-dark md:1/2 pl-4 md:pl-0 flex-1" v-text="status"> </div> -->
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
                <div v-if="isExpanded" class="py-3 px-2">
                    <div class="flex justify-start cursor-pointer">
                        <edit-button @clicked="editing=true"></edit-button>
                        <delete-button @clicked="destroy"></delete-button>
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
                name: this.data.last_name + ", " + this.data.first_name,
                user_id: this.data.user_id,
                sex: this.data.sex,
                dob: this.data.dob,
                grad_year: this.data.grad_year,
                team: this.data.team_id,
                status: this.data.status,

                active: this.data.status === 'a',

                form: new Form({
                    first_name: this.data.first_name,
                    last_name: this.data.last_name,
                    sex: this.data.sex,
                    dob: this.data.dob,
                    grad_year: this.data.grad_year,
                    team_id: this.data.team_id,
                    user_id: this.data.user_id
                }),
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            activate() {
                axios.patch('api/athletes/' + this.data.id, {
                    status: this.status = 'a'
                });

                this.active = true;
            },

            inactivate() {
                axios.patch('/api/athletes/' + this.data.id, {
                    status: this.status = 'i'
                });

                this.active = false;
            },

            update() {
                this.form
                    .patch('/api/athletes/' + this.data.id)
                    .then(data => {
                        this.first_name = this.form.first_name;
                        this.last_name = this.form.last_name;
                        this.sex = this.form.sex;
                        this.grad_year = this.form.grad_year;
                        this.dob = this.form.dob;
                        this.name = this.form.last_name + ", " + this.form.first_name;
                        this.team_id = this.form.team_id;
                        this.user_id = this.form.user_id;

                        this.editing = false;
                        this.isExpanded = false;

                        const toast = Vue.swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Athlete Updated'
                        });
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/athletes/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.first_name = this.first_name,
                this.form.last_name = this.last_name,
                this.form.sex = this.sex,
                this.form.dob = this.dob,
                this.form.grad_year = this.grad_year,
                this.isExpanded = false;
            },
        },

        computed: {
            age: function () {
                return moment().diff(this.data.dob, 'years');
            },

            gender: function () {
                if (this.sex === 'm') {
                    return "Male";
                }

                return "Female";
            },

            isInactive: function () {
                if (this.status === 'i') {
                    return true;
                }
            }
        }
    }
</script>