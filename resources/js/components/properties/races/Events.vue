<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Events</h3>
        <div class="table-container">
                <div class="table-header">
                    <div class="flex md:w-4/5">
                        <div class="md:w-1/2">
                            <p class="text-primary font-semibold">Name</p>
                        </div>
                    </div>
                    <div class="">
                        <create-button title="Create Meet Venue">
                            <new-event @created="add"></new-event>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>
            <div v-for="(event, index) in items" :key="event.id">
                <event :data="event" @deleted="remove(index)"></event>
            </div>
        </div>
    </div>
</template>

<script>
    import Event from './Event';
    import CreateButton from '../../buttons/CreateButton';
    import NewEvent from '../../forms/NewEvent';

    export default {
        props: ['data'],

        components: { Event, CreateButton, NewEvent },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(event) {
                this.items.push(event);
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
                    title: 'Event Deleted'
                });
            },
        }
    }
</script>