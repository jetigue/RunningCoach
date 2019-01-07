<template>
    <div class="pb-8 md:py-8 md:px-12">    
        <h3 class="font-light text-2xl pb-1 text-primary">Seasons</h3>
        <div class="table-container">
                <div class="table-header">
                <div class="flex justify-between">
                    <div class="flex-1">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="flex content-around">
                    <create-button title="Create Meet Host">
                        <new-season @created="add"></new-season>
                    </create-button>
                    <portal-target name="create-modal"></portal-target>
                </div>
            </div>
            <div v-for="(season, index) in items" :key="season.id">
                <season :data="season" @deleted="remove(index)"></season>
            </div>
        </div>
    </div>
</template>

<script>
    import Season from './Season';
    import CreateButton from '../../buttons/CreateButton';
    import NewSeason from '../../forms/NewSeason';

    export default {
        props: ['data'],

        components: { Season, CreateButton, NewSeason },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(season) {
                this.items.push(season);
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
                    title: 'Season Deleted'
                });
            },
        }
    }
</script>
