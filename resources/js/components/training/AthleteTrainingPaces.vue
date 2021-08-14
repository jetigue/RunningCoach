<template>
    <div class="w-full">
        <div class="flex w-full justify-between flex-wrap">
            <div v-if="showPaces" class="flex flex-col w-full lg:w-3/4">
                <training-paces-header :data="data" :calculator="calculatorUsed"></training-paces-header>
                <div class="flex flex-wrap md:justify-around">
                    <div class="w-full md:w-5/12">
                        <easy-paces :data="data" class="py-4"></easy-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <steady-state-paces :data="data" class="py-4"></steady-state-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <tempo-paces :data="data" class="py-4"></tempo-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <critical-velocity-paces :data="data" class="py-4"></critical-velocity-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <interval-paces :data="data" class="py-4"></interval-paces>
                    </div>
                    <div class="w-full md:w-5/12">
                        <repetition-paces :data="data" class="py-4"></repetition-paces>
                    </div>
                </div>
            </div>
            <div v-else class="flex flex-col w-full lg:w-3/4">
                <div class="w-full md:w-2/3 mx-auto text-center py-4">
                    You currently don't have any recent race performances that we can use to calculate your training
                    paces.
                </div>
                <div class="w-full md:w-2/3 mx-auto text-center py-4">
                    Use the Pace Calculator to determine your paces until you get some recent race results.
                </div>
            </div>

            <div class="w-full order-first lg:order-last lg:w-1/5 lg:border-l">
                <div v-if="data.length !== 0" class="flex lg:flex-col">
                    <div v-show="currentSeason === 'Summer' || currentSeason === 'Track'"
                         class="flex flex-col w-1/2 lg:w-full items-center lg:py-2">
                        <div class="font-semibold text-sm">
                            Track Results
                        </div>
                        <div class="flex flex-col">
                            <div v-show="track1600RecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestTrack1600'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestTrack1600">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 1600</div>
                            </div>
                            <div v-show="track1600RecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestTrack1600'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestTrack1600">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 1600</div>
                            </div>
                            <div v-show="track3200RecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestTrack3200'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestTrack3200">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 3200</div>
                            </div>

                            <div v-show="track3200RecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestTrack3200'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestTrack3200">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 3200</div>
                            </div>
                        </div>
                    </div>

                    <div v-show="currentSeason === 'Summer' || currentSeason === 'Cross Country'"
                         class="flex flex-col w-1/2 lg:w-full items-center lg:py-2">
                        <div class="font-semibold text-sm">
                            XC Time Trials
                        </div>
                        <div class="flex flex-col">

                            <div v-show="XCTT2mileRecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXCTT2Mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXCTT2Mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 2-Mile</div>
                            </div>
                            <div v-show="XCTT2mileRecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXCTT2Mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXCTT2Mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 2-Mile</div>
                            </div>

                            <div v-show="XCTT3mileRecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXCTT3Mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXCTT3Mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 3-Mile</div>
                            </div>
                            <div v-show="XCTT3mileRecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXCTT3Mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXCTT3Mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 3-Mile</div>
                            </div>

                            <div v-show="XCTT5kRecordsCount === 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXCTT5k'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXCTT5k">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 5k</div>
                            </div>

                            <div v-show="XCTT5kRecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXCTT5k'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXCTT5k">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 5k</div>
                            </div>
                        </div>
                    </div>

                    <div v-show="currentSeason === 'Cross Country' || currentSeason === 'Winter'"
                         class="flex flex-col w-1/2 lg:w-full items-center lg:py-2">
                        <div class="font-semibold text-sm">
                            Cross Country
                        </div>
                        <div class="flex flex-col">
                            <div v-show="XC5kRecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXC5k'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXC5k">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 5k</div>
                            </div>

                            <div v-show="XC5kRecordsCount >= 2"  class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXC5k'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXC5k">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 5k</div>
                            </div>
                            <div v-show="XC3mileRecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXC3mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXC3mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 3-Mile</div>
                            </div>
                            <div v-show="XC3mileRecordsCount >= 2"  class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXC3mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXC3mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 3-Mile</div>
                            </div>
                            <div v-show="XC2mileRecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestXC2mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestXC2mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 2-Mile</div>
                            </div>
                            <div v-show="XC2mileRecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestXC2mile'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestXC2mile">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 2-Mile</div>
                            </div>
                        </div>
                    </div>

                    <div v-show="currentSeason === 'Winter' || currentSeason === 'Track'"
                         class="flex flex-col w-1/2 lg:w-full items-center lg:py-2">
                        <div class="font-semibold text-sm">
                            Track Time Trials
                        </div>
                        <div class="flex flex-col">

                            <div v-show="trackTT1600RecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestTrackTT1600'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestTrackTT1600">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 1600</div>
                            </div>
                            <div v-show="trackTT1600RecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestTrackTT1600'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestTrackTT1600">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 1600</div>
                            </div>
                            <div v-show="trackTT3200RecordsCount >= 1" class="flex items-center w-full">
                                <a v-if="selectedRace === 'bestTrackTT3200'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getBestTrackTT3200">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Best 3200</div>
                            </div>

                            <div v-show="trackTT3200RecordsCount >= 2" class="flex items-center w-full">
                                <a v-if="selectedRace === 'latestTrackTT3200'" class="">
                                    <span class="text-green-500 px-3">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                </a>
                                <a v-else
                                   @click="getLatestTrackTT3200">
                                    <span class="px-3 text-gray-600">
                                        <i class="far fa-square"></i>
                                    </span>
                                </a>
                                <div class="text-sm">Latest 3200</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="flex lg:flex-col w-full pl-3">
                    <pace-calculator
                        @clicked="showPacesFromPaceCalculator($event)"
                        @formReset="showPaces = false"
                        class="w-full md:w-2/3 md:mx-auto lg:w-full">
                    </pace-calculator>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {pacesMixin} from "../../mixins/pacesMixin";
    import EasyPaces from './EasyPaces';
    import TempoPaces from './TempoPaces';
    import CriticalVelocityPaces from './CriticalVelocityPaces';
    import IntervalPaces from './IntervalPaces';
    import RepetitionPaces from './RepetitionPaces';
    import SteadyStatePaces from "./SteadyStatePaces";
    import TrainingPacesHeader from "./TrainingPacesHeader";
    import PaceCalculator from "./PaceCalculator";


    export default {
        mixins: [pacesMixin],
        components: {
            PaceCalculator,
            TrainingPacesHeader,
            EasyPaces,
            TempoPaces,
            CriticalVelocityPaces,
            IntervalPaces,
            RepetitionPaces,
            SteadyStatePaces
        },

        data() {
            return {
                data: [],

                selectedRace: '',
                showPaces: false,

                XC5kRecordsCount: '',
                XC3mileRecordsCount: '',
                XC2mileRecordsCount: '',
                track1600RecordsCount: '',
                track3200RecordsCount: '',
                trackTT1600RecordsCount: '',
                trackTT3200RecordsCount: '',
                XCTT2mileRecordsCount: '',
                XCTT3mileRecordsCount: '',
                XCTT5kRecordsCount: '',

                bestSelected: '',
                latestSelected: '',
                calculatorUsed: false

            }
        },

        computed: {
            currentSeason() {
                let today = this.$moment();
                let year = this.$moment().year();
                let beginSummer = this.$moment('6/1/' + year, "MM-DD-YYYY");
                let endSummer = this.$moment('7/31/' + year, "MM-DD-YYYY");
                let beginXC = this.$moment('8/1/' + year, "MM-DD-YYYY");
                let endXC = this.$moment('11/30/' + year, "MM-DD-YYYY");
                let beginWinter = this.$moment('12/1/' + year, "MM-DD-YYYY");
                let endWinter = this.$moment('1/30/' + year, "MM-DD-YYYY");
                let beginTrack = this.$moment('2/1/' + year, "MM-DD-YYYY");
                let endTrack = this.$moment('5/30/' + year, "MM-DD-YYYY");

                if (today >= beginSummer && today <= endSummer) {
                    return 'Summer'
                } else if (today >= beginXC && today <= endXC) {
                    return 'Cross Country';
                } else if (today >= beginWinter && today <= endWinter) {
                    return 'Winter';
                } else {
                    return 'Track'
                }
            },
        },

        mounted() {
            return this.getInitialResults();
        },

        methods: {
            showPacesFromPaceCalculator(data) {
                this.calculatorUsed = true
                this.data.seconds = data[0]
                this.data.meters = data[1]
                this.showPaces = true
            },

            checkForSummerTrainingResults() {
                function getXCTT5kResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=5k')
                }

                function getXCTT3mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=3-mile')
                }

                function getXCTT2mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=2-mile')
                }

                function getTrack1600Results() {
                    return axios.get('/api'+location.pathname+'/track-training-paces?event=1600m')
                }

                function getTrack3200Results() {
                    return axios.get('/api'+location.pathname+'/track-training-paces?event=3200m')
                }

                axios.all([
                    getXCTT5kResults(),
                    getXCTT3mileResults(),
                    getXCTT2mileResults(),
                    getTrack1600Results(),
                    getTrack3200Results()
                ])
                .then(axios.spread((
                    responseXCTT5k,
                    responseXCTT3mile,
                    responseXCTT2mile,
                    responseTrack1600,
                    responseTrack3200
                ) => {
                    this.XCTT5kRecordsCount = responseXCTT5k.data.length
                    this.XCTT3mileRecordsCount = responseXCTT3mile.data.length
                    this.XCTT2mileRecordsCount = responseXCTT2mile.data.length
                    this.track1600RecordsCount = responseTrack1600.data.length
                    this.track3200RecordsCount = responseTrack3200.data.length

                    if (this.XCTT5kRecordsCount >= 2) {
                        return this.getLatestXCTT5k();
                    } else if (this.XCTT5kRecordsCount === 1) {
                        return this.getBestXCTT5k()
                    } else if (this.XCTT3mileRecordsCount >= 2) {
                        return this.getLatestXCTT3Mile()
                    } else if (this.XCTT3mileRecordsCount === 1) {
                        return this.getBestXCTT3Mile()
                    } else if (this.XCTT2mileRecordsCount >= 2) {
                        return this.getLatestXCTT2Mile()
                    } else if (this.XCTT2mileRecordsCount === 1) {
                        return this.getBestXCTT2Mile()
                    } else if (this.track3200RecordsCount >= 2) {
                        return this.getLatestTrack3200()
                    } else if (this.track3200RecordsCount === 1) {
                        return this.getBestTrack3200()
                    } else if (this.track1600RecordsCount >= 2) {
                        return this.getLatestTrack1600()
                    } else if (this.track1600RecordsCount === 1) {
                        return this.getBestTrack1600()
                    }
                }))
                .catch(errors => {
                    console.log(errors)
                })
            },

            checkForCrossCountryResults() {
                function getXC5kResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=5k')
                }

                function getXC3mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=3-mile')
                }

                function getXC2mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=2-mile')
                }

                function getXCTT5kResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=5k')
                }

                function getXCTT3mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=3-mile')
                }

                function getXCTT2mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-tt-training-paces?event=2-mile')
                }

                axios.all([
                    getXC5kResults(),
                    getXC3mileResults(),
                    getXC2mileResults(),
                    getXCTT5kResults(),
                    getXCTT3mileResults(),
                    getXCTT2mileResults(),
                ])
                .then(axios.spread((
                    responseXC5k,
                    responseXC3mile,
                    responseXC2mile,
                    responseXCTT5k,
                    responseXCTT3mile,
                    responseXCTT2mile,
                ) => {
                    this.XC5kRecordsCount = responseXC5k.data.length
                    this.XC3mileRecordsCount = responseXC3mile.data.length
                    this.XC2mileRecordsCount = responseXC2mile.data.length
                    this.XCTT5kRecordsCount = responseXCTT5k.data.length
                    this.XCTT3mileRecordsCount = responseXCTT3mile.data.length
                    this.XCTT2mileRecordsCount = responseXCTT2mile.data.length

                    if (this.XC5kRecordsCount >= 2) {
                        return this.getLatestXC5k();
                    } else if (this.XC5kRecordsCount === 1) {
                        return this.getBestXC5k();
                    } else if (this.XC3mileRecordsCount >= 2) {
                        return this.getLatestXC3mile();
                    } else if (this.XC3mileRecordsCount === 1) {
                        return this.getBestXC3mile();
                    } else if (this.XC2mileRecordsCount >= 2) {
                        return this.getLatestXC2mile();
                    } else if (this.XC2mileRecordsCount === 1) {
                        return this.getBestXC2mile();
                    } else if (this.XCTT5kRecordsCount >= 2) {
                        return this.getLatestXCTT5k();
                    } else if (this.XCTT5kRecordsCount === 1) {
                        return this.getBestXCTT5k();
                    } else if (this.XCTT3mileRecordsCount >= 2) {
                        return this.getLatestXCTT5k();
                    } else if (this.XCTT3mileRecordsCount === 1) {
                        return this.getBestXCTT5k();
                    } else if (this.XCTT2mileRecordsCount >= 2) {
                        return this.getLatestXCTT2Mile();
                    } else if (this.XCTT2mileRecordsCount === 1) {
                        return this.getBestXCTT2Mile();
                    }
                }))
                .catch(errors => {
                    console.log(errors)
                })
            },

            checkForWinterTrainingResults() {
                function getTrackTT1600Results() {
                    return axios.get('/api'+location.pathname+'/track-tt-training-paces?event=1600m')
                }

                function getTrackTT3200Results() {
                    return axios.get('/api'+location.pathname+'/track-tt-training-paces?event=3200m')
                }

                function getXC5kResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=5k')
                }

                function getXC3mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=3-mile')
                }

                function getXC2mileResults() {
                    return axios.get('/api'+location.pathname+'/xc-training-paces?event=2-mile')
                }

                axios.all([
                    getTrackTT1600Results(),
                    getTrackTT3200Results(),
                    getXC5kResults(),
                    getXC3mileResults(),
                    getXC2mileResults(),

                ])
                .then(axios.spread((
                    responseTrackTT1600,
                    responseTrackTT3200,
                    responseXC5k,
                    responseXC3mile,
                    responseXC2mile,

                ) => {
                    this.trackTT1600RecordsCount = responseTrackTT1600.data.length
                    this.trackTT3200RecordsCount = responseTrackTT3200.data.length
                    this.XC5kRecordsCount = responseXC5k.data.length
                    this.XC3mileRecordsCount = responseXC3mile.data.length
                    this.XC2mileRecordsCount = responseXC2mile.data.length

                    if (this.trackTT3200RecordsCount >= 2) {
                        return this.getLatestTrackTT3200();
                    } else if (this.trackTT3200RecordsCount === 1) {
                        return this.getBestTrackTT3200();
                    } else if (this.trackTT1600RecordsCount >= 2) {
                        return this.getLatestTrackTT1600();
                    } else if (this.trackTT1600RecordsCount === 1) {
                        return this.getBestTrackTT1600();
                    } else if (this.XC5kRecordsCount >= 2) {
                        return this.getLatestXC5k();
                    } else if (this.XC5kRecordsCount === 1) {
                        return this.getBestXC5k();
                    } else if (this.XC3mileRecordsCount >= 2) {
                        return this.getLatestXC3mile();
                    } else if (this.XC3mileRecordsCount === 1) {
                        return this.getBestXC3mile();
                    } else if (this.XC2mileRecordsCount >= 2) {
                        return this.getLatestXC2mile();
                    } else if (this.XC2mileRecordsCount === 1) {
                        return this.getLatestXC2mile();
                    }
                }))
                .catch(errors => {
                    console.log(errors)
                })
            },

            checkForTrackResults() {
                function getTrack1600Results() {
                    return axios.get('/api'+location.pathname+'/track-training-paces?event=1600m')
                }

                function getTrack3200Results() {
                    return axios.get('/api'+location.pathname+'/track-training-paces?event=3200m')
                }

                function getTrackTT1600Results() {
                    return axios.get('/api'+location.pathname+'/track-tt-training-paces?event=1600m')
                }

                function getTrackTT3200Results() {
                    return axios.get('/api'+location.pathname+'/track-tt-training-paces?event=3200m')
                }

                axios.all([
                    getTrack1600Results(),
                    getTrack3200Results(),
                    getTrackTT1600Results(),
                    getTrackTT3200Results(),
                ])
                .then(axios.spread((
                    responseTrack1600,
                    responseTrack3200,
                    responseTrackTT1600,
                    responseTrackTT3200,
                ) => {
                    this.track1600RecordsCount = responseTrack1600.data.length
                    this.track3200RecordsCount = responseTrack3200.data.length
                    this.trackTT1600RecordsCount = responseTrackTT1600.data.length
                    this.trackTT3200RecordsCount = responseTrackTT3200.data.length

                    if (this.track3200RecordsCount >= 2) {
                        return this.getLatestTrack3200();
                    } else if (this.track3200RecordsCount === 1) {
                        return this.getBestTrack3200();
                    } else if (this.track1600RecordsCount >= 2) {
                        return this.getLatestTrack1600();
                    } else if (this.track1600RecordsCount === 1) {
                        return this.getBestTrack1600();
                    } else if (this.trackTT3200RecordsCount >= 2) {
                        return this.getLatestTrackTT3200();
                    } else if (this.trackTT3200RecordsCount === 1) {
                        return this.getBestTrackTT3200();
                    } else if (this.trackTT1600RecordsCount >= 2) {
                        return this.getLatestTrackTT1600();
                    } else if (this.trackTT1600RecordsCount === 1) {
                        return this.getBestTrackTT1600();
                    }
                }))
                .catch(errors => {
                    console.log(errors)
                })
            },

            getBestXC5k() {
                this.selectedRace = 'bestXC5k';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '5k',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXC5k() {
                this.selectedRace = 'latestXC5k';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '5k',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestXC3mile() {
                this.selectedRace = 'bestXC3mile';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '3-mile',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXC3mile() {
                this.selectedRace = 'latestXC3mile';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '3-mile',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestXC2mile() {
                this.selectedRace = 'bestXC2mile';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '2-mile',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXC2mile() {
                this.selectedRace = 'latestXC2mile';

                axios.get('/api'+location.pathname+'/xc-training-paces', {
                    params: {
                        event: '2-mile',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestXCTT5k() {
                this.selectedRace = 'bestXCTT5k';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '5k',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXCTT5k() {
                this.selectedRace = 'latestXCTT5k';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '5k',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestXCTT3Mile() {
                this.selectedRace = 'bestXCTT3Mile';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '3-mile',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXCTT3Mile() {
                this.selectedRace = 'latestXCTT3Mile';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '3-mile',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestXCTT2Mile() {
                this.selectedRace = 'bestXCTT2Mile';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '2-mile',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestXCTT2Mile() {
                this.selectedRace = 'latestXCTT2Mile';

                axios.get('/api'+location.pathname+'/xc-tt-training-paces', {
                    params: {
                        event: '2-mile',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestTrack1600() {
                this.selectedRace = 'bestTrack1600';

                axios.get('/api'+location.pathname+'/track-training-paces', {
                    params: {
                        event: '1600m',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestTrack1600() {
                this.selectedRace = 'latestTrack1600';

                axios.get('/api'+location.pathname+'/track-training-paces', {
                    params: {
                        event: '1600m',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestTrack3200() {
                this.selectedRace = 'bestTrack3200';

                axios.get('/api'+location.pathname+'/track-training-paces', {
                    params: {
                        event: '3200m',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestTrack3200() {
                this.selectedRace = 'latestTrack3200';
                this.selectedBest = true;

                axios.get('/api'+location.pathname+'/track-training-paces', {
                    params: {
                        event: '3200m',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestTrackTT1600() {
                this.selectedRace = 'bestTrackTT1600';

                axios.get('/api'+location.pathname+'/track-tt-training-paces', {
                    params: {
                        event: '1600m',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestTrackTT1600() {
                this.selectedRace = 'latestTrackTT1600';

                axios.get('/api'+location.pathname+'/track-tt-training-paces', {
                    params: {
                        event: '1600m',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getBestTrackTT3200() {
                this.selectedRace = 'bestTrackTT3200';

                axios.get('/api'+location.pathname+'/track-tt-training-paces', {
                    params: {
                        event: '3200m',
                        result: 'best'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('bestSelected');
            },

            getLatestTrackTT3200() {
                this.selectedRace = 'latestTrackTT3200';

                axios.get('/api'+location.pathname+'/track-tt-training-paces', {
                    params: {
                        event: '3200m',
                        result: 'latest'
                    }
                })
                    .then(response => {
                        this.data = response.data
                        this.showPaces = true
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
                Event.$emit('latestSelected');
            },

            getInitialResults() {
                switch(this.currentSeason) {
                    case "Summer":
                        this.checkForSummerTrainingResults();
                        break;
                    case "Cross Country":
                        this.checkForCrossCountryResults();
                        break;
                    case "Winter":
                        this.checkForWinterTrainingResults();
                        break;
                    case "Track":
                        this.checkForTrackResults();
                        break;
                    default:
                        return null;
                }
            }

        }
    };
</script>

<style>
    .grad {
  background-image: linear-gradient(to right,#040036,indigo,blue,green,yellow,orange,red);
}
</style>
