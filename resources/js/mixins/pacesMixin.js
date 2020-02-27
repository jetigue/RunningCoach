
export const pacesMixin = {
    computed: {

        avgPaceKm() {
            let s = this.data[0].seconds;
            let d = this.data[0].meters / 1000;

            let pace = s/d;

            let minutes = Math.floor(pace / 60);
            let seconds = Math.floor(pace % 60);

            let averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

            return averagePace;
        },

        avgPaceMi() {
            let s = this.data[0].seconds;
            let d = this.data[0].meters / 1609;

            let pace = s/d;

            let minutes = Math.floor(pace / 60);
            let seconds = Math.floor(pace % 60);

            let averagePace = minutes + ':' + (seconds > 9 ? seconds : '0' + seconds );

            return averagePace;
        },

        avgVelocity() {
            let s = this.data[0].seconds;
            let d = this.data[0].meters;

            let totalMinutes = s/60;

            let averageVelocity = Math.round(d / totalMinutes);

            return averageVelocity;
        },

        duration() {
            let time = this.data[0].seconds;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        vDot() {
            let s = this.data[0].seconds;
            let dis = this.data[0].meters;

            let totalMinutes = s/60;

            let a = 0.182258;
            let v = (dis / totalMinutes);
            let min = s / 60;
            let va = v * a;
            let b = 0.000104;
            let v2 = v * v;
            let c = v2 * b;
            let d = -4.6;
            let e = 0.8;
            let f = 0.1894393;
            let g = -0.01278;
            let h = (min * g);
            let i =  f * Math.exp(h) + e;
            let j = 0.29895558;
            let k = -0.1932605;
            let m = j * Math.exp(k * min);
            let vO2max = i + m;
            let vDot = Math.round(10*(va + c + d)/vO2max)/10;

            return vDot;
        },

        lowEasyPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .62;

            let x = percentVO2 * this.vDot;

            let time = 1/(a + b * x - c * (x ** 2))*1000*60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

            easyPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .67;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highEasyPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .74;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowEasyPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .60;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        easyPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .67;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highEasyPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .74;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowEasyPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .60;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        easyPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .67;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highEasyPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .74;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowTempoPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .84;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        tempoPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .86;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highTempoPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowTempoPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .84;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        tempoPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .86;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highTempoPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowTempoPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .84;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        tempoPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .86;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highTempoPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowCVPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        cVPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .90;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highCVPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .92;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowCVPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        cVPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .90;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highCVPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .92;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowCVPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .88;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        cVPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .90;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highCVPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .92;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowIntervalPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .95;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        intervalPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .975;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highIntervalPace() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowIntervalPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .95;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        intervalPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .975;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highIntervalPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowIntervalPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .95;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        intervalPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .975;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highIntervalPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowIntervalPace1200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .95;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        intervalPace1200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .975;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highIntervalPace1200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowIntervalPace1600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .95;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        intervalPace1600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .975;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highIntervalPace1600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace200() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 200 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace300() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 300 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace300() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 300 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace300() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 300 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace500() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 500 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace500() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 500 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace500() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 500 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace600() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 600 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowRepPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.025;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        repPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.05;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highRepPace800() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = 1.1;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 800 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowSSPace400() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .78;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        sSPace400() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .80;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highSSPace400() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .82;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 400 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowSSPace1000() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .78;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        sSPace1000() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .80;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highSSPace1000() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .82;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1000 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        lowSSPace1mile() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .78;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        sSPace1mile() {
            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .80;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

        highSSPace1mile() {

            let a = 29.54;
            let b = 5.000663;
            let c = 0.007546;

            let percentVO2 = .82;

            let x = percentVO2 * this.vDot;

            let time = 1 / (a + b * x - c * (x ** 2)) * 1609.344 * 60;

            let min = ~~((time % 3600) / 60);
            let sec = ~~(time % 60);

            let ret = "";

            ret += "" + min + ":" + (sec < 10 ? "0" : "");
            ret += "" + sec;

            return ret;
        },

    }
}

