<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Track Meets</h3>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                        <div class="hidden md:flex md:1/2">
                            <p class="text-primary font-semibold">Date</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Add a Track Meet">
                            <new-track-meet @created="add"></new-track-meet>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>
            <div v-for="(trackMeet, index) in items" :key="trackMeet.id">
                <track-meet :data="trackMeet" @deleted="remove(index)"></track-meet>
            </div>
        </div>
    </div>
</template>

<script>
    import TrackMeet from './TrackMeet';
    import CreateButton from '../buttons/CreateButton';
    import NewTrackMeet from '../forms/NewTrackMeet';

    export default {
        props: ['data'],

        components: { TrackMeet, CreateButton, NewTrackMeet },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(trackMeet) {
                this.items.push(trackMeet);
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
                    title: 'Track Meet Deleted'
                });
            },
        }
    }
</script>