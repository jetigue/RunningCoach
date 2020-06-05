<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b">
            <div class="w-full">
                <form action="api/team-events/id" method="POST" id="editTeamEvent" @submit.prevent="update"
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
                            <label class="form-label" for="form.event_date">Event Date</label>
                            <span id="event_dateHelp" class="form-help" v-if="form.errors.has('event_date')"
                                v-text="form.errors.get('event_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.event_date" type="date" v-model="form.event_date">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.event_time">
                                Event Time
                            </label>
                            <span id="event_timeHelp" class="form-help" v-if="form.errors.has('event_time')"
                                  v-text="form.errors.get('event_time')">
                            </span>
                        </div>
                        <input class="form-input" id="form.event_time" type="text" v-model="form.event_time">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.location">
                                Location
                            </label>
                            <span id="locationHelp" class="form-help" v-if="form.errors.has('location')"
                                  v-text="form.errors.get('location')">
                            </span>
                        </div>
                        <input class="form-input" id="form.location" type="text" v-model="form.location">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.details">
                                Details
                            </label>
                            <span id="detailsHelp" class="form-help" v-if="form.errors.has('details')"
                                  v-text="form.errors.get('details')">
                            </span>
                        </div>
                        <input class="form-input" id="form.details" type="text" v-model="form.details">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link">
                                Link
                            </label>
                            <span id="linkHelp" class="form-help" v-if="form.errors.has('link')"
                                  v-text="form.errors.get('link')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link" type="text" v-model="form.link">
                    </div>

                    <div class="mb-1">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_text">
                                Link Text
                            </label>
                            <span id="link_textHelp" class="form-help" v-if="form.errors.has('link_text')"
                                  v-text="form.errors.get('link_text')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_text" type="text" v-model="form.link_text">
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
                        <div class="flex md:w-4/5 flex-wrap">
                            <div class="text-gray-800 w-full md:w-1/2 font-semibold md:font-normal" v-text="name">
                            </div>
                            <div class="text-gray-600 md:1/2 pl-4 md:pl-0 flex-1">
                                {{ event_date | moment("MM.DD.YYYY") }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-gray-500 w-full py-1">Time:
                                <span class="text-gray-800">
                                    {{ event_time }}
                                </span>
                            </p>

                            <p class="text-gray-500 w-full py-1">Location:
                                <span class="text-gray-800">
                                    {{ location }}
                                </span>
                            </p>

                            <p class="text-gray-500 w-full py-1">Details:
                                <span class="text-gray-800">
                                    {{ details }}
                                </span>
                            </p>

                            <p class="text-blue-600 w-full py-1">
                                <a :href="link">{{ link_text}}</a>
                            </p>

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
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                name: this.data.name,
                details: this.data.details,
                event_date: this.data.event_date,
                event_time: this.data.event_time,
                location: this.data.location,
                link: this.data.link,
                link_text: this.data.link_text,

                form: new Form({
                    name: this.data.name,
                    details: this.data.details,
                    event_date: this.data.event_date,
                    event_time: this.data.event_time,
                    location: this.data.location,
                    link: this.data.link,
                    link_text: this.data.link_text,
                }),
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/team-events/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.details = this.form.details;
                        this.event_date = this.form.event_date;
                        this.event_time = this.form.event_time;
                        this.location = this.form.location;
                        this.link = this.form.link;
                        this.link_text = this.form.link_text;

                        this.editing = false;
                        this.isExpanded = false;

                        if (
                        this.details !== this.form.details ||
                        this.event_date !== this.form.event_date ||
                        this.event_time !== this.form.event_time ||
                        this.location !== this.form.location ||
                        this.link !== this.form.link ||
                        this.link_text !== this.form.link_text
                        ) {

                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'TrackEvent Updated'
                            });
                        }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
                window.scrollTo(0,0)
            },

            destroy() {
                axios.delete('api/team-events/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.name = this.name
                this.form.details = this.details
                this.form.event_date = this.event_date
                this.form.event_time = this.event_time
                this.form.link = this.link
                this.form.link_text = this.link_text
                this.form.location = this.location
                this.isExpanded = false
                window.scrollTo(0,0)
            },
        }
    }
</script>
