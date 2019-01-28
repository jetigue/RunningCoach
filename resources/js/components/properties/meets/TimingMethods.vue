<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Timing Methods</header>
            <filter-button class="hidden">

            </filter-button>
        </div>
        <div class="table-container">
                <div class="table-header">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="flex content-around">
                    <create-button title="Create Timing Method">
                        <new-timing-method @created="add"></new-timing-method>
                    </create-button>
                    <portal-target name="create-modal"></portal-target>
                </div>
            </div>
            <div v-for="(timing, index) in items" :key="timing.id">
                <timing-method :data="timing" @deleted="remove(index)"></timing-method>
            </div>
        </div>
    </div>
</template>

<script>
    import TimingMethod from './TimingMethod';
    import CreateButton from '../../buttons/CreateButton';
    import NewTimingMethod from '../../forms/NewTimingMethod';

    export default {
        props: ['data'],

        components: { TimingMethod, CreateButton, NewTimingMethod },

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
                    title: 'Timing Method Deleted'
                });
            },
        }
    }
</script>