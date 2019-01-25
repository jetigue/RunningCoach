<template>
    <div class="pb-8 md:py-8 md:px-12">
        <h3 class="font-light text-2xl pb-1 text-primary">Meet Hosts</h3>
        <div class="table-container w-full">
                <div class="table-header">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="flex content-around">
                    <create-button title="Create Meet Host">
                        <new-meet-host @created="add"></new-meet-host>
                    </create-button>
                    <portal-target name="create-modal"></portal-target>
                </div>
            </div>
            <div v-for="(host, index) in items" :key="host.id">
                <meet-host :data="host" @deleted="remove(index)"></meet-host>
            </div>
        </div>
    </div>
</template>

<script>
    import MeetHost from './MeetHost';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetHost from '../../forms/NewMeetHost';

    export default {
        props: ['data'],

        components: { MeetHost, CreateButton, NewMeetHost },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(host) {
                this.items.push(host);
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
                    title: 'Host Deleted'
                });
            },
        }
    }
</script>
