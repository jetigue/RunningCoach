<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/divisions/id" method="POST" id="editEvent" @submit.prevent="update"
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
                            <label class="form-label">Gender</label>
                            <span id="genderHelp" class="form-help" v-if="form.errors.has('gender_id')"
                                  v-text="form.errors.get('gender_id')">
                            </span>
                        </div>
                        <select class="form-input" name="gender_id" v-model="form.gender_id" required>
                            <option v-for="gender in genders" :key="gender.id" :value="gender.id">
                                {{ gender.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Level</label>
                            <span id="levelHelp" class="form-help" v-if="form.errors.has('level_id')"
                                  v-text="form.errors.get('level_id')">
                            </span>
                        </div>
                        <select class="form-input" name="level_id" v-model="form.level_id" required>
                            <option v-for="level in levels" :key="level.id" :value="level.id">
                                {{ level.name }}
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
                <div class="table-row flex justify-between hover:bg-white">
                    <div class="flex md:w-4/5 flex-wrap">
                        <div class="text-grey-darker w-full md:w-1/2 font-semibold md:font-normal">
                            {{ name }}
                        </div>
                    </div>
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
                <div v-if="isExpanded" class="py-3 px-2">
                    <div class="flex justify-start cursor-pointer">
                        <edit-button @clicked="getNames"></edit-button>
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
                gender: this.data.gender.name,
                level: this.data.level.name,
                name: this.data.name,
                gender_id: this.data.gender_id,
                level_id: this.data.level_id,

                form: new Form({
                    gender_id: this.data.gender_id,
                    level_id: this.data.level_id,
                }),

                genders: [],
                levels: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/divisions/' + this.data.id)
                    .then(data => {
                        this.gender = this.genders.find(gender => gender.id === this.form.gender_id).name
                        this.level = this.levels.find(level => level.id === this.form.level_id).name
                        this.name = this.level + ' ' + this.gender;


                        this.editing = false;
                        this.isExpanded = false;

                        if (this.gender_id != this.data.gender_id ||
                            this.level_id != this.data.level_id ||
                            this.name != this.data.name) {

                            const toast = Vue.swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Division Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/divisions/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.gender_id = this.gender_id,
                this.form.level_id = this.level_id,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getGenderNames() {
                    return axios.get('/api/genders')
                }

                function getLevelNames() {
                    return axios.get('/api/levels')
                }

                axios.all([
                    getGenderNames(),
                    getLevelNames()
                ])
                    .then(axios.spread((
                        gendersResponse,
                        levelsResponse
                    ) => {
                        this.genders = gendersResponse.data;
                        this.levels = levelsResponse.data;
                    }));
            }
        }
    }
</script>
