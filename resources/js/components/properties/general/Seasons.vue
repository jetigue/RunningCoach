<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Seasons</header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-full md:w-4/5">
                    <div class="">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Create New Season">
                        <new-season @created="add"></new-season>
                    </create-button>
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
