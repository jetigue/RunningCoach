<template>
    <form action="/meet-names" method="POST" id="newMeetName"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">

        <div class="mb-4">
            <div class="flex justify-between content-end">
                <label class="form-label" for="form.name">Name</label>
                <span id="nameHelp" class="form-help" v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')">
                </span>
            </div>
            <input class="form-input"
                    id="form.name"
                    type="text"
                    v-model="form.name" required>
        </div>

        <div class="mb-4">
            <div class="flex justify-between content-end">
                <label class="form-label">Season</label>
                <span id="seasonHelp" class="form-help" v-if="form.errors.has('season_id')"
                    v-text="form.errors.get('season_id')">
                </span>
            </div>
            <select class="form-input" name="season_id" v-model="form.season_id" required>
                <option v-for="season in seasons" :key="season.id" :value="season.id">
                    {{ season.name }}
                </option>
            </select>
        </div>
        
        <div class="text-right">
            <button type="submit"
                    class="w-20 py-2 bg-white border-b-2 border-tertiary hover:bg-green-lightest text-tertiary text-sm font-bold rounded"
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
                season_id: ''
            }),

            seasons: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post('/api/meetNames')

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
                        title: 'Name Added Successfully'
                    });
  
                    this.$emit('created', data),
                    this.resetForm()
                })

                .catch(errors => console.log(errors));
        },

        resetForm() {
            this.form.name = '',
            this.form.season_id = '',
            this.form.errors.clear();
        }
    },

    created() {
        Event.$on('cancel', () => this.resetForm());

        Event.$on('getNames', () => 

            axios.get('/api/seasons')
                .then(response => {
                    this.seasons = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                })
        );
    }
}
</script>