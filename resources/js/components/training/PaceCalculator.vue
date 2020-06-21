<template>
    <div class="bg-gray-300 p-2 rounded-lg">
        <header class="w-full text-center text-lg text-primary font-semibold">
            Pace Calculator
        </header>
        <form @submit.prevent="onSubmit">
            <div class="">
                <div class="flex justify-between content-end">
                    <label for="meters" class="form-label">Distance</label>
                </div>
                <select class="input" name="meters" id="meters" v-model="meters" required>
                    <option value="1600">1600m</option>
                    <option value="1609">1 mile</option>
                    <option value="3200">3200m</option>
                    <option value="3218">2 mile</option>
                    <option value="4828">3 mile</option>
                    <option value="5000">5km</option>
                </select>
            </div>
            <div class="flex w-full">
                <div class="flex flex-col flex-grow">
                    <div class="flex justify-between content-end">
                        <label class="form-label" for="minutes">Minutes</label>
                    </div>
                    <div class="flex">
                        <input class="input"
                               id="minutes"
                               type="number"
                               min="0"
                               max="59"
                               v-model="minutes" required>
                        <span class="text-grey-darker px-1 text-lg content-center"></span>
                    </div>
                </div>

                <div class="flex flex-col flex-grow">
                    <div class="flex justify-between content-end">
                        <label class="form-label" for="seconds">Seconds</label>
                    </div>
                    <div class="flex">
                        <input class="input"
                               id="seconds"
                               type="number"
                               min="0"
                               max="59"
                               v-model="seconds" required>
                    </div>
                </div>
            </div>
            <div class="my-3 w-full">
                <button
                    type="submit"
                    class="submit w-full">
                    Get My Paces
                </button>
            </div>
            <div class="w-full text-sm text-gray-600 text-right">
                <a role="button" @click="resetForm">Reset</a>
            </div>
        </form>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "PaceCalculator",

        data() {
            return {
                minutes: '',
                seconds: '',
                meters: ''
            }
        },

        computed: {
            total_seconds() {
                return Number(this.minutes * 60) + Number(this.seconds)
            },
        },

        methods: {
            onSubmit() {
                this.$emit('clicked', [this.total_seconds, this.meters])
            },

            resetForm() {
                this.minutes =  ''
                this.seconds = ''
                this.meters = ''
                this.$emit('formReset');
            }
        },
    }
</script>

<style scoped>
    .input {
      color: #555;
      width: 100%;
      line-height: 1;
      padding: .25rem .5rem;
      border-radius: .25rem;
      margin-bottom: .25rem;
      box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
    }

    .submit {
      background: #008000;
      color: #fff;
      border-radius: .25rem;
      font-size: .875rem;
      padding: 0.4rem;
    }

    .submit:hover {
      font-weight: 700;
      background: #00b300;
    }
</style>
