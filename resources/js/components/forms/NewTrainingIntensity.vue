<template>
    <form action="/training-intensities" method="POST" id="newTrainingIntensity"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear()">

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Name</label>
                <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')">
                </span>
            </div>
            <input class="form-input"
                    id="form.name"
                    type="text"
                    v-model="form.name">
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Percent VO2Max</label>
                <span id="percentVO2MaxHelp" class="form-help" v-if="form.errors.has('percentVO2Max')"
                    v-text="form.errors.get('percentVO2Max')">
                </span>
            </div>
            <input class="form-input"
                    id="form.percentVO2Max"
                    type="text"
                    v-model="form.percentVO2Max">
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Percent HRMax</label>
                <span id="percentHRMaxHelp" class="form-help" v-if="form.errors.has('percentHRMax')"
                    v-text="form.errors.get('percentHRMax')">
                </span>
            </div>
            <input class="form-input"
                    id="form.percentHRMax"
                    type="text"
                    v-model="form.percentHRMax">
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Description</label>
                <span id="descriptionHelp" class="form-help" v-if="form.errors.has('description')"
                      v-text="form.errors.get('description')">
                </span>
            </div>
            <textarea class="form-input"
                   id="form.description"
                   type="textarea"
                      v-model="form.description"></textarea>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Purpose</label>
                <span id="purposeHelp" class="form-help" v-if="form.errors.has('purpose')"
                      v-text="form.errors.get('purpose')">
                </span>
            </div>
            <textarea class="form-input"
                   id="form.purpose"
                   type="textarea"
                      v-model="form.purpose"></textarea>
        </div>

        <div class="mb-1">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Source(s)</label>
                <span id="sourcesHelp" class="form-help" v-if="form.errors.has('sources')"
                    v-text="form.errors.get('sources')">
                </span>
            </div>
            <input class="form-input"
                    id="form.sources"
                    type="text"
                    v-model="form.sources">
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
                name: '',
                percentVO2Max: '',
                percentHRMax: '',
                description: '',
                purpose: '',
                sources: '',
            }),
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/training-intensities')

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
                        title: 'Training Intensity Successfully Added'
                    });

                    this.$emit('created', data);
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = ''
            this.form.description = ''
            this.form.percentVO2Max = ''
            this.form.percentHRMax = ''
            this.form.purpose = ''
            this.form.sources = ''
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

    }
}
</script>
