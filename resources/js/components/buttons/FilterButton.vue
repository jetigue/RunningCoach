<template>
<div>
    <i class="fas fa-filter pb-1 pr-2 text-secondary text-lg lg:hidden" @click="active=true"></i>
    <portal to="filter-modal">
        <div v-show="active" class="fixed pin overflow-auto z-50 bg-smoke flex">
            <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded">
                <header class="bg-secondary flex justify-between items-center py-5 px-3">
                    <div>
                        <h3 class="font-thin text-2xl text-white">
                            Filters
                        </h3>
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
    name: "FilterButton",

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

