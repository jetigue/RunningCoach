<template>
    <form action="/api/athletes" method="POST" id="newAthlete"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.first_name">First Name</label>
                <span id="first_nameHelp" class="form-help" v-if="form.errors.has('first_name')"
                    v-text="form.errors.get('first_name')">
                </span>
            </div>
            <input class="form-input" id="form.first_name" type="text" v-model="form.first_name" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.last_name">Last Name</label>
                <span id="last_nameHelp" class="form-help" v-if="form.errors.has('last_name')"
                    v-text="form.errors.get('last_name')">
                </span>
            </div>
            <input class="form-input" id="form.last_name" type="text" v-model="form.last_name" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label">Sex</label>
                <span id="sexHelp" class="form-help" v-if="form.errors.has('sex')"
                    v-text="form.errors.get('sex')">
                </span>
            </div>
            <select class="form-input" name="sex" v-model="form.sex" required>
                <option disabled value="">Choose one...</option>
                <option value="f">Female</option>
                <option value="m">Male</option>
            </select>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.dob">Date of Birth</label>
                <span id="dobHelp" class="form-help" v-if="form.errors.has('dob')"
                    v-text="form.errors.get('dob')">
                </span>
            </div>
            <input class="form-input" id="form.dob" type="date" v-model="form.dob">
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.grad_year">Graduation Year</label>
                <span id="grad_yearHelp" class="form-help" v-if="form.errors.has('grad_year')"
                    v-text="form.errors.get('grad_year')">
                </span>
            </div>
            <input class="form-input" id="form.grad_year" type="number" min="2009" max="2025" v-model="form.grad_year" required>
        </div>

        <div class="mb-3">
            <div class="flex justify-between content-end">
                <label class="form-label">Status</label>
                <span id="statusHelp" class="form-help" v-if="form.errors.has('status')"
                    v-text="form.errors.get('status')">
                </span>
            </div>
            <select class="form-input" name="status" v-model="form.status" required>
                <option disabled value="">Choose one...</option>
                <option value="a">Active</option>
                <option value="i">Inactive</option>
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
                first_name: '',
                last_name: '',
                sex: '',
                dob: '',
                grad_year: '',
                status: ''
            }),
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/athletes')

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
                        title: 'Athlete Added successfully'
                    });

                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.first_name = '',
            this.form.last_name = '',
            this.form.sex = '',
            this.form.dob = '',
            this.form.grad_year = '',
            this.form.status = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());
    }
}
</script>
