
export const workoutMixin = {
    methods: {
        selectMiles() {
            this.form.duration_unit = 'miles'
            this.metersSelected = false
            this.milesSelected = true
            this.minutesSelected = false
            this.secondsSelected = false
        },

        selectMeters() {
            this.form.duration_unit = 'meters'
            this.metersSelected = true
            this.milesSelected = false
            this.minutesSelected = false
            this.secondsSelected = false
        },

        selectMinutes() {
            this.form.duration_unit = 'minutes'
            this.metersSelected = false
            this.milesSelected = false
            this.minutesSelected = true
            this.secondsSelected = false
        },

        selectSeconds() {
            this.form.duration_unit = 'seconds'
            this.metersSelected = false
            this.milesSelected = false
            this.minutesSelected = false
            this.secondsSelected = true
        },

        selectRecoveryMiles() {
            this.form.recovery_unit = 'miles'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = true
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = false
        },

        selectRecoveryMeters() {
            this.form.recovery_unit = 'meters'
            this.recoveryMetersSelected = true
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = false
        },

        selectRecoveryMinutes() {
            this.form.recovery_unit = 'minutes'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = true
            this.recoverySecondsSelected = false
        },

        selectRecoverySeconds() {
            this.form.recovery_unit = 'seconds'
            this.recoveryMetersSelected = false
            this.recoveryMilesSelected = false
            this.recoveryMinutesSelected = false
            this.recoverySecondsSelected = true
        },

        confirmVarsity() {
            axios.patch(this.url, {
                varsity: this.varsity = 'yes'
            });
            this.confirmedVarsity = true;
            Event.$emit('toggleSync');
        },

        unConfirmVarsity() {
            axios.patch(this.url, {
                varsity: this.varsity = 'no'
            });
            this.confirmedVarsity = false;
            Event.$emit('toggleSync');
        },

        confirmJuniorVarsity() {
            axios.patch(this.url, {
                junior_varsity: this.junior_varsity = 'yes'
            });
            this.confirmedJuniorVarsity = true;
            Event.$emit('toggleSync');
        },

        unConfirmJuniorVarsity() {
            axios.patch(this.url, {
                junior_varsity: this.junior_varsity = 'no'
            });
            this.confirmedJuniorVarsity = false;
            Event.$emit('toggleSync');
        },

        confirmOpen() {
            axios.patch(this.url, {
                open: this.open = 'yes'
            });
            this.confirmedOpen = true;
            Event.$emit('toggleSync');
        },

        unConfirmOpen() {
            axios.patch(this.url, {
                open: this.open = 'no'
            });
            this.confirmedOpen = false;
            Event.$emit('toggleSync');
        },

        confirmBeginner() {
            axios.patch(this.url, {
                beginner: this.beginner = 'yes'
            });
            this.confirmedBeginner = true;
            Event.$emit('toggleSync');
        },

        unConfirmBeginner() {
            axios.patch(this.url, {
                beginner: this.beginner = 'no'
            });
            this.confirmedBeginner = false;
            Event.$emit('toggleSync');
        },
    },

    computed: {
        length() {
            if (this.durationUnit === 'seconds') {

                let time = this.duration;

                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                if (min === 0) {
                    return sec + ' ' + (sec > 1 ? 'sec' : 'sec');

                } else if (sec === 0) {
                    return min + ' ' + (min > 1 ? 'min' : 'min');

                } else {
                    return min + ' ' + (min > 1 ? 'min' : 'min')
                        + ' ' + 'and' + ' ' + sec + ' ' +
                        (sec > 1 ? 'sec' : 'sec')
                }
            } else if (this.durationUnit === 'minutes') {
                this.minutesSelected = true;
                let time = this.duration;

                let hour = ~~((time % 3600) / 60);
                let min = ~~(time % 60);

                if (hour === 0) {
                    return min + ' ' + (min > 1 ? 'min' : 'min');

                } else if (min === 0) {
                    return hour + ' ' + (hour > 1 ? 'hrs' : 'hr');

                } else {

                    return hour + ' ' +
                        (hour > 1 ? 'hrs' : 'hr')
                        + ' ' + 'and' + ' ' + min + ' ' +
                        (min > 1 ? 'min' : 'min');
                }
            } else if (this.durationUnit === 'miles') {
                this.milesSelected = true;
                let miles = this.duration;

                return miles + ' ' + (miles > 1 ? 'mi' : 'mi')
            } else {
                this.metersSelected = true;
                let meters = this.duration;

                if (meters > 1000) {
                    let km = meters / 1000;
                    return km.toFixed(1) + ' ' + 'km';
                } else {
                    return meters + ' ' + (meters > 1 ? 'm' : 'm');
                }
            }
        },

        recoveryLength() {
            if (this.recoveryUnit === 'seconds') {

                let time = this.recovery;

                let min = ~~((time % 3600) / 60);
                let sec = ~~(time % 60);

                if (min === 0) {
                    return sec + ' ' + (sec > 1 ? 'sec' : 'sec');

                } else if (sec === 0) {
                    return min + ' ' + (min > 1 ? 'min' : 'min');

                } else {
                    return min + ' ' + (min > 1 ? 'min' : 'min')
                        + ' ' + 'and' + ' ' + sec + ' ' +
                        (sec > 1 ? 'sec' : 'sec')
                }
            } else if (this.recoveryUnit === 'minutes') {
                this.recoveryMinutesSelected = true;
                let time = this.recovery;

                let hour = ~~((time % 3600) / 60);
                let min = ~~(time % 60);

                if (hour === 0) {
                    return min + ' ' + (min > 1 ? 'min' : 'min');

                } else if (min === 0) {
                    return hour + ' ' + (hour > 1 ? 'hrs' : 'hr');

                } else {

                    return hour + ' ' +
                        (hour > 1 ? 'hrs' : 'hr')
                        + ' ' + 'and' + ' ' + min + ' ' +
                        (min > 1 ? 'min' : 'min');
                }
            } else if (this.recoveryUnit === 'miles') {
                this.recoveryMilesSelected = true;
                let miles = this.recovery;

                return miles + ' ' + (miles > 1 ? 'mi' : 'mi')
            } else {
                this.recoveryMetersSelected = true;
                let meters = this.recovery;

                if (meters > 1000) {
                    let km = meters / 1000;
                    return km.toFixed(1) + ' ' + 'km';
                } else {
                    return meters + ' ' + (meters > 1 ? 'm' : 'm');
                }
            }
        }
    }
}

