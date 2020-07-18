<template>
    <div class="flex flex-col">
        <header class="text-3xl font-thin text-center">
            {{ groupName }}
        </header>
        <div class="border-2 p-4 rounded-md" :style="{
            background: groupColor,
            'color': textColor,
            'border-color': borderColor,
        }">
            <div class="flex flex-wrap w-full">
                <slot></slot>
            </div>
            <hr>
            <div class="flex">
                <div class="flex w-full flex-wrap text-xs">
                    <div class="w-full md:w-1/2 mt-2">
                        <div v-if="boysAverageVDOT"
                             @mouseover="showToolTip = true"
                             @mouseleave="hideToolTip"
                        >
                            Boys Average VDOT: &nbsp; {{ boysAverageVDOT}}
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 mt-2">
                        <div v-if="girlsAverageVDOT"
                             @mouseover="showToolTip = true"
                             @mouseleave="hideToolTip"
                        >
                            Girls Average VDOT: &nbsp; {{ girlsAverageVDOT}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AverageVdotTooltip from "../toolTips/AverageVdotTooltip";
    export default {
        name: "AthleteTrainingGroup",
        components: {AverageVdotTooltip},
        props: ['group'],

        data() {
            return {
                groupName: this.group.name,
                color: this.group.color,

                boysAverageVDOT: '',
                girlsAverageVDOT: '',

                showToolTip: false
            }
        },

        computed: {
            groupColor() {
                return (this.GroupName === 'None' ? '#'+this.color+'00' : '#'+this.color);
            },

            textColor() {
                if (this.groupName === 'White' || this.groupName === 'None') {
                    return '#000'
                }
                return '#fff'
            },

            borderColor() {
                return (this.groupName === 'White' ? '#000' : this.groupColor)
            }
        },

        created() {
            return this.getVDOTAverages();
        },

        methods: {

            hideToolTip() {
                this.showToolTip = false;
            },

            getVDOTAverages() {
                let group = this.groupName;

                function getBoysAverageVDOT() {
                    return axios.get('/api/training-group-vdot/average', {
                        params: {
                            group: group,
                            sex: 'm'
                        }
                    })
                }

                function getGirlsAverageVDOT() {
                    return axios.get('/api/training-group-vdot/average', {
                        params: {
                            group: group,
                            sex: 'f'
                        }
                    })
                }

                axios.all([
                    getBoysAverageVDOT(),
                    getGirlsAverageVDOT()
                ])
                .then(axios.spread((
                    BoysResponse,
                    GirlsResponse,
                ) => {
                    this.boysAverageVDOT = BoysResponse.data;
                    this.girlsAverageVDOT = GirlsResponse.data;
                }))
                .catch(errors => {
                    console.log(errors)
                })
            }
        }
    }

</script>
