<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">User Roles</header>
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
                    <create-button title="Create New Role">
                        <new-role @created="add"></new-role>
                    </create-button>
                </div>
            </div>
            <div v-for="(role, index) in items" :key="role.id">
                <user-role :data="role" @deleted="remove(index)"></user-role>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import UserRole from './UserRole';
    import CreateButton from '../buttons/CreateButton';
    import NewRole from '../forms/NewRole';

    export default Collection.extend({
        props: ['data'],

        components: { UserRole, CreateButton, NewRole },

        data() {
            return {
            }
        }
    });
</script>
