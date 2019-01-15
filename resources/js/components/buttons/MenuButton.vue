<template>
<div>
    <i class="fas fa-bars text-3xl text-tertiary pt-2 pr-4" @click="active=true"></i>

    <portal to="menu-modal">
        <div v-show="active" class="fixed pin overflow-auto z-50 bg-smoke flex">
            <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded">
                <header class="bg-primary flex justify-between items-center py-5 px-2">
                    <div>
                        <h3 class="font-thin text-2xl text-white">
                            Admin Menu
                        </h3>
                    </div>
                    <button type="button" aria-label="close" @click="close">
                        <i class="fas fa-times text-xl text-white"></i>
                    </button>
                </header>
                <section>
                    <slot></slot>
                </section>
            </div>
        </div>
    </portal>
</div>
</template>

<script>
export default {
    name: "MenuButton",

    data() {
        return {
            active: false
        }
    },

    methods: {
        close() {
            this.active=false
        }
    }
}
</script>

