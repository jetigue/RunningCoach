<template>
    <div class="flex flex-col">
        <div class="flex justify-end w-full">
            <div class="flex md:w-1/2 lg:w-1/3">
                <input type="text"
                       v-model="search"
                       placeholder="Find an athlete..."
                       class="flex w-full rounded-md border px-3 py-2 text-lg border shadow"
                />
                <button @click="clearSearch"
                        class="w-20 py-2 ml-2 bg-green-500 text-white text-sm font-bold rounded-md border-2 border-green-400">
                    Clear
                </button>
            </div>
        </div>
        <div class="md:flex justify-between items-baseline">
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
        </div>

        <div class="table-container">
            <div class="table-header ">
                <div class="flex md:w-11/12">
                    <div class="w-full md:w-2/5">
                        <p class="text-primary font-semibold">Name</p>
                    </div>
                    <div class="hidden md:block md:w-1/2 lg:px-8">
                        <p class="text-primary font-semibold">Training Group</p>
                    </div>
                </div>
                <div class="">
                    <create-button title="Add an Athlete">
                        <new-athlete @created="add"></new-athlete>
                    </create-button>
                </div>
            </div>
            <div v-if="records">
                <div v-for="(athlete, index) in filteredAthletes" :key="athlete.id">
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
                // items: [],
                displayPhysicals: '',
                search: '',
            }
        },

        created() {
            this.fetch();
        },

        computed: {
            filteredAthletes() {
                return this.items.filter((athlete) => {
                    return (
                        athlete.last_name.toLowerCase().match(this.search.toLowerCase()) ||
                        athlete.first_name.toLowerCase().match(this.search.toLowerCase())
                    )
                });
            }
        },

        methods: {
            clearSearch() {
                this.search = ''
            },
            
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

                window.scrollTo(0,0);
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
