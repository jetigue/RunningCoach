<template>
    <div class="">
        <div v-if="editing" class="p-3 border-b border-gray-100">
            <div class="w-full">
                <form action="api/announcements/id" method="POST" id="editAnnouncement" @submit.prevent="update"
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
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.title">
                                Title
                            </label>
                            <span id="titleHelp" class="form-help" v-if="form.errors.has('title')"
                                    v-text="form.errors.get('title')">
                            </span>
                        </div>
                        <input class="form-input" id="form.title" type="text" v-model="form.title">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.body">
                                Body
                            </label>
                            <span id="bodyHelp" class="form-help" v-if="form.errors.has('body')"
                                    v-text="form.errors.get('body')">
                            </span>
                        </div>
                        <input class="form-input" id="form.body2" type="text" v-model="form.body">
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.body_2">
                                Paragraph 2
                            </label>
                            <span id="body2Help" class="form-help" v-if="form.errors.has('body_2')"
                                    v-text="form.errors.get('body_2')">
                            </span>
                        </div>
                        <input class="form-input" id="form.body_2" type="text" v-model="form.body_2">
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.body_3">
                                Paragraph 3
                            </label>
                            <span id="body3Help" class="form-help" v-if="form.errors.has('body_3')"
                                    v-text="form.errors.get('body_3')">
                            </span>
                        </div>
                        <input class="form-input" id="form.body_3" type="text" v-model="form.body_3">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.begin_date">Begin Date</label>
                            <span id="begin_dateHelp" class="form-help" v-if="form.errors.has('begin_date')"
                                v-text="form.errors.get('begin_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.begin_date" type="date" v-model="form.begin_date">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.end_date">End Date</label>
                            <span id="end_dateHelp" class="form-help" v-if="form.errors.has('end_date')"
                                  v-text="form.errors.get('end_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.end_date" type="date" v-model="form.end_date">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_1">
                                Link
                            </label>
                            <span id="link_1Help" class="form-help" v-if="form.errors.has('link_1')"
                                  v-text="form.errors.get('link_1')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_1" type="text" v-model="form.link_1">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_text_1">
                                Link Text
                            </label>
                            <span id="link_text_1Help" class="form-help" v-if="form.errors.has('link_text_1')"
                                  v-text="form.errors.get('link_text_1')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_text_1" type="text" v-model="form.link_text_1">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_1">
                                Link
                            </label>
                            <span id="link_2Help" class="form-help" v-if="form.errors.has('link_2')"
                                  v-text="form.errors.get('link_2')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_2" type="text" v-model="form.link_2">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_text_2">
                                Link Text
                            </label>
                            <span id="link_text_2Help" class="form-help" v-if="form.errors.has('link_text_2')"
                                  v-text="form.errors.get('link_text_2')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_text_2" type="text" v-model="form.link_text_2">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_3">
                                Link
                            </label>
                            <span id="link_3Help" class="form-help" v-if="form.errors.has('link_3')"
                                  v-text="form.errors.get('link_3')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_3" type="text" v-model="form.link_3">
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.link_text_3">
                                Link Text
                            </label>
                            <span id="link_text_3Help" class="form-help" v-if="form.errors.has('link_text_3')"
                                  v-text="form.errors.get('link_text_3')">
                            </span>
                        </div>
                        <input class="form-input" id="form.link_text_3" type="text" v-model="form.link_text_3">
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
                <div class="flex flex-col hover:bg-white">
                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-4/5 flex-wrap">
                            <div class="text-grey-darker w-full lg:w-1/2">
                                {{ title }}
                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <p class="text-gray-400 w-full py-1">Body:
                                <span class="text-gray-800">
                                        {{ body }}
                                </span>
                            </p>
                            <div v-if="body_2 !== null">
                                <p class="text-gray-400 w-full py-1">Body 2:
                                    <span class="text-gray-800">
                                            {{ body_2 }}
                                    </span>
                                </p>
                            </div>

                            <div v-if="body_3 !== null">
                                <p class="text-gray-400 w-full py-1">Body 3:
                                    <span class="text-gray-800">
                                            {{ body_3 }}
                                    </span>
                                </p>
                            </div>

                            <p class="text-gray-400 w-full py-1">Begin Date:
                                <span class="text-gray-800">
                                    {{ begin_date | moment("MM.DD.YYYY") }}
                                </span>
                            </p>

                            <p class="text-gray-400 w-full py-1">End Date:
                                <span class="text-gray-800">
                                        {{ end_date | moment("MM.DD.YYYY") }}
                                    </span>
                            </p>
                            <div v-if="link_1 !== null">
                                <p class="text-blue-600 w-full py-1">
                                    <a :href="link_1">{{ link_text_1}}</a>
                                </p>
                            </div>

                            <div v-if="link_2 !== null">
                                <p class="text-blue-600 w-full py-1">
                                    <a :href="link_2">{{ link_text_2}}</a>
                                </p>
                            </div>

                            <div v-if="link_3 !== null">
                                <p class="text-blue-600 w-full py-1">
                                    <a :href="link_3">{{ link_text_3}}</a>
                                </p>
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
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                title: this.data.title,
                body: this.data.body,
                body_2: this.data.body_2,
                body_3: this.data.body_3,
                begin_date: this.data.begin_date,
                end_date: this.data.end_date,
                link_1: this.data.link_1,
                link_text_1: this.data.link_text_1,
                link_2: this.data.link_2,
                link_text_2: this.data.link_text_2,
                link_3: this.data.link_3,
                link_text_3: this.data.link_text_3,

                form: new Form({
                    title: this.data.title,
                    body: this.data.body,
                    body_2: this.data.body_2,
                    body_3: this.data.body_3,
                    begin_date: this.data.begin_date,
                    end_date: this.data.end_date,
                    link_1: this.data.link_1,
                    link_text_1: this.data.link_text_1,
                    link_2: this.data.link_2,
                    link_text_2: this.data.link_text_2,
                    link_3: this.data.link_3,
                    link_text_3: this.data.link_text_3
                }),
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api/announcements/' + this.data.id)
                    .then(data => {
                        this.title = this.form.title;
                        this.body = this.form.body;
                        this.body_2 = this.form.body_2;
                        this.body_3 = this.form.body_3;
                        this.begin_date = this.form.begin_date;
                        this.end_date = this.form.end_date;
                        this.link_1 = this.form.link_1;
                        this.link_text_1 = this.form.link_text_1;
                        this.link_2 = this.form.link_2;
                        this.link_text_2 = this.form.link_text_2;
                        this.link_3 = this.form.link_3;
                        this.link_text_3 = this.form.link_text_3;


                        this.editing = false;
                        this.isExpanded = false;

                        if (
                            this.title !== this.data.title ||
                            this.body !== this.data.body ||
                            this.body_2 !== this.data.body_2 ||
                            this.body_3 !== this.data.body_3 ||
                            this.begin_date !== this.data.begin_date ||
                            this.end_date !== this.data.end_date ||
                            this.link_1 !== this.data.link_1 ||
                            this.link_text_1 !== this.data.link_text_1 ||
                            this.link_2 !== this.data.link_2 ||
                            this.link_text_2 !== this.data.link_text_2 ||
                            this.link_3 !== this.data.link_3 ||
                            this.link_text_3 !== this.data.link_text_3
                        )
                        {
                            const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            toast({
                                type: 'success',
                                title: 'Announcement Updated'
                            });
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
                window.scrollTo(0,0)
            },

            destroy() {
                axios.delete('api/announcements/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.title = this.title
                this.form.body = this.body
                this.form.body_2 = this.body_2
                this.form.body_3 = this.body_3
                this.form.begin_date = this.begin_date
                this.form.end_date = this.end_date
                this.form.link_1 = this.link_1
                this.form.link_text_1 = this.link_text_1
                this.form.link_2 = this.link_2
                this.form.link_text_2 = this.link_text_2
                this.form.link_1 = this.link_1
                this.form.link_text_3 = this.link_text_3
                this.isExpanded = false
                window.scrollTo(0,0)
            },
        }
    }
</script>
