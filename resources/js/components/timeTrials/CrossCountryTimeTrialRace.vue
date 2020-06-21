<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-100">
            <div class="w-full md:w-1/2 mx-auto">
                <form action="/cross-country/time-trials/races/id"
                      method="POST"
                      id="editTrackTimeTrialRace"
                      @submit.prevent="update"
                      @keydown="form.errors.clear()"
                      class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">

                    <div class="flex items-center mb-1">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-gray-700 px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-1">
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

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Event</label>
                            <span id="eventHelp" class="form-help" v-if="form.errors.has('cross_country_event_id')"
                                  v-text="form.errors.get('cross_country_event_id')">
                            </span>
                        </div>
                        <select class="form-input" name="cross_country_event_id" v-model="form.cross_country_event_id">
                            <option v-for="event in events" :key="event.id" :value="event.id">
                                {{ event.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.notes">Notes (optional)</label>
                            <span id="notesHelp" class="form-help" v-if="form.errors.has('notes')"
                                  v-text="form.errors.get('notes')">
                            </span>
                        </div>
                        <textarea class="form-input"
                                  id="form.notes"
                                  v-model="form.notes">
                        </textarea>
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
            <div class="flex flex-col border-b border-gray-200 hover:bg-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex flex-wrap text-black w-11/12">
                            <div class="w-full md:w-2/3 lg:w-2/5">
                                {{ gender }}  {{ event }}
                            </div>
                            <div class="w-1/2 md:w-1/6  lg:w-1/5 text-center">
                                <a :href="url" class="text-blue-700">
                                    Results
                                </a>
                            </div>
                        </div>
                        <div>
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">
                            <p class="text-gray-600 w-full py-1">Event:
                                <span class="text-gray-800">
                                    {{ event }}
                                </span>
                            </p>
                            <p class="text-gray-600 w-full py-1">Notes:
                                <span class="text-gray-800">
                                    {{ notes }}
                                </span>
                            </p>

                        </div>
                        <div v-if="isCoach" class="flex justify-start cursor-pointer pb-2">
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
    import {authMixin}from '../../mixins/authMixin';
    export default {
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                gender: this.data.gender.name,
                event: this.data.event.name,
                notes: this.data.notes,
                url: location.pathname + '/races/' +this.data.id,

                gender_id: this.data.gender_id,
                cross_country_event_id: this.data.cross_country_event_id,

                form: new Form({
                    gender_id: this.data.gender_id,
                    cross_country_event_id: this.data.cross_country_event_id,
                    notes: this.data.notes,
                }),

                genders: [],
                events: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api'+location.pathname + '/races/' +this.data.id)
                    .then(data => {
                        this.gender = this.genders.find(gender => gender.id === this.form.gender_id).name;
                        this.event = this.events.find(event => event.id === this.form.cross_country_event_id).name;
                        this.notes = this.form.notes;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.gender !== this.data.gender.name ||
                            this.event !== this.data.event.name ||
                            this.notes !== this.data.notes)
                            {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                });

                                toast({
                                    type: 'success',
                                    title: 'Race Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api'+location.pathname + '/races/' +this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.gender_id = this.gender_id,
                this.form.cross_country_event_id = this.cross_country_event_id,
                this.form.notes = this.notes
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getGenderNames() {
                    return axios.get('/api/genders')
                }

                function getEventNames() {
                    return axios.get('/api/cross-country/events')
                }

                axios.all([
                    getGenderNames(),
                    getEventNames()
                ])
                    .then(axios.spread((
                        gendersResponse,
                        eventsResponse
                    ) => {
                        this.genders = gendersResponse.data;
                        this.events = eventsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        }
    }
</script>
