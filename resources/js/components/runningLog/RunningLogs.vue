<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">My Runs</header>
            <filter-button class="hidden">

            </filter-button>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex w-11/12 pl-1">
                    <div class="w-1/3">
                        <p class="text-primary font-semibold">Distance</p>
                    </div>
                    <div class="w-1/3">
                        <p class="text-primary font-semibold">Duration</p>
                    </div>
                    <div class="w-1/3">
                        <p class="text-primary font-semibold">Pace</p>
                    </div>
                </div>
                <div class="flex tooltip">
                    <create-button title="Log a New Run">
                        <new-running-log @created="add"></new-running-log>
                    </create-button>
                    <span class="tooltiptext">Log a Run</span>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(runningLog, index) in items" :key="runningLog.id">
                    <running-log :data="runningLog" @deleted="remove(index)"></running-log>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Logs Posted</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Collection from '../../Collection';
    import RunningLog from './RunningLog';
    import CreateButton from '../buttons/CreateButton';
    import NewRunningLog from '../forms/NewRunningLog';

    export default Collection.extend({
        props: ['data'],

        components: { RunningLog, CreateButton, NewRunningLog },

        data() {
            return {

            }
        }
    });
</script>
