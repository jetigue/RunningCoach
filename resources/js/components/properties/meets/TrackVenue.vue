<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-blue-lighter">
            <div class="w-full">
                <form action="/track/venues/id" method="POST" id="editVenue" @submit.prevent="update"
                      @keydown="form.errors.clear()"
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
                            <label class="form-label">Track Surface</label>
                            <span id="trackSurfaceHelp" class="form-help" v-if="form.errors.has('track_surface_id')"
                                v-text="form.errors.get('track_surface_id')">
                            </span>
                        </div>
                        <select class="form-input" name="track_surface_id" v-model="form.track_surface_id" required>
                            <option v-for="surface in surfaces" :key="surface.id" :value="surface.id">
                                {{ surface.name }}
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
                        <div class="text-grey-darker w-full md:w-1/2 font-semibold md:font-normal" v-text="name">
                        </div>
                        <div class="text-grey-dark md:1/2 pl-4 md:pl-0 flex-1" v-text="surface">
                        </div>
                    </div>
                    <expand-button @toggleRow="toggleRow" class=""></expand-button>
                </div>
                <div v-if="isExpanded" class="py-3 px-2">
                    <div class="flex justify-start cursor-pointer">
                        <edit-button @clicked="getSurfaceNames"></edit-button>
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
                name: this.data.name,
                surface: this.data.surface.name,

                form: new Form({
                    name: this.data.name,
                    track_surface_id: this.data.track_surface_id
                }),

                surfaces: []
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/track/venues/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.surface = this.surfaces.find(surface => surface.id === this.form.track_surface_id).name;

                        this.editing = false;
                        this.isExpanded = false;

                         if (this.name != this.data.name || this.surface != this.data.surface.name) {

                            const toast = Vue.swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Track Venue Updated'
                            });
                         }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api/track/venues/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.isExpanded = false;
            },

            getSurfaceNames() {
                this.editing = true;

                axios.get('/api/trackSurfaces')
                    .then(response => {
                        this.surfaces = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    });
            }
        }
    }
</script>
