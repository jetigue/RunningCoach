<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b">
            <div class="w-full">
                <form action="api/athletes/id" method="POST" id="editAthlete" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>
                    <div class="mb-1">
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

                    <div class="mb-1">
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

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Sex</label>
                            <span id="sexHelp" class="form-help" v-if="form.errors.has('sex')"
                                v-text="form.errors.get('sex')">
                            </span>
                        </div>
                        <select class="form-input" name="sex" v-model="form.sex" required>
                            <option value="f">Female</option>
                            <option value="m">Male</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.dob">Date of Birth</label>
                            <span id="dobHelp" class="form-help" v-if="form.errors.has('dob')"
                                v-text="form.errors.get('dob')">
                            </span>
                        </div>
                        <input class="form-input" id="form.dob" type="date" v-model="form.dob">
                    </div>

                    <div class="mb-2">
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
            <div class="flex flex-col border-b hover:bg-white">
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-11/12 flex-wrap items-center">
                            <div class="text-smoke-800 w-full md:w-6/12"
                                :class="{'font-semibold': active}">
                                <a :href="url">
                                    {{ name }}
                                </a>

                            </div>
                            <div class="w-full pl-4 md:pl-0 md:w-2/12">
                                <div v-if="active" class="w-4 h-4 border"
                                     :style="{background: groupColor, 'border-color': borderColor}"></div>
                            </div>
                            <div v-if="active" class="w-full pl-4 md:pl-0 md:w-4/12 md:text-center">
                                <physical-status v-if="displayPhysicals" :data="data"></physical-status>
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" @clicked="getNames" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="w-full px-2">
                        <div class="flex w-full flex-wrap">
                            <div class="flex flex-col pb-4 px-4 w-full md:w-1/2">
                                <p class="text-grey w-full py-1">Sex:
                                    <span class="text-tertiary">
                                            {{ sexName }}
                                        </span>
                                </p>
                                <p class="text-grey w-full py-1">DOB:
                                    <span class="text-tertiary">
                                            {{ dob | moment("MM.DD.YYYY") }}
                                        </span>
                                </p>
                                <p class="text-grey w-full py-1">Class:
                                    <span class="text-tertiary">
                                            {{ grad_year }}
                                        </span>
                                </p>
                                <p class="text-grey w-full py-1">Active:
                                    <a v-if="active" class="" @click="inactivate">
                                        <span class="icon is-medium" style="color:green;">
                                            <i class="fas fa-check-square"></i>
                                        </span>
                                    </a>
                                    <a v-else
                                       @click="activate">
                                        <span class="" style="color:gray;">
                                            <i class="far fa-square"></i>
                                        </span>
                                    </a>
                                </p>
                            </div>
                            <div class="flex w-full md:w-1/2 items-center p-4 bg-gray-100 rounded">
                                <form action="api/athletes/id"
                                    method="POST"
                                    id="editAthleteTrainingGroup"
                                    @submit.prevent="updateTrainingGroup"
                                    @keydown="form.errors.clear()"
                                    class="w-full">
                                    <div class="mb-2 items-center w-full">
                                        <div class="flex flex-initial justify-start">
                                            <label class="form-label">Training Group</label>
                                            <span id="trainingGroupTypeHelp"
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
                                        <update-button class="text-sm" :disabled="form.errors.any()">
                                            Update
                                        </update-button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="flex justify-start cursor-pointer pb-2">
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
    import PhysicalStatus from './physicals/PhysicalStatus';

    export default {
        components: {PhysicalStatus},
        props: ['data', 'displayPhysicals'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                first_name: this.data.first_name,
                last_name: this.data.last_name,
                name: this.data.last_name + ", " + this.data.first_name,
                user_id: this.data.user_id,
                sex: this.data.sex,
                sexName: (this.data.sex === 'm') ? "Male": "Female",
                dob: this.data.dob,
                grad_year: this.data.grad_year,
                status: this.data.status,
                url: '/athletes/'+this.data.id,
                trainingGroupId: this.data.training_group_id,
                color: this.data.groupColor,


                physicals: false,

                active: this.data.status === 'a',

                form: new Form({
                    first_name: this.data.first_name,
                    last_name: this.data.last_name,
                    sex: this.data.sex,
                    dob: this.data.dob,
                    grad_year: this.data.grad_year,
                    user_id: this.data.user_id,
                    training_group_id: this.data.training_group_id
                }),

                trainingGroups: []
            }
        },

        watch: {
            isExpanded() {
                if (this.isExpanded === true) {
                    return this.getNames();
                }
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            resetExpand() {
                Event.$emit('resetExpandButton')
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

            updateTrainingGroup() {
                this.form
                    .patch('/api/athletes/' + this.data.id)
                    .then(data=> {
                        this.trainingGroupId = this.form.training_group_id
                        this.color = this.trainingGroups.find(trainingGroup => trainingGroup.id === this.form.training_group_id).color;

                        this.editing = false;
                        this.isExpanded = false;
                        this.resetExpand();

                        if (this.trainingGroupId !== this.data.training_group_id) {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            toast({
                                type: 'success',
                                title: 'Training Group Updated'
                            });
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
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
                        this.user_id = this.form.user_id;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.first_name !== this.data.first_name ||
                            this.last_name !== this.data.last_name ||
                            this.sex !== this.data.sex ||
                            this.grad_year !== this.data.grad_year ||
                            this.dob !== this.data.dob ||
                            this.user_id !== this.data.user_id ||
                            this.trainingGroupId !== this.data.training_group_id
                        ) {

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
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
                window.scrollTo(0, 0)
            },

            destroy() {
                axios.delete('api/athletes/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.first_name = this.first_name
                this.form.last_name = this.last_name
                this.form.sex = this.sex
                this.form.dob = this.dob
                this.form.grad_year = this.grad_year
                this.isExpanded = false
                this.form.training_group_id = this.training_group_id
                window.scrollTo(0, 0)
            },

            resetTrainingGroupForm() {
                this.isExpanded = false
                this.form.training_group_id = this.data.training_group_id
                this.resetExpand();
            },

            getNames() {
                this.isExpanded = true;

                axios.get('/api/training-groups')
                    .then(response => {
                        this.trainingGroups = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            }
        },

        computed: {
            age: function () {
                return moment().diff(this.data.dob, 'years');
            },

            groupColor() {
                if (this.trainingGroupId === 1) {
                    return '#'+this.color+'00'
                }
                return '#'+this.color
            },

            borderColor() {
                if (this.trainingGroupId === 1) {
                    return '#ffffff00'
                }
                return '#000'
            },

            isInactive: function () {
                if (this.status === 'i') {
                    return true;
                }
            },

            physicalStatus() {
                let forms =[
                    this.confirmedConsentForm,
                    this.confirmedConcussionForm,
                    this.confirmedEvaluationForm
                ];

                if  (forms.every(Boolean) && (this.restrictions === null)) {

                    this.statusColor = '#00b300';
                    this.allClear = true;

                    return "Cleared"

                } else if  (forms.every(Boolean) && (this.restrictions !== null)) {

                    this.statusColor = '#fd6a02';
                    this.restrict = true;

                    return "Cleared with Restrictions"


                } else {
                    this.statusColor = '#cc0000';

                    return "Not Cleared"
                }
            },
        }
    }
</script>
