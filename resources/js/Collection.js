export default Vue.extend({
    props: ['data'],

    data() {
        return {
            items: this.data
        };
    },

    methods: {
        add(item) {
            this.items.push(item);
            this.$emit('reset');
        },

        remove(index) {
            this.items.splice(index, 1);

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