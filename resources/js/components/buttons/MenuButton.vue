<template>
<div>
    <i class="fas fa-bars text-3xl pt-2 pr-3" @click="active=true"
        :class="color === 'black' ? 'text-black' : 'text-white'"></i>

    <portal to="menu-modal">
        <div v-show="active" class="fixed inset-0 overflow-auto z-50 bg-smoke-200 flex">
            <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded">
                <header class="bg-black flex justify-between items-center px-3 h-24">
                    <div>
                        <p class="font-thin text-2xl text-white">
                            Admin Menu
                        </p>
                    </div>
                    <button type="button" aria-label="close" @click="close">
                        <i class="fas fa-times text-xl text-white"></i>
                    </button>
                </header>
                <section class="p-4">
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

    props: {
        color: { default: 'black' }
    },

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

