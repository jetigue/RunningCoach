<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Genders</header>
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
                        <new-gender @created="add"></new-gender>
                    </create-button>
                    <portal-target name="create-modal"></portal-target>
                </div>
            </div>
            <div v-for="(gender, index) in items" :key="gender.id">
                <gender :data="gender" @deleted="remove(index)"></gender>
            </div>
        </div>
    </div>
</template>

<script>
    import Gender from './Gender';
    import CreateButton from '../../buttons/CreateButton';
    import NewGender from '../../forms/NewGender';

    export default {
        props: ['data'],

        components: { Gender, CreateButton, NewGender },

        data() {
            return {
                items: this.data,
            }
        },

        methods: {
            add(gender) {
                this.items.push(gender);
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
                    title: 'Gender Deleted'
                });
            },
        }
    }
</script>