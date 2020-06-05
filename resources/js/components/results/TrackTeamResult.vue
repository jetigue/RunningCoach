<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="/team-results/id" method="POST" id="editTrackTeamResult" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-blue-lightest shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-3">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-grey-dark px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Division</label>
                            <span id="divisionHelp" class="form-help" v-if="form.errors.has('division_id')"
                                  v-text="form.errors.get('division_id')">
                            </span>
                        </div>
                        <select class="form-input" name="division_id" v-model="form.division_id" required>
                            <option v-for="division in divisions" :key="division.id" :value="division.id">
                                {{ division.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.place">Place</label>
                            <span id="placeHelp" class="form-help" v-if="form.errors.has('place')"
                                  v-text="form.errors.get('place')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.place"
                               type="number"
                               min="1"
                               v-model="form.place" required>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.number_teams">Number of Teams</label>
                            <span id="numberTeamsHelp" class="form-help" v-if="form.errors.has('number_teams')"
                                  v-text="form.errors.get('number_teams')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.number_teams"
                               type="number"
                               min="2"
                               v-model="form.number_teams" required>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.points">Points</label>
                            <span id="pointsHelp" class="form-help" v-if="form.errors.has('points')"
                                  v-text="form.errors.get('points')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.points"
                               type="number"
                               min="0"
                               v-model="form.points" required>
                    </div>

                    <div class="mb-2">
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
            <div class="flex flex-col border-b border-blue-lightest hover:bg-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex p-2 items-center">
                        <div class="text-grey-darker flex w-3/4 md:w-5/6">
                            <div class="md:w-1/2">
                                {{ division }}
                            </div>
                            <div class="hidden md:flex md:w-1/4">
                                {{ place }}/{{ number_teams }}
                            </div>
                            <div class="hidden md:flex md:w-1/4">
                                {{ points }}
                            </div>
                        </div>
                        <div class="flex flex-1 justify-between md:pl-4">
                            <a :href="url">
                                <i class="text-gray-800 text-lg fas fa-user-clock"></i>
                            </a>

                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-grey w-full py-1">Place:
                                <span class="text-tertiary">
                                    {{ place }}
                                </span>
                            </p>
                            <p class="text-grey w-full py-1">Number of Teams:
                                <span class="text-tertiary">
                                    {{ number_teams }}
                                </span>
                            </p>
                            <p class="text-grey w-full py-1">Points:
                                <span class="text-tertiary">
                                    {{ points }}
                                </span>
                            </p>
                            <p class="text-grey w-full py-1">Notes:
                                <span class="text-tertiary">
                                    {{ notes }}
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
                division: this.data.division.name,
                place: this.data.place,
                number_teams: this.data.number_teams,
                points: this.data.points,
                notes: this.data.notes,
                url: location.pathname + '/team-results/' + this.data.slug,

                meet_id: this.data.meet_id,
                division_id: this.data.division_id,

                form: new Form({
                    division_id: this.data.division_id,
                    place: this.data.place,
                    number_teams: this.data.number_teams,
                    points: this.data.points,
                    notes: this.data.notes
                }),

                divisions: [],
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api' + location.pathname + '/team-results/' + this.data.id)
                    .then(data => {
                        this.division = this.divisions.find(division => division.id === this.form.division_id).name;
                        this.place = this.form.place;
                        this.number_teams = this.form.number_teams;
                        this.points = this.form.points;
                        this.notes = this.form.notes


                        this.editing = false;
                        this.isExpanded = false;

                         if (
                            this.division !== this.data.division.name ||
                            this.place !== this.data.place ||
                            this.number_teams !== this.data.number_teams ||
                            this.points !== this.data.points ||
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
                                    title: 'Track Team Result Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api'+ location.pathname + '/team-results/'+ this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.division_id = this.division_id,
                this.form.place = this.place,
                this.form.number_teams = this.number_teams,
                this.form.points = this.points,
                    this.form.notes = this.notes
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getDivisionNames() {
                    return axios.get('/api/divisions')
                }

                axios.all([
                    getDivisionNames()
                ])
                    .then(axios.spread((
                        divisionsResponse
                    ) => {
                        this.divisions = divisionsResponse.data;
                    }));
            }
        }
    }
</script>
