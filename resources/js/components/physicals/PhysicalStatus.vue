<template>
    <div class="font-semibold w-full"
         :style="{color: statusColor}">
            {{ status }}
        <span v-if="allClear"><i class="fas fa-check"></i> </span>
        <span v-else-if="restrict"><i class="fas fa-exclamation"></i></span>
        <span v-else><i class="fas fa-times"></i></span>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        name: "PhysicalStatus",

        data() {
            return {

                statusColor: '',

                allClear: false,
                restrict: false,
                notClear: false,
            }
        },

        computed: {
            status() {
                if (this.data.latest_physical) {

                    let forms = [
                        this.confirmedConsentForm = this.data.latest_physical.consent_form === 1,
                        this.confirmedConcussionForm = this.data.latest_physical.concussion_form === 1,
                        this.confirmedEvaluationForm = this.data.latest_physical.evaluation_form === 1
                    ];

                    if (forms.every(Boolean) && (this.data.latest_physical.restrictions === null)) {

                        this.statusColor = '#00b300';
                        this.allClear = true;

                        return "Cleared"

                    } else if (forms.every(Boolean) && (this.data.latest_physical.restrictions !== null)) {

                        this.statusColor = '#fd6a02';
                        this.restrict = true;

                        return "Cleared with Restrictions"


                    } else {
                        this.statusColor = '#cc0000';

                        return "Not Cleared"
                    }

                } else {
                    this.statusColor = '#cc0000';

                    return "Not Cleared"
                }
            }
        }
    }

</script>

<style scoped>

</style>
