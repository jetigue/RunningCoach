<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Meet Name</h3>
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
                        <create-button title="Create Meet Name">
                            <new-meet-name @created="add"></new-meet-name>
                        </create-button>
                        <portal-target name="create-modal"></portal-target>
                    </div>
                </div>
            <div v-for="(name, index) in items" :key="name.id">
                <meet-name :data="name" @deleted="remove(index)"></meet-name>
            </div>
        </div>
    </div>
</template>

<script>
    import MeetName from './MeetName';
    import CreateButton from '../../buttons/CreateButton';
    import NewMeetName from '../../forms/NewMeetName';

    export default {
        props: ['data'],

        components: { MeetName, CreateButton, NewMeetName },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(name) {
                this.items.push(name);
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
                    title: 'Name Deleted'
                });
            },
        }
    }
</script>