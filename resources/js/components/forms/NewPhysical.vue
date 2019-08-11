<template>
    <form action="/physicals" method="POST" id="newPhysical" enctype="multipart/form-data"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">


        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label">Athlete</label>
                <span id="athleteHelp" class="form-help" v-if="form.errors.has('athlete_id')"
                      v-text="form.errors.get('athlete_id')">
                </span>
            </div>
            <select class="form-input" name="athlete_id" v-model="form.athlete_id" required>
                <option v-for="athlete in athletes" :key="athlete.id" :value="athlete.id">
                    {{ athlete.last_name }}, {{ athlete.first_name }}
                </option>
            </select>
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.exam_date">Exam Date</label>
                <span id="exam_dateHelp" class="form-help" v-if="form.errors.has('exam_date')"
                      v-text="form.errors.get('exam_date')">
                </span>
            </div>
            <input class="form-input" id="form.exam_date" type="date" v-model="form.exam_date">
        </div>

        <div class="mb-2">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.restrictions">Restrictions (if any)</label>
                <span id="restrictionsHelp" class="form-help" v-if="form.errors.has('restrictions')"
                    v-text="form.errors.get('restrictions')">
                </span>
            </div>
            <input class="form-input"
                    id="form.restrictions"
                    type="text"
                    v-model="form.restrictions">
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
                athlete_id: '',
                exam_date: '',
                restrictions: '',
                form_path: '',
                notes: '',
            }),

            athletes: [],

        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/physicals')

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
                        title: 'Physical Successfully Added'
                    });

                    this.$emit('created', data);
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {

            this.form.athletes_id = '';
            this.form.restrictions = '';
            this.form.notes = '';
            this.form.exam_date = '';
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

        Event.$on('getNames', () =>

            axios.get('/api/physicals-athletes')
                .then(response => {
                    this.athletes = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                })
        );
    }
}
</script>
