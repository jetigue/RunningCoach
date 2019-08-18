<template>
    <form action="/divisions" method="POST" id="newDivision"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">


        <div class="mb-4">
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

        <div class="mb-4">
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
                gender_id: '',
                level_id: ''
            }),

            genders: [],
            levels: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/divisions')

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
                        title: 'Division Successfully'
                    });

                    this.$emit('created', data);
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {

            this.form.gender_id = '',
            this.form.level_id = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

        Event.$on('getNames', () =>

            axios.get('/api/genders')
                .then(response => {
                    this.genders = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                }),

            axios.get('/api/levels')
                .then(response => {
                    this.levels = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                })
        );
    }
}
</script>
