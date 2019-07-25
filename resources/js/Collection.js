export default Vue.extend({
    props: ['data'],

    data() {
        return {
            recordsCount: this.data.length,
            items: this.data
        };
    },

    computed: {
        records: {
            get: function () {
                return this.recordsCount
            },
            set: function () {
                if (this.recordsCount !== 0) {
                    return this.records = true;
                }
                return this.records = false;
            }
        }
    },

    methods: {
        add(item) {
            this.items.push(item);
            this.$emit('reset');
            this.recordsCount += 1
        },

        remove(index) {
            this.items.splice(index, 1);
            this.recordsCount -= 1

            const toast = Vue.swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            toast({
                type: 'success',
                title: 'Record Deleted'
            });
        }

    }
})
