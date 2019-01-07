<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Meet Venue</h3>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                        <div class="hidden md:flex md:1/2">
                            <p class="text-primary font-semibold">Season</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create Meet Venue">
                            <new-meet-venue @created="add"></new-meet-venue>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>
            <div v-for="(venue, index) in items" :key="venue.id">
                <meet-venue :data="venue" @deleted="remove(index)"></meet-venue>
            </div>
        </div>
    </div>
</template>

<script>
    import MeetVenue from './MeetVenue';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetVenue from '../../forms/NewMeetVenue';

    export default {
        props: ['data'],

        components: { MeetVenue, CreateButton, NewMeetVenue },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(venue) {
                this.items.push(venue);
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
                    title: 'Venue Deleted'
                });
            },
        }
    }
</script>