<template>
    <div>
        <button type="button" @click="loadSelects" class="flex">
            {{ label }} &nbsp
            <i class="fas fa-plus text-primary pt-1"></i>
        </button>
        <portal to="create-modal">
            <div v-show="active" class="fixed inset-0 overflow-auto z-50 bg-smoke-600 flex">
                <div class="relative bg-white w-full md:w-1/2 lg:w-1/3 max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                    <header class="border-b-2 border-primary flex justify-between items-center">
                        <div>
                            <p class="font-thin text-2xl text-black">
                                {{ title }}
                            </p>
                        </div>
                        <button type="button" aria-label="close" @click="close">
                            <i class="fas fa-times text-xl text-gray-700"></i>
                        </button>
                    </header>
                    <section class="my-3 p-4 bg-gray-200 rounded-lg">
                        <slot></slot>
                    </section>
                    <footer class="border-t-2 border-primary flex justify-end">
                        <button type="button" class="py-2 text-gray-800 text-sm" @click="close">
                            Cancel
                        </button>
                    </footer>
                </div>
            </div>
        </portal>
    </div>
</template>

<script>
    export default {
        name: "CreateButton",

        props: ['title', 'label'],

        data() {
            return {
                active: false
            }
        },

        methods: {
            close() {
                Event.$emit('cancel')
                this.active = false
            },

            loadSelects() {
                this.active = true
                Event.$emit('getNames');
            },
        },

        created() {
            Event.$on('formSubmitted', () => this.close());
        }
    }
</script>

<style scoped>

</style>
