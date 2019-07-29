<template>
    <div class="">
        <div v-if="editing" class="p-3 lg:w-1/2 mx-auto border-b border-gray-100">
            <div class="w-full">
                <form action="api/physicals/id" method="POST" id="editAnnouncement" @submit.prevent="update"
                      @keydown="form.errors.clear($event.target.name)"
                        class="bg-gray-100 shadow-md rounded px-4 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-4">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-gray-700 px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Athlete</label>
                            <span id="athleteHelp" class="form-help" v-if="form.errors.has('athlete_id')"
                                  v-text="form.errors.get('athlete_id')">
                            </span>
                        </div>
                        <select class="form-input bg-white" name="athlete_id" v-model="form.athlete_id" required>
                            <option v-for="athlete in athletes" :key="athlete.id" :value="athlete.id">
                                {{ athlete.last_name }}, {{ athlete.first_name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.exam_date">Exam Date</label>
                            <span id="exam_dateHelp" class="form-help" v-if="form.errors.has('exam_date')"
                                  v-text="form.errors.get('exam_date')">
                            </span>
                        </div>
                        <input class="form-input" id="form.exam_date" type="date" v-model="form.exam_date">
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.restrictions">
                                Restrictions (If any)
                            </label>
                            <span id="restrictionsHelp" class="form-help" v-if="form.errors.has('restrictions')"
                                    v-text="form.errors.get('restrictions')">
                            </span>
                        </div>
                        <input class="form-input" id="form.restrictions" type="text" v-model="form.restrictions">
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
            <div class="flex flex-col border-b border-blue-100 hover:bg-white">
                <div class="flex flex-col hover:bg-white">

                    <div class="flex justify-between p-2 items-center">
                        <div class="flex md:w-4/5 flex-wrap">

                            <div class="text-gray-900 w-full md:w-1/2 lg:w-1/3">
                                {{ athleteName }}
                            </div>
                            <div class="font-semibold w-full pl-4 md:pl-0 md:w-1/2 lg:w-1/3"
                                 :style="{color: statusColor}">
                                {{ status }}
                                <span v-if="allClear"><i class="fas fa-check"></i> </span>
                                <span v-else-if="restrict"><i class="fas fa-exclamation"></i></span>
                                <span v-else><i class="fas fa-times"></i></span>
                            </div>

                            <div class="w-full md:w-1/2 pl-4 lg:w-1/3 lg:pl-0"
                                 :style="{color: expirationColor}">
                                {{ expiration }}

                                <span>{{ exam_date | moment("add", "1 year") | moment("from", "now") }}</span>

                            </div>
                        </div>
                        <expand-button @toggleRow="toggleRow" class=""></expand-button>
                    </div>

                    <div v-if="isExpanded" class="px-2">
                        <div class="flex flex-col pb-4 px-4">

                            <div class=" flex flex-col w-full md:w-1/2 lg:w-1/4">
                                <p class="text-gray-600 w-full">Forms</p>

                                <div class="flex justify-between items-center">
                                    <p class="px-4 py-1">Consent Form:</p>
                                    <span v-if="confirmedConsentForm" @click="unConfirmConsent">
                                        <i class="green far fa-check-square text-xl"></i>
                                    </span>
                                    <span v-else @click="confirmConsent">
                                        <i class="red far fa-square text-xl"></i>
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="px-4 py-1">Concussion Form:</p>
                                    <span v-if="confirmedConcussionForm" @click="unConfirmConcussion">
                                        <i class="green far fa-check-square text-xl"></i>
                                    </span>
                                    <span v-else @click="confirmConcussion">
                                        <i class="red far fa-square text-xl"></i>
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="px-4 py-1">Evaluation Form:</p>
                                    <a v-if="confirmedEvaluationForm"
                                       @click="unConfirmEvaluation">
                                        <i class="green far fa-check-square text-xl"></i>
                                    </a>
                                    <span v-else @click="confirmEvaluation">
                                        <i class="red far fa-square text-xl"></i>
                                    </span>
                                </div>

                            </div>

                            <p class="text-gray-600 w-full py-1">Exam Date:
                                <span class="text-gray-900">
                                    {{ exam_date| moment("MM.DD.YYYY") }}
                                </span>
                            </p>

                            <p class="text-gray-600 w-full py-1">Restrictions:
                                <span v-if="restrictions !== null" class="text-gray-900">
                                    {{ restrictions }}
                                </span>
                                <span v-else class="text-gray-500">
                                    None
                                </span>
                            </p>

                            <p class="text-gray-600 w-full py-1">Notes:
                                <span v-if="notes !== null" class="text-gray-900">
                                    {{ notes }}
                                </span>
                                <span v-else class="text-gray-500">None</span>

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
    import PhysicalStatus from "./PhysicalStatus";
    export default {
        props: ['data'],

        components: { PhysicalStatus },

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                last_name: this.data.athlete.last_name,
                first_name: this.data.athlete.first_name,
                athleteName: this.data.athlete.last_name + ', ' + this.data.athlete.first_name,
                consent_form: this.data.consent_form,
                concussion_form: this.data.concussion_form,
                evaluation_form: this.data.evaluation_form,
                exam_date: this.data.exam_date,
                restrictions: this.data.restrictions,
                notes: this.data.notes,
                athlete_id: this.data.athlete_id,

                confirmedConsentForm: this.data.consent_form === 1,
                confirmedConcussionForm: this.data.concussion_form === 1,
                confirmedEvaluationForm: this.data.evaluation_form === 1,

                statusColor: '',
                expirationColor: '',

                allClear: false,
                restrict: false,
                notClear: false,

                form: new Form({
                    athlete_id: this.data.athlete_id,
                    restrictions: this.data.restrictions,
                    exam_date: this.data.exam_date,
                    notes: this.notes
                }),

                athletes: []
            }
        },

        computed: {

            status() {
                let forms =[
                    this.confirmedConsentForm,
                    this.confirmedConcussionForm,
                    this.confirmedEvaluationForm
                ];

                if  (forms.every(Boolean) && (this.restrictions === null)) {

                    this.statusColor = '#00b300';
                    this.allClear = true;

                    return "Cleared"

                } else if  (forms.every(Boolean) && (this.restrictions !== null)) {

                    this.statusColor = '#fd6a02';
                    this.restrict = true;

                    return "Cleared with Restrictions"


                } else {
                    this.statusColor = '#cc0000';

                    return "Not Cleared"
                }
            },

            expiration() {
                let examination_date = new Date(this.exam_date);

                examination_date.setFullYear(examination_date.getFullYear(), examination_date.getMonth() + 12);

                let today = new Date();

                if (examination_date > today) {

                    this.expirationColor = '#00b300';

                    return "Expires"

                } else {

                    this.unConfirmConsent();
                    this.unConfirmConcussion();
                    this.unConfirmEvaluation();

                    this.expirationColor = '#cc0000';

                    return "Expired"
                }
            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            confirmConsent() {
                axios.patch('/api/physicals/' + this.data.id, {
                    consent_form: this.consent_form = '1'
                });
                this.$emit('formChange');
                this.confirmedConsentForm = true;
            },

            confirmConcussion() {
                axios.patch('/api/physicals/' + this.data.id, {
                    concussion_form: this.concussion_form = '1'
                });

                this.$emit('formChange');
                this.confirmedConcussionForm = true;
            },

            confirmEvaluation() {
                axios.patch('/api/physicals/' + this.data.id, {
                    evaluation_form: this.evaluation_form = '1'
                });

                this.$emit('formChange');
                this.confirmedEvaluationForm = true;
            },

            unConfirmConsent() {
                axios.patch('/api/physicals/' + this.data.id, {
                    consent_form: this.consent_form = '0'
                });

                this.$emit('formChange');
                this.confirmedConsentForm = false;
            },

            unConfirmConcussion() {
                axios.patch('/api/physicals/' + this.data.id, {
                    concussion_form: this.concussion_form = '0'
                });

                this.$emit('formChange');
                this.confirmedConcussionForm = false;
            },

            unConfirmEvaluation() {
                axios.patch('/api/physicals/' + this.data.id, {
                    evaluation_form: this.evaluation_form = '0'
                });

                this.$emit('formChange');
                this.confirmedEvaluationForm = false;
            },

            update() {
                this.form
                    .patch('/api/physicals/' + this.data.id)
                    .then(data => {
                        this.athleteName =
                            this.athletes.find(athlete => athlete.id === this.form.athlete_id).last_name + ', ' +
                            this.athletes.find(athlete => athlete.id === this.form.athlete_id).first_name;
                        this.exam_date = this.form.exam_date;
                        this.restrictions = this.form.restrictions;
                        this.notes = this.form.notes;

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
                            title: 'Physical Updated'
                        });
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('api/physicals/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.athlete_id = this.athlete_id,
                this.form.exam_date = this.exam_date,
                this.form.restrictions = this.restrictions,
                this.form.notes = this.notes,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                axios.get('/api/physicals-athletes')
                    .then(response => {
                        this.athletes = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
        },
    }
</script>

<style>
    .green {
        color: #00b300;
    }

    .red {
        color: #cc0000;
    }

    .orange {
        color: #fd6a02;
    }
</style>
