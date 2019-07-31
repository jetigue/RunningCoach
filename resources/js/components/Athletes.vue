<template>
    <div class="flex flex-col">
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl pb-1 text-primary">Athletes</header>
            <p class="text-gray-600 py-1">Show Physical Status:
                <a v-if="displayPhysicals" @click="hidePhysicals">
                    <span style="color:green;">
                        <i class="fas fa-check-square"></i>
                    </span>
                </a>
                <a v-else @click="showPhysicals">
                    <span style="color:gray;">
                        <i class="far fa-square"></i>
                    </span>
                </a>
            </p>
<!--            <filter-button class="hidden">-->
<!--                <status-filter></status-filter>-->
<!--            </filter-button>-->
        </div>

        <div class="table-container">
            <div class="table-header">
                <div class="flex md:w-4/5">
                    <div class="w-full md:w-1/2">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                    <div class="hidden md:block md:w-1/2">
                        <p class="text-primary font-semibold">Physical</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Add an Athlete">
                        <new-athlete @created="add"></new-athlete>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(athlete, index) in items" :key="athlete.id">
                    <athlete :data="athlete" @deleted="remove(index)" :displayPhysicals="displayPhysicals"></athlete>
                </div>
            </div>

            <div v-else class="flex flex-col text-center">
                <p class="text-2xl text-tertiary p-4">No Athletes Posted</p>
            </div>
        </div>

        <div v-if="records">
            <paginator :dataSet="dataSet" @changed="fetch"></paginator>
        </div>
    </div>
</template>

<script>
    import Collection from '../Collection';
    import Athlete from './Athlete';
    import CreateButton from './buttons/CreateButton';
    import NewAthlete from './forms/NewAthlete';

    export default Collection.extend({

        components: { Athlete, CreateButton, NewAthlete },

        data() {
            return {
                dataSet: false,

                displayPhysicals: '',

            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `api${location.pathname}?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;
            },

            showPhysicals() {
                this.displayPhysicals = true;
            },

            hidePhysicals() {
                this.displayPhysicals = false;
            }
        }


    });
</script>
