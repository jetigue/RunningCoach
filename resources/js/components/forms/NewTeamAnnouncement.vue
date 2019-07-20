<template>
    <form action="/api/announcements" method="POST" id="newTeamAnnouncement"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.title">Title</label>
                <span id="titleHelp" class="form-help" v-if="form.errors.has('title')"
                    v-text="form.errors.get('title')">
                </span>
            </div>
            <input class="form-input" id="form.title" type="text" v-model="form.title" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.body">Body</label>
                <span id="bodyHelp" class="form-help" v-if="form.errors.has('body')"
                    v-text="form.errors.get('body')">
                </span>
            </div>
            <textarea class="form-input" id="form.body" v-model="form.body" required></textarea>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.body">Beginning Date</label>
                <span id="begin_dateHelp" class="form-help" v-if="form.errors.has('begin_date')"
                      v-text="form.errors.get('begin_date')">
                </span>
            </div>
            <input class="form-input" id="form.begin_date" type="date" v-model="form.begin_date" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.body">Ending Date</label>
                <span id="end_dateHelp" class="form-help" v-if="form.errors.has('end_date')"
                      v-text="form.errors.get('end_date')">
                </span>
            </div>
            <input class="form-input" id="form.end_date" type="date" v-model="form.end_date" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.link_1">
                    Link (optional)
                </label>
                <span id="link_1Help" class="form-help" v-if="form.errors.has('link_1')"
                      v-text="form.errors.get('link_1')">

                </span>
            </div>
            <input class="form-input" id="form.link_1" type="text" v-model="form.link_1">
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.link_text_1">
                    Link Text (optional)
                </label>
                <span id="link_text_1Help" class="form-help" v-if="form.errors.has('link_text_1')"
                      v-text="form.errors.get('link_text_1')">
                            </span>
            </div>
            <input class="form-input" id="form.link_text_1" type="text" v-model="form.link_text_1">
        </div>

        <div v-if="no2ndLink" @click="addLink" class="text-left p-2  text-sm cursor-pointer">
            <p class="text-navy-blue font-semibold"> + Add Another Link</p>
        </div>

        <div v-if="add2ndLink">
            <div class="mb-3">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.link_2">
                        Link #2 (optional)
                    </label>
                    <span id="link_2Help" class="form-help" v-if="form.errors.has('link_2')"
                          v-text="form.errors.get('link_2')">

                </span>
                </div>
                <input class="form-input" id="form.link_2" type="text" v-model="form.link_2">
            </div>

            <div class="mb-3">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.link_text_2">
                        Link Text #2 (optional)
                    </label>
                    <span id="link_text_2Help" class="form-help" v-if="form.errors.has('link_text_2')"
                          v-text="form.errors.get('link_text_2')">
                            </span>
                </div>
                <input class="form-input" id="form.link_text_2" type="text" v-model="form.link_text_2">
            </div>

            <div v-if="no3rdLink" @click="addAnotherLink" class="text-left p-2  text-sm cursor-pointer">
                <p class="text-navy-blue font-semibold"> + Add Another Link</p>
            </div>
        </div>

        <div v-show="add3rdLink">
            <div class="mb-3">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.link_3">
                        Link #3 (optional)
                    </label>
                    <span id="link_3Help" class="form-help" v-if="form.errors.has('link_3')"
                          v-text="form.errors.get('link_3')">

                    </span>
                </div>
                <input class="form-input" id="form.link_3" type="text" v-model="form.link_3">
            </div>

            <div class="mb-3">
                <div class="flex justify-between content-end">
                    <label class="form-label" for="form.link_text_3">
                        Link Text #3 (optional)
                    </label>
                    <span id="link_text_3Help" class="form-help" v-if="form.errors.has('link_text_3')"
                          v-text="form.errors.get('link_text_3')">
                                </span>
                </div>
                <input class="form-input" id="form.link_text_3" type="text" v-model="form.link_text_3">
            </div>
        </div>

        <div class="text-right pt-2">
            <button type="submit"
                    class="submit-button"
                    :disabled="form.errors.any()">
                    Create
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                title: '',
                body: '',
                begin_date: '',
                end_date: '',
                link_1: '',
                link_text_1: '',
                link_2: '',
                link_text_2: '',
                link_3: '',
                link_text_3: '',
            }),

            add2ndLink: false,
            add3rdLink: false,

            no2ndLink: true,
            no3rdLink: true,
        };
    },

    methods: {

        addLink() {
            this.add2ndLink = true,
            this.no2ndLink = false
        },

        addAnotherLink() {
            this.add3rdLink = true,
            this.no3rdLink = false
        },

        onSubmit() {
            this.form
                .post('/api/announcements')

                .then(data => {

                    Event.$emit('formSubmitted');

                    const toast = Vue.swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    toast({
                        type: 'success',
                        title: 'Announcement Added successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.title = '',
            this.form.body = '',
            this.form.begin_date = '',
            this.form.end_date = '',
            this.form.link_1 = '',
            this.form.link_text_1 = '',
            this.form.link_2 = '',
            this.form.link_text_2 = '',
            this.form.link_3 = '',
            this.form.link_text_3 = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>
