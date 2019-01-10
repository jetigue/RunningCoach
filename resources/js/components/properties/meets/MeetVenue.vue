<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="api/venues/id" method="POST" id="editVenue" @submit.prevent="update"
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
                            <label class="form-label" for="form.season_id">Season</label>
                            <span id="seasonHelp" class="form-help" v-if="form.errors.has('season_id')"
                                v-text="form.errors.get('season_id')">
                            </span>
                        </div>
                        <select class="form-input" name="season_id" v-model="form.season_id" required>
                            <option v-for="season in seasons" :value="season.id">
                                {{ season.name }}
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
            <div class="flex flex-col border-b border-blue-lightest hover:bg-blue-lightest">
                <div class="table-row flex justify-between hover:bg-blue-lightest">
                    <div class="flex md:w-4/5 flex-wrap">
                        <div class="text-grey-darker w-full md:w-1/2 font-semibold md:font-normal" v-text="name">
                        </div>
                        <div class="text-grey-dark md:1/2 pl-4 md:pl-0 flex-1" v-text="season">
                        </div>
                    </div>
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
                <div v-if="isExpanded" class="py-3 px-2">
                    <div class="flex justify-start cursor-pointer">
                        <edit-button @clicked="getSeasonNames"></edit-button>
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
                season: this.data.season.name,

                form: new Form({
                    name: this.data.name,
                    season_id: this.data.season_id
                }),

                seasons: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/venues/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.season = this.seasons.find(season => season.id === this.form.season_id).name;

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
                            title: 'Venue Updated'
                        });
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/venues/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.isExpanded = false;
            },

            getSeasonNames() {
                this.editing = true;

                axios.get('/api/seasons')
                    .then(response => {
                        this.seasons = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        }
    }
</script>