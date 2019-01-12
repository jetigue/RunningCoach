<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Athletes</h3>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                        <div class="hidden md:flex md:1/2">
                            <p class="text-primary font-semibold">Status</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Add an Athlete">
                            <new-athlete @created="add"></new-athlete>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>
            <div v-for="(athlete, index) in items" :key="athlete.id">
                <athlete :data="athlete" @deleted="remove(index)"></athlete>
            </div>
        </div>
    </div>
</template>

<script>
    import Athlete from './Athlete';
    import CreateButton from './buttons/CreateButton';
    import NewAthlete from './forms/NewAthlete';

    export default {
        props: ['data'],

        components: { Athlete, CreateButton, NewAthlete },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(athlete) {
                this.items.push(athlete);
                this.$emit('reset');
            },

            remove(index) {
                this.items.splice(index, 1);

                const toast = Vue.swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                toast({
                    type: 'success',
                    title: 'Athlete Deleted'
                });
            },
        }
    }
</script>