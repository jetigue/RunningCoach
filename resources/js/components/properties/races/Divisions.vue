<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Divisions</header>
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
                    <create-button title="Create Meet Host">
                        <new-division @created="add"></new-division>
                    </create-button>
                    <portal-target name="create-modal"></portal-target>
                </div>
            </div>
            <div v-for="(division, index) in items" :key="division.id">
                <division :data="division" @deleted="remove(index)"></division>
            </div>
        </div>
    </div>
</template>

<script>
    import Division from './Division';
    import CreateButton from '../../buttons/CreateButton';
    import NewDivision from '../../forms/NewDivision';

    export default {
        props: ['data'],

        components: { Division, CreateButton, NewDivision },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(division) {
                this.items.push(division);
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
                    title: 'Division Deleted'
                });
            },
        }
    }
</script>