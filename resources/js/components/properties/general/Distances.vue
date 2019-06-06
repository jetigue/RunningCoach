<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Distances</h3>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                        <div class="hidden md:flex md:1/2">
                            <p class="text-primary font-semibold">Meters</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create Meet Venue">
                            <new-distance @created="add"></new-distance>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>

            <div v-if="records">
                <div v-for="(distance, index) in items" :key="distance.id">
                    <distance :data="distance" @deleted="remove(index)"></distance>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Distances Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Distance from './Distance';
    import CreateButton from '../../buttons/CreateButton';
    import NewDistance from '../../forms/NewDistance';

    export default {
        props: ['data'],

        components: { Distance, CreateButton, NewDistance },

        data() {
            return {
                // items: this.data,
            }
        },

        methods: {
        //     add(distance) {
        //         this.items.push(distance);
        //         this.$emit('reset');
        //     },
        //
        //     remove(index) {
        //         this.items.splice(index, 1);
        //
        //         const toast = Vue.swal.mixin({
        //             toast: true,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 3000
        //         });
        //
        //         toast({
        //             type: 'success',
        //             title: 'Distance Deleted'
        //         });
        //     },
        }
    }
</script>