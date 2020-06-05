<template>
    <div>
        <div v-if="editing" class="p-3 border-b border-gray-100">
            <div class="w-full md:w-3/4 lg:w-1/2 mx-auto">
                <form action="/results" method="POST" id="editTrackResult" @submit.prevent="update"
                      @keydown="form.errors.clear()"
                        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="flex items-center mb-2">
                        <div class="form-label ml-1">
                            <p>id</p>
                        </div>
                        <div class="w-full text-gray-700 px-4">
                            <p v-text="id"></p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label">Athlete</label>
                            <span id="athleteHelp" class="form-help" v-if="form.errors.has('athlete_id')"
                                  v-text="form.errors.get('athlete_id')">
                            </span>
                        </div>
                        <select class="form-input" name="athlete_id" v-model="form.athlete_id" required>
                            <option v-for="athlete in athletes" :key="athlete.id" :value="athlete.id">
                                {{ athlete.last_name }}, {{ athlete.first_name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.place">Place</label>
                            <span id="placeHelp" class="form-help" v-if="form.errors.has('place')"
                                  v-text="form.errors.get('place')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.place"
                               type="number"
                               min="1"
                               v-model="form.place" required>
                    </div>

                    <div class="flex mb-2 w-full">
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.minutes">Minutes</label>
                                <span id="minutesHelp" class="form-help" v-if="form.errors.has('minutes')"
                                      v-text="form.errors.get('minutes')">
                                </span>
                            </div>
                            <div class="flex">
                                <input class="form-input"
                                       id="form.minutes"
                                       type="number"
                                       min="0"
                                       max="59"
                                       v-model="form.minutes" required>
                                <span class="text-grey-darker px-1 text-3xl content-center">:</span>
                            </div>
                        </div>

                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.seconds">Seconds</label>
                                <span id="secondsHelp" class="form-help" v-if="form.errors.has('seconds')"
                                      v-text="form.errors.get('seconds')">
                                </span>
                            </div>
                            <div class="flex">
                                <input class="form-input"
                                       id="form.seconds"
                                       type="number"
                                       min="0"
                                       max="59"
                                       v-model="form.seconds" required>
                                <span class="text-grey-darker px-1 text-3xl content-end">.</span>
                            </div>

                        </div>
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="form.milliseconds">ms</label>
                            </div>

                            <input class="form-input"
                                   id="form.milliseconds"
                                   type="number"
                                   min="0"
                                   max="99"
                                   v-model="form.milliseconds">
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="flex justify-between content-end">
                            <label class="form-label" for="form.points">Points</label>
                            <span id="pointsHelp" class="form-help" v-if="form.errors.has('points')"
                                  v-text="form.errors.get('points')">
                            </span>
                        </div>
                        <input class="form-input"
                               id="form.points"
                               type="number"
                               min="0"
                               v-model="form.points">
                    </div>

                    <div class="flex items-center justify-end">
                        <update-button class="mr-4" :disabled="form.errors.any()">
                            Update
                        </update-button>
                        <cancel-button @clicked="resetForm"></cancel-button>
                    </div>
                </form>
            </div>
        </div>
        <div v-else class="table-body">
            <div class="flex flex-col border-b border-gray-100 hover:bg-gray-100">
                <div class="flex flex-col hover:bg-gray-100">
                    <div class="flex p-2 items-center">
                        <div class="text-black flex flex-wrap w-11/12">

                            <div class="w-3/4 md:w-2/5 lg:w-2/5">
                                <a :href="url">
                                    {{ athleteName }}
                                </a>
                            </div>

                            <div class="w-1/4 md:flex md:w-1/5 lg:w-1/5">
                                {{ place_w_suffix }}
                            </div>

                            <div class="w-1/2 pl-4 text-primary md:w-1/5 lg:w-1/5 md:pl-0 md:text-black">
                                {{duration}}<span v-if="milliseconds != null" class="text-xs">.{{ ms }}</span>
                            </div>
                            <div class="hidden md:flex md:w-1/5 lg:w-1/5">
                                {{ points }}
                            </div>
                        </div>
                        <div v-if="isCoach" class="flex flex-grow justify-end">
                            <expand-button @toggleRow="toggleRow" class=""></expand-button>
                        </div>
                    </div>
                    <div v-if="isExpanded" class="px-2">
                        <div class="md:hidden flex flex-col pb-4 px-4">
                            <p class="text-gray-600 w-full py-1">Points:
                                <span class="text-gray-800">
                                    {{ points }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-start cursor-pointer pb-2 lg:pt-2">
                            <edit-button @clicked="getNames"></edit-button>
                            <delete-button @clicked="destroy"></delete-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {authMixin} from "../../mixins/authMixin";

    export default {
        mixins: [authMixin],
        props: ['data'],

        data() {
            return {
                editing: false,
                isExpanded: false,

                id: this.data.id,
                athleteName: this.data.athlete.last_name + ', ' + this.data.athlete.first_name,
                ms: (this.data.milliseconds > 9 ? this.data.milliseconds : '0' + this.data.milliseconds),
                totalSeconds: this.data.total_seconds,
                milliseconds: this.data.milliseconds,
                place: this.data.place,
                points: this.data.points,
                url: '/athletes/' + this.data.athlete.id,

                athlete_id: this.data.athlete_id,

                form: new Form({
                    athlete_id: this.data.athlete_id,
                    minutes: ~~((this.data.total_seconds % 3600) / 60),
                    seconds: ~~(this.data.total_seconds % 60),
                    milliseconds: this.data.milliseconds,
                    place: this.data.place,
                    points: this.data.points
                }),

                athletes: [],
            }
        },

        computed: {
            duration: function () {
                let time = this.totalSeconds;

                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                let ret = "";

                ret += "" + min + ":" + (sec < 10 ? "0" : "");
                ret += "" + sec;

                return ret;
            },

            place_w_suffix: function ordinal_suffix_of() {
                let i = this.place;

                let j = i % 10,
                    k = i % 100;
                if (j == 1 && k != 11) {
                    return i + "st";
                }
                if (j == 2 && k != 12) {
                    return i + "nd";
                }
                if (j == 3 && k != 13) {
                    return i + "rd";
                }
                return i + "th";

            }
        },

        methods: {
            toggleRow() {
                this.isExpanded = !this.isExpanded
            },

            update() {
                this.form
                    .patch('/api' + location.pathname + '/results/' +this.data.id)
                    .then(data => {
                        this.athleteName =
                        this.athletes.find(athlete => athlete.id === this.form.athlete_id).last_name + ', ' +
                        this.athletes.find(athlete => athlete.id === this.form.athlete_id).first_name;
                        this.minutes = this.form.minutes;
                        this.seconds = this.form.seconds;
                        this.milliseconds = this.form.milliseconds;
                        this.totalSeconds = (this.form.minutes * 60) + this.form.seconds;

                        this.place = this.form.place;
                        this.points = this.form.points;

                        this.editing = false;
                        this.isExpanded = false;

                         if (
                             this.athlete !== this.data.athlete.name ||
                             this.minutes !== this.data.minutes ||
                             this.seconds !== this.data.seconds ||
                             this.milliseconds !== this.data.milliseconds ||
                             this.place !== this.data.place ||
                             this.points !== this.data.points)
                            {
                                const toast = Vue.swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                                });

                                toast({
                                    type: 'success',
                                    title: 'Result Updated'
                                });
                            }
                    })

                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api' + location.pathname+'/results/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form.athlete_id = this.athlete_id,
                this.form.minutes = ~~((this.data.total_seconds % 3600) / 60),
                this.form.seconds = ~~(this.data.total_seconds % 60),
                this.form.milliseconds = this.data.milliseconds,
                this.form.place = this.place,
                this.form.points = this.points,
                this.isExpanded = false;
            },

            getNames() {
                this.editing = true;

                function getAthleteNames() {
                    return axios.get('/api/physicals-athletes')
                }

                axios.all([
                    getAthleteNames(),
                ])
                    .then(axios.spread((
                        athletesResponse,
                    ) => {
                        this.athletes = athletesResponse.data;
                    }));
            }
        }
    }
</script>
