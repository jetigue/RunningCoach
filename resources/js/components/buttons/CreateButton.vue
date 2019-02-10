<template>
    <div>
        <button type="button" @click="loadSelects">
            <i class="fas fa-plus text-lg text-primary pt-1"></i>
        </button>
        <portal to="create-modal">
            <div v-show="active" class="fixed pin overflow-auto z-50 bg-smoke flex">
                <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded flex flex-col p-4">
                    <header class="border-b-2 border-primary flex justify-between">
                        <div>
                            <h3 class="font-thin text-2xl text-tertiary py-2">
                                {{ title }}
                            </h3>
                        </div>
                        <button type="button" aria-label="close" @click="close">
                            <i class="fas fa-times text-2xl text-grey-darker pt-3"></i>
                        </button>
                    </header>
                    <section class="my-3 p-4 bg-blue-lightest rounded-lg">
                        <slot></slot>
                    </section>
                    <footer class="border-t-2 border-primary flex justify-end">
                        <button type="button" class="py-2 text-grey-darker text-sm" @click="close">
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

        props: ['title'],

        data() {
            return {
                active: false
            }
        },

        methods: {
            close() {
                Event.$emit('cancel'),
                    this.active = false
            },

            loadSelects() {
                this.active = true,
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