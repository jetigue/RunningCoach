<template>
    <div class="flex flex-col w-full">
        <div class="flex flex-row justify-between items-center">
            <div class="lg:text-lg text-smoke-400" >
                <a :href="previousMonthURL">
                    <i class="far fa-arrow-alt-circle-left"></i> {{ previousMonth | moment('MMMM YYYY')}}
                </a>
            </div>
            <div class="lg:text-5xl text-primary font-hairline text-center">
                {{ currentMonth | moment('MMMM YYYY') }}
            </div>
            <div class="lg:text-lg text-smoke-400">
                <a :href="nextMonthURL">
                    {{ nextMonth | moment('MMMM YYYY')}} <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="flex w-full my-1">
            <div class="flex md: hidden flex-row w-full">
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">S</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">M</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">T</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">W</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">T</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">F</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">S</div>
            </div>
        </div>
        <div class="hidden md:flex w-full my-1">
            <div class="flex flex-row w-full">
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Sunday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Monday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Tuesday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Wednesday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Thursday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Friday</div>
                <div class="w-1/7 text-sm font-semibold text-center text-smoke-600">Saturday</div>
            </div>
        </div>
        <div v-if="records" class="flex w-full flex-row flex-wrap">
                <div :style="{width: offset}"></div>
                <div v-for="(day, index) in items" :key="day.id" class="w-1/7">
                    <training-day :data="day" @deleted="remove(index)"></training-day>
                </div>
        </div>
        <div v-else class="flex text-3xl font-semibold text-smoke-400 p-4 w-full justify-center">
            <p>No Training Days Listed</p>
        </div>
    </div>

</template>

<script>
    import Collection from './../../Collection';
    import TrainingDay from'./TrainingDay';

    export default Collection.extend({

        components: {TrainingDay},

        props: ['data'],

        data() {
            return {
                beginningDate: this.data[0].calendar_date,
                month: this.data[0].month_name,
                year: this.data[0].year,
                url: '/training-calendar/' + this.data.calendar_date
            }
        },

        methods: {

        },

        computed: {

            currentMonth: function() {
                return this.$moment(this.beginningDate);
            },

            nextMonth: function() {
                let x = this.$moment(this.beginningDate);

                return this.$moment(x).add(1, 'month');
            },

            nextMonthURL: function() {
                let x = this.nextMonth;
                let y = this.$moment(x).format('MMMM/YYYY');

                return '/training-calendar/' + y;
            },

            previousMonth: function() {
                let x = this.$moment(this.beginningDate);

                return this.$moment(x).subtract(1, 'month');
            },

            previousMonthURL: function() {
                let x = this.previousMonth;
                let y = this.$moment(x).format('MMMM/YYYY');

                return '/training-calendar/' + y;
            },


            offset: function () {
                let x = this.data[0].calendar_date;
                let y = this.$moment(x).day();
                let w;

                switch(y) {
                    case 0:
                        w = "0%";
                        break;
                    case 1:
                        w = "14.28571429%";
                        break;
                    case 2:
                        w = "28.57142857%";
                        break;
                    case 3:
                        w = "42.85714286%";
                        break;
                    case 4:
                        w = "57.14285714%";
                        break;
                    case 5:
                        w = '71.42857143%';
                        break;
                    case 6:
                        w = "85.7142857143%";
                        break;
                }

                return w;
            }
        },
    });
</script>

<style scoped>

</style>
