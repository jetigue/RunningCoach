<template>
    <form
        action="api/athletes/id"
        method="POST"
        @submit.prevent="updateTrainingGroup"
        @keydown="form.errors.clear()"
        class="w-full">
        <div class="mb-2 items-center w-full">
            <div class="flex flex-initial justify-start">
                <label class="form-label">Training Group</label>
                <span id="trainingGroupTypeHelp"
                      class="form-help"
                      v-if="form.errors.has('training_group_id')"
                      v-text="form.errors.get('training_group_id')">
                </span>
            </div>
            <select class="form-input"
                    name="training_group_id"
                    v-model="form.training_group_id"
                    required>
                <option v-for="trainingGroup in trainingGroups" :key="trainingGroup.id" :value="trainingGroup.id">
                    {{ trainingGroup.name }}
                </option>
            </select>
        </div>
        <div class="flex items-center justify-end">
            <update-button class="text-sm" :disabled="form.errors.any()">
                Update
            </update-button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "TrainingGroupForm",
        props: ['data'],
        data() {
            return {
                trainingGroupId: this.data.training_group_id,
                color: '',

                form: new Form({
                    training_group_id: this.data.training_group_id
                }),

                trainingGroups: []
            }
        },

        computed: {
            groupName() {
                return this.trainingGroups.find(trainingGroup => trainingGroup.id === this.form.training_group_id).name;
            },

            originalGroupName() {
                return this.trainingGroups.find(trainingGroup => trainingGroup.id === this.form.originalData.training_group_id).name;
            }
        },

        created() {
            this.getTrainingGroups();
        },

        methods: {
            updateTrainingGroup() {
                this.form
                    .patch('/api/athletes/' + this.data.id)
                    .then(data=> {
                        this.trainingGroupId = this.form.training_group_id
                        this.color = this.trainingGroups.find(trainingGroup => trainingGroup.id === this.form.training_group_id).color;

                        this.$emit('updated');

                        if (this.trainingGroupId !== this.data.training_group_id) {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            toast({
                                type: 'success',
                                title: 'Training Group Updated'
                            });

                            Event.$emit('athleteUpdated');
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },

            resetTrainingGroupForm() {
                this.active = false
                this.form.training_group_id = this.data.training_group_id
            },

            getTrainingGroups() {
                axios.get('/api/training-groups')
                    .then(response => {
                        this.trainingGroups = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
        }
    }
</script>

<style scoped>

</style>
